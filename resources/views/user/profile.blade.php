<!-- resources/views/user/profile.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
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

<h1>User Profile</h1>
<div>
    <p>Name: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
    <!-- Tambahkan data lainnya yang ingin Anda tampilkan -->
</div>

<h2>Your Fields</h2>
@foreach($lapangans as $lapangan)
<div>
    <img src="{{ asset('storage/field_photos/' . $lapangan->field_photo) }}" alt="Field Photo" style="max-width: 200px">
    <p>Nama Lapangan: {{ $lapangan->field_name }}</p>
    <p>Lokasi: {{ $lapangan->location }}</p>
    <p>Status: {{ $lapangan->approved ? 'Approved' : 'Pending' }}</p>

    <h3>Pemesan:</h3>
    @if($lapangan->pembayarans->isEmpty())
        <p>Tidak ada pemesan untuk lapangan ini.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pemesan</th>
                    <th>Nomor Telepon</th>
                    <th>Email</th>
                    <th>Tanggal Booking</th>
                    <th>Fase</th>
                    <th>Total Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lapangan->pembayarans as $index => $pembayaran)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $pembayaran->user->name }}</td>
                        <td>{{ $pembayaran->phone_number }}</td>
                        <td>{{ $pembayaran->user->email }}</td>
                        <td>{{ $pembayaran->booking_date }}</td>
                        <td>{{ $pembayaran->fase->jam_mulai }} - {{ $pembayaran->fase->jam_berakhir }}</td>
                        <td>{{ $pembayaran->total_price }}</td>
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
