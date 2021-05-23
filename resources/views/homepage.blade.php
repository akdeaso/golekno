@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Homepage') }}</div>

                <div class="card-body">
                    @foreach ($post as $p)
                    <div class="card" style="width:400px">
                        <img class="card-img-top" src="{{url('img/pekok.jpg')}}" alt="Card image" style="width:100%">
                        <div class="card-body">
                          <h4 class="card-title">{{$p->Nama}}</h4>
                          <p class="card-text">
                              Jenis Post : {{$p->JenisPost}} <br>
                              Tanggal Hilang/Ditemukan : {{$p->Tanggal}} <br>
                              Tempat Hilang/Ditemukan : {{$p->Tempat}} <br>
                              Gender : {{$p->Gender}} <br>
                              Umur : {{$p->Umur}} <br>
                              Tinggi : {{$p->Tinggi}} <br>
                              Berat : {{$p->Berat}} <br>

                        </p>
                          <a href="#" class="btn btn-primary">Laporkan!</a>
                        </div>
                      </div>
                    @endforeach

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
