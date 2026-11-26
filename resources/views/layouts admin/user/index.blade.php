@extends('layouts admin.app')

@section('content')
    <div class="container">
        <h1>Manage Users</h1>

            @if(session('success'))
                <div style="color:green;">{{ session('success') }}</div>
            @endif

        <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">Add User</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id_user }}</td>
                        <td>{{ $user->nama_user }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->jenisUser->jenis_user }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user->id_user) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.users.destroy', $user->id_user) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
            <div style="margin-top:20px;">
                {{ $users->links() }}
            </div>
    </div>
@endsection
