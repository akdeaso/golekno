@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Selamat kamu berhasil masuk!') }}
                </div>
            </div>

            <br>
            <div>
                <a href="pos/buat" class="btn btn-info" role="button">Buat Post</a>
            </div>

        </div>
    </div>
</div>
@endsection
