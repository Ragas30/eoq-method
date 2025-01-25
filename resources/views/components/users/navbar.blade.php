<nav
    class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 border-b border-gray-300 fixed top-0 left-0 right-0 z-10">
    <div class="container mx-auto px-4 py-2 flex justify-between items-center">
        <a href="#" class="text-xl font-bold text-gray-800">Logo</a>
        <button class="bg-transparent border-none focus:outline-none md:hidden" id="toggle-menu">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
        </button>
        <ul class="hidden md:flex md:flex-row md:items-center md:w-auto md:space-x-8 gap-2" id="menu">
            <li><a href="#"
                    class="block py-2 pr-4 pl-3 text-gray-700 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Home</a>
            </li>
            <li><a href="#"
                    class="block py-2 pr-4 pl-3 text-gray-700 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
            </li>
            <li><a href="#"
                    class="block py-2 pr-4 pl-3 text-gray-700 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
            </li>
        </ul>
    </div>
</nav>


<style>
    #menu {
        @media (max-width: 768px) {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            padding: 1rem;
            border-bottom: 1px solid #ddd;
            display: none;
        }
    }
</style>

<script>
    document.getElementById('toggle-menu').addEventListener('click', function() {
        document.getElementById('menu').classList.toggle('hidden');
    });
</script>
