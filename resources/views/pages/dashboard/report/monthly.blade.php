@extends('layout.layout_dashboard')

@section('title', 'Report | Toko Bangunan ONE')

@section('heading', 'Monthly Report')

@section('content')
    <div class="mb-4">
        <form action="{{ route('dashboard.report.monthly') }}" method="GET">
            <label for="bulan">Month</label>
            <select name="bulan" class="border border-slate-500 rounded px-2">
                @foreach (range(1, 12) as $m)
                    <option value="{{ $m }}" {{ request('bulan', now()->month) == $m ? 'selected' : '' }}>
                        {{ \Carbon\Carbon::create(null, $m)->format('F') }}
                    </option>
                @endforeach
            </select>

            <label for="tahun">Year</label>
            <select name="tahun" class="border border-slate-500 rounded px-2">
                @foreach (range(now()->year - 5, now()->year) as $y)
                    <option value="{{ $y }}" {{ request('tahun', now()->year) == $y ? 'selected' : '' }}>
                        {{ $y }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">Search</button>
        </form>
    </div>

    <table class="border-collapse border border-slate-500 w-full">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-slate-500 px-2 py-1">No</th>
                <th class="border border-slate-500 px-2 py-1">Kode Pesanan</th>
                <th class="border border-slate-500 px-2 py-1">Nama Produk</th>
                <th class="border border-slate-500 px-2 py-1">Harga Produk</th>
                <th class="border border-slate-500 px-2 py-1">QTY</th>
                <th class="border border-slate-500 px-2 py-1">Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transaksi as $index => $uraian)
                <tr>
                    <td class="border border-slate-500 px-2 py-1 text-center">{{ $index + 1 }}</td>
                    <td class="border border-slate-500 px-2 py-1 text-center">{{ $uraian->transaksi->kd_pesanan }}</td>
                    <td class="border border-slate-500 px-2 py-1">{{ $uraian->produk->nm_produk }}</td>
                    <td class="border border-slate-500 px-2 py-1 text-right">
                        Rp{{ number_format($uraian->hrg, 0, ',', '.') }}</td>
                    <td class="border border-slate-500 px-2 py-1 text-center">{{ $uraian->qty }}</td>
                    <td class="border border-slate-500 px-2 py-1 text-right">
                        Rp{{ number_format($uraian->qty * $uraian->hrg, 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center border border-slate-500 px-2 py-1">No transactions found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
