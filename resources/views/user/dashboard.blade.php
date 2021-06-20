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
                            <div class="col">
                                <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src="../../assets/img/theme/img-1-1000x600.jpg" alt="Card image cap">
                                    <div class="card-body">
                                      <h5 class="card-title">Card title</h5>
                                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                      <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src="../../assets/img/theme/img-1-1000x600.jpg" alt="Card image cap">
                                    <div class="card-body">
                                      <h5 class="card-title">Card title</h5>
                                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                      <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src="../../assets/img/theme/img-1-1000x600.jpg" alt="Card image cap">
                                    <div class="card-body">
                                      <h5 class="card-title">Card title</h5>
                                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                      <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
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


