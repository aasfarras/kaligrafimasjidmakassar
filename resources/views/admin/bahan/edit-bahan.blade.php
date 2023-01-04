@extends('admin.layouts.main')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="center mt-4">
            <h4>Edit Alat dan Bahan</h4>
            <form action="/admin/bahan/{{ $item->id }}" method="post">
                @method('put')
                @csrf
                <label for="Nama Alat dan Bahan" class="form-label">Nama Alat dan Bahan</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama Alat dan Bahan" name="nama" value="{{ old('nama', $item->nama) }}" required>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-dark mt-3">Edit Alat dan Bahan</button>
            </form>
        </div>
    </main>
@endsection