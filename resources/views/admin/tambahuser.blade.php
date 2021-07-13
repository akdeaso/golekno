@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('admin.partials.header', [
        'title' => __('Halo') . ' '. auth()->user()->namaakun,
        'description' => __('Ini adalah halaman tambah user, di sini kamu dapat menambahkan admin atau user baru.'),
        'class' => 'col-lg-7'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0 ml-3">{{ __('Tambah User') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('tambahuser.simpan') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">{{ __('Biodata') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="jenisakun">Jenis Akun</label>
                                    <select class="form-control" name="jenisakun">
                                      <option value="1">Admin</option>
                                      <option value="0">User</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="namaakun">{{ __('Nama') }}</label>
                                    <input type="text" name="namaakun" class="form-control form-control-alternative" placeholder="Nama" required>
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="email">{{ __('Email') }}</label>
                                    <input type="email" name="email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="password">{{ __('Password') }}</label>
                                    <input type="password" name="password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Tambahkan') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
