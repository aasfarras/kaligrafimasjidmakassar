<section id="breadcrumbs" class="breadcrumbs text-secondary">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>
                @if(Request::is('about*'))About
                @elseif(Request::is('services*'))Services
                @elseif(Request::is('portofolio*'))Portofolio
                @elseif(Request::is('contact*'))Contact
                @endif
            </h2>
            <ol>
            <li><a href="index.html">Home</a></li>
            <li>
                @if(Request::is('about*'))About
                @elseif(Request::is('services*'))Services
                @elseif(Request::is('portofolio*'))Portofolio
                @elseif(Request::is('contact*'))Contact
                @endif
            </li>
            </ol>
        </div>

    </div>
</section>