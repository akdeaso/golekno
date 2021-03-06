@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

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
                                <div class="dropdown float-right" >
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="/admin/pos/hapus/{{$p->idpos}}" style="color:#f5365c">Hapus Pos</a>
                                        <a class="dropdown-item" href="/admin/pos/hapusflag/{{$p->idpos}}" style="color:#f5365c">Hapus Laporan Pos</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="card mb-3" style="width: 18rem;">
                                        <img class="card-img-top" src="{{ url('/image/'.$p->foto) }}" alt="Card image cap" style="width: 300; height: 190px; object-fit: cover;" sizes="(max-width: 286pxrem) 100vw, 286px">
                                        <div class="card-body">
                                          <h1 class="card-title">{{$p->nama}}</h1>
                                          <h4 class="card-text">Pos dibuat oleh : {{$p->namaakun}}</h4>
                                          <p class="card-text">
                                              @if ($p->tipepos ==1)
                                                  Tanggal Hilang : {{$p->tanggal}}
                                              @else
                                                  Tanggal Ditemukan : {{$p->tanggal}}
                                              @endif
                                              <br>
                                              @if ($p->tipepos == 1)
                                                Tempat Hilang : {{$p->tempat}}
                                              @else
                                                Tempat Ditemukan : {{$p->tempat}}
                                              @endif
                                              <br>
                                              @if ($p->tipepos == 1)
                                              Kontak yang Kehilangan: {{$p->kontak}}
                                              @else
                                              Kontak yang Menemukan: {{$p->kontak}}
                                              @endif
                                          </p>


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
                                                        Umur          : {{$p->umur}} Tahun
                                                        <br>
                                                        Tinggi Badan  : {{$p->tinggibadan}} Kg
                                                    </p>
                                                </div>
                                                <div class="col">
                                                    <h2 class="card-title">Deskripsi</h2>
                                                    <p class="card-text"> {{$p->deskripsi}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h2 class="card-title">Log Laporan Flag Pos</h2>
                                            @foreach ($flagpos as $f)
                                                <div class="alert alert-secondary" role="alert">
                                                    <strong>{{ $f->created_at }} :</strong> Dilaporkan dengan alasan :
                                                    @if ($f->alasan == 1)
                                                    Spam
                                                    @elseif ($f->alasan == 2)
                                                    Data yang dilaporkan tidak benar
                                                    @else
                                                    Lainnya
                                                    @endif
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
            @include('layouts.footers.auth')
            @endforeach
        </div>

@endsection
