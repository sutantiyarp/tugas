
<!DOCTYPE html>
<html lang="en">

@include('layouts.header')

<body class="testimonials-page">


@include('layouts.navbar')

  <main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(assets/img/page-title-bg.webp);">
      <div class="container position-relative">
        <h1>Testimoni</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="/">Beranda</a></li>
            <li class="current">Testimoni</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Testimonials Section -->
    <section class="testimonials-12 testimonials section" id="testimonials">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>TESTIMONI</h2>
        <p>Dari beberapa pengguna platform kami</p>
      </div><!-- End Section Title -->

      <div class="testimonial-wrap">
        <div class="container">
          <div class="row">
            <div class="col-md-6 mb-4 mb-md-4">
              <div class="testimonial">
                <img src="assets/img/testimonials/testimonials-1.jpg" alt="Testimonial author">
                <blockquote>
                  <p>
                    “Saya sangat terkesan dengan pengalaman saya di Desa Bambu Rindu. 
                    Suasana alamnya sangat menenangkan dan cocok untuk melepaskan penat.
                     Selain itu, penduduk lokalnya sangat ramah. Saya pasti akan kembali ke sini!”
                  </p>
                </blockquote>
                <p class="client-name">Ari Pratama, Surabaya</p>
              </div>
            </div>
            <div class="col-md-6 mb-4 mb-md-4">
              <div class="testimonial">
                <img src="assets/img/testimonials/testimonials-2.jpg" alt="Testimonial author">
                <blockquote>
                  <p>
                    “JejakDesa memberikan informasi yang sangat berguna 
                    mengenai desa wisata di berbagai daerah. Saya menemukan 
                    Desa Air Jernih di Sleman berkat platform ini, 
                    dan itu menjadi pengalaman liburan terbaik saya!”
                  </p>
                </blockquote>
                <p class="client-name">Siti Nurul, Yogyakarta</p>
              </div>
            </div>
            <div class="col-md-6 mb-4 mb-md-4">
              <div class="testimonial">
                <img src="assets/img/testimonials/testimonials-3.jpg" alt="Testimonial author">
                <blockquote>
                  <p>
                    “Sebagai pencinta alam, saya selalu mencari tempat wisata 
                    yang belum banyak diketahui orang. JejakDesa membantu saya 
                    menemukan tempat-tempat baru yang menakjubkan, 
                    salah satunya adalah Desa Bambu Rindu. Wajib dikunjungi!”
                  </p>
                </blockquote>
                <p class="client-name">Rina Anggraini, Bali</p>
              </div>
            </div>
            <div class="col-md-6 mb-4 mb-md-4">
              <div class="testimonial">
                <img src="assets/img/testimonials/testimonials-4.jpg" alt="Testimonial author">
                <blockquote>
                  <p>
                    “Sangat puas dengan layanan dan informasi yang diberikan oleh JejakDesa. 
                    Website ini sangat membantu dalam merencanakan perjalanan saya, termasuk 
                    memberikan info detail 
                    tentang desa wisata yang jarang diketahui banyak orang”
                  </p>
                </blockquote>
                <p class="client-name">Budi Santoso, Bandung</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /Testimonials Section -->

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section light-background">

      <div class="content">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6">
              <h3>Subscribe To Our Newsletter</h3>
              <p class="opacity-50">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Nesciunt, reprehenderit!
              </p>
            </div>
            <div class="col-lg-6">
              <form action="forms/newsletter.php" class="form-subscribe php-email-form">
                <div class="form-group d-flex align-items-stretch">
                  <input type="email" name="email" class="form-control h-100" placeholder="Enter your e-mail">
                  <input type="submit" class="btn btn-secondary px-4" value="Subcribe">
                </div>
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">
                  Your subscription request has been sent. Thank you!
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /Call To Action Section -->

  </main>

  @include('layouts.footer')

  @include('layouts.script')
</body>

</html>