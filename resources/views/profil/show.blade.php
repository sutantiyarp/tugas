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
                <h3 class="text-center mb-4">Profil Saya</h3>
    
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
    
                <div class="card">
                    <div class="card-header">
                        <h5>Informasi Profil</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="nama_user">Nama Lengkap</label>
                            <p>{{ $user->nama_user }}</p> <!-- Menampilkan nama_user -->
                        </div>
    
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <p>{{ $user->email }}</p> <!-- Menampilkan email -->
                        </div>
    
                        <a href="{{ route('profile.edit') }}" class="btn btn-warning">Edit Profil</a> <!-- Link untuk mengedit profil -->
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