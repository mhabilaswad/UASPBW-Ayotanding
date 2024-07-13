<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Dashboard</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-200">
        <div class="text-white py-2 flex justify-between" style="background-color: #19A7CE;">
  <div>
    <img src="{{  asset('storage/landing_photos/logo_tanding.png') }}" alt="My Logo" class="h-8 w-auto mr-2 ml-4">
  </div>
  <form method="POST" action="{{ route('logout') }}">
        @csrf
        <div class="mr-4">
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold px-3 py-1/3 rounded">Logout</button>
        </div>
    </form>
</div>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"> -->
            <!-- <div class="p-6 bg-white border-b border-gray-200"> -->
                <h2 class="text-lg font-medium text-gray-900">Daftar Lapangan</h2>

                <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    @if ($lapangans->isEmpty())
                        <p>Tidak ada lapangan yang tersedia saat ini.</p>
                    @else
                        @foreach($lapangans as $lapangan)
                            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                                <a href="{{ route('lapangan.detailAdmin', $lapangan->id) }}">
                                    <img src="{{ asset('storage/field_photos/' . $lapangan->field_photo) }}" alt="Field Photo" class="w-full h-48 object-cover">
                                    <div class="p-4">
                                        <p class="text-gray-900 font-bold">{{ $lapangan->field_name }}</p>
                                        <p class="text-gray-600">{{ $lapangan->location }}</p>
                                        <p class="text-gray-600">Status: {{ $lapangan->approved ? 'Approved' : 'Pending' }}</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            <!-- </div> -->
        <!-- </div> -->
    </div>

</body>
</html>