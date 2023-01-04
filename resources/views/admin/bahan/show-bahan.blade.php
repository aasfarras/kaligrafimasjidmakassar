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
            <h4>{{$bahan->nama}}</h4>
            <table class="table table-striped table-sm table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Masjid</th>
                        <th scope="col">Tanggal Mulai</th>
                        <th scope="col">Tanggal Selesai</th>
                        <th scope="col">Ket</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($portofolio as $item)
                        <tr>
                            <td>{{ $portofolio->firstItem()+$loop->index }}</td>
                            <td>{{ date('j F Y', strtotime($item->tgl_awal)) }}</td>
                            <td>{{ date('j F Y', strtotime($item->tgl_akhir)) }}</td>
                            <td>{{ $item->masjids->nama }}</td>
                            <td>
                                <a href="/admin/dokumentasi/{{ $item->id }}/edit" class="badge bg-warning"><span data-feather="edit-2"></span></a>
                                <form action="/admin/dokumentasi/{{ $item->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0" onclick="return confirm('Hapus Dokumentasi\nMasjid ({{ $item->masjids->nama }})\nAlat dan Bahan ({{$item->bahans->nama}})?')"><span data-feather="trash-2"></span></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $portofolio->links() }}
        </div>
    </main>
@endsection