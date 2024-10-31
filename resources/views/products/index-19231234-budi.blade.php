@extends('layouts.main-19231234-budi')

@section('content')
<h2>Tabel Produk</h2>
<a href="{{ route('products.create') }}" style="padding: 10px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px;">Tambah Produk</a>
<br><br>
<table style="border-collapse: collapse; width: 100%;">
    <thead>
        <tr>
            <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Nomor</th>
            <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Nama Produk</th>
            <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Harga</th>
            <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Stok</th>
            <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $loop->iteration }}</td>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $product->name }}</td>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $product->price }}</td>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $product->stock }}</td>
            <td style="border: 1px solid #ddd; padding: 8px;">
                <a href="{{ route('products.edit', $product->id) }}" style="margin-right: 10px;">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="if(confirm('Hapus data ini?')) this.form.submit();">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
