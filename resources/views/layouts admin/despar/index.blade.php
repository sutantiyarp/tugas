@extends('layouts admin.app')

@section('content')
<div class="container">
    <h1>Daftar Destinasi Pariwisata</h1>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <a href="{{ route('despar.create') }}" class="btn btn-primary">+ Tambah Destinasi</a>

    <table border="1" cellpadding="8" cellspacing="0" width="100%" style="margin-top: 20px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Destinasi</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Harga</th>
                <th>Kecamatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($despars as $despar)
            <tr>
                <td>{{ $despar->destination_id }}</td>
                <td>{{ $despar->name }}</td>
                <td>{{ $despar->description ?? '-' }}</td>
                <td>
                    @if($despar->image)
                        <img src="{{ asset('images/despar/' . $despar->image) }}" alt="{{ $despar->name }}" width="100">
                    @else
                        Tidak ada gambar
                    @endif
                </td>
                <td>{{ number_format($despar->price, 2) }}</td>
                <td>{{ $despar->desa->name ?? '-' }}</td>
                <td>
                    <a href="{{ route('despar.edit', $despar->destination_id) }}">Edit</a> |
                    <form action="{{ route('despar.destroy', $despar->destination_id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus destinasi ini?');">
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
        {{ $despars->links() }}
    </div>
</div>
@endsection
