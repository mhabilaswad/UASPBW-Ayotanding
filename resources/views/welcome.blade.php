<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url("{{ asset('storage/landing_photos/bg_tanding.png') }}");
            background-repeat: no-repeat;
            background-size: cover;
            /* background-position: center; */
        }
    </style>
</head>

<body>
    <nav class="bg-[#19A7CE] flex justify-between items-center px-4 py-3" style="background-color: #19A7CE;">
        <div class="flex items-center">
            <img src="{{  asset('storage/landing_photos/logo_tanding.png') }}" alt="My Logo" class="h-8 w-auto mr-2">
            <!-- <span class="text-lg font-semibold">My Logo</span> -->
        </div>
        <div>
            <a href="{{ route('login') }}" class="text-white hover:text-gray-200">Masuk</a>
            <a href="{{ route('register') }}" class="text-white hover:text-gray-200 mr-4 px-4">Daftar</a>
        </div>
    </nav>
</body>
</html>