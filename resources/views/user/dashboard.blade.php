@extends('user.layouts.app')

@section('content')
    @include('user.layouts.headers.cards')

    <div class="container-fluid mt--9">
        <div class="row mt-5">
            <div class="col-xl mb-3">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Info Hilang</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{route ('posUser.tambah')}}" class="btn btn-sm btn-primary">Tambah Pos</a>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            @foreach ($pos as $p)
                            <div class="col">
                                <div class="card mb-3" style="width: 18rem;">
                                    <img class="card-img-top" src="{{ url('/image/'.$p->foto) }}" alt="Card image cap">
                                    <div class="card-body">
                                      <h5 class="card-title">{{$p->nama}}</h5>
                                      <p class="card-text">{{$p->deskripsi}}</p>
                                      <a href="#" class="btn btn-primary">Detail</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('user.layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush


