<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #e5e7eb; /* grey-200 */
        }
    </style>
</head>
<body class="flex justify-center items-center min-h-screen">
    <div class="bg-white py-8 rounded shadow-lg max-w-full mx-auto px-12">
        @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 rounded mb-4">{{ session('status') }}</div>
        @endif
        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf
            <div class="mt-4 text-sm flex justify-start">
                <a href="{{ route('welcome') }}" class="text-indigo-600 hover:underline"> < Back </a>
            </div>

            <h1 class="text-3xl font-bold text-center mt-4 mb-4">Sign In</h1>
            <div>
                <label for="email" class="block font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required class="w-full px-8 py-4 mr-12 border-2 border-slate-200 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-left">
                @error('email')
                    <div class="text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="password" class="block font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" required class="w-full px-8 py-4 mr-12 border-2 border-slate-200 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-left">
                @error('password')
                    <div class="text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="w-full bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700 transition-colors">Login</button>
        </form>
        <div class="mt-4 text-sm flex justify-center">
            <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">Belum memiliki akun? Sign Up</a>
        </div>
    </div>
</body>
</html>