<header id="header" class="header d-flex align-items-center position-relative">
  <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

    <a href="{{ url('/') }}" class="logo d-flex align-items-center">
      <img src="{{ asset('assets/img/logo.png') }}" alt="JejakDesa">
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="{{ url('/dashboard') }}" class="active">Beranda</a></li>
        <li class="dropdown"><a href="#"><span>Desa Wisata</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="{{ url('/peta') }}">Peta Desa</a></li>
            <li><a href="{{ url('/rekomendasi') }}">Rekomendasi</a></li>
          </ul>
        </li>
        <li><a href="{{ url('/usaha') }}">Usaha Lokal</a></li>
        <li><a href="{{ url('/event') }}">Event</a></li>
        <li><a href="{{ url('/booking') }}">Booking</a></li>
        <li><a href="{{ url('/testimoni') }}">Testimoni</a></li>
        <li class="dropdown"><a href="#"><span>Bantuan</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="{{ url('/about') }}">Tentang Kami</a></li>
            <li><a href="{{ url('/contact') }}">Hubungi Kami</a></li>
          </ul>
        </li>
        <li class="dropdown"><a href="#"><span>Akun Saya</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="{{ route('profile') }}">Profil</a></li>
            <li><a href="#">Reservasi Saya</a></li>
            <li><a href="#">Favorit</a></li>
            <!-- Tambahkan Tombol Logout di sini -->
            <li>
              <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item" style="color: #4CAF50;">
                Logout
              </a>
              <!-- Form Logout -->
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </li>
          </ul>
        </li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

  </div>
</header>
