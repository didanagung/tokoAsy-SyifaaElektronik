@extends('templates/index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-7">
            <h1 class="mb-4">{{$data['judul']}}</h1>

            <form action="/barang/{{$data['barang']->id}}/update" method="post" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="form-group">
                      <label for="nama_barang">Nama Barang</label>
                      <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang" placeholder="Masukkan nama barang..." value="{{ old('nama_barang') ? old('nama_barang') : $data['barang']->nama_barang }}">
                      @error('nama_barang')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="harga">Harga</label>
                      <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" min="0" placeholder="Harga tidak boleh menggunakan titik (.) atau koma (,)" value="{{ old('harga') ? old('harga') : $data['barang']->harga }}">
                      @error('harga')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="jumlah">Jumlah</label>
                      <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" min="0" placeholder="Jumlah stok barang yang tersedia" value="{{ old('jumlah') ? old('jumlah') : $data['barang']->jumlah }}">
                      @error('jumlah')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group row">
                        <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-2">
                            <img src="/img/{{$data['barang']->gambar}}" class="img-thumbnail img-preview">
                        </div>
                        <div class="col-sm-8">
                            <div class="mb-3">
                                <label for="gambar" class="form-label "><b>{{$data['barang']->gambar}}</b></label>
                                <input class="form-control-file is-invalid" type="file" id="gambar" name="gambar" onchange="previewImage()">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                  </form>
        </div>
    </div>
</div>
@endsection