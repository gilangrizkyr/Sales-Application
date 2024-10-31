@extends('layouts.main-19231234-budi')

@section('content')
<h2 style="text-align: center;">Tabel Penjualan</h2>
<p style="text-align: center;">
    <a href="{{ route('sales.create') }}" style="padding: 10px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;">Input Penjualan</a>
</p>
<table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th style="border: 1px solid #ddd; padding: 8px;">Nama Produk</th>
            <th style="border: 1px solid #ddd; padding: 8px;">Tanggal Penjualan</th>
            <th style="border: 1px solid #ddd; padding: 8px;">Jumlah Terjual</th>
            <th style="border: 1px solid #ddd; padding: 8px;">Total Harga</th>
            <th style="border: 1px solid #ddd; padding: 8px;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sales as $sale)
            @foreach($sale->details as $detail)
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $detail->product->name }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $sale->date }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $detail->quantity }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $detail->total }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">
                        <a href="{{ route('sales.edit', $sale->id) }}" style="color: blue; text-decoration: none;">Edit</a>
                        <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" style="color: red; background: none; border: none; cursor: pointer;" onclick="if(confirm('Hapus data ini?')) this.form.submit();">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
@endsection
