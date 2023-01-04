<section id="portfolio" class="portfolio">
  <div class="container">

    <div class="row">
      <div class="col-lg-12 d-flex justify-content-center">
        <ul id="portfolio-flters">
          <li data-filter="*" class="filter-active">All</li>
          @foreach ($masjid as $item)
            <li data-filter=".filter-{{$item->slug}}">{{$item->nama}}</li>
          @endforeach
        </ul>
      </div>
      <div id="pagg" class="col-lg-12 d-flex justify-content-center">
        {{$masjid->links()}}
      </div>
    </div>

    <div class="row portfolio-container">
      @foreach ($portofolio as $item)
        <div class="col-lg-4 col-md-6 portfolio-item filter-{{$item->masjids->slug}}">
          <a href="/detail/{{$item->id}}">
            <div class="portfolio-wrap">
              <img src="{{'/'.$item->gambar}}" class="img-fluid" alt="kaligrafi masjid makassar">
              <div class="portfolio-info">
                <h4>{{$item->masjids->nama}}</h4>
                <p>{{$item->bahans->nama}}</p>
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </div>

  </div>
</section>