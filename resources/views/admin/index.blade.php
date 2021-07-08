@extends('templates/index')

@section('content')
<div class="container">
  <div class="row">
    <div class="col">
        <h3>{{($data['judul'])}}</h3>
        <!-- Topbar Search -->
        <form action="/barang/cari" method="get"
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
          <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Cari ..." name="cari" 
            aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
          </div>
        </form>

        <a href="/export-barang" class="btn btn-success">Download Laporan</a>

        <table class="table mt-4">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Gambar</th>
                <th scope="col">Nama</th>
                <th scope="col">Harga</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data['barang'] as $barang)
                <tr>
                  <th scope="row">{{$loop->iteration}}</th>
                  <td><img src="/img/{{$barang->gambar}}" alt="" width="90"></td>
                  <td>{{$barang->nama_barang}}</td>
                  <td>{{'Rp '. number_format($barang->harga)}}</td>
                  <td>{{$barang->jumlah}}</td>
                  <td>
                    <a href="/barang/{{$barang->id}}/edit" class="btn btn-primary btn-sm">Edit</a>
                    <a href="/barang/{{$barang->id}}/jual" class="btn btn-success btn-sm">Penjualan</a>
                    <form action="/barang/{{$barang->id}}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan menghapus barang ini?')">Hapus</button>
                    </form>
                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>
          <div class="d-flex justify-content-center">
            {!! $data['barang']->links() !!}
        </div> 
       </div>
    </div>
  </div>
@endsection