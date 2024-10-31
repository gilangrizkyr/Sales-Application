@extends('layouts.main-19231234-budi')

@section('content')
<h2>{{ isset($product) ? 'Edit Produk' : 'Tambah Produk' }}</h2>

<form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}" method="POST">
    @csrf
    @if(isset($product))
        @method('PUT')
    @endif
    <input type="hidden" name="id" value="{{ $product->id ?? '' }}">

    <div style="margin-bottom: 15px;">
        <label style="display: block;">Nama Produk:</label>
        <input type="text" name="name" value="{{ $product->name ?? '' }}" required style="padding: 8px; width: 100%;">
    </div>

    <div style="margin-bottom: 15px;">
        <label style="display: block;">Harga:</label>
        <input type="number" name="price" value="{{ $product->price ?? '' }}" required style="padding: 8px; width: 100%;">
    </div>

    <div style="margin-bottom: 15px;">
        <label style="display: block;">Stok:</label>
        <input type="number" name="stock" value="{{ $product->stock ?? '' }}" required style="padding: 8px; width: 100%;">
    </div>

    <button type="submit" style="padding: 10px 15px; background-color: #007bff; color: white; border: none; border-radius: 5px;">Simpan</button>
</form>
@endsection
