<!DOCTYPE html>
<html lang="en">

@include('layouts.header')

<body class="blog-page">

@include('layouts.navbar')

  <main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url({{ asset('assets/img/page-title-bg.webp') }});">
        <div class="container position-relative">
        <h1>Detail Wisata Desa Bambu Rindu</h1>
        <nav class="breadcrumbs">
          {{-- <ol>
            <li><a href="/">Beranda</a></li>
            <li><a href="/rekomendasi">Rekomendasi</a></li>
            <li class="current">Detail Desa Bambu Rindu</li>
          </ol> --}}
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Blog Post Detail Section -->
    <section id="blog-post-detail" class="blog-post-detail section">
      <div class="container">
        <div class="row">

          <div class="col-lg-8">
            <article class="post-content">

              <div class="post-img position-relative overflow-hidden">
                <img src="assets/img/blog/bambu-rindu.jpg" class="img-fluid" alt="Desa Bambu Rindu">
              </div>

              <div class="meta d-flex align-items-center">
                <span class="post-date"><span>15</span>Desember</span>
                <div class="d-flex align-items-center">
                  <i class="bi bi-person"></i> <span class="ps-2">Admin</span>
                </div>
                <span class="px-3 text-black-50">/</span>
                <div class="d-flex align-items-center">
                  <i class="bi bi-folder2"></i> <span class="ps-2">Wisata Alam</span>
                </div>
              </div>

              <h2 class="post-title">Menikmati Keindahan Alam di Desa Bambu Rindu</h2>

              <p>
                Desa Bambu Rindu terletak di Malang, Jawa Timur, dan menawarkan keindahan alam yang luar biasa. Dengan pemandangan hutan bambu yang hijau dan udara sejuk pegunungan, desa ini menjadi tempat yang sempurna untuk menikmati ketenangan alam. Selain itu, desa ini juga memiliki berbagai spot foto yang indah dan sangat cocok untuk aktivitas luar ruangan seperti hiking, bersepeda, dan menikmati suasana alam.
              </p>

              <h3>Tempat yang Wajib Dikunjungi di Desa Bambu Rindu</h3>
              <ul>
                <li><strong>Hutan Bambu Bambu Rindu:</strong> Hutan bambu yang luas dengan jalur trekking yang nyaman dan pemandangan yang menakjubkan.</li>
                <li><strong>Air Terjun Bambu Rindu:</strong> Air terjun yang tersembunyi di tengah hutan, memberikan suasana yang damai dan menyegarkan.</li>
                <li><strong>Area Foto Desa:</strong> Spot foto cantik yang dikelilingi pemandangan alam yang menakjubkan, cocok untuk berfoto bersama keluarga atau teman.</li>
              </ul>

              <h3>Aktivitas yang Bisa Dilakukan</h3>
              <p>
                Desa Bambu Rindu menawarkan berbagai aktivitas alam yang menarik, seperti:
                <ul>
                  <li><strong>Hiking:</strong> Menjelajahi jalur-jalur trekking yang melalui hutan bambu dan menyuguhkan pemandangan alam yang indah.</li>
                  <li><strong>Bersepeda:</strong> Menyusuri jalur-jalur sepeda di sekitar desa yang asri, sambil menikmati udara segar pegunungan.</li>
                  <li><strong>Piknik di Alam Terbuka:</strong> Nikmati waktu santai bersama keluarga atau teman di beberapa titik piknik yang telah disediakan di sepanjang hutan bambu.</li>
                </ul>
              </p>

              <h3>Fasilitas di Desa Bambu Rindu</h3>
              <p>
                Desa Bambu Rindu juga menyediakan berbagai fasilitas untuk kenyamanan pengunjung, seperti:
                <ul>
                  <li><strong>Area Parkir:</strong> Tempat parkir yang luas bagi pengunjung yang membawa kendaraan pribadi.</li>
                  <li><strong>Tempat Istirahat:</strong> Tersedia beberapa gazebo dan tempat duduk di tengah hutan bambu untuk menikmati udara sejuk dan pemandangan alam.</li>
                  <li><strong>Restoran Lokal:</strong> Menyediakan makanan khas daerah yang bisa dinikmati setelah beraktivitas di alam terbuka.</li>
                </ul>
              </p>

              <a href="#" class="readmore stretched-link"><span>Learn More</span><i class="bi bi-arrow-right"></i></a>

            </article>
          </div><!-- End post content -->

          <div class="col-lg-4">
            <aside class="sidebar">
              <div class="widget">
                <h4>Rekomendasi Lainnya</h4>
                <ul class="recent-posts">
                  <li><a href="#">Wisata Alam di Gunung Merapi</a></li>
                  <li><a href="#">Petualangan di Hutan Tropis Kalimantan</a></li>
                  <li><a href="#">Pemandangan Sunset di Bukit Langit</a></li>
                </ul>
              </div>
            </aside>
          </div><!-- End sidebar -->

        </div>
      </div>
    </section><!-- /Blog Post Detail Section -->

  </main>

  @include('layouts.footer')

  @include('layouts.script')

</body>

</html>
