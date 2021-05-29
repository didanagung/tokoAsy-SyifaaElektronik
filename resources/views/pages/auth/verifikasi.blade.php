@extends('layouts/template')

@section('content-pager')
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col">
                <div class="card text-center">
                    <div class="card-header">
                      Verifikasi
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">Verifikasi Email Kamu Sekarang</h5>
                      @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Verifikasi baru telah dikirim ke email kamu') }}
                        </div>
                      @endif
                        <p>Sebelum memproses pendaftaran alangkah baiknya kamu verifikasi email kamu.</p>
                        <p>Jika tidak menerima email verifikasi maka klik tombol dibawah ini.</p>
                      <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">Minta verifikasi kembali.</button>
                    </form>
                    </div>
                    <div class="card-footer text-muted">
                      😁
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection