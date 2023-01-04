@extends('admin.layouts.main')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        @if (session()->has('message'))
            <div class="alert alert-info alert-dismissible fade show mt-4" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="center mt-4">
            <h4>Tambah Masjid</h4>
            <form action="/admin/masjid" method="post">
                @csrf
                <label for="Nama Masjid" class="form-label">Nama Masjid</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama Masjid" name="nama" value="{{ old('nama') }}" required>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-dark mt-3">Tambah Masjid</button>
            </form>
        </div>
        <div class="table-responsive mt-4">
            <h4>Masjid</h4>
            <div class="my-3">
                <form class="d-flex">
                    <input class="form-control" type="text" name="search" value="{{ $search }}" placeholder="Cari Masjid" aria-label="Search">
                    <button class="btn btn-outline-dark" type="submit">Cari</button>
                </form>
            </div>
            <table class="table table-striped table-sm table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Ket</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($masjid as $item)
                        <tr>
                            <td>{{ $masjid->firstItem()+$loop->index }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>
                                <a href="/admin/masjid/{{ $item->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
                                <a href="/admin/masjid/{{ $item->slug }}/edit" class="badge bg-warning"><span data-feather="edit-2"></span></a>
                                <form action="/admin/masjid/{{ $item->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0" onclick="return confirm('Hapus Masjid ({{ $item->nama }})?')"><span data-feather="trash-2"></span></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $masjid->links() }}
        </div>
    </main>
@endsection