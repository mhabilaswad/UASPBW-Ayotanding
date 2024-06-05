<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #e5e7eb; /* grey-200 */
        }
    </style>
</head>
<body class="flex justify-center items-center min-h-screen">
    <div class="bg-white py-8 rounded shadow-lg max-w-md mx-auto px-12">
        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf
            
            <div>
            <div class="mt-4 text-sm flex justify-start">
                <a href="{{ route('welcome') }}" class="text-indigo-600 hover:underline"> < Back </a>
            </div>
                <h1 class="text-3xl font-bold text-center mt-4 mb-4">Sign Up</h1>
                <label for="name" class="block font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required class="w-full px-8 py-4 mr-12 border-2 border-slate-200 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-left">
                @error('name')
                    <div class="text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>
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
            <div>
                <label for="password_confirmation" class="block font-medium text-gray-700">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required class="w-full px-8 py-4 mr-12 border-2 border-slate-200 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-left">
            </div>
            <button type="submit" class="w-full bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700 transition-colors">Register</button>
        </form>
        <div class="mt-4 text-sm flex justify-center">
            <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Sudah memiliki akun? Sign In</a>
        </div>
    </div>
</body>
</html>