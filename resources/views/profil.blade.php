@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profil Diri') }}</div>
                <div class="card-body">
                    <div class="container">
                        <div class="row mb-4">
                            <div class="col-2">
                            Nama <br>
                            Email <br>
                            </div>
                            {{-- @foreach ($user as $p)
                            <div class="col">
                               : {{ $p->name}} <br>
                               : {{ $p->email}} <br>
                            @endforeach --}}
                            : {{ Auth::user()->name }} <br>
                            : {{ Auth::user()->email }} <br>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
