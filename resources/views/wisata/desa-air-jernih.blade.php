<!DOCTYPE html>
<html lang="en">

@include('layouts.header')

<body class="blog-page">

@include('layouts.navbar')

  <main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url({{ asset('assets/img/page-title-bg.webp') }});">
        <div class="container position-relative">
        <h1>Detail Wisata Desa Air Jernih</h1>
        <nav class="breadcrumbs">
          {{-- <ol>
            <li><a href="/">Beranda</a></li>
            <li><a href="/rekomendasi">Rekomendasi</a></li>
            <li class="current">Detail Desa Air Jernih</li>
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
                <img src="assets/img/blog/air-jernih.jpg" class="img-fluid" alt="Desa Air Jernih">
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

              <h2 class="post-title">Menikmati Keindahan Alam di Desa Air Jernih</h2>

              <p>
                Desa Air Jernih terletak di Sleman, Yogyakarta, dan dikenal dengan keindahan alamnya yang memukau. Desa ini dikelilingi oleh pegunungan dan hutan tropis yang memberikan pemandangan menakjubkan. Air terjun dan aliran sungai yang jernih menjadikan desa ini destinasi wisata alam yang ideal untuk beristirahat, hiking, bersepeda, atau sekadar menikmati suasana alami yang damai.
              </p>

              <h3>Tempat yang Wajib Dikunjungi di Desa Air Jernih</h3>
              <ul>
                <li><strong>Air Terjun Air Jernih:</strong> Air terjun yang menakjubkan dengan pemandangan yang indah dan udara segar.</li>
                <li><strong>Danau Desa:</strong> Danau alami dengan air yang jernih, cocok untuk berenang atau hanya menikmati keindahan alam sekitar.</li>
                <li><strong>Jembatan Gantung Desa:</strong> Jembatan gantung dengan pemandangan spektakuler dari atas lembah desa.</li>
              </ul>

              <h3>Aktivitas yang Bisa Dilakukan</h3>
              <p>
                Desa Air Jernih menawarkan berbagai aktivitas luar ruangan, seperti:
                <ul>
                  <li><strong>Hiking:</strong> Menjelajahi jalur trekking yang membawa Anda ke puncak desa dengan pemandangan alam yang luar biasa.</li>
                  <li><strong>Bersepeda:</strong> Menyusuri jalur-jalur alam dengan sepeda untuk menikmati suasana alam yang segar.</li>
                  <li><strong>Piknik di Tepi Danau:</strong> Nikmati waktu santai bersama keluarga atau teman di tepi danau yang indah.</li>
                </ul>
              </p>

              <h3>Fasilitas di Desa Air Jernih</h3>
              <p>
                Desa Air Jernih menyediakan berbagai fasilitas untuk kenyamanan pengunjung, seperti:
                <ul>
                  <li><strong>Area Parkir:</strong> Tersedia area parkir yang luas untuk pengunjung yang membawa kendaraan pribadi.</li>
                  <li><strong>Tempat Istirahat:</strong> Terdapat gazebo dan tempat duduk di beberapa titik strategis untuk menikmati pemandangan.</li>
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
