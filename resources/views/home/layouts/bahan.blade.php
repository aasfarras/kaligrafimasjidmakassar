<section style="background-color:#f8f9fa ;" id="features" class="features mb-3">
    <div class="container mb-5">

        <h2 class="fw-bolder text-center mb-5 ha2" id="bahan" style="color: #f09505 ;"> Bahan-Bahan yang di gunakan</h2>

      <div class="row">
        <div class="col-lg-3">
          <ul class="nav nav-tabs flex-column">
            @foreach ($bahan as $item)
              <li class="nav-item">
                <a class="nav-link @if($loop->iteration == 1) active show @endif" data-bs-toggle="tab" href="#tab-{{$item->id}}">{{$item->nama}}</a>
              </li>
            @endforeach
          </ul>
        </div>
        <div class="col-lg-9 mt-4 mt-lg-0">
          <div class="tab-content">
            @foreach ($bahan as $item)
              <div class="tab-pane @if($loop->iteration == 1) active show @endif" id="tab-{{$item->id}}">
                <div class="row">
                  @foreach ($portofolio as $foto)
                  @if($foto->bahan_id == $item->id)
                    <div class="col-lg-4 col-md-6 portfolio-item">
                      <a href="/detail/{{$foto->id}}">
                        <div class="portfolio-wrap">
                          <img src="{{'/'.$foto->gambar}}" class="img-fluid" alt="kaligrafi masjid makassar">
                          <div class="portfolio-info">
                          </div>
                        </div>
                      </a>
                    </div>
                  @endif
                  @endforeach
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>

    </div>  
</section>