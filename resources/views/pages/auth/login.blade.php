<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex justify-center items-center bg-gray-100">
    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg">
        <form action="" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="username" class="block text-sm font-semibold text-gray-700">Username</label>
                <input type="text" name="username" id="username"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
                    required>
                @error('username')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
                <input type="password" name="password" id="password"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
                    required>
                @error('password')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit"
                class="w-full px-3 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors duration-200 ease-in-out">
                Login
            </button>
        </form>
        <div class="text-center mt-4">
            Don't have an account? <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register</a>
        </div>
        <div class="text-center">
            <a href="{{ route('home') }}" class="text-blue-500 hover:underline">Back To Home</a>
        </div>
    </div>
</body>

</html>
