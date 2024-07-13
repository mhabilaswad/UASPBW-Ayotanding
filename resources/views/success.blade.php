<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Sukses</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-200">
  <div class="w-full max-w-md mx-auto m-40">
    <h1 class="text-2xl font-bold text-center mb-6">Pembayaran Sukses</h1>
    <div class="bg-white mb-4 shadow-md rounded px-8 pt-4 pb-4 ">
      <p class="text-gray-700 text-center mb-8">Terima kasih atas pembayaran Anda. Pesanan Anda telah berhasil diproses.</p>
      <div class="flex items-center justify-center">
          <a href="{{ url('/main') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
              Kembali ke Halaman Utama
            </a>
    </div>
    </div>
  </div>
</body>
</html>
