@extends('home.layouts.main')

@section('content')
    <!-- -----------------------navbar--------------------------- -->
    @include('home.layouts.navbar')
    <!-- -----------------------------navbar end------------------------ -->
    
  <main id="main">

    <!-- breadcumber -->
    @include('home.layouts.breadcumber')
    <!-- breadcumber end -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">
  
          <div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.7273166431883!2d119.43876891433091!3d-5.147527853473647!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbee382a66c9d6d%3A0xa8fda4b9b9d43736!2sKaligrafi%20Masjid%20Makassar!5e0!3m2!1sid!2sid!4v1670102057222!5m2!1sid!2sid" style="border:0; width:100%; height:270px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
  
          <div class="row mt-5">
  
            <div class="col-lg-4">
              <div class="info">
                <div class="address">
                  <i class="bi bi-geo-alt"></i>
                  <h4>Location:</h4>
                  <p class="col-lg-11"><a style="color: grey" href="https://goo.gl/maps/bVipAAz7krTZ72GX9" target="_blank">Jl. A. P. Pettarani III No.25, RT.001/RW.13, Tamamaung, Kec. Panakkukang, Kota Makassar, Sulawesi Selatan 90231</a></p>
                </div>
  
                <div class="email">
                  <i class="bi bi-envelope"></i>
                  <h4>Email:</h4>
                  <p class="col-lg-11"> <a style="color: grey" href="https://wa.me/082293124828" target="blank">sangkuasart@gmail.com</a></p>
                </div>
  
                <div class="phone">
                  <i class="bi bi-phone"></i>
                  <h4>Call:</h4>
                  <p class="col-lg-11"><a style="color: grey" href="https://mail.google.com/mail/u/0/#inbox?compose=GTvVlcSMTFFGprlXdsFJrfrxGWvNBtqmGcQGfwCMrnBLsMJtdDLSnltKlGwKNrqrTPkkDfPhPHHQZ" target="blank">082293124828</a></p>
                </div>
  
              </div>
  
            </div>
  
            <div class="col-lg-8 mt-3 mt-lg-0 pt-lg-0">

              @if (session()->has('message'))
                  <div class="alert alert-info alert-dismissible fade show mt-4" role="alert">
                      {{ session('message') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
              @endif
  
              <form action="/feedback" method="post" role="form" class="php-email-form" enctype="multipart/form-data">
                @csrf
                <div class="mt-0 pt-0 mb-3">
                    <img class="img-preview img-fluid mt-0 mb-3 col-sm-7 d-block" style="width: 15%;">
                    <label for="Foto" style="color: black">Foto(Optional)</label>
                    <input class="form-control @error('gambar') is-invalid @enderror pb-4" type="file" id="gambar" name="gambar" onchange="preview()" style="height: 15px;">
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <input type="text" name="nama" class="form-control" id="name" placeholder="Nama Panjang" value="{{ old('nama') }}" required>
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                        <input type="text" class="form-control" name="jabatan" id="email" placeholder="Nama Jabatan" value="{{ old('jabatan') }}" required>
                    </div>
                </div>
                <div class="form-group my-3">
                    <textarea class="form-control" name="isi" rows="5" placeholder="Isi Feedback" required>{{ old('isi') }}</textarea>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
              </form>
  
            </div>
  
          </div>
  
        </div>
    </section>
    <!-- End Contact Section -->

  </main>
    
  <!-- --------------------------------Footer------------------------------------ -->
  @include('home.layouts.footer')
  <!-- --------------------------------Footer end-------------------------------- -->
@endsection

@section('js')
    <script>
        function preview() {
            const image = document.querySelector('#gambar');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        };
    </script>
@endsection