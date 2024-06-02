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

    @foreach($lapangans as $lapangan)
    <div>
        <!-- Display field photo -->
        <img src="{{ asset('storage/field_photos/' . $lapangan->field_photo) }}" alt="Field Photo" style="max-width: 200px">
        <p>Nama Lapangan: {{ $lapangan->field_name }}</p>
        <p>Lokasi: {{ $lapangan->location }}</p>
        <p>Status: {{ $lapangan->approved ? 'Approved' : 'Pending' }}</p>
        <!-- Tampilkan informasi lainnya sesuai kebutuhan -->
        <form action="{{ route('admin.dashboard.approve', $lapangan->id) }}" method="post">
            @csrf
            <button type="submit">Approve</button>
        </form>
        <form action="{{ route('admin.dashboard.reject', $lapangan->id) }}" method="post">
            @csrf
            <button type="submit">Reject</button>
        </form>
    </div>
    @endforeach
</body>
</html>
