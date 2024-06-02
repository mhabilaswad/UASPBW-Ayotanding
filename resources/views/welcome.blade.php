<!-- resources/views/landing.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to AyoTanding</title>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang di AyoTanding</h1>
        <p>Silakan pilih tindakan yang Anda inginkan:</p>
        <div>
            <a href="{{ route('register') }}">
                <button>Daftar</button>
            </a>
            <a href="{{ route('login') }}">
                <button>Login</button>
            </a>
        </div>
    </div>
</body>
</html>
