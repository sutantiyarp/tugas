@extends('layouts admin.app')

@section('content')
<div class="container">
    <h1>Daftar Desa</h1>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <a href="{{ route('desa.create') }}">+ Tambah Desa</a>

    <table border="1" cellpadding="8" cellspacing="0" width="100%" style="margin-top: 20px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Desa</th>
                <th>Kecamatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($desas as $desa)
            <tr>
                <td>{{ $desa->village_id }}</td>
                <td>{{ $desa->name }}</td>
                <td>{{ $desa->kecamatan->name ?? '-' }}</td>
                <td>
                    <a href="{{ route('desa.edit', $desa->village_id) }}">Edit</a> |
                    <form action="{{ route('desa.destroy', $desa->village_id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus desa ini?');">
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
        {{ $desas->links() }}
    </div>
</div>
@endsection
