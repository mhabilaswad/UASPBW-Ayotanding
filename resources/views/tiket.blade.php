<!-- resources/views/tiket.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket Pemesanan</title>
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
    <h1>Tiket Pemesanan</h1>

    @if($pembayarans->isEmpty())
        <p>Tidak ada tiket</p>
        @else
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nomor Telepon</th>
                <th>Email</th>
                <th>Nama Lapangan</th>
                <th>Tanggal Tanding</th>
                <th>Fase</th>
                <th>Total Pembayaran</th>
                <!-- Tambahkan kolom lainnya sesuai kebutuhan -->
            </tr>
        </thead>
        <tbody>
            @foreach($pembayarans as $index => $pembayaran)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $pembayaran->full_name }}</td>
                    <td>{{ $pembayaran->phone_number }}</td>
                    <td>{{ $pembayaran->email }}</td>
                    <td>{{ $pembayaran->lapangan->field_name }}</td>
                    <td>{{ $pembayaran->booking_date }}</td>
                    <td>{{ $pembayaran->fase->jam_mulai }} - {{ $pembayaran->fase->jam_berakhir }}</td>
                    <td>{{ $pembayaran->total_price }}</td>
                    <!-- Tambahkan kolom lainnya sesuai kebutuhan -->
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</body>
</html>
