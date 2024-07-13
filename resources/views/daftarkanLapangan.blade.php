<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Lapangan</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

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

  <h1 class="text-3xl font-bold text-center mt-4">Daftar Lapangan</h1>
  <body class="bg-gray-200">

    @if (session('status'))
        <div>{{ session('status') }}</div>
    @endif

      <form method="POST" action="{{ route('storeLapangan') }}" enctype="multipart/form-data">
        @csrf
  <div class="container mx-auto py-8">
    <div class="bg-white p-6 rounded-lg shadow max-w-4xl mx-auto">
      <div class="mb-4">
        <h1 class="text-2xl font-bold mb-6 text-center">Data Pemilik</h1>

        <label class="block text-gray-700 font-bold mb-2" for="full_name">Nama Lengkap</label>
        <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="full_name" name="full_name" value="{{ old('full_name') }}" type="text" placeholder="Nama Lapangan" required>
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="phone_number">Nomor Ponsel</label>
        <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" type="text" placeholder="Nomor" required>
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="email">Email</label>
        <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="text" placeholder="Email" name="email" value="{{ old('email') }}" required>
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="identity_photo">Foto Identitas</label>
       <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="ownership_proof" type="file" name="identity_photo" required accept="image/*">
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="ownership_proof">Bukti Kepemilikan</label>
        <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="ownership_proof" type="file" name="ownership_proof" required accept="image/*">
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2 text-2xl font-bold mb-6 text-center" for="daftar_pembayaran">Metode Pembayaran</label>

    <!-- <label for="layanan_pembayaran_id">Layanan Pembayaran</label> -->
    <label class="block text-gray-700 font-bold mb-2" for="layanan_pembayaran_id">Pembayaran Via</label>
    <select class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="layanan_pembayaran_id" name="layanan_pembayaran_id" required>
    <!-- <select id="layanan_pembayaran_id" name="layanan_pembayaran_id" required> -->
        <option value="1">BSI</option>
        <option value="2">BCA</option>
        <option value="3">BCA Syariah</option>
        <option value="4">OVO</option>
        <option value="5">GOPAY</option>
    </select>
    </div>

        <div>
            <label class="block text-gray-700 font-bold mb-2" for="payment_option">Alamat Pembayaran</label>
            <!-- <input type="text" id="payment_option" name="payment_option" value="{{ old('payment_option') }}" required> -->
            <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="payment_option" type="text" placeholder="Nomor Rekening/Nomor Ponsel" name="payment_option" value="{{ old('payment_option') }}" required>
        </div>

        <!-- <div class="flex flex-wrap -mx-2">
          <div class="w-full md:w-1/2 px-2 mb-4 md:mb-0">
            <label class="block text-gray-700 font-bold mb-2" for="bsi">BSI</label>
            <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="1" type="text" placeholder="Nomor Rekening BSI">
          </div>
          <div class="w-full md:w-1/2 px-2">
            <label class="block text-gray-700 font-bold mb-2" for="bca">BCA</label>
            <input class="appearance-none border rounded w-full py-2 px -3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="2" type="text" placeholder="Nomor Rekening BCA">
          </div>
          <div class="w-full md:w-1/2 px-2">
            <label class="block text-gray-700 font-bold mb-2" for="bca_syariah">BCA Syariah</label>
            <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="3" type="text" placeholder="Nomor Rekening BCA Syariah">
          </div>
          <div class="w-full md:w-1/2 px-2">
            <label class="block text-gray-700 font-bold mb-2" for="ovo">OVO</label>
            <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="4" type="text" placeholder="Nomor OVO">
          </div>
          <div class="w-full md:w-1/2 px-2">
            <label class="block text-gray-700 font-bold mb-2" for="gopay">GOPAY</label>
            <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="5" type="text" placeholder="Nomor GOPAY">
          </div>
        </div>
      </div> -->
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2 text-2xl font-bold mb-6 text-center">Detail Lapangan</label>
        <div class="flex flex-wrap -mx-2">
          <div class="w-full md:w-1/2 px-2 mb-4 md:mb-0">
            <label class="block text-gray-700 font-bold mb-2" for="field_name">Nama Lapangan</label>
            <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="field_name" type="text" placeholder="Nama Lapangan"  name="field_name" value="{{ old('field_name') }}" required>
          </div>
          <div class="w-full md:w-1/2 px-2">
            <label class="block text-gray-700 font-bold mb-2" for="location">Lokasi</label>
            <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="location" type="text" placeholder="Lokasi" name="location" value="{{ old('location') }}" required>
          </div>
          <div class="w-full md:w-1/2 px-2">
            <label class="block text-gray-700 font-bold mb-2" for="jenis_lapangan_id">Cabang Olahraga</label>
            <select class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="jenis_lapangan_id" name="jenis_lapangan_id" required>
              <option>Pilih Cabang Olahraga</option>
                <option value="1">Sepak Bola</option>
                <option value="2">Futsal</option>
                <option value="3">Mini soccer</option>
                <option value="4">Basket</option>
                <option value="5">Badminton</option>
            </select>
          </div>
          <div class="w-full md:w-1/2 px-2">
            <label class="block text-gray-700 font-bold mb-2" for="description">Deskripsi</label>
            <textarea class="appearance-none border rounded w-full py-2 px -3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description" name="description" placeholder="Deskripsi"></textarea>
          </div>
          <div class="w-full px-2">
            <label class="block text-gray-700 font-bold mb-2" for="full_address">Alamat Lengkap</label>
            <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  id="full_address" name="full_address" value="{{ old('full_address') }}" required type="text">
         </div>
         <div class="w-full px-2">
            <label class="block text-gray-700 font-bold mb-2" for="field_photo">Foto Lapangan</label>
            <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="field_photo" type="file" name="field_photo" required accept="image/*">
         </div>
       </div>
     </div>
     <div class="mb-4">
       <label class="block text-gray-700 font-bold mb-2" >Atur Sesi Permainan</label>
       <div id="sesiContainer" class="flex flex-wrap -mx-2">
         <!-- Sesi akan ditambahkan melalui JavaScript -->
       </div>
       <button type="button" id="tambahSesi" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Tambah Sesi</button>
     </div>
     <div class="flex justify-center">
       <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Daftarkan</button>
     </div>
   </div>
 </div>
