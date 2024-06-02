<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
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

    <h1>Welcome to Main Page</h1>
    @if ($lapangans->isEmpty())
        <p>Tidak ada lapangan yang tersedia saat ini.</p>
    @else
        @foreach($lapangans as $lapangan)
            <div>
            <a href="{{ route('lapangan.detail', $lapangan->id) }}">
                <img src="{{ asset('storage/field_photos/' . $lapangan->field_photo) }}" alt="Field Photo" style="max-width: 200px">
                <p>Nama Lapangan: {{ $lapangan->field_name }}</p>
                <p>Jenis Lapangan: {{ $lapangan->jenisLapangan->nama }}</p>
                <p>Lokasi: {{ $lapangan->location }}</p>
            </div>
            <hr>
        @endforeach
    @endif
</body>
</html>
