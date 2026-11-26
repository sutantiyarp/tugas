@extends('layouts admin.app')

@section('content')
<div class="container">
    <h1>Daftar Kabupaten</h1>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <a href="{{ route('kabupaten.create') }}">+ Tambah Kabupaten</a>

    <table border="1" cellpadding="8" cellspacing="0" width="100%" style="margin-top: 20px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kabupaten</th>
                <th>Provinsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kabupatens as $kabupaten)
            <tr>
                <td>{{ $kabupaten->regency_id }}</td>
                <td>{{ $kabupaten->name }}</td>
                <td>{{ $kabupaten->provinsi->name ?? '-' }}</td>
                <td>
                    <a href="{{ route('kabupaten.edit', $kabupaten->regency_id) }}">Edit</a> |
                    <form action="{{ route('kabupaten.destroy', $kabupaten->regency_id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus kabupaten ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background:none; border:none; color:red; cursor:pointer;">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        {{ $kabupatens->links() }}
    </div>
</div>
@endsection