</form>

<script>
   document.addEventListener('DOMContentLoaded', function() {
     const tambahSesiBtn = document.getElementById('tambahSesi');
     const sesiContainer = document.getElementById('sesiContainer');

     tambahSesiBtn.addEventListener('click', function() {
       const sesiDiv = document.createElement('div');
       sesiDiv.classList.add('w-full', 'md:w-1/2', 'px-2', 'mb-4');

       const jamMulaiLabel = document.createElement('label');
       jamMulaiLabel.innerText = 'Jam Mulai:';
       jamMulaiLabel.classList.add('block', 'text-gray-700', 'font-bold', 'mb-2');
       const jamMulaiInput = document.createElement('input');
       jamMulaiInput.type = 'time';
       jamMulaiInput.name = 'jam_mulai[]';
       jamMulaiInput.required = true;
       jamMulaiInput.classList.add('appearance-none', 'border', 'rounded', 'w-full', 'py-2', 'px-3', 'text-gray-700', 'leading-tight', 'focus:outline-none', 'focus:shadow-outline');

       const jamBerakhirLabel = document.createElement('label');
       jamBerakhirLabel.innerText = 'Jam Berakhir:';
       jamBerakhirLabel.classList.add('block', 'text-gray-700', 'font-bold', 'mb-2');
       const jamBerakhirInput = document.createElement('input');
       jamBerakhirInput.type = 'time';
       jamBerakhirInput.name = 'jam_berakhir[]';
       jamBerakhirInput.required = true;
       jamBerakhirInput.classList.add('appearance-none', 'border', 'rounded', 'w-full', 'py-2', 'px-3', 'text-gray-700', 'leading-tight', 'focus:outline-none', 'focus:shadow-outline');

       const hargaLabel = document.createElement('label');
       hargaLabel.innerText = 'Harga:';
       hargaLabel.classList.add('block', 'text-gray-700', 'font-bold', 'mb-2');
       const hargaInput = document.createElement('input');
       hargaInput.type = 'number';
       hargaInput.name = 'harga[]';
       hargaInput.required = true;
       hargaInput.classList.add('appearance-none', 'border', 'rounded', 'w-full', 'py-2', 'px-3', 'text-gray-700', 'leading-tight', 'focus:outline-none', 'focus:shadow-outline');

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

