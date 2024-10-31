@extends('layouts.main-19231234-budi')

@section('content')
<h2 style="text-align: center;">{{ isset($sale) ? 'Edit Penjualan' : 'Tambah Penjualan' }}</h2>

@if($errors->any())
    <script>
        alert("{{ $errors->first() }}");
    </script>
@endif

<form action="{{ isset($sale) ? route('sales.update', $sale->id) : route('sales.store') }}" method="POST" style="text-align: center;">
    @csrf
    @if(isset($sale))
        @method('PUT')
    @endif
    <input type="hidden" name="id" value="{{ $sale->id ?? '' }}">
    <label>Tanggal Penjualan:</label>
    <input type="date" name="date" value="{{ $sale->date ?? '' }}" required>
    <label>Produk:</label>
    <select name="product_id" required>
        @foreach($products as $product)
            <option value="{{ $product->id }}">{{ $product->name }}</option>
        @endforeach
    </select>
    <label>Jumlah:</label>
    <input type="number" name="quantity" required>
    <button type="submit" style="margin-top: 10px;">Tambah Barang</button>
</form>

<h3 style="text-align: center;">Detail Penjualan</h3>
<table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th style="border: 1px solid #ddd; padding: 8px;">Nama Produk</th>
            <th style="border: 1px solid #ddd; padding: 8px;">Harga</th>
            <th style="border: 1px solid #ddd; padding: 8px;">Jumlah</th>
            <th style="border: 1px solid #ddd; padding: 8px;">Total Harga</th>
            <th style="border: 1px solid #ddd; padding: 8px;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($saleDetails) && $saleDetails->count())
            @foreach($saleDetails as $detail)
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $detail->product->name }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $detail->price }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $detail->quantity }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $detail->total }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">
                        <form action="{{ route('sales.details.destroy', $detail->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="color: red; background: none; border: none; cursor: pointer;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5" style="text-align: center;">Tidak ada detail penjualan.</td>
            </tr>
        @endif
    </tbody>
</table>
<p style="text-align: center;">Total Harga: {{ $total ?? 0 }}</p>
@endsection
