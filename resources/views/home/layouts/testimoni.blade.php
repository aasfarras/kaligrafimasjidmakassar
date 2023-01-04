<section id="testimonials" class="testimonials">
    
    <div class="section-title">
      <h2 class="fw-bolder text-center mb-3 ha2" style="color: #f09505 ;">Testimoni</h2>
    </div>

    <div class="container text-dark">

        <div class="row">

          @foreach ($feedback as $item)
            @if ($item->tampil)
                <div class="col-lg-6">
                  <div class="testimonial-item">
                    @if ($item->gambar)
                      <img src="{{ "/".$item->gambar }}" class="testimonial-img" title="{{ $item->nama }}" alt="kaligrafi masjid makassar">
                    @else
                      <img src="/assets/img/kosong demisioner.png" class="testimonial-img" title="{{ $item->nama }}" alt="kaligrafi masjid makassar">
                    @endif
                    <h3>{{ $item->nama }}</h3>
                    <h4>{{ $item->jabatan }}</h4>
                    <p>
                      <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                      {{ $item->isi }}
                      <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                  </div>
                </div>
            @endif
          @endforeach

          {{ $feedback->links() }}

        </div>

    </div>
</section>