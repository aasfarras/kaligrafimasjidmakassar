<section id="team" class="team section-bg">
    <div class="container">

      <div class="section-title">
        <h2 class="fw-bolder text-center mb-4 ha2" style="color: #f09505 ;"> Team</h2>
    <h3 class="fw-bolder text-dark text-center mb-3 ha3">TEAM SANGKUAS</h3>
      </div>

      <div class="row">

        @foreach($tim as $item)
          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start">
              <div class="pic">
                @if($item->foto)
                  <img src="{{  '/'.$item->foto  }}" class="img-fluid" alt="kaligrafi masjid makassar">
                @else
                  <img src="/assets/img/kosong demisioner.png" class="img-fluid" alt="kaligrafi masjid makassar">
                @endif
              </div>
              <div class="member-info">
                <h4>{{  $item->nama  }}</h4>
                <span class="text-dark">{{  $item->posisi  }}</span>
                <div class="social">
                  @if($item->wa)
                    <a href="{{'https://wa.me/'.$item->wa}}" target="_blank"><i class="bi bi-whatsapp"></i></a>
                  @endif
                  @if($item->fb)
                    <a href="{{$item->fb}}" target="_blank"><i class="bi bi-facebook"></i></a>
                  @endif
                  @if($item->ig)
                    <a href="{{'https://www.instagram.com/'.$item->ig}}" target="_blank"><i class="bi bi-instagram"></i></a>
                  @endif
                  @if($item->tt)
                    <a href="{{'https://www.tiktok.com/@'.$item->tt}}" target="_blank"><i class="bi bi-tiktok"></i></a>
                  @endif
                </div>
              </div>
            </div>
          </div>
        @endforeach

      </div>

    </div>
</section>