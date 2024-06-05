<!-- resources/views/user/profile.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
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

<h1 class="text-3xl font-bold text-center mt-4">User Profile</h1>
<div class="bg-white rounded-md shadow-lg shadow-md px-4 py-4 w-full max-w-5xl mx-auto justify-center gap-4 mt-4">
<div class="flex">
    <p class="block text-gray-700 font-bold mb-2">Name  :&ensp;</p>
    <p> {{ $user->name }}</p>
</div>
<div class="flex">
    <p class="block text-gray-700 font-bold mb-2">Email &nbsp;:&ensp;</p>
    <p> {{ $user->email }}</p>
    <!-- Tambahkan data lainnya yang ingin Anda tampilkan -->
</div>
</div>

<h2 class="text-3xl font-bold text-center mt-4">Your Fields</h2>
@foreach($lapangans as $lapangan)
<div class="bg-white rounded-md shadow-lg shadow-md px-4 py-4 w-full max-w-5xl mx-auto justify-center gap-4 mt-4">
<div class="flex">
    <div class="w-1/2">
        <img src="{{ asset('storage/field_photos/' . $lapangan->field_photo) }}" alt="Field Photo" style="max-width: 200px">
    </div>  
    <div class="w-1/2 p-4">  
        <p>Nama Lapangan: {{ $lapangan->field_name }}</p>
        <p>Lokasi: {{ $lapangan->location }}</p>
        <p>Status: {{ $lapangan->approved ? 'Approved' : 'Pending' }}</p>
    </div>
</div>
    <h3 class="block text-gray-700 font-bold mb-2">Pemesan:</h3>
    @if($lapangan->pembayarans->isEmpty())
        <p>Tidak ada pemesan untuk lapangan ini.</p>
    @else
        <table class="w-full min-w-max table-auto divide-y divide-gray-200">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-2 text-left">No</th>
                    <th class="px-4 py-2 text-left">Nama Pemesan</th>
                    <th class="px-4 py-2 text-left">Nomor Telepon</th>
                    <th class="px-4 py-2 text-left">Email</th>
                    <th class="px-4 py-2 text-left">Tanggal Booking</th>
                    <th class="px-4 py-2 text-left">Fase</th>
                    <th class="px-4 py-2 text-left">Total Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lapangan->pembayarans as $index => $pembayaran)
                    <tr>
                        <td class="px-4 py-2">{{ $index + 1 }}</td>
                        <td class="px-4 py-2">{{ $pembayaran->user->name }}</td>
                        <td class="px-4 py-2">{{ $pembayaran->phone_number }}</td>
                        <td class="px-4 py-2">{{ $pembayaran->user->email }}</td>
                        <td class="px-4 py-2">{{ $pembayaran->booking_date }}</td>
                        <td class="px-4 py-2">{{ $pembayaran->fase->jam_mulai }} - {{ $pembayaran->fase->jam_berakhir }}</td>
                        <td class="px-4 py-2">{{ $pembayaran->total_price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
<br>
<br>
<br>
</div>
@endforeach
</body>
</html>
