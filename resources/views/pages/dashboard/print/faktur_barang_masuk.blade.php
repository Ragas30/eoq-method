<x-dashboard.header></x-dashboard.header>

<body class="text-center p-6">
    <h1 class="mx-auto text-2xl font-semibold">Toko Bangunan ONE</h1>
    <span>Jl. Raya Bandar Buat No.Kel, Bandar Buat, Kec. Lubuk Kilangan, Kota Padang No 54</span>
    <div class="p-4 border-t border-t-black font-serif">
        <div class="flex justify-between">
            <div class="flex flex-col justify-start mt-6 items-start">
                <div class="item-start">
                    <span class="font-bold">Rincian Pengiriman</span>
                </div>
                <div clas>
                    <span>Rio Pernanda</span>
                </div>
                <div>
                    <span>Padang</span>
                </div>
                <div>
                    <span>riopernanda@gmail.com</span>
                </div>
                <div>
                    <span>Telp : 0812345678</span>
                </div>
            </div>
            <div class="flex flex-col justify-start mt-6 items-start">
                <div class="item-start">
                    <span class="font-bold">FAKTUR BELANJA</span>
                </div>
                <div clas>
                    <span>No. Trans :</span>
                    <span>{{ $produk->kd_produk }}</span>
                </div>
                <div>
                    <span>Tanggal :</span>
                    <span> {{ date('d-m-Y') }}</span>
                </div>
                <div>
                    <span>Status Pesanan :</span>
                    <span>Belum Bayar</span>
                </div>
            </div>
        </div>

        <table class="w-full border border-black">
            <tbody>
                <tr>
                    <td class="border border-black">Nama Produk</td>
                    <td class="border border-black">Harga</td>
                    <td class="border border-black">Qty</td>
                    <td class="border border-black">Total Harga</td>
                </tr>
                <tr>
                    <td class="text-start border border-black">Keramik Vidensa White 50 x 50</td>
                    <td class="text-start border border-black">Rp. 65.000,00</td>
                    <td class="border border-black">10</td>
                    <td class="text-end border border-black">Rp. 650.000,00</td>
                </tr>
                <tr>
                    <td class="text-start border border-black">Semen Padang Indonesia 50kg</td>
                    <td class="text-start border border-black">Rp. 70.000,00</td>
                    <td class="border border-black">5</td>
                    <td class="text-end border border-black">Rp. 350.000,00</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-end border border-black">Subtotal:</td>
                    <td class="border border-black">Rp. 1.000.000,00</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-end border border-black">Tarif Kirim:</td>
                    <td class="border border-black">Rp. 5.000,00</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-end border border-black">Total Yang Harus Di Bayar Adalah:</td>
                    <td class="border border-black">Rp. 1.005.000,00</td>
                </tr>
                <tr>
                    <td class="text-end border border-black" colspan="4">Terbilang : Satu Juta Lima Ribu</td>
                </tr>
            </tbody>
        </table>

        <div class="text-start py-4 border border-black w-full mt-6">
            <h4 class="font-bold mt-5">Keterangan :</h4>
            <ol class="list-decimal ml-12">
                <li>Silahkan anda melakukan konfirmasi pembayaran ke Bank yang sudah kami tetapkan.</li>
                <li>Bank BRI dengan No rekening 13445243321.</li>
                <li>Setelah melakukan transaksi pembayaran, silahkan lakukan konfirmasi pembayaran dimenu yang sudah
                    kami sediakan.</li>
                <li>Barang akan kami kirim ke alamat setelah anda melakukan konfirmasi pembayaran.</li>
                <li>Bukti pemesanan ini harap di simpan.</li>
                <li>Jika pembayaran tidak dilakukan selama 24 jam maka akan kami batalkan pesanan anda.</li>
            </ol>
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
