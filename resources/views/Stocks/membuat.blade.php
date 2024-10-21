@extends('templates.template')

@section('content')

<form action="" method="POST" class="card p-5">
    @if (Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    @csrf

    <div class="form-group mb-3">
        <label for="nama" class="form-label">Nama Produk</label>
        <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}">
    </div>

    <div class="form-group mb-3">
        <label for="kategori" class="form-label">Kategori</label>
        <select name="kategori" id="kategori" class="form-select">
            <option hidden selected disabled>Pilih</option>
            <option value="makanan" {{ old('kategori') == 'makanan' ? 'selected' : '' }}>Makanan</option>
            <option value="minuman" {{ old('kategori') == 'minuman' ? 'selected' : '' }}>Minuman</option>
            <option value="barang" {{ old('kategori') == 'barang' ? 'selected' : '' }}>Barang</option>
        </select>
    </div>

    <div class="form-group mb-3">
        <label for="harga" class="form-label">Harga Produk</label>
        <input type="number" name="harga" id="harga" class="form-control" value="{{ old('harga') }}">
    </div>

    <div class="form-group mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input type="number" name="stock" id="stock" class="form-control" value="{{ old('stock') }}">
    </div>

    <button type="submit" class="btn btn-success mt-3">Submit</button>
</form>

@endsection
