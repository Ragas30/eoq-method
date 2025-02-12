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
            </thead>
            @foreach ($fakturs as $faktur)
                <tbody class="*:*:border *:*:border-black">
                    <tr>
                        <td class="border-l border-r border-l-black border-r-black">{{ $faktur->transaksi->kd_pesanan }}
                        </td>
                        <td class="border-l border-r border-l-black border-r-black">{{ $faktur->produk->nm_produk }}
                        </td>
                        </td>
                        <td class="border-l border-r border-l-black border-r-black">{{ $faktur->transaksi->tgl_pesan }}
                        </td>
                        <td class="border-l border-r border-l-black border-r-black">
                            Rp{{ number_format($faktur->qty * $faktur->hrg, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>

    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</body>
