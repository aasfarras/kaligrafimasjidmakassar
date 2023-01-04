@extends('admin.layouts.main')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="center mt-4">
            <h4>Edit Masjid</h4>
            <form action="/admin/masjid/{{ $item->id }}" method="post">
                @method('put')
                @csrf
                <label for="Nama Masjid" class="form-label">Nama Masjid</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama Masjid" name="nama" value="{{ old('nama', $item->nama) }}" required>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-dark mt-3">Edit Masjid</button>
            </form>
        </div>
    </main>
@endsection