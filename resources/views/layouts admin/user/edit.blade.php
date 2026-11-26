@extends('layouts admin.app')

@section('content')
    <div class="container">
        <h1>Edit User</h1>

            @if ($errors->any())
                <div style="color:red;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.users.update', $user->id_user) }}" method="POST">
                @csrf
                @method('PUT')  <!-- Menggunakan method PUT untuk update -->
                <div>
                    <label for="nama_user">Name</label>
                    <input type="text" name="nama_user" value="{{ old('nama_user', $user->nama_user) }}" required>
                </div>
                <div>
                    <label for="username">Username</label>
                    <input type="text" name="username" value="{{ old('username', $user->username) }}" required>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
                </div>
                <div>
                    <label for="password">Password (Leave blank to keep current)</label>
                    <input type="password" name="password" autocomplete="new-password">
                    <small>Kosongkan jika tidak ingin mengganti password</small>
                </div>
                <div>
                    <label>Konfirmasi Password Baru</label><br>
                    <input type="password" name="password_confirmation" autocomplete="new-password">
                </div>
                <div>
                    <label>Role</label><br>
                    <select name="id_jenis_user" required>
                        <option value="">-- Pilih Role --</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id_jenis_user }}" {{ (old('id_jenis_user', $user->id_jenis_user) == $role->id_jenis_user) ? 'selected' : '' }}>
                                {{ $role->jenis_user }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit">Update</button>
                <a href="{{ route('admin.users.index') }}">Batal</a>
            </form>
    </div>
@endsection
