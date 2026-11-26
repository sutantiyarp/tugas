@extends('layouts admin.app')

@section('content')
<div class="container">
    <h1>Tambah Provinsi Baru</h1>

    @if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('provinsi.store') }}" method="POST">
        @csrf
        <div>
            <label>Nama Provinsi</label><br>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>
        <br>
        <button type="submit">Simpan</button>
        <a href="{{ route('provinsi.index') }}">Batal</a>
    </form>
</div>
@endsection
