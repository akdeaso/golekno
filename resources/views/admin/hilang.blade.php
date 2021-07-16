@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--9">
        <div class="row mt-5">
            <div class="col-xl mb-3">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Info Orang Hilang</h3>
                            </div>

                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            @foreach ($pos as $p)
                            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 pl-2 pr-2">
                                <div class="card mb-3">
                                    <img class="card-img-top" src="{{ url('/image/'.$p->foto) }}" alt="Card image cap" style="width: 300; height: 190px; object-fit: cover;" sizes="(max-width: 286pxrem) 100vw, 286px">
                                    <div class="card-body" style="max-height: 100%">
                                        <h5 class="card-title">{{$p->nama}}</h5>
                                        <p class="card-text">Dilaporkan pada: {{$p->created_at}}</p>
                                        <a href="pos/lihat/{{$p->idpos}}" class="btn btn-primary">Detail</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="container">
                        <div class="pagination justify-content-center pagination-lg">
                            {{ $pos->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush


