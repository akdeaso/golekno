@extends('user.layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('user.partials.header', [
        'title' => __('Halo') . ' '. auth()->user()->namaakun,
        'description' => __('Ini adalah halaman edit pos, di sini kamu dapat mengedit pos yang telah kamu buat.'),
        'class' => 'col-lg-7'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0 ml-3">{{ __('Edit Pos') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach($pos as $p)
                        <form method="post" action="{{ route('posUser.update') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="idpos" value="{{ $p->idpos }}">
                            <input type="hidden" name="tipepos" value="{{ $p->tipepos }}">
                            <h6 class="heading-small text-muted mb-4">{{ __('Biodata') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="nama">{{ __('Nama Orang yang Hilang atau Ditemukan') }}</label>
                                    <input type="text" name="nama" id="nama" class="form-control form-control-alternative" placeholder="Nama" value="{{ $p->nama }}" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="gender">Jenis kelamin</label>
                                    <select class="form-control" id="gender" name="gender" value="{{ $p->gender }}">
                                      <option value="1">Laki-laki</option>
                                      <option value="0">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="umur">{{ __('Umur') }}</label>
                                    <input type="number" name="umur" id="umur" class="form-control form-control-alternative" placeholder="Umur" value="{{ $p->umur }}" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="tinggibadan">{{ __('Tinggi Badan') }}</label>
                                    <input type="number" name="tinggibadan" id="tinggibadan" class="form-control form-control-alternative" placeholder="Tinggi Badan" value="{{ $p->tinggibadan }}" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="deskripsi">{{ __('Deskripsi') }}</label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-control form-control-alternative" placeholder="Deskripsi" required>{{ $p->deskripsi }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="kontak">{{ __('Kontak') }}</label>
                                    <input type="text" name="kontak" id="kontak" class="form-control form-control-alternative" placeholder="Kontak" value="{{ $p->kontak }}" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="tanggal">{{ __('Tanggal Hilang atau Ditemukan') }}</label>
                                    <input type="date" name="tanggal" id="tanggal" class="form-control form-control-alternative" value="{{ $p->tanggal }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="tempat">{{ __('Tempat') }}</label>
                                    <input type="text" name="tempat" id="tempat" class="form-control form-control-alternative" placeholder="Tempat" value="{{ $p->tempat }}" required>
                                </div>
                                <div class="custom-file">
                                    <label class="form-control-label" for="foto">Foto</label>
                                    <input type="file" class="form-control-file" id="image" name="foto" value="{{ $p->foto }}">
                                  </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Publikasikan') }}</button>
                                </div>
                            </div>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        @include('user.layouts.footers.auth')
    </div>
@endsection
