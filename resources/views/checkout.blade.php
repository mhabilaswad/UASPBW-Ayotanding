<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>
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

<body>
    <h1>Checkout</h1>
    <form action="{{ route('checkout.process') }}" method="post">
        @csrf
        <input type="hidden" name="booking_id" value="{{ $booking->id }}">
        <label for="full_name">Nama Lengkap:</label>
        <input type="text" id="full_name" name="full_name" required>
        <label for="phone_number">Nomor Telepon:</label>
        <input type="text" id="phone_number" name="phone_number" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <p>Total Pembayaran: Rp {{ number_format($totalAmount, 2) }}</p>
        <button type="submit">Lanjut ke Pembayaran</button>
    </form>
</body>
</html>
