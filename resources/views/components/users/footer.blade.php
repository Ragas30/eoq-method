<footer class="bg-gradient-to-r from-gray-900 to-gray-800 text-gray-200 py-12">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Company Info -->
            <div class="space-y-4">
                <h5 class="text-2xl font-bold text-white mb-4">Toko Bangunan ONE</h5>
                <p class="text-gray-400 leading-relaxed">Memberikan Kualitas Produk Yang Baik</p>
                <div class="pt-2">
                    <p class="text-gray-400">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        Jl. Raya Bandar Buat No.Kel, Bandar Buat, Kec. Lubuk Kilangan, Kota Padang No 54
                    </p>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="space-y-4">
                <h5 class="text-xl font-semibold text-white mb-4">Link Cepat</h5>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('home') }}"
                            class="text-gray-400 hover:text-white transition duration-300 flex items-center">
                            <span class="mr-2">→</span> Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('product_menu') }}"
                            class="text-gray-400 hover:text-white transit`ion duration-300 flex items-center">
                            <span class="mr-2">→</span> Produk
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}"
                            class="text-gray-400 hover:text-white transition duration-300 flex items-center">
                            <span class="mr-2">→</span> Login
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Social Media -->
            <div class="space-y-4">
                <h5 class="text-xl font-semibold text-white mb-4">Follow Us</h5>
                <div class="flex flex-col space-y-3">
                    <a href="#" class="text-gray-400 hover:text-white transition duration-300 flex items-center">
                        <i class="fab fa-facebook-f w-6"></i>
                        <span>Facebook</span>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition duration-300 flex items-center">
                        <i class="fab fa-twitter w-6"></i>
                        <span>Twitter</span>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition duration-300 flex items-center">
                        <i class="fab fa-instagram w-6"></i>
                        <span>Instagram</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
            <p>&copy; 2025 Toko Bangunan ONE. All rights reserved.</p>
        </div>
    </div>
</footer>
