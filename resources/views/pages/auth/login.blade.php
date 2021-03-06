@extends('layouts/template')

@section('content-pager')
    
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                    </div>
                    <form class="user" action="{{ route('login')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                            id="exampleInputEmail" aria-describedby="emailHelp" autofocus
                            placeholder="Alamat Email">
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                            id="exampleInputPassword" placeholder="Kata Sandi">
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Masuk
                        </button>
                        <hr>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="/register">Buat Akun!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
