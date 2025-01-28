<x-dashboard.header></x-dashboard.header>

<body class="font-sans antialiased flex h-screen dark:bg-black dark:text-white/50">
    <x-dashboard.sidebar></x-dashboard.sidebar>
    <main class="bg-white text-black grow p-8 max-h-screen overflow-y-scroll">
        <div class="bg-gray-200 p-4">
            <h1>@yield('heading')</h1>
        </div>

        <div class="mt-4">
            @yield('content')
        </div>
    </main>
</body>

</html>
