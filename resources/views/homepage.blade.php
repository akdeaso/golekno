@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card align-middle">
                <div class="card-header align-middle">{{ __('Homepage') }}
                    <a class="btn btn-info float-right" href="pos/buat">
                        {{ __('Buat Pos') }}
                    </a>
                </div>
                <div class="row mx-auto">
                    @foreach ($posts as $p)
                    <div class="card-body col-6">

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

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
