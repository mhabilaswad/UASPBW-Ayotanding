<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-200">
    <h1 class="text-2xl font-bold text-center m-8">Pembayaran</h1>
<div class="bg-white rounded-md shadow-md px-4 py-4 w-full max-w-md mx-auto mt-8">
    <div class="w-full max-w-md mx-auto mt-8">
  <div class="mb-4 shadow-md rounded px-8 pt-4 pb-4 border-2 border-slate-200">
    <p class="text-gray-700 font-bold">Total Pembayaran: Rp {{ number_format($totalAmount, 2) }}</p>
  </div>
  <div class="mb-4">

      <p class="text-gray-700">Lakukan pembayaran ke No. Rekening / No. Ponsel: {{ $paymentOption }}</p>
  </div>
  <div class="mb-6">
      <p class="text-gray-700">Anda memiliki waktu 10 menit untuk melakukan pembayaran.</p>
    </div>
    <div class="mb-6">
    <div id="countdown" class="text-gray-700 font-bold"></div>
</div>

  <form action="{{ route('payment.process') }}" method="post" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 border-2 border-slate-200">
      @csrf
      <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="bukti_pembayaran">
              Upload Bukti Pembayaran:
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="bukti_pembayaran" type="file" name="bukti_pembayaran" accept="image/*" required>
        </div>
        <div class="flex items-center justify-center">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Konfirmasi Pembayararan
            </button>
        </div>
    </form>
</div>
</div>

    <script>
        // Hitung mundur selama 10 menit (600 detik)
        var countDownDate = new Date().getTime() + 600000;
        
        var x = setInterval(function() {
            
            var now = new Date().getTime();
        
            var distance = countDownDate - now;
        
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
            document.getElementById("countdown").innerHTML = "Waktu tersisa: " + minutes + "m " + seconds + "s ";
        
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("countdown").innerHTML = "Waktu pembayaran telah berakhir.";
            }
        }, 1000);
    </script>
</body>
</html>
