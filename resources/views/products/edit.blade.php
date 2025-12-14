@extends('layouts.app')

@section('content')
<h1>Edit Produk</h1>

<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nama Produk</label>
    <input type="text" name="name" value="{{ $product->name }}" required>

    <label>Deskripsi</label>
    <textarea name="description" required>{{ $product->description }}</textarea>

    <label>Harga</label>
    <input type="number" name="price" value="{{ $product->price }}" required>

    <label>Kategori</label>
    <select name="category_id" required>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    <button type="submit">Simpan Perubahan</button>
</form>
@endsection