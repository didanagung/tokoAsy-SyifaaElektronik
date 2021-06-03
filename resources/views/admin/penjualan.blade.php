@extends('templates/index')

@section('content')
<div class="container">
  <div class="row">
    <div class="col">
        <h3>{{($data['judul'])}}</h3>
        <table class="table mt-4">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Terjual</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data['penjualan'] as $penjualan)
                <tr>
                  <th scope="row">{{$loop->iteration}}</th>
                  <td>{{$penjualan->tanggal}}</td>
                  <td>{{$penjualan->barang->nama_barang}}</td>
                  <td>{{$penjualan->terjual}}</td>
                  <td>
                    {{-- <a href="/barang/{{$penjualan->id}}/edit" class="btn btn-primary btn-sm">Edit</a> --}}
                    <a href="/barang/{{$penjualan->id}}/jual" class="btn btn-danger btn-sm">Hapus</a>
                    {{-- <form action="/barang/{{$barang->id}}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan menghapus barang ini?')">Hapus</button>
                    </form> --}}
                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>
          {{-- <div class="d-flex justify-content-center">
            {!! $data['barang']->links() !!}
        </div>  --}}
       </div>
    </div>
  </div>
@endsection