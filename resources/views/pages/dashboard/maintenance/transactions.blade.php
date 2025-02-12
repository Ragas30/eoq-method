@extends('layout.layout_dashboard')

@section('title', 'Maintenance | TOKO BANGUNAN ONE')

@section('heading', 'Transaksi')

@section('content')
    <table class="w-full table-auto">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="px-4 py-2">No</th>
                <th class="px-4 py-2">Kode Pesanan</th>
                <th class="px-4 py-2">Bukti Bayar</th>
                <th class="px-4 py-2">Tanggal</th>
                <th class="px-4 py-2">Customer</th>
                <th class="px-4 py-2">Total</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $trx)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $trx->kd_pesanan }}</td>
                    <td class="px-4 py-2"><a href="../{{ $trx->bukti }}" target="_blank"
                            class="text-blue-500 hover:text-blue-600">Lihat Bukti</a></td>
                    <td class="px-4 py-2">{{ $trx->tgl_pesan }}</td>
                    <td class="px-4 py-2">{{ $trx->pelanggan->nm_lengkap }}</td>
                    <td class="px-4 py-2">Rp. {{ $trx->total }}</td>
                    <td class="px-4 py-2">
                        @if ($trx->status == 'pending')
                            <span
                                class="uppercase bg-amber-200 p-1 rounded-md text-sm text-yellow-800">{{ $trx->status }}</span>
                        @elseif($trx->status == 'success')
                            <span
                                class="uppercase bg-lime-200 p-1 rounded-md text-sm text-green-800">{{ $trx->status }}</span>
                        @elseif($trx->status == 'canceled')
                            <span
                                class="uppercase bg-red-200 p-1 rounded-md text-sm text-red-800">{{ $trx->status }}</span>
                        @endif
                    </td>
                    <td class="px-4 py-2">
                        <form action="{{ route('transactions.update', $trx->id_transaksi) }}" method="POST" class="inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 transition">
                                Bayar
                            </button>
                        </form>

                        <form action="{{ route('transactions.destroy', $trx->id_transaksi) }}" method="POST"
                            class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-3 py-1 rounded-md transition
                                {{ $trx->status == 'success' ? 'bg-gray-500 hover:bg-gray-600 text-gray-300 cursor-not-allowed' : 'bg-red-500 hover:bg-red-600 text-white' }}"
                                @if ($trx->status == 'success') disabled @endif>
                                Batal
                            </button>
                        </form>
                        <a href="{{ route('dashboard.print.nota_pesanan', $trx->id_transaksi) }}" target="_blank"
                            class="bg-orange-500 text-white px-3 py-1.5 rounded-md hover:bg-orange-600 transition">Cetak</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
