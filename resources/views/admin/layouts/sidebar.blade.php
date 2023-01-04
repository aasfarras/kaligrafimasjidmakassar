<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column mt-2">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/masjid*') ? 'active' : '' }}" href="/admin/masjid">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Nama Masjid
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/bahan*') ? 'active' : '' }}" href="/admin/bahan">
                    <span data-feather="tool" class="align-text-bottom"></span>
                    Alat dan Bahan
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-3 mb-1 text-muted text-uppercase">
            <span>Tambah Data</span>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/tim*') ? 'active' : '' }}" href="/admin/tim">
                    <span data-feather="user" class="align-text-bottom"></span>
                    Anggota Tim
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/dokumentasi*') ? 'active' : '' }}" href="/admin/dokumentasi">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Upload Dokumentasi
                </a>
            </li>
        </ul>
        <div class="position-sticky py-3">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <form action="/keluar" method="post">
                        @csrf
                        <button type="submit" class="nav-link bg-transparent border-0"><span data-feather="log-out" class="align-text-bottom"></span> Keluar</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>