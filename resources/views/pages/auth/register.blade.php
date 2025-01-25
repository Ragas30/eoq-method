<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="background min-h-screen flex justify-center items-center">
    <div class="flex flex-col bg-green-500 p-8 rounded-lg shadow-2xl">
        <form action="" method="POST" class="space-y-6">
            @csrf
            <div class="mt-4">
                <label for="name" class="block text-white font-semibold">Nama</label>
                <input type="text" name="name" id="name"
                    class="w-full p-2 mt-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FF2D20]" required>
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4">
                <label for="email" class="block text-white font-semibold">Email</label>
                <input type="email" name="email" id="email"
                    class="w-full p-2 mt-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FF2D20]" required>
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4">
                <label for="password" class="block text-white font-semibold">Password</label>
                <input type="password" name="password" id="password"
                    class="w-full p-2 mt-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FF2D20]" required>
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4">
                <label for="password_confirmation" class="block text-white font-semibold">Konfirmasi
                    Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="w-full p-2 mt-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FF2D20]" required>
                @error('password_confirmation')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit"
                class="w-full bg-[#FF2D20] text-white py-2 mt-4 rounded-lg hover:bg-[#e52b1e] transition-colors duration-200 ease-in-out hover:scale-105">
                Register
            </button>
        </form>
        <div class="text-white text-center mt-4">
            Already have an account? <a href="{{ route('login') }}" class="text-[#FF2D20]">Login</a>
        </div>
        <div class="text-center">
            <a href="{{ route('home') }}" class="text-orange-700 hover:underline">Back To Home</a>
        </div>
    </div>
</body>

</html>
