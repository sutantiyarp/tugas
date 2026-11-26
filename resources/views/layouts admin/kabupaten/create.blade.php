@extends('layouts admin.app')

@section('content')
<div class="container">
    <h1>Tambah Kabupaten Baru</h1>

    @if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('kabupaten.store') }}" method="POST">
        @csrf
        <div>
            <label>Provinsi</label><br>
            <select name="province_id" required>
                <option value="">-- Pilih Provinsi --</option>
                @foreach($provinsis as $provinsi)
                    <option value="{{ $provinsi->province_id }}" {{ old('province_id') == $provinsi->province_id ? 'selected' : '' }}>
                        {{ $provinsi->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Nama Kabupaten</label><br>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>
        <br>
        <button type="submit">Simpan</button>
        <a href="{{ route('kabupaten.index') }}">Batal</a>
    </form>
</div>
@endsection
