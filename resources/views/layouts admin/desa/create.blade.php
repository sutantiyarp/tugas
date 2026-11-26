@extends('layouts admin.app')

@section('content')
<div class="container">
    <h1>Tambah Desa Baru</h1>

    @if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('desa.store') }}" method="POST">
        @csrf
        <div>
            <label>Kecamatan</label><br>
            <select name="district_id" required>
                <option value="">-- Pilih Kecamatan --</option>
                @foreach($kecamatans as $kecamatan)
                    <option value="{{ $kecamatan->district_id }}" {{ old('district_id') == $kecamatan->district_id ? 'selected' : '' }}>
                        {{ $kecamatan->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Nama Desa</label><br>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>
        <br>
        <button type="submit">Simpan</button>
        <a href="{{ route('desa.index') }}">Batal</a>
    </form>
</div>
@endsection
