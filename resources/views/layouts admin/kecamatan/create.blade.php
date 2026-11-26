@extends('layouts admin.app')

@section('content')
<div class="container">
    <h1>Tambah Kecamatan Baru</h1>

    @if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('kecamatan.store') }}" method="POST">
        @csrf
        <div>
            <label>Kabupaten</label><br>
            <select name="regency_id" required>
                <option value="">-- Pilih Kabupaten --</option>
                @foreach($kabupatens as $kabupaten)
                    <option value="{{ $kabupaten->regency_id }}" {{ old('regency_id') == $kabupaten->regency_id ? 'selected' : '' }}>
                        {{ $kabupaten->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Nama Kecamatan</label><br>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>
        <br>
        <button type="submit">Simpan</button>
        <a href="{{ route('kecamatan.index') }}">Batal</a>
    </form>
</div>
@endsection
