@extends('layouts admin.app')

@section('content')
<div class="container">
    <h1>Tambah Destinasi Pariwisata</h1>

    @if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('despar.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label>Nama Destinasi</label><br>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>
        <br>

        <div>
            <label>Deskripsi</label><br>
            <textarea name="description" rows="4">{{ old('description') }}</textarea>
        </div>
        <br>

        <div>
            <label>Gambar</label><br>
            <input type="file" name="image" accept="image/*">
        </div>
        <br>

        <div>
            <label>Harga</label><br>
            <input type="number" name="price" value="{{ old('price') }}" required min="0" step="0.01">
        </div>
        <br>

        <div>
            <label>Desa</label><br>
            <select name="village_id" required>
                <option value="">-- Pilih Desa --</option>
                @foreach($desas as $desa)
                    <option value="{{ $desa->village_id }}" {{ old('village_id') == $desa->village_id ? 'selected' : '' }}>
                        {{ $desa->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <br>

        <button type="submit">Simpan</button>
        <a href="{{ route('despar.index') }}">Batal</a>
    </form>
</div>
@endsection
