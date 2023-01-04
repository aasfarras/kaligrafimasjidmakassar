@extends('admin.layouts.main')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        @if (session()->has('message'))
            <div class="alert alert-info alert-dismissible fade show mt-4" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="mt-4">
            <form class="d-flex">
                <input class="form-control" type="text" name="search" value="{{ $search }}" placeholder="Cari Feedback" aria-label="Search">
                <button class="btn btn-outline-dark" type="submit">Cari</button>
            </form>
        </div>
        <div class="table-responsive mt-4">
            <table class="table table-striped table-sm table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jabatan dan Perusahaan</th>
                        <th scope="col">Isi</th>
                        <th scope="col">Ket</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($feedback as $item)
                        <tr>
                            <td>{{ $feedback->firstItem()+$loop->index }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->jabatan }}</td>
                            <td>{{ $item->isi }}</td>
                            <td>
                                <form action="/feedback/{{ $item->id }}" method="post" class="d-inline">
                                    @method('put')
                                    @csrf
                                        @if ($item->tampil == 0)
                                            <input type="checkbox" name="tampil" value="1" checked hidden>
                                            <button type="submit" class="btn btn-primary btn-sm px-1" style="font-size: 17px">Tampilkan</button>
                                        @else
                                            <input type="checkbox" name="tampil" value="0" checked hidden>
                                            <button type="submit" class="btn btn-primary btn-sm px-1 py-2" style="font-size: 13px">Sembunyikan</button>
                                        @endif
                                </form>
                                <form action="/feedback/{{ $item->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-sm px-1 py-2" onclick="return confirm('Hapus Feedback ({{ $item->nama }})?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $feedback->links() }}
        </div>
    </main>
@endsection