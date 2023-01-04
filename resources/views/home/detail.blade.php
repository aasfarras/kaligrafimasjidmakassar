<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Kaligrafimasjidmakassar</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link rel="icon" href="/assets/logo/Sangkuas4.png">

  <!-- Favicons -->
  <link href="/assets/img/favicon.png" rel="icon">
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/bootstrap/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">

</head>

<body>

  <main id="main">

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider">
              <div class=" align-items-center">

                <div class="swiper-slide mt-5 pt-5 me-5">
                  <img src="{{'/'.$portofolio->gambar}}" alt="">
                </div>

              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3 style="color:black ;">Project information</h3>
              <ul style="color:black ;">
                <li><strong>Masjid</strong>: {{$portofolio->masjids->nama}}</li>
                <li><strong>Alat dan Bahan</strong>: {{$portofolio->bahans->nama}}</li>
                <li><strong>Tanggal Dimulai</strong>: {{ date('j F Y', strtotime($portofolio->tgl_awal)) }}</li>
                <li><strong>Tanggal Selesai</strong>: {{ date('j F Y', strtotime($portofolio->tgl_akhir)) }}</li>
              </ul>
            </div>
            <div class="portfolio-description">
              <h2 style="color:black ;">This is an example of portfolio detail</h2>
              <p style="color:black ;">
                {{$portofolio->ket}}
              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/assets/bootstrap/bootstrap.bundle.min.js"></script>
\\


  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>

</body>

</html>