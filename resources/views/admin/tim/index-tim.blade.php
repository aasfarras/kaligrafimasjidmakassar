@extends('admin.layouts.main')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        @if (session()->has('message'))
            <div class="alert alert-info alert-dismissible fade show mt-4" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="table-responsive mt-4">
            <h4>Tim</h4>
            <a href="/admin/tim/create" class="btn btn-dark mt-3">Tambah Anggota Tim</a>
            <div class="my-3">
                <form class="d-flex">
                    <input class="form-control" type="text" name="search" value="{{ $search }}" placeholder="Cari Tim" aria-label="Search">
                    <button class="btn btn-outline-dark" type="submit">Cari</button>
                </form>
            </div>
            <table class="table table-striped table-sm table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Posisi</th>
                        <th scope="col">Ket</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tim as $item)
                        <tr>
                            <td>{{ $tim->firstItem()+$loop->index }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->posisi }}</td>
                            <td>
                                <a href="/admin/tim/{{ $item->slug }}/edit" class="badge bg-warning"><span data-feather="edit-2"></span></a>
                                <form action="/admin/tim/{{ $item->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0" onclick="return confirm('Hapus Tim ({{ $item->nama }})?')"><span data-feather="trash-2"></span></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $tim->links() }}
        </div>
    </main>
@endsection