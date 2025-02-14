<x-dashboard.header></x-dashboard.header>

<body class="text-center p-6">
    <h1 class="mx-auto text-2xl font-semibold">Toko Bangunan ONE</h1>
    <span>Jl. Raya Bandar Buat No.Kel, Bandar Buat, Kec. Lubuk Kilangan, Kota Padang No 54</span>
    <div class="p-4 border-t border-t-black font-serif">
        <div class="flex flex-col">
            <div class="flexj ustify-center items-center">
                <h1 class="font-bold">NOTA PRODUK</h1>
            </div>
            <div class="flex flex-col justify-start items-start">
                <div class="item-start">
                    <span>No Nota: </span>
                    <span class="uppercase">{{ Str::random(8) }}</span>
                </div>
                <div clas>
                    <span>Tanggal :</span>
                    <span> {{ date('d-m-Y') }}</span>
                </div>
                <div>
                    <span>Kode Produk :</span>
                    <span>{{ $produk->kd_produk }}</span>
                </div>
                <div>
                    <span>Nama Produk :</span> <span>{{ $produk->nm_produk }}</span>
                </div>
                <div>
                    <span>Jumlah Produk :</span> <span>{{ $pemesanan->jml_beli }} {{ $produk->satuan }}</span>
                </div>
            </div>


            {{-- <table class="w-full">
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
        </table> --}}
        </div>

        {{-- <script>
        window.onload = function() {
            window.print();
        }
    </script> --}}
</body>
