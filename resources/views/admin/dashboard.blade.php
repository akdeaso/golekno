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
                                <h3 class="mb-0">Daftar Pos</h3>
                            </div>
                            <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tipe Pos</th>
                                    <th scope="col">Flag</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Umur</th>
                                    <th scope="col">Tinggi Badan</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Kontak</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Tempat</th>
                                    <th scope="col">Status Pos</th>
                                    <th scope="col">Tanggal Selesai</th>
                                </tr>
                            </thead>
                            @foreach ($pos as $p)
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        {{$p -> nama}}
                                    </th>
                                    <td>
                                      @if ($p -> tipepos == 1)
                                          Orang Hilang
                                      @else
                                          Orang Ditemukan
                                      @endif
                                    </td>
                                    <td>
                                        {{$p -> flagcounter}}
                                    </td>
                                    <td>
                                     @if ($p -> gender == 1)
                                          Laki-Laki
                                      @else
                                          Perempuan
                                      @endif
                                    </td>
                                    <td>
                                        {{$p -> umur}}
                                    </td>
                                    <td>
                                        {{$p -> tinggibadan}}
                                    </td>
                                    <td>
                                        {{$p -> deskripsi}}
                                    </td>
                                    <td>
                                        {{$p -> kontak}}
                                    </td>
                                    <td>
                                        {{$p -> tanggal}}
                                    </td>
                                    <td>
                                        {{$p -> tempat}}
                                    </td>
                                    <td>
                                        {{$p -> statuspos}}
                                    </td>
                                    <td>
                                        {{$p -> tanggalselesai}}
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                        <div class="container mt-4">
                            <div class="pagination">
                                {{ $pos->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Daftar Arsip</h3>
                            </div>
                            <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tipe Pos</th>
                                    <th scope="col">Flag</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Umur</th>
                                    <th scope="col">Tinggi Badan</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Kontak</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Tempat</th>
                                    <th scope="col">Status Pos</th>
                                    <th scope="col">Tanggal Selesai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                    </th>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
