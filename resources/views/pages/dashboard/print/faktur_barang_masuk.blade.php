<x-dashboard.header></x-dashboard.header>

<body class="text-center p-6">
    <h1 class="mx-auto text-2xl font-semibold">Data Transaksi</h1>
    <div class="p-4 border border-black">
        <div class="flex *:w-full text-start *:flex *:flex-col ">
            <div>
                <span>{{ $pemesanan->supplier->nm_supplier }}</span>
                <span>{{ $pemesanan->supplier->alamat }}</span>
                <span>{{ $pemesanan->supplier->nohp }}</span>
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
                <td class="border-l border-r border-l-black border-r-black">Nama Supplier</td>
                <td class="border-l border-r border-l-black border-r-black">Produk</td>
                <td class="border-l border-r border-l-black border-r-black">Tanggal Pesan</td>
                <td class="border-l border-r border-l-black border-r-black">Jumlah Produk</td>
                <td class="border-l border-r border-l-black border-r-black">Total Harga</td>
            </thead>
            <tbody class="*:*:border *:*:border-black">
                <tr>
                    <td class="border-l border-r border-l-black border-r-black">{{ $pemesanan->supplier->nm_supplier }}
                    </td>
                    <td class="border-l border-r border-l-black border-r-black">{{ $produk->nm_produk }}
                    </td>
                    </td>
                    <td class="border-l border-r border-l-black border-r-black">{{ $pemesanan->tgl_pesan }}
                    </td>
                    <td class="border-l border-r border-l-black border-r-black">{{ $pemesanan->jml_beli }}
                    </td>
                    <td class="border-l border-r border-l-black border-r-black">
                        Rp{{ number_format($pemesanan->total_beli, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</body>
