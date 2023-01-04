<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 p-3 fs-6" href="/admin">Sang Kuas</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    {{-- <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search"> --}}
    <span class="text-white col-md-3 col-lg-2 me-auto ms-4 p-1 fs-4" style="pointer-events: none" href="#">
        @if (Request::is('admin/masjid*'))
            Masjid
        @elseif (Request::is('admin/bahan*'))
            Alat dan Bahan
        @elseif (Request::is('admin/tim*'))
            Anggota Tim
        @elseif (Request::is('admin/dokumentasi*'))
            Dokumentasi
        @else
            Feedback
        @endif
    </span>
</header>