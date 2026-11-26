@extends('layouts admin.app')

@section('content')
<div class="container">
    <h1>Daftar Kecamatan</h1>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <a href="{{ route('kecamatan.create') }}">+ Tambah Kecamatan</a>

    <table border="1" cellpadding="8" cellspacing="0" width="100%" style="margin-top: 20px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kecamatan</th>
                <th>Kabupaten</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kecamatans as $kecamatan)
            <tr>
                <td>{{ $kecamatan->district_id }}</td>
                <td>{{ $kecamatan->name }}</td>
                <td>{{ $kecamatan->kabupaten->name ?? '-' }}</td>
                <td>
                    <a href="{{ route('kecamatan.edit', $kecamatan->district_id) }}">Edit</a> |
                    <form action="{{ route('kecamatan.destroy', $kecamatan->district_id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus kecamatan ini?');">
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
        {{ $kecamatans->links() }}
    </div>
</div>
@endsection
