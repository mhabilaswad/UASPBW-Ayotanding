<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Main Page</title>
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
          <a href="{{ route('aboutus') }}" class="hover:text-opacity-75">About Us</a>
          <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold px-3 py-1/3 rounded">Logout</button>
          </form>
        </div>
  </nav>

  <h1 class="text-3xl font-bold text-center mt-4">Rekomendasi Lapangan</h1>

  <div class="flex flex-wrap justify-center w-3/3 gap-4 mt-4">
    @foreach ($lapangans as $lapangan)
      <div class="bg-white rounded-md shadow-md px-4 py-4 w-full max-w-sm">
        <a href="{{ route('lapangan.detail', $lapangan->id) }}">
          <img src="{{ asset('storage/field_photos/' . $lapangan->field_photo) }}" alt="Field Photo" class="w-full rounded-md mb-2">
        </a>
        <h3 class="text-lg font-bold mb-1">{{ $lapangan->field_name }}</h3>
        <p class="text-gray-600 mb-2">{{ $lapangan->jenisLapangan->nama }}</p>
        <p class="text-gray-600 mb-2">{{ $lapangan->location }}</p>

        <div class="flex justify-between items-center">
          <!-- Tampilkan salah satu harga dari fase -->
          @if ($lapangan->fases->isNotEmpty())
            <p class="text-lg font-bold text-gray-800">
              Rp{{ number_format($lapangan->fases->first()->harga, 0, ',', '.') }}
            </p>
          @else
            <p class="text-lg font-bold text-gray-800">
              Harga tidak tersedia
            </p>
          @endif
          <a href="{{ route('lapangan.detail', $lapangan->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Lihat Detail</a>
        </div>
      </div>
    @endforeach
</div>


</body>
</html>
