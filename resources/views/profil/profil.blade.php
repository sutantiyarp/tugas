<!DOCTYPE html>
<html lang="en">
@include('layouts.header')
<body class="about-page">

  @include('layouts.navbar')

  <main class="main">

    <!-- Page Title -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h3 class="text-center mb-4">Edit Profil Saya</h3>
    
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
    
                <div class="card">
                    <div class="card-header">
                        <h5>Informasi Profil</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="nama_user">Nama Lengkap</label>
                                <input type="text" name="nama_user" id="nama_user" class="form-control" value="{{ old('nama_user', $user->nama_user) }}" required>
                        
                                <!-- Menampilkan notifikasi error jika ada -->
                                @error('nama_user')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                            </div>
                        
                            <button type="submit" class="btn btn-primary">Perbarui Profil</button>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    </section><!-- /Team Section -->

  </main>

  @include('layouts.footer')

  @include('layouts.script')

</body>

</html>