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
                                <a href="{{ route('posUser.tambah') }}" class="btn btn-sm btn-primary">Tambah Pos</a>
                            </div>
                        </div>
                    </div>
                    {{-- Modal --}}
                    <div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Filter berdasarkan tanggal hilang atau
                                        detemukan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="post" action="{{ route('posUser.filter') }}" autocomplete="off"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="input-daterange datepicker row align-items-center">
                                            <div class="col">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="ni ni-calendar-grid-58"></i></span>
                                                        </div>
                                                        <input class="form-control" placeholder="Start date" type="date"
                                                            name="from" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="ni ni-calendar-grid-58"></i></span>
                                                        </div>
                                                        <input class="form-control" placeholder="End date" type="date"
                                                            name="to" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Terapkan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                @if (Session::has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ Session::get('success') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($pos as $p)
                                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 pl-2 pr-2">
                                    <div class="card mb-3">
                                        <div class="card-header" style="font-size: 14px">
                                            @if ($p->tipepos == 1)
                                                Orang Hilang
                                            @else
                                                Orang Ditemukan
                                            @endif

                                        </div>
                                        <img class="card-img-top" src="{{ url('/image/' . $p->foto) }}"
                                            alt="Card image cap" style="width: 300; height: 190px; object-fit: cover;"
                                            sizes="(max-width: 286pxrem) 100vw, 286px">
                                        <div class="card-body" style="max-height: 100%">
                                            <h5 class="card-title">{{ $p->nama }}</h5>
                                            <p class="card-text">Dilaporkan pada: {{ $p->created_at }}</p>
                                            <a href="/pos/lihat/{{ $p->idpos }}" class="btn btn-primary">Detail</a>
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

        @include('user.layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
