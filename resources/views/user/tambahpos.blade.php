@extends('user.layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('user.partials.header', [
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
                            <h3 class="mb-0 ml-3">{{ __('Tambah Pos') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('posUser.simpan') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">{{ __('Pilih Tipe Pos') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="tipepos">Tipe Pos</label>
                                    <select class="form-control" id="tipepos" name="tipepos">
                                      <option value="1">Orang Hilang</option>
                                      <option value="0">Orang Ditemukan</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <h6 class="heading-small text-muted mb-4">{{ __('Biodata') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="nama">{{ __('Nama Orang yang Hilang atau Ditemukan') }}</label>
                                    <input type="text" name="nama" id="nama" class="form-control form-control-alternative" placeholder="Nama" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="gender">Jenis kelamin</label>
                                    <select class="form-control" id="gender" name="gender">
                                      <option value="1">Laki-laki</option>
                                      <option value="0">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="umur">{{ __('Umur') }}</label>
                                    <input type="number" name="umur" id="umur" class="form-control form-control-alternative" placeholder="Umur" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="tinggibadan">{{ __('Tinggi Badan') }}</label>
                                    <input type="number" name="tinggibadan" id="tinggibadan" class="form-control form-control-alternative" placeholder="Tinggi Badan" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="deskripsi">{{ __('Deskripsi') }}</label>
                                    <input type="text" name="deskripsi" id="deskripsi" class="form-control form-control-alternative" placeholder="Deskripsi" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="kontak">{{ __('Kontak') }}</label>
                                    <input type="text" name="kontak" id="kontak" class="form-control form-control-alternative" placeholder="Kontak"  required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="tanggal">{{ __('Tanggal Hilang atau Ditemukan') }}</label>
                                    <input type="date" name="tanggal" id="tanggal" class="form-control form-control-alternative">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="tempat">{{ __('Tempat') }}</label>
                                    <input type="text" name="tempat" id="tempat" class="form-control form-control-alternative" placeholder="Tempat" required>
                                </div>
                                <div class="custom-file">
                                    <label class="form-control-label" for="foto">Foto</label>
                                    <input type="file" class="form-control-file" id="foto" name="foto">
                                  </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Publikasikan') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('user.layouts.footers.auth')
    </div>
@endsection
