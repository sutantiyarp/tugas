<!DOCTYPE html>
<html lang="en">
@include('layouts.header')
<body class="about-page">

  @include('layouts.navbar')

  <main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(assets/img/page-title-bg.webp);">
      <div class="container position-relative">
        <h1>Tentang Kami</h1>
        <p>Kami hadir untuk memperkenalkan desa, budaya,dan mendukung perekonomian lokal.</p>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ url('/') }}">Beranda</a></li>
            <li class="current">About</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- About 3 Section -->
    <section id="about-3" class="about-3 section">

      <div class="container">
        <div class="row gy-4 justify-content-between align-items-center">
          <div class="col-lg-6 order-lg-2 position-relative" data-aos="zoom-out">
            <img src="assets/img/img_sq_1.jpg" alt="Image" class="img-fluid">
            <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn">
              <span class="play"><i class="bi bi-play-fill"></i></span>
            </a>
          </div>
          <div class="col-lg-5 order-lg-1" data-aos="fade-up" data-aos-delay="100">
            <h2 class="content-title mb-4">Ingin Jadi Mitra Kami?</h2>
            <p class="mb-4">
              JejakDesa merupakan platform dimana orang-orang yang ingin
              mencoba berwisata kedalam pelosok desa, serta membantu perekonomian
              desa-desa yang ada di mitra kita. Platform ini menyajikan rasa penuh suasana
              desa untuk para pengguna untuk bisa merasakan sensasi yang damai dengan
              memesan secara online melalui website JejakDesa
            </p>
            <ul class="list-unstyled list-check">
              <li>Memperkenalkan Desa Mitra</li>
              <li>Meningkatkan Perekonomian dan Kesejahteraan Desa Mitra</li>
              <li>Mengimplementasikan salah satu dari Tri Dharma perguruan tinggi yaitu Pengabdian Masyarakat</li>
            </ul>

            <p><a href="{{ url('/contact') }}" class="btn-cta">Hubungi Kami</a></p>
          </div>
        </div>
      </div>
    </section><!-- /About 3 Section -->

    <!-- Team Section -->
    <section class="team-15 team section" id="team">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Team</h2>
        <p>Jejak Desa</p>
      </div><!-- End Section Title -->

      <div class="content">
        <div class="container">

          <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
              <div class="person">
                <figure>
                  <img src="assets/img/team/team-1.png" alt="Image" class="img-fluid">
                  <div class="social">
                    <a href="https://www.instagram.com/univ_airlangga/"><span class="bi bi-instagram"></span></a>
                  </div>
                </figure>
                <div class="person-contents">
                  <h3>Universitas Airlangga</h3>
                  <span class="position">Instansi</span>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
              <div class="person">
                <figure>
                  <img src="assets/img/team/team-2.jpg" alt="Image" class="img-fluid">
                  <div class="social">
                    <a href="https://www.instagram.com/sutantiyarp/"><span class="bi bi-instagram"></span></a>
                  </div>
                </figure>
                <div class="person-contents">
                  <h3>Sutantiyar Dwi</h3>
                  <span class="position">CTO</span>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
              <div class="person">
                <figure>
                  <img src="assets/img/team/team-3.jpg" alt="Image" class="img-fluid">
                  <div class="social">
                    <a href="https://www.instagram.com/arrhoumm/"><span class="bi bi-instagram"></span></a>
                  </div>
                </figure>
                <div class="person-contents">
                  <h3>Yuro Arumandji</h3>
                  <span class="position">Marketing</span>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
              <div class="person">
                <figure>
                  <img src="assets/img/team/team-4.jpg" alt="Image" class="img-fluid">
                  <div class="social">
                    <a href="https://www.instagram.com/nadieellaa/"><span class="bi bi-instagram"></span></a>
                  </div>
                </figure>
                <div class="person-contents">
                  <h3>Abdillah</h3>
                  <span class="position">CEO</span>
                </div>
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