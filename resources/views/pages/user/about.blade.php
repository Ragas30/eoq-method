@extends('components.users.header')

@section('title', 'About')

@section('content')
    <main class="min-h-screen bg-gray-50">
        <!-- Hero Section -->
        <section class="relative bg-white overflow-hidden">
            <div class="container mx-auto px-4 py-16 sm:py-24">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="space-y-6">
                        <h1 class="text-4xl sm:text-5xl font-bold text-gray-900">
                            Tentang Toko Bangunan ONE
                        </h1>
                        <p class="text-lg text-gray-600 leading-relaxed">
                            Kami adalah perusahaan terkemuka dalam penjualan bahan bangunan dan alat-alat pertukangan sejak
                            2020.
                            Dengan 3 cabang di kota Padang, kami berkomitmen untuk memberikan produk berkualitas dan layanan
                            terbaik.
                        </p>
                        <div class="flex gap-4">
                            <a href="https://maps.app.goo.gl/NUDyDWo4EqNTRx4P7" target="_blank"
                                class="inline-flex items-center px-6 py-3 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition">
                                Lokasi Kami
                            </a>
                            <a href="https:/wa.me/+6282283621269"
                                class="inline-flex items-center px-6 py-3 rounded-lg border border-gray-300 hover:border-gray-400 transition"
                                target="_blank">
                                Hubungi Kami
                            </a>
                        </div>
                    </div>
                    <div class="relative">
                        <img src="{{ asset('background_about/bangunan_bg.jpg') }}"
                            class="rounded-xl shadow-lg w-full object-cover h-[400px]" alt="Toko Bangunan ONE">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-600/20 to-transparent rounded-xl"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        {{-- <section class="bg-blue-600 py-12">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                    <div class="p-6 rounded-lg bg-white/10 backdrop-blur">
                        <p class="text-4xl font-bold text-white">3+</p>
                        <p class="text-blue-100 mt-2">Cabang Toko</p>
                    </div>
                    <div class="p-6 rounded-lg bg-white/10 backdrop-blur">
                        <p class="text-4xl font-bold text-white">1000+</p>
                        <p class="text-blue-100 mt-2">Produk Tersedia</p>
                    </div>
                    <div class="p-6 rounded-lg bg-white/10 backdrop-blur">
                        <p class="text-4xl font-bold text-white">5000+</p>
                        <p class="text-blue-100 mt-2">Pelanggan Puas</p>
                    </div>
                </div>
            </div>
        </section> --}}

        <!-- Vision & Mission -->
        <section class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900">Visi & Misi</h2>
                    <p class="text-gray-600 mt-4">Komitmen kami untuk memberikan yang terbaik</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="p-8 rounded-xl bg-gray-50 hover:bg-gray-100 transition">
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Visi</h3>
                        <p class="text-gray-600">
                            Menjadi perusahaan terdepan dalam penyediaan bahan bangunan dan alat pertukangan
                            yang berkualitas di Kota Padang dengan mengutamakan kepuasan pelanggan.
                        </p>
                    </div>
                    <div class="p-8 rounded-xl bg-gray-50 hover:bg-gray-100 transition">
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Misi</h3>
                        <ul class="space-y-3 text-gray-600">
                            <li>• Menyediakan produk berkualitas dengan harga bersaing</li>
                            <li>• Memberikan pelayanan terbaik kepada setiap pelanggan</li>
                            <li>• Mengembangkan jaringan toko untuk menjangkau lebih banyak pelanggan</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Locations Section -->
        <section id="locations" class="py-16 bg-gray-50">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Lokasi Kami</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach ([['name' => 'Cabang Pusat', 'address' => 'Jl. Raya Padang No. 123'], ['name' => 'Cabang Lubuk Begalung', 'address' => 'Jl. Lubuk Begalung No. 45'], ['name' => 'Cabang Kuranji', 'address' => 'Jl. Kuranji No. 67']] as $location)
                        <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition">
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $location['name'] }}</h3>
                            <p class="text-gray-600">{{ $location['address'] }}</p>
                            <a href="#" class="text-blue-600 hover:text-blue-700 mt-4 inline-block">
                                Lihat di Peta →
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Contact CTA -->
        <section id="contact" class="bg-blue-600 py-16">
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-3xl font-bold text-white mb-6">Butuh Bantuan?</h2>
                <p class="text-blue-100 mb-8 max-w-2xl mx-auto">
                    Tim kami siap membantu Anda dengan segala kebutuhan bahan bangunan dan pertukangan
                </p>
                <a href="/contact"
                    class="inline-flex items-center px-8 py-3 rounded-lg bg-white text-blue-600 hover:bg-gray-100 transition">
                    Hubungi Kami
                </a>
            </div>
        </section>
    </main>
@endsection
