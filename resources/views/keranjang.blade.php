<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Booking</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200">
<nav class="text-white px-4 py-2 flex justify-between items-center" style="background-color: #19A7CE;">
  <div>
            <img src="{{  asset('storage/landing_photos/logo_tanding.png') }}" alt="My Logo" class="h-8 w-auto mr-2">
            <!-- <span class="text-lg font-semibold">My Logo</span> -->
        </div >
        <div class="flex justify-end py-2 px-8 space-x-8">
          <a href="{{ route('main') }}" class="hover:text-opacity-75">Main</a>
          <a href="{{ route('keranjang') }}" class="hover:text-opacity-75">Keranjang</a>
          <a href="{{ route('daftarkan-lapangan') }}" class="hover:text-opacity-75">Daftarkan Lapangan</a>
          <a href="{{ route('profile') }}" class="hover:text-opacity-75">Profile</a>
          <a href="{{ route('tiket') }}" class="hover:text-opacity-75">Tiket</a>
          <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold px-3 py-1/3 rounded">Logout</button>
          </form>
        </div>
  </nav>

<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6 text-center">Keranjang Booking</h1>
    @if (session('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
        {{ session('success') }}
      </div>
    @endif
    @if ($bookings->isEmpty())
      <p class="text-center">Keranjang Anda kosong.</p>
    @else
      <div class="grid grid-cols-1 gap-6 ">
        @foreach ($bookings as $booking)
          <div class="bg-white rounded-lg shadow-lg shadow-md px-4 py-4 w-full max-w-5xl mx-auto flex justify-center">
            <div class="w-1/2">
                <img src="{{ asset('storage/field_photos/' . $booking->lapangan->field_photo) }}" alt="Field Photo" class="w-full h-full object-cover rounded-l-lg">
            </div>
            <div class="w-1/2 p-4">
              <h2 class="text-xl font-bold mb-2">{{ $booking->lapangan->field_name }}</h2>
              <p class="text-gray-700 mb-2">Jenis Lapangan: {{ $booking->lapangan->jenisLapangan->nama }}</p>
              <p class="text-gray-700 mb-2">Lokasi: {{ $booking->lapangan->location }}</p>
              <p class="text-gray-700 mb-2">Fase: {{ $booking->fase->jam_mulai }} - {{ $booking->fase->jam_berakhir }}</p>
              <p class="text-gray-700 mb-2">Tanggal Booking: {{ $booking->booking_date }}</p>
              <p class="text-gray-700 mb-4">Total Harga: Rp {{ number_format($booking->total_price, 2) }}</p>
              <div class="flex justify-end">
                <form action="{{ route('remove_from_cart', $booking->id) }}" method="post" class="mr-2">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hapus</button>
                </form>
                <form action="{{ route('checkout', ['bookingId' => $booking->id]) }}" method="post">
                  @csrf
                  <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Bayar</button>
                </form>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @endif
  </div>
</body>
</html>