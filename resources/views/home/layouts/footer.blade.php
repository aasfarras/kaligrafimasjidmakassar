<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-5 col-md-12">
            <div class="footer-info">
                <img src="/assets/logo/sangkuas4.png" class="me-auto logo" width="50%"  alt="kaligrafi masjid makassar">
              <p class="fw-bolder" style="text-align: justify;">
                Kami memiliki banyak pengalaman membuat kaligrafi di berbagai masjid menjadikan kami pilihan tepat untuk anda. Kami selalu berusaha untuk tidak menghilangkan detail penting di setiap area 
              </p>
              <div class="social-links mt-3">
                <a href="https://www.youtube.com/@sangkuaskaligrafiart4977" target="_blank class="twitter"><i class="bi bi-youtube"></i></i></a>
                <a href="https://web.facebook.com/sangkuaskaligrafi" target="_blank class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/kaligrafimasjidmakassar_/" target="_blank class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="https://www.tiktok.com/@kaligrafimasjidmakassar" target="_blank class="google-plus"><i class="bi bi-tiktok"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Pelayanan Kami</h4>
            <ul>
              @foreach ($bahan as $item)
                <li class="nav-item">
                  <i class="bi bi-caret-right"></i>
                  <a class="text-light" href="/services#bahan">{{$item->nama}}</a>
                </li>
              @endforeach
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Hubungi Kami</h4>
            <div class="row">
                <i class="bi bi-geo-alt col-lg-1 mt-2"></i>
                <p class="col-lg-11"><a style="color: white" href="https://goo.gl/maps/bVipAAz7krTZ72GX9" target="_blank">Jl. A. P. Pettarani III No.25, RT.001/RW.13, Tamamaung, Kec. Panakkukang, Kota Makassar, Sulawesi Selatan 90231</a></p>
            </div>
            <div class="row">
                <i class="bi bi-envelope col-lg-1""></i>
                <p class="col-lg-11"> <a style="color: white" href="https://wa.me/082293124828" target="blank">sangkuasart@gmail.com</a></p>
            </div>
            <div class="row">
                <i class="bi bi-telephone col-lg-1""></i>
            </div>

          </div>

        </div>
      </div>
    </div>
      </div>
    </div>
</footer>