@extends('layouts admin.app')

@section('content')
<div class="container">
    <h1>Daftar Provinsi</h1>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <a href="{{ route('provinsi.create') }}">+ Tambah Provinsi</a>

    <table border="1" cellpadding="8" cellspacing="0" width="100%" style="margin-top: 20px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Provinsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($provinsis as $provinsi)
            <tr>
                <td>{{ $provinsi->province_id }}</td>
                <td>{{ $provinsi->name }}</td>
                <td>
                    <a href="{{ route('provinsi.edit', $provinsi->province_id) }}">Edit</a> |
                    <form action="{{ route('provinsi.destroy', $provinsi->province_id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus provinsi ini?');">
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
        {{ $provinsis->links() }}
    </div>
</div>
@endsection
