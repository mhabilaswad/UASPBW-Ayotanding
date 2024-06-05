<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Lapangan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200">

      <div class="bg-blue-600 text-white p-4 flex justify-between">
  <div>
    <h1 class="text-xl font-bold">ADMIN</h1>
  </div>
  <form method="POST" action="{{ route('logout') }}">
        @csrf
        <div>
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Logout</button>
        </div>
    </form>
</div>

    <div class="max-w-4xl mx-auto py-8 px-4">
        <div class="bg-white shadow-md rounded-md p-6 border-2 border-slate-200">
            <h1 class="text-1xl font-bold mt-4 ml-8">Data Pemilik</h1>
            <div class="mb-4 bg-white shadow-md rounded-md p-6 ml-8 mb-8 border-2 border-slate-200">
                <p>Nama Lengkap: {{ $lapangans->full_name }}</p>
                <p>No. HP: {{ $lapangans->phone_number }}</p>
                <p>Email: {{ $lapangans->email }}</p>
            </div>
            <h1 class="text-1xl font-bold ml-8">Identitas Diri</h1>
            <div class="bg-white shadow-md rounded-md p-6 gap-4 ml-8 mb-8 flex items-center justify-center border-2 border-slate-200">
                <img src="{{ asset('storage/identity_photos/' . $lapangans->identity_photo) }}" alt="Identity_photo" class="rounded-md" width="300">
            </div>
            <h1 class="text-1xl font-bold ml-8">Bukti Kepemilikan</h1>
           <div class="bg-white shadow-md rounded-md p-6 gap-4 ml-8 mb-8 flex items-center justify-center border-2 border-slate-200">
                <img src="{{ asset('storage/ownership_proofs/' . $lapangans->ownership_proof) }}" alt="Ownership_proof" class="rounded-md" width="300">
            </div>

            <h1 class="text-1xl font-bold ml-8">Foto Lapangan</h1>
             <div class="bg-white shadow-md rounded-md p-6 gap-4 ml-8 mb-8 flex items-center justify-center border-2 border-slate-200">
                <img src="{{ asset('storage/field_photos/' . $lapangans->field_photo) }}" alt="Field Photo" class="rounded-md width="300">
            </div>
        </div>

        <div class="bg-white shadow-md rounded-md p-6 mt-4 border-2 border-slate-200">
            <h1 class="text-1xl font-bold ml-8">Detail Lapangan</h1>
            <div class="mb-4 bg-white shadow-md rounded-md p-6 ml-8 mb-8 border-2 border-slate-200">
                <p class="text-lg font-semibold">Nama Lapangan: {{ $lapangans->field_name }}</p>
                <p>Lokasi: {{ $lapangans->location }}</p>
                <p>Jenis Lapangan: {{ $lapangans->jenisLapangan->nama }}</p>
                <p>Deskripsi: {{ $lapangans->description }}</p>
                <p>Alamat Lengkap: {{ $lapangans->full_address }}</p>
            </div>

            <h1 class="text-1xl font-bold ml-8">Detail Lapangan</h1>
            <div class="bg-white shadow-md rounded-md p-6 ml-8 mb-8 border-2 border-slate-200">
                <p>Layanan Pembayaran: {{ $lapangans->layananPembayaran->layanan }}</p>
                <p>Nomor Pembayaran: {{ $lapangans->payment_option }}</p>
            </div>
           </div>

            <div class="flex justify-end space-x-4 p-6 ml-8 mb-8">
                <form action="{{ route('admin.dashboard.approve', $lapangans->id) }}" method="post">
                    @csrf
                    <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600">Approve</button>
                </form>
                <form action="{{ route('admin.dashboard.reject', $lapangans->id) }}" method="post">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600">Reject</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

