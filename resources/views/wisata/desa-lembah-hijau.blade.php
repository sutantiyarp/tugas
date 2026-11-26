<!DOCTYPE html>
<html lang="en">

@include('layouts.header')

<body class="blog-page">

@include('layouts.navbar')

  <main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url({{ asset('assets/img/page-title-bg.webp') }});">
        <div class="container position-relative">
        <h1>Detail Wisata Lembah Hijau</h1>
        <nav class="breadcrumbs">
          {{-- <ol>
            <li><a href="/">Beranda</a></li>
            <li><a href="/rekomendasi">Rekomendasi</a></li>
            <li class="current">Detail Lembah Hijau</li>
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
                <img src="assets/img/blog/lemabah-hijau.jpg" class="img-fluid" alt="Lembah Hijau">
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

              <h2 class="post-title">Menikmati Keindahan Alam di Lembah Hijau</h2>

              <p>
                Lembah Hijau adalah sebuah destinasi wisata yang terletak di tengah hutan tropis dengan panorama alam yang memukau. Terkenal dengan pemandangan hijau yang menenangkan, Lembah Hijau menjadi tempat yang sempurna untuk beristirahat dan melepaskan penat dari rutinitas sehari-hari. Di sini, pengunjung bisa menikmati udara segar, aliran sungai yang jernih, serta menikmati aktivitas alam seperti hiking, bersepeda, dan piknik.
              </p>

              <h3>Tempat yang Wajib Dikunjungi di Lembah Hijau</h3>
              <ul>
                <li><strong>Air Terjun Lembah Hijau:</strong> Air terjun yang indah dengan suara gemericik air yang menenangkan.</li>
                <li><strong>Danau Alam Lembah:</strong> Danau alami dengan air jernih yang ideal untuk berenang atau sekadar menikmati keindahan alam sekitar.</li>
                <li><strong>Jembatan Gantung Lembah Hijau:</strong> Jembatan gantung yang menawarkan pemandangan spektakuler dari atas lembah.</li>
              </ul>

              <h3>Aktivitas yang Bisa Dilakukan</h3>
              <p>
                Lembah Hijau menawarkan berbagai aktivitas menarik bagi pengunjung, di antaranya:
                <ul>
                  <li><strong>Hiking:</strong> Trekking menuju puncak lembah yang memberikan pemandangan alam yang luar biasa.</li>
                  <li><strong>Bersepeda:</strong> Menyusuri jalur-jalur alam dengan sepeda untuk menikmati suasana lembah yang asri.</li>
                  <li><strong>Piknik di Tepi Danau:</strong> Nikmati waktu bersantai bersama keluarga atau teman di tepi danau yang indah.</li>
                </ul>
              </p>

              <h3>Fasilitas di Lembah Hijau</h3>
              <p>
                Lembah Hijau menyediakan berbagai fasilitas untuk kenyamanan pengunjung, seperti:
                <ul>
                  <li><strong>Area Parkir:</strong> Tersedia tempat parkir yang luas bagi pengunjung yang membawa kendaraan pribadi.</li>
                  <li><strong>Tempat Istirahat:</strong> Tersedia gazebo dan tempat duduk di beberapa titik strategis untuk bersantai menikmati pemandangan.</li>
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
