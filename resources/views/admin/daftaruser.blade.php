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
                                <h3 class="mb-0">Daftar User</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{ route('tambahuser') }}" class="btn btn-sm btn-primary">Tambah</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Tipe</th>
                                    <th scope="col"></th>
                                </tr>
                                @foreach($akun as $p)
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">{{ $p->namaakun }}</th>
                                    <td>{{ $p->email }}</td>
                                    <td>@if ($p->jenisakun == 1)
                                        Admin
                                    @else
                                        User
                                    @endif</td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="/profil/admin/edituser/{{$p->idakun}}">Edit</a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
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


