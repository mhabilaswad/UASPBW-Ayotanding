<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Lapangan;
use App\Models\Fase;
use Illuminate\Support\Facades\Auth;
use App\Models\Pembayaran;

class BookingController extends Controller
{
    public function addToCart(Request $request, $lapanganId)
    {
        $request->validate([
            'booking_date' => 'required|date|after_or_equal:today',
            'fase_id' => 'required|exists:fase,id',
        ]);

        $fase = Fase::findOrFail($request->fase_id);

        $existingPayment = Pembayaran::where('lapangan_id', $lapanganId)
        ->where('fase_id', $request->fase_id)
        ->where('booking_date', $request->booking_date)
        ->exists();

    if ($existingPayment) {
        return redirect()->back()->with('error', 'Fase ini tidak tersedia pada tanggal tersebut.');
    }

        $totalPrice = $fase->harga;

        $booking = new Booking();
        $booking->user_id = Auth::id();
        $booking->lapangan_id = $lapanganId;
        $booking->fase_id = $request->fase_id;
        $booking->booking_date = $request->booking_date;
        $booking->total_price = $totalPrice;
        $booking->save();

        return redirect()->route('keranjang')->with('success', 'Lapangan berhasil ditambahkan ke keranjang.');
    }

    public function showCart()
    {
        $bookings = Booking::where('user_id', Auth::id())->get();

        return view('keranjang', compact('bookings'));
    }

    public function checkout($bookingId)
    {
        $booking = Booking::findOrFail($bookingId);
        $totalAmount = $booking->total_price;

        return view('checkout', compact('booking', 'totalAmount'));
    }

    public function processCheckout(Request $request)
    {
        // Validasi data
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|string|email|max:255',
        ]);

        // Ambil data booking dari request
        $bookingId = $request->input('booking_id');
        $booking = Booking::findOrFail($bookingId);

        // Simpan data checkout ke dalam session untuk digunakan di halaman pembayaran
        $request->session()->put('checkout', [
            'booking_id' => $bookingId,
            'full_name' => $request->input('full_name'),
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
            'total_amount' => $booking->total_price,
        ]);

        return redirect()->route('payment');
    }

    public function showPaymentPage(Request $request)
    {
        $checkout = $request->session()->get('checkout');

        if (!$checkout) {
            return redirect()->route('keranjang')->with('error', 'Data checkout tidak ditemukan.');
        }

        $booking = Booking::findOrFail($checkout['booking_id']);
        $totalAmount = $checkout['total_amount'];
        $paymentOption = $booking->lapangan->payment_option;

        return view('payment', compact('booking', 'totalAmount', 'paymentOption'));
    }

    public function processPayment(Request $request)
    {
        // Validasi data
        $request->validate([
            'bukti_pembayaran' => 'required|image|max:10240', // 10 MB
        ]);

        $checkout = $request->session()->get('checkout');

        if (!$checkout) {
            return redirect()->route('keranjang')->with('error', 'Data checkout tidak ditemukan.');
        }

        $bookingId = $checkout['booking_id'];
        $booking = Booking::findOrFail($bookingId);

        // Simpan data pembayaran
        $pembayaran = new Pembayaran();
        $pembayaran->user_id = $booking->user_id;
        $pembayaran->lapangan_id = $booking->lapangan_id;
        $pembayaran->fase_id = $booking->fase_id;
        $pembayaran->booking_date = $booking->booking_date;
        $pembayaran->total_price = $checkout['total_amount'];
        $pembayaran->full_name = $checkout['full_name'];
        $pembayaran->phone_number = $checkout['phone_number'];
        $pembayaran->email = $checkout['email'];
        $pembayaran->payment_date = now();

        // Upload bukti pembayaran
        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/payment_proofs'), $filename);
            $pembayaran->bukti_pembayaran = $filename;
        }

        $pembayaran->save();

        // Hapus booking setelah pembayaran berhasil
        $booking->delete();

        return redirect()->route('payment.success')->with('success', 'Pembayaran berhasil.');
    }

    public function successPayment()
    {
        return view('success');
    }

    public function removeFromCart($bookingId)
    {
        $booking = Booking::findOrFail($bookingId);
        $booking->delete();

        return redirect()->route('keranjang')->with('success', 'Item telah dihapus dari keranjang.');
    }
}
