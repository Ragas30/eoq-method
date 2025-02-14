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
                    <span>{{ $kd_pesanan }}</span>
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
                @php
                    $subtotal = 0;
                    $tarifKirim = 15000;
                @endphp
                @foreach ($fakturs as $faktur)
                    @php
                        $totalHarga = $faktur->qty * $faktur->hrg;
                        $subtotal += $totalHarga;
                    @endphp
                    <tr>
                        <td class="text-start border border-black">{{ $faktur->produk->nm_produk }}</td>
                        <td class="text-start border border-black">Rp. {{ number_format($faktur->hrg, 0, ',', '.') }}
                        </td>
                        <td class="border border-black">{{ $faktur->qty }}</td>
                        <td class="text-end border border-black">Rp. {{ number_format($totalHarga, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
                @php
                    $totalBayar = $subtotal + $tarifKirim;
                @endphp
                <tr>
                    <td colspan="3" class="text-end border border-black">Subtotal:</td>
                    <td class="border border-black">Rp. {{ number_format($subtotal, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-end border border-black">Tarif Kirim:</td>
                    <td class="border border-black">Rp. {{ number_format($tarifKirim, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-end border border-black">Total Yang Harus Dibayar:</td>
                    <td class="border border-black">Rp. {{ number_format($totalBayar, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td class="text-end border border-black" colspan="4">Terbilang:
                        {{ ucwords(terbilang($totalBayar)) }} Rupiah</td>
                </tr>
            </tbody>

            @php
                function terbilang($angka)
                {
                    $angka = abs($angka);
                    $bilangan = [
                        '',
                        'satu',
                        'dua',
                        'tiga',
                        'empat',
                        'lima',
                        'enam',
                        'tujuh',
                        'delapan',
                        'sembilan',
                        'sepuluh',
                        'sebelas',
                    ];
                    if ($angka < 12) {
                        return ' ' . $bilangan[$angka];
                    } elseif ($angka < 20) {
                        return terbilang($angka - 10) . ' belas';
                    } elseif ($angka < 100) {
                        return terbilang($angka / 10) . ' puluh' . terbilang($angka % 10);
                    } elseif ($angka < 200) {
                        return 'seratus' . terbilang($angka - 100);
                    } elseif ($angka < 1000) {
                        return terbilang($angka / 100) . ' ratus' . terbilang($angka % 100);
                    } elseif ($angka < 2000) {
                        return 'seribu' . terbilang($angka - 1000);
                    } elseif ($angka < 1000000) {
                        return terbilang($angka / 1000) . ' ribu' . terbilang($angka % 1000);
                    } elseif ($angka < 1000000000) {
                        return terbilang($angka / 1000000) . ' juta' . terbilang($angka % 1000000);
                    }
                }
            @endphp

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
    </div>
</body>
