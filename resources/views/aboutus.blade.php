<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200">

  <nav class="text-white px-4 py-2 flex justify-between items-center" style="background-color: #19A7CE;">
    <div>
      <img src="{{ asset('storage/landing_photos/logo_tanding.png') }}" alt="My Logo" class="h-8 w-auto mr-2">
    </div>
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

  <div class="container mx-auto mt-10 px-4">
    <h1 class="text-4xl font-bold text-center mb-4">ABOUT US</h1>
    <p class="text-lg text-gray-700 text-center">
      Kami adalah penyedia layanan sewa lapangan terbaik yang berkomitmen untuk memberikan pengalaman terbaik bagi para pengguna. Dengan berbagai pilihan lapangan dan fasilitas yang memadai, kami bertujuan untuk mendukung kegiatan olahraga dan rekreasi di komunitas. Terima kasih telah mempercayakan kebutuhan olahraga Anda kepada kami!
    </p>
  </div>

</body>
</html>