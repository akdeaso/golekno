@extends('layouts.app')
@section('content')
<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Post') }}</div>

                    <div class="card-body">
                    @foreach ($posts as  $p )
                        <form method= "POST" action="{{url('pos/update')}}">
                            @csrf

                            <input type="hidden" name="id" value="{{ $p->id }}"> <br/>
                            <div class="form-group row">
                                <label for="Nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                                <div class="col-md-6">
                                    <input id="Nama" type="text" name="Nama" class="form-control" value="{{ $p->Nama}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="JenisPost" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Post') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="JenisPost" name="JenisPost" value="{{ $p->JenisPost}}">
                                    <option>Orang Hilang</option>
                                    <option>Orang Ditemukan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Tanggal" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal') }}</label>

                                <div class="col-md-6">
                                    <input id="Tanggal" type="datetimelocal" name="Tanggal" class="form-control" value="{{ $p->Tanggal}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Tempat" class="col-md-4 col-form-label text-md-right">{{ __('Tempat') }}</label>

                                <div class="col-md-6">
                                    <input id="Tempat" type="text" name="Tempat" class="form-control" value="{{ $p->Tempat}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                                <div class="col-md-6">

                                    <select class="form-control" id="Gender" name="Gender" value="{{ $p->Gender}}">
                                        <option>Laki Laki</option>
                                        <option>Perempuan</option>
                                        </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Umur" class="col-md-4 col-form-label text-md-right">{{ __('Umur') }}</label>

                                <div class="col-md-6">
                                    <input id="Umur" type="text" name="Umur" class="form-control" value="{{ $p->Umur}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Tinggi" class="col-md-4 col-form-label text-md-right">{{ __('Tinggi') }}</label>

                                <div class="col-md-6">
                                    <input id="Tinggi" type="text" name="Tinggi" class="form-control" value="{{ $p->Tinggi}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Berat" class="col-md-4 col-form-label text-md-right">{{ __('Berat') }}</label>

                                <div class="col-md-6">
                                    <input id="Berat" type="text" name="Berat" class="form-control" value="{{ $p->Berat}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Foto" class="col-md-4 col-form-label text-md-right">{{ __('Foto') }}</label>

                                <div class="col-md-6">
                                    <input id="Foto" type="text" name="Foto" class="form-control" value="{{ $p->Foto}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="FotoTambahan" class="col-md-4 col-form-label text-md-right">{{ __('FotoTambahan') }}</label>

                                <div class="col-md-6">
                                    <input id="FotoTambahan" type="text" name="FotoTambahan" class="form-control" value="{{ $p->FotoTambahan}}">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Edit Post') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
