<x-dashboard.header></x-dashboard.header>

<body class="font-sans antialiased flex h-screen dark:bg-black dark:text-white/50">
    <x-dashboard.sidebar></x-dashboard.sidebar>
    <main class="bg-white text-black grow p-8">
        @yield('content')
    </main>
</body>

</html>
