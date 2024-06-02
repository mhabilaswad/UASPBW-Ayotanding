<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftarkan Lapangan</title>
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

    <h1>Daftarkan Lapangan</h1>

    @if (session('status'))
        <div>{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('storeLapangan') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="full_name">Nama Lengkap</label>
            <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}" required>
            @error('full_name')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="phone_number">Nomor Ponsel</label>
            <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required>
            @error('phone_number')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="identity_photo">Foto Identitas</label>
            <input type="file" id="identity_photo" name="identity_photo" required accept="image/*">
            @error('identity_photo')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="ownership_proof">Bukti Kepemilikan</label>
            <input type="file" id="ownership_proof" name="ownership_proof" required accept="image/*">
            @error('ownership_proof')
                <div>{{ $message }}</div>
            @enderror
        </div>

<div>
    <label for="layanan_pembayaran_id">Layanan Pembayaran</label>
    <select id="layanan_pembayaran_id" name="layanan_pembayaran_id" required>
        <option value="1">BSI</option>
        <option value="2">BCA</option>
        <option value="3">BCA Syariah</option>
        <option value="4">OVO</option>
        <option value="5">GOPAY</option>
    </select>
    @error('layanan_pembayaran_id')
        <div>{{ $message }}</div>
    @enderror
</div>

        <div>
            <label for="payment_option">Alamat Pembayaran (no. rek / no. hp)</label>
            <input type="text" id="payment_option" name="payment_option" value="{{ old('payment_option') }}" required>
            @error('payment_option')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="field_name">Nama Lapangan</label>
            <input type="text" id="field_name" name="field_name" value="{{ old('field_name') }}" required>
            @error('field_name')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="location">Lokasi</label>
            <input type="text" id="location" name="location" value="{{ old('location') }}" required>
            @error('location')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="jenis_lapangan_id">Jenis Lapangan</label>
            <select id="jenis_lapangan_id" name="jenis_lapangan_id" required>
                <option value="1">Sepak Bola</option>
                <option value="2">Futsal</option>
                <option value="3">Mini soccer</option>
                <option value="4">Basket</option>
                <option value="5">Badminton</option>
                <!-- Tambahkan opsi sesuai dengan jenis lapangan yang ada -->
            </select>
            @error('jenis_lapangan_id')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="description">Deskripsi</label>
            <textarea id="description" name="description">{{ old('description') }}</textarea>
            @error('description')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="full_address">Alamat Lengkap</label>
            <input type="text" id="full_address" name="full_address" value="{{ old('full_address') }}" required>
            @error('full_address')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="field_photo">Foto Lapangan</label>
            <input type="file" id="field_photo" name="field_photo" required accept="image/*">
            @error('field_photo')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <button type="button" id="tambahSesi">Tambahkan Sesi</button>

        <div id="sesiContainer">
            <!-- Tempat untuk menampilkan input fields sesi waktu penyewaan secara dinamis -->
        </div>

        <button type="submit">Daftarkan Lapangan</button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tambahSesiBtn = document.getElementById('tambahSesi');
            const sesiContainer = document.getElementById('sesiContainer');

            tambahSesiBtn.addEventListener('click', function() {
                const sesiDiv = document.createElement('div');
                sesiDiv.classList.add('sesi');

                const jamMulaiLabel = document.createElement('label');
                jamMulaiLabel.innerText = 'Jam Mulai:';
                const jamMulaiInput = document.createElement('input');
                jamMulaiInput.type = 'time';
                jamMulaiInput.name = 'jam_mulai[]';
                jamMulaiInput.required = true;

                const jamBerakhirLabel = document.createElement('label');
                jamBerakhirLabel.innerText = 'Jam Berakhir:';
                const jamBerakhirInput = document.createElement('input');
                jamBerakhirInput.type = 'time';
                jamBerakhirInput.name = 'jam_berakhir[]';
                jamBerakhirInput.required = true;

                const hargaLabel = document.createElement('label');
                hargaLabel.innerText = 'Harga:';
                const hargaInput = document.createElement('input');
                hargaInput.type = 'number';
                hargaInput.name = 'harga[]';
                hargaInput.required = true;

                sesiDiv.appendChild(jamMulaiLabel);
                sesiDiv.appendChild(jamMulaiInput);
                sesiDiv.appendChild(jamBerakhirLabel);
                sesiDiv.appendChild(jamBerakhirInput);
                sesiDiv.appendChild(hargaLabel);
                sesiDiv.appendChild(hargaInput);

                sesiContainer.appendChild(sesiDiv);
            });
        });
    </script>
</body>
</html>
