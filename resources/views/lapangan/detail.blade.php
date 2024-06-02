<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Lapangan</title>
</head>
<body>
    <h1>Detail Lapangan</h1>
    <div>
        <img src="{{ asset('storage/field_photos/' . $lapangan->field_photo) }}" alt="Field Photo" style="max-width: 500px">
        <p>Nama Lapangan: {{ $lapangan->field_name }}</p>
        <p>Lokasi: {{ $lapangan->location }}</p>
        <p>Jenis Lapangan: {{ $lapangan->jenisLapangan->nama }}</p>
        <p>Deskripsi: {{ $lapangan->description }}</p>
        <p>Alamat Lengkap: {{ $lapangan->full_address }}</p>
        <p>Layanan Pembayaran: {{ $lapangan->layananPembayaran->layanan }}</p>
    </div>

    <h2>Booking Lapangan</h2>
@if(session('error'))
    <p>{{ session('error') }}</p>
@endif
<form method="POST" action="{{ route('booking.add_to_cart', $lapangan->id) }}">
    @csrf
    <div>
        <label for="booking_date">Tanggal Booking</label>
        <input type="date" id="booking_date" name="booking_date" required min="{{ now()->format('Y-m-d') }}">
    </div>
    <div>
        <label for="fase_id">Pilih Fase</label>
        <select id="fase_id" name="fase_id" required>
            @foreach($lapangan->fases as $fase)
                <option value="{{ $fase->id }}">
                    {{ $fase->jam_mulai }} - {{ $fase->jam_berakhir }} (Rp {{ number_format($fase->harga, 2) }})
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit">Tambahkan ke Keranjang</button>
</form>

</body>
</html>
