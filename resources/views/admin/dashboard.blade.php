<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Welcome to Admin Dashboard</h1>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>

    @if ($lapangans->isEmpty())
        <p>Tidak ada lapangan yang tersedia saat ini.</p>
    @else
        @foreach($lapangans as $lapangan)
            <div>
            <a href="{{ route('lapangan.detailAdmin', $lapangan->id) }}">
                <img src="{{ asset('storage/field_photos/' . $lapangan->field_photo) }}" alt="Field Photo" style="max-width: 200px">
                <p>Nama Lapangan: {{ $lapangan->field_name }}</p>
                <p>Lokasi: {{ $lapangan->location }}</p>
                <p>Status: {{ $lapangan->approved ? 'Approved' : 'Pending' }}</p>
            </div>
            <hr>
        @endforeach
    @endif

</body>
</html>