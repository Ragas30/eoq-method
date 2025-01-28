<nav class="bg-white shadow-lg border-b border-gray-300 fixed top-0 left-0 right-0 z-50 sm:px-6 lg:px-8">
    <div class="container mx-auto px-4 py-2 flex justify-between items-center">
        <a href="#" class="text-2xl font-bold text-gray-800">Logo</a>
        <button class="bg-transparent border-none focus:outline-none sm:hidden" id="toggle-menu">
            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M4 5h16a1 1 0 010 2H4a1 1 0 110-2zm0 6h16a1 1 0 010 2H4a1 1 0 110-2zm0 6h16a1 1 0 010 2H4a1 1 0 110-2z">
                </path>
            </svg>
        </button>
        <ul class="hidden sm:flex sm:flex-row sm:items-center sm:w-auto sm:space-x-8 gap-2" id="menu">
            <li><a href="{{ route('home') }}"
                    class="block py-2 px-3 text-gray-700 hover:bg-gray-100 sm:hover:bg-transparent sm:border-0 sm:hover:text-blue-700 sm:p-0 dark:text-gray-400 sm:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 sm:dark:hover:bg-transparent rounded-lg">Home</a>
            </li>
            <li><a href="{{ route('product_menu') }}"
                    class="block py-2 px-3 text-gray-700 hover:bg-gray-100 sm:hover:bg-transparent sm:border-0 sm:hover:text-blue-700 sm:p-0 dark:text-gray-400 sm:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 sm:dark:hover:bg-transparent rounded-lg">Product</a>
            </li>
            <li class="relative">
                <button
                    class="flex items-center justify-between w-full py-2 px-3 text-gray-700 hover:bg-gray-100 sm:hover:bg-transparent sm:border-0 sm:hover:text-blue-700 sm:p-0 dark:text-gray-400 sm:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 sm:dark:hover:bg-transparent rounded-lg"
                    id="dropdown-more-button" aria-expanded="false">
                    More
                    <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div class="hidden absolute left-0 mt-2 w-44 bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700"
                    id="dropdown-more">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdown-more-button">
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white">Setting</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white">Logout</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li><a href="{{ route('login') }}"
                    class="block py-2 px-3 text-gray-700 hover:bg-gray-100 sm:hover:bg-transparent sm:border-0 sm:hover:text-blue-700 sm:p-0 dark:text-gray-400 sm:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 sm:dark:hover:bg-transparent rounded-lg">Login</a>
            </li>
        </ul>
    </div>
</nav>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const menuToggle = document.getElementById('toggle-menu');
        const menu = document.getElementById('menu');
        const dropdownMoreButton = document.getElementById('dropdown-more-button');
        const dropdownMore = document.getElementById('dropdown-more');

        menuToggle.addEventListener('click', function() {
            menu.classList.toggle('hidden');
        });

        dropdownMoreButton.addEventListener('click', function(event) {
            dropdownMore.classList.toggle('hidden');
            event.stopPropagation();
        });

        document.addEventListener('click', function(event) {
            if (!dropdownMore.contains(event.target) && !dropdownMoreButton.contains(event.target)) {
                dropdownMore.classList.add('hidden');
            }
        });
    });
</script>
