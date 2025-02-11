<x-dashboard.header></x-dashboard.header>

<body class="text-center p-6">
    <h1 class="mx-auto text-2xl font-semibold">Data Transaksi</h1>
    <div class="p-4 border border-black">
        <div class="flex *:w-full text-start *:flex *:flex-col ">
            <div>
                <span>Toko Bangunan ONE</span>
                <span>Jl. Raya Bandar Buat No.Kel, Bandar Buat, Kec. Lubuk Kilangan, Kota Padang No 54</span>
                <span>Padang</span>
            </div>
            <div>
                <span>Toko Bangunan ONE</span>
                <span>Jl. Raya Bandar Buat No.Kel, Bandar Buat, Kec. Lubuk Kilangan, Kota Padang No 54</span>
                <span>Padang</span>
            </div>
        </div>
        <h2 class="mt-16 font-semibold text-xl">NOTA PESANAN</h2>
        <table class="w-full">
            <thead class="*:border *:border-black">
                <td class="border-l border-r border-l-black border-r-black">Kode Pesanan</td>
                <td class="border-l border-r border-l-black border-r-black">Nama Pemesan</td>
                <td class="border-l border-r border-l-black border-r-black">Tanggal Pesan</td>
                <td class="border-l border-r border-l-black border-r-black">Total Belanja</td>
                <td class="border-l border-r border-l-black border-r-black">Status</td>
            </thead>
            @foreach ($fakturs as $faktur)
                <tbody class="*:*:border *:*:border-black">
                    <tr>
                        <td class="border-l border-r border-l-black border-r-black">{{ $faktur->kd_pesanan }}</td>
                        <td></td>
                        {{-- <td class="border-l border-r border-l-black border-r-black">{{ $faktur->pemesan->nm_pemesan }} --}}
                        </td>
                        <td class="border-l border-r border-l-black border-r-black">{{ $faktur->created_at }}</td>
                        <td class="border-l border-r border-l-black border-r-black">
                            Rp{{ number_format($faktur->total_belanja, 0, ',', '.') }}</td>
                        <td class="border-l border-r border-l-black border-r-black">{{ $faktur->status }}</td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
</body>
