<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
</head>
<body>
    <h1>Pembayaran</h1>
    <p>Total Pembayaran: Rp {{ number_format($totalAmount, 2) }}</p>
    <p>Lakukan pembayaran ke No. Rekening / HP: {{ $paymentOption }}</p>
    <p>Anda memiliki waktu 10 menit untuk melakukan pembayaran.</p>
    <div id="countdown"></div>
    <form action="{{ route('payment.process') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="bukti_pembayaran">Upload Bukti Pembayaran:</label>
        <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" accept="image/*" required>
        <button type="submit">Sudah Bayar</button>
    </form>

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
