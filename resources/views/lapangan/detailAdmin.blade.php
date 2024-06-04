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
        <p>Nama Lengkap: {{ $lapangans->full_name }}</p>
        <p>No. HP: {{ $lapangans->phone_number }}</p>
        <p>Email: {{ $lapangans->email }}</p>
        <img src="{{ asset('storage/identity_photos/' . $lapangans->identity_photo) }}" alt="Identity_photo" style="max-width: 500px">

        <img src="{{ asset('storage/ownership_proofs/' . $lapangans->ownership_proof) }}" alt="Ownership_proof" style="max-width: 500px">

        <img src="{{ asset('storage/field_photos/' . $lapangans->field_photo) }}" alt="Field Photo" style="max-width: 500px">
        <p>Layanan Pembayaran: {{ $lapangans->layananPembayaran->layanan }}</p>
        <p>Nama Lapangan: {{ $lapangans->field_name }}</p>
        <p>Lokasi: {{ $lapangans->location }}</p>
        <p>Jenis Lapangan: {{ $lapangans->jenisLapangan->nama }}</p>
        <p>Deskripsi: {{ $lapangans->description }}</p>
        <p>Alamat Lengkap: {{ $lapangans->full_address }}</p>
        
    </div>
    <form action="{{ route('admin.dashboard.approve', $lapangans->id) }}" method="post">
            @csrf
            <button type="submit">Approve</button>
        </form>
        <form action="{{ route('admin.dashboard.reject', $lapangans->id) }}" method="post">
            @csrf
            <button type="submit">Reject</button>
    </form>
</body>
</html>
