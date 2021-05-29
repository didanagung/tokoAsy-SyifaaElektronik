@extends('templates/index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h3 class="mb-4">{{$data['judul']}}</h3>
        </div>
    </div>
</div>
    <div class="container">
        <div class="row">
                <!-- Earnings (Monthly) Card Example -->
                @foreach ($data['barang'] as $barang)
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        </div>
                                        <div class="h6 mb-0 font-weight-bold text-gray-800">{{$barang->nama_barang}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <img src="/img/{{$barang->gambar}}" alt="" width="90">
                                    </div>
                                </div>
                            </div>
                            <div class="col"><a href="#" data-toggle="modal" data-target="#exampleModal-{{$barang->id}}">Detail <i class="fas fa-arrow-circle-right"></i></a></div>
                        </div>
                    </div>
                @endforeach

                

@foreach ($data['barang'] as $item)
  <!-- Modal -->
  <div class="modal fade" id="exampleModal-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Barang</h5>
        </div>
        <div class="modal-body">
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="/img/{{$item->gambar}}" class="card-img" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">{{$item->nama_barang}}</h5>
                  <p class="card-text">Harga : Rp. {{number_format($item->harga)}}</p>
                  <p class="card-text">Jumlah : {{$item->jumlah}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>      
  @endforeach
        </div>
        <div class="d-flex justify-content-center">
          {!! $data['barang']->links() !!}
      </div>
    </div>
@endsection