@extends('templates/index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-7">
            <h1 class="mb-4">{{$data['judul']}}</h1>

            <form action="/penjualan" method="post">
                    @csrf
                      <div class="form-group row">
                        <label for="nama_barang" class="col-sm-4 col-form-label">Nama Barang</label>
                        <div class="col-sm-8">
                          <input type="text" readonly class="form-control-plaintext" id="nama_barang" name="nama_barang" value="{{$data['penjualan']->nama_barang}}">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="Jumlah" class="col-sm-4 col-form-label">Tersedia</label>
                        <div class="col-sm-8">
                          <input type="text" readonly class="form-control-plaintext" id="Jumlah" name="Jumlah" value="{{$data['penjualan']->jumlah}}">
                        </div>
                      </div>

                      
                      <div class="form-group row">
                          <label for="terjual" class="col-sm-4 col-form-label">Terjual</label>
                          <div class="col-sm-8">
                              <input type="number" class="form-control" id="terjual" name="terjual" min="0" max="{{$data['penjualan']->jumlah}}">
                            </div>
                            @error('terjual')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        
                        <div class="form-group row">
                            <label for="tanggal" class="col-sm-4 col-form-label">Tanggal</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="tanggal" name="tanggal">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                          {{-- <label for="barang_id" class="col-sm-4 col-form-label">Tersedia</label> --}}
                          <div class="col-sm-8">
                            <input type="hidden" readonly class="form-control-plaintext" id="barang_id" name="barang_id" value="{{$data['penjualan']->id}}">
                          </div>
                        </div>
                    
                    <button type="submit" class="btn btn-primary">Tambah</button>
                  </form>
        </div>
    </div>
</div>
@endsection