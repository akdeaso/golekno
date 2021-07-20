@extends('user.layouts.app')

@section('content')
    @include('user.layouts.headers.cards')

    <div class="container-fluid mt--9">
        @foreach ($pos as $p)
            <div class="row mt-5">
                <div class="col-xl mb-3">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">
                                        @if ($p->tipepos == 1)
                                            Informasi Orang Hilang
                                        @else
                                            Informasi Orang Ditemukan
                                        @endif
                                    </h3>
                                </div>
                                <a class="btn btn-sm btn-icon-only text-light" href="{{ route('bookmark', $p->idpos) }}">
                                    <i class="ni ni-book-bookmark">
                                    </i>
                                </a>
                                <div class="dropdown float-right">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        @if ($p->idakun == auth()->user()->idakun)
                                            <a class="dropdown-item" href="/pos/edit/{{ $p->idpos }}">Edit</a>
                                            <a class="dropdown-item" style="color:#f5365c" data-toggle="modal"
                                                data-target="#hapusposModal">Hapus</a>
                                        @else
                                        <a class="dropdown-item" style="color:#f5365c" data-toggle="modal"
                                        data-target="#laporanposModal">Laporkan pos</a>
                                        @endif
                                    </div>
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
                                    @if (Session::has('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ Session::get('error') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="card mb-3" style="width: 18rem;">
                                        <img class="card-img-top" src="{{ url('/image/' . $p->foto) }}"
                                            alt="Card image cap" style="width: 300; height: 190px; object-fit: cover;"
                                            sizes="(max-width: 286pxrem) 100vw, 286px">
                                        <div class="card-body">
                                            <h1 class="card-title">{{ $p->nama }}</h1>
                                            <h4 class="card-text">Pos dibuat oleh : {{ $p->namaakun }}</h4>
                                            <p class="card-text">
                                                @if ($p->tipepos == 1)
                                                    Tanggal Hilang : {{ $p->tanggal }}
                                                @else
                                                    Tanggal Ditemukan : {{ $p->tanggal }}
                                                @endif
                                                <br>
                                                @if ($p->tipepos == 1)
                                                    Tempat Hilang : {{ $p->tempat }}
                                                @else
                                                    Tempat Ditemukan : {{ $p->tempat }}
                                                @endif
                                                <br>
                                                @if ($p->tipepos == 1)
                                                    Kontak yang Kehilangan: {{ $p->kontak }}
                                                @else
                                                    Kontak yang Menemukan: {{ $p->kontak }}
                                                @endif
                                            </p>
                                            {{-- <a href="#" class="btn btn-primary">Lapor Info Terbaru</a> --}}

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal">
                                                Lapor Informasi Terbaru
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-xl order-xl-1">
                                                                    <div class="card bg-secondary shadow">
                                                                        <div class="card-header bg-white border-0">
                                                                            <div class="row align-items-center">
                                                                                <h3 class="mb-0 ml-3">
                                                                                    {{ __('Lapor Informasi Terbaru') }}
                                                                                </h3>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <form method="post"
                                                                                action="{{ route('laporhilang.simpan') }}"
                                                                                autocomplete="off"
                                                                                enctype="multipart/form-data">
                                                                                @csrf
                                                                                <input type="hidden" name="idpos" id="idpos"
                                                                                    class="form-control"
                                                                                    value="{{ $p->idpos }}">

                                                                                <div class="form-group">
                                                                                    <label class="form-control-label"
                                                                                        for="tipepos">Tempat
                                                                                        Penemuan</label>
                                                                                    <input type="text" name="tempatpenemuan"
                                                                                        id="tempatpenemuan"
                                                                                        class="form-control">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label"
                                                                                        for="tipepos">Deskripsi
                                                                                        Penemuan</label>
                                                                                    <input type="text"
                                                                                        name="deskripsipenemuan"
                                                                                        id="deskripsipenemuan"
                                                                                        class="form-control">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label"
                                                                                        for="tipepos">Kontak</label>
                                                                                    <input type="text" name="kontak"
                                                                                        id="kontak" class="form-control">
                                                                                </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Laporkan</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="hapusposModal" tabindex="-1" role="dialog"
                                    aria-labelledby="hapusposModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-xl order-xl-1">
                                                            <div class="card bg-secondary shadow">
                                                                <div class="card-header bg-white border-0">
                                                                    <div class="row align-items-center">
                                                                        <h3 class="mb-0 ml-3">
                                                                            {{ __('Hapus Pos') }}
                                                                        </h3>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body">
                                                                    <form method="post"
                                                                        action="{{ route('posUser.hapus') }}"
                                                                        autocomplete="off" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <input type="hidden" name="idpos" id="idpos"
                                                                            class="form-control"
                                                                            value="{{ $p->idpos }}">
                                                                        <div class="form-group">
                                                                            <label class="form-control-label"
                                                                                for="statuspos">Alasan Menghapus</label>
                                                                            <select class="form-control" id="statuspos"
                                                                                name="statuspos">
                                                                                <option value="1">Kasus sudah selesai
                                                                                </option>
                                                                                <option value="2">Data yang dilaporkan tidak
                                                                                    benar</option>
                                                                                <option value="3">Lainnya</option>
                                                                            </select>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Hapus Pos</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!--modal laporanpos-->
                                <div class="modal fade" id="laporanposModal" tabindex="-1" role="dialog"
                                aria-labelledby="laporanposModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-xl order-xl-1">
                                                        <div class="card bg-secondary shadow">
                                                            <div class="card-header bg-white border-0">
                                                                <div class="row align-items-center">
                                                                    <h3 class="mb-0 ml-3">
                                                                        {{ __('Laporkan Pos') }}
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <form method="post"
                                                                    action="{{ route('flag.simpan') }}"
                                                                    autocomplete="off" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input type="hidden" name="idpos" id="idpos"
                                                                        class="form-control"
                                                                        value="{{ $p->idpos }}">
                                                                    <div class="form-group">
                                                                        <label class="form-control-label"
                                                                            for="alasan">Alasan Melaporkan Pos</label>
                                                                        <select class="form-control" id="alasan"
                                                                            name="alasan">
                                                                            <option value="1">Spam
                                                                            </option>
                                                                            <option value="2">Data yang dilaporkan tidak
                                                                                benar</option>
                                                                            <option value="3">Lainnya</option>
                                                                        </select>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Laporkan Pos</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                                <div class="col-sm-8">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <h2 class="card-title">Biodata</h2>
                                                    <p class="card-text">
                                                        Jenis Kelamin :
                                                        @if ($p->gender == 1)
                                                            Laki-Laki
                                                        @else
                                                            Perempuan
                                                        @endif
                                                        <br>
                                                        Umur : {{ $p->umur }} Tahun
                                                        <br>
                                                        Tinggi Badan : {{ $p->tinggibadan }} cm
                                                    </p>
                                                </div>
                                                <div class="col">
                                                    <h2 class="card-title">Deskripsi</h2>
                                                    <p class="card-text"> {{ $p->deskripsi }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h2 class="card-title">Log Laporan</h2>
                                            @foreach ($laporhilang as $l)
                                                <div class="alert alert-secondary" role="alert">
                                                    <strong>{{ $l->created_at }} :</strong> Dilaporkan terlihat di
                                                    {{ $l->tempatpenemuan }} dengan deskripsi :
                                                    {{ $l->deskripsipenemuan }}
                                                    <br /><strong>Dilaporkan oleh :</strong>
                                                    {{ $l->namaakun }}, kontak : {{ $l->kontak }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('user.layouts.footers.auth')
        @endforeach
    </div>

@endsection
