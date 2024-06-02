<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Booking</title>
</head>
<body>
<div>
        <a href="{{ route('main') }}">Main</a>
        <a href="{{ route('keranjang') }}">Keranjang</a>
        <a href="{{ route('daftarkan-lapangan') }}">Daftarkan Lapangan</a>
        <a href="{{ route('profile') }}">Profile</a>
        <a href="{{ route('tiket') }}">Tiket</a>
        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>

    <h1>Keranjang Booking</h1>
    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif
    @if($bookings->isEmpty())
        <p>Keranjang Anda kosong.</p>
    @else
        <ul>
            @foreach($bookings as $booking)
                <li>
                    <p>Nama Lapangan: {{ $booking->lapangan->field_name }}</p>
                    <p>Jenis Lapangan: {{ $booking->lapangan->jenisLapangan->nama }}</p>
                    <p>Lokasi: {{ $booking->lapangan->location }}</p>
                    <p>Fase: {{ $booking->fase->jam_mulai }} - {{ $booking->fase->jam_berakhir }}</p>
                    <p>Tanggal Booking: {{ $booking->booking_date }}</p>
                    <p>Total Harga: Rp {{ number_format($booking->total_price, 2) }}</p>
                    
                    <!-- Formulir untuk menghapus item -->
                    <form action="{{ route('remove_from_cart', $booking->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                    
                    <!-- Tombol Bayar untuk masing-masing item -->
                    <form action="{{ route('checkout', ['bookingId' => $booking->id]) }}" method="post">
                        @csrf
                        <button type="submit">Bayar</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>
