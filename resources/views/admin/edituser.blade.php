@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('admin.partials.header', [
        'title' => __('Hello') . ' '. auth()->user()->name,
        'description' => __('This is your profile page. You can see the progress you\'ve made with your work and manage your projects or assigned tasks'),
        'class' => 'col-lg-7'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0 ml-3">{{ __('Edit User') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach($akun as $p)
                        <form method="post" action="{{ route('profilAdmin.updateuser') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="idakun" value="{{ $p->idakun }}">
                            <h6 class="heading-small text-muted mb-4">{{ __('Biodata') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="namaakun">{{ __('Nama') }}</label>
                                    <input type="text" name="namaakun" id="namaakun" class="form-control form-control-alternative" placeholder="nama" value="{{ $p->namaakun }}" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="email">{{ __('email') }}</label>
                                    <input type="text" name="email" id="email" class="form-control form-control-alternative" placeholder="email" value="{{ $p->email }}" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="jenisakun">Tipe Akun</label>
                                    <select class="form-control" id="jenisakun" name="jenisakun" value="{{ $p->jenisakun }}">
                                        <option value="1">Admin</option>
                                        <option value="0">User</option>
                                    </select>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Simpan') }}</button>
                                </div>
                            </div>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
