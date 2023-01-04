@extends('admin.layouts.main')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="center mt-4">
            <h4>Edit Anggota Tim</h4>
            <form action="/admin/tim/{{ $tim->id }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="col-lg-7 my-3">
                    <label for="Nama Lengkap" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama Lengkap" name="nama" value="{{ old('nama', $tim->nama) }}" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-7 my-3">
                    <label for="Posisi di Tim" class="form-label">Posisi di Tim</label>
                    <input type="text" class="form-control @error('posisi') is-invalid @enderror" placeholder="Masukkan Posisi di Tim" name="posisi" value="{{ old('posisi', $tim->posisi) }}" required>
                    @error('posisi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-7">
                    <label for="Foto" class="form-label">Foto</label>
                    <img src="{{ "/".$tim->foto }}" class="img-preview img-fluid my-3 col-sm-7 d-block">
                    <input type="file" id="foto" name="foto" class="form-control @error('foto') is-invalid @enderror" onchange="preview()">
                    @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <h5 class="mt-4">Sosial Media Yang Digunakan</h5>
                <div class="col-lg-7 my-3">
                    <label for="Nomor WhatsApp" class="form-label">WhatsApp</label>
                    <input type="text" class="form-control @error('wa') is-invalid @enderror" placeholder="6282293124828" name="wa" value="{{ old('wa', $tim->wa) }}">
                    @error('wa')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-7 my-3">
                    <label for="Link Facebook" class="form-label">Facebook</label>
                    <input type="text" class="form-control @error('fb') is-invalid @enderror" placeholder="https://www.facebook.com/aas.farras" name="fb" value="{{ old('fb', $tim->fb) }}">
                    @error('fb')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-7 my-3">
                    <label for="Username Instagram" class="form-label">Instagram</label>
                    <input type="text" class="form-control @error('ig') is-invalid @enderror" placeholder="kaligrafimasjidmakassar_" name="ig" value="{{ old('ig', $tim->ig) }}">
                    @error('ig')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-7 my-3">
                    <label for="Username Tiktok" class="form-label">Tiktok</label>
                    <input type="text" class="form-control @error('tt') is-invalid @enderror" placeholder="kaligrafimasjidmakassar" name="tt" value="{{ old('tt', $tim->tt) }}">
                    @error('tt')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-dark mt-3">Edit Anggota Tim</button>
            </form>
        </div>
    </main>

    <script>
        function preview() {
            const image = document.querySelector('#foto');
            const imgPreview = document.querySelector('.img-preview');
            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        };
    </script>
@endsection