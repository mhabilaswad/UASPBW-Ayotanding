<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Lapangan</title>
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

  <h1 class="text-3xl font-bold text-center mt-4">Detail Lapangan</h1>

  <div class="flex flex-wrap justify-center gap-4 mt-4">
  <div class="bg-white rounded-md shadow-md px-4 py-4 w-full max-w-md">
      <img src="{{ asset('storage/field_photos/' . $lapangan->field_photo) }}" alt="Field Photo" class="w-full rounded-md mb-2">
      <h2 class="text-lg font-bold mb-1">{{ $lapangan->field_name }}</h2>
      <h3 class="text-lg font-bold mb-1">Jenis Lapangan</h3>
      <p class="text-gray-600 mb-2">{{ $lapangan->jenisLapangan->nama }}</p>
      <h3 class="text-lg font-bold mb-1">Daerah</h3>
      <p class="text-gray-600 mb-2">{{ $lapangan->location }}</p>
      <h3 class="text-lg font-bold mb-1">Deskripsi Lapangan</h3>
      <p class="text-gray-600 mb-2">{{ $lapangan->description }}</p>
      <h3 class="text-lg font-bold mb-1">Alamat Lengkap</h3>
      <p class="text-gray-600 mb-2">{{ $lapangan->full_address }}</p>
      <h3 class="text-lg font-bold mb-1">Pembayaran Via</h3>
      <p class="text-gray-600 mb-2">{{ $lapangan->layananPembayaran->layanan }}</p>
    </div>
  </div>

<div class="flex flex-wrap justify-center gap-4 mt-4 mb-8">
  <div class="bg-white rounded-md shadow-md px-4 py-4 w-full max-w-md">
    <h2>Booking Lapangan</h2>

    @if (session('error'))
      <div class="text-red-500 mb-4">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('booking.add_to_cart', $lapangan->id) }}">
      @csrf

      <div class="bg-white rounded-md shadow-md px-4 py-4 w-full max-w-sm mx-auto mt-4 ">
        <label for="booking_date" class="text-gray-700 block mb-2">Tanggal Booking</label>
        <input type="date" id="booking_date" name="booking_date" required min="{{ now()->format('Y-m-d') }}" class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500">
      </div>

      <div class="bg-white rounded-md shadow-md px-4 py-4 w-full max-w-sm mx-auto mt-4 mb-4"> <label for="fase_id" class="text-gray-700 block mb-2">Pilih Fase</label>
        <select id="fase_id" name="fase_id" required class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500">
          @foreach ($lapangan->fases as $fase)
            <option value="{{ $fase->id }}">
              {{ $fase->jam_mulai }} - {{ $fase->jam_berakhir }} (Rp {{ number_format($fase->harga, 2) }})
            </option>
          @endforeach
        </select>
      </div>
      <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md mx-auto mt-4 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 flex flex-wrap justify-center">Tambahkan ke Keranjang</button>
    </form>
  </div>
</div>
</form>
</body>
</html>
