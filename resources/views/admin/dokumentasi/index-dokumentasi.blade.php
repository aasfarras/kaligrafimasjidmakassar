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
            <h4>Tambah Dokumentasi</h4>
            <form action="/admin/dokumentasi" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-lg-7 my-3">
                    <label for="Masjid" class="form-label">Masjid</label>
                    <select name="masjid_id" class="form-control" required>
                        <option value="" hidden>Pilih Masjid</option>
                        @foreach ($masjid as $item)
                            <option value="{{$item->id}}" @if(old('masjid_id')==$item->id)selected @endif>{{$item->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-7 my-3">
                    <label for="Alat dan Bahan" class="form-label">Alat dan Bahan</label>
                    <select name="bahan_id" class="form-control" required>
                        <option value="" hidden>Pilih Alat dan Bahan</option>
                        @foreach ($bahan as $item)
                            <option value="{{$item->id}}" @if(old('bahan_id')==$item->id)selected @endif>{{$item->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-7 my-3">
                    <div class="row">
                        <div class="col-lg-6 my-3">
                            <label for="Tanggal Mulai" class="form-label">Tanggal Mulai</label>
                            <input type="date" name="tgl_awal" class="form-control @error('tgl_awal') is-invalid @enderror" value="{{old('tgl_awal')}}" required>
                            @error('tgl_awal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6 my-3">
                            <label for="Tanggal Selesai" class="form-label">Tanggal Selesai</label>
                            <input type="date" name="tgl_akhir" class="form-control @error('tgl_akhir') is-invalid @enderror" value="{{old('tgl_akhir')}}" required>
                            @error('tgl_akhir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 my-3">
                    <textarea class="form-control" name="ket" rows="5" placeholder="Keterangan Dokumentasi" required>{{ old('ket') }}</textarea>
                </div>
                <div class="col-lg-7">
                    <label for="Dokumentasi" class="form-label">Dokumentasi</label>
                    <img class="img-preview img-fluid my-3 col-sm-7 d-block">
                    <input type="file" id="foto" name="gambar" class="form-control @error('gambar') is-invalid @enderror" onchange="preview()" required>
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-dark mt-3">Tambah Dokumentasi</button>
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