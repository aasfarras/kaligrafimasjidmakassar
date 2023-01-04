<header id="header" class=" accordion align-items-center position-fixed top-0 w-100" >
    <div class="container d-flex w-100 align-items-center">

        <img src="/assets/logo/sangkuas4.png" class="me-auto logo" width="14%"  alt="kaligrafi masjid makassar">

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="fw-bolder {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a></li>   
          <li><a class="fw-bolder {{ Request::is('about*') ? 'active' : '' }}" href="/about">About</a></li>
          <li><a class="fw-bolder {{ Request::is('services*') ? 'active' : '' }}" href="/services">Services</a></li>
          <li><a class="fw-bolder {{ Request::is('portofolio*') ? 'active' : '' }}" href="/portofolio">Portfolio</a></li>
          <li><a class="fw-bolder {{ Request::is('contact*') ? 'active' : '' }}" href="/contact">Contact</a></li>
          <li><a href="https://wa.me/082293124828" target="_blank" class="button-navbar p-2 pe-3" style="color:black ;" ><i class="me-1 bi bi-whatsapp"></i>082293124828</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
</header>