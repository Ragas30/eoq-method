<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen flex justify-center items-center">
    <div class="bg-white p-8 rounded-lg shadow-2xl max-w-lg w-full">
        <form action="{{ route('register') }}" method="POST" class="space-y-6">
            @csrf
            <div class="mt-4">
                <label for="nama" class="block text-gray-700 font-semibold">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" id="username"
                    class="w-full p-2 mt-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @error('nama')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4">
                <label for="email" class="block text-gray-700 font-semibold">Alamat Email</label>
                <input type="text" name="email id="email"
                    class="w-full p-2 mt-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4">
                <label for="jenis_kelamin" class="block text-gray-700 font-semibold">Jenis Kelamin</label>
                <input type="text" name="jenis_kelamin" id="jenis_kelamin"
                    class="w-full p-2 mt-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @error('jenis_kelamin')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4">
                <label for="no_telfon" class="block text-gray-700 font-semibold">No Telfon</label>
                <input type="text" name="no_telfon" id="no_telfon"
                    class="w-full p-2 mt-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @error('no_telfon')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4">
                <label for="alamat" class="block text-gray-700 font-semibold">Alamat</label>
                <input type="text" name="alamat" id="alamat"
                    class="w-full p-2 mt-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @error('alamat')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4">
                <label for="username" class="block text-gray-700 font-semibold">Username</label>
                <input type="text" name="username" id="username"
                    class="w-full p-2 mt-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @error('username')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4">
                <label for="password" class="block text-gray-700 font-semibold">Password</label>
                <input type="password" name="password" id="password"
                    class="w-full p-2 mt-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4">
                <label for="password_confirmation" class="block text-gray-700 font-semibold">Konfirmasi
                    Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="w-full p-2 mt-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @error('password_confirmation')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit"
                class="w-full bg-blue-500 text-white py-2 mt-4 rounded-lg hover:bg-blue-600 transition-colors duration-200 ease-in-out hover:scale-105">
                Register
            </button>
        </form>
        <div class="text-center mt-4">
            Already have an account? <a href="{{ route('login') }}" class="text-blue-700 hover:underline">Login</a>
        </div>
        <div class="text-center">
            <a href="{{ route('home') }}" class="text-blue-700 hover:underline">Back To Home</a>
        </div>
    </div>
</body>

</html>
