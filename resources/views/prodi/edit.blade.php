@extends('layout.app')
@section('content')
<link href="{{ asset('css/prodi.css') }}" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5 bg-body">
                <div class="card-header bg-secondary text-white fw-bold">{{ __('Edit prodi') }}</div>
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="{{ route('prodi.update', $prodi->id_prodi) }}" method="POST">

                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="" class="form-label">Id prodi</label>
                            <input type="text" name="id_prodi" class="form-control @error('id_prodi') is-invalid @enderror" value="{{$prodi->id_prodi}}" placeholder="Masukan ID prodi">
                            @error('id_prodi')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nama prodi</label>
                            <input type="text" name="nama_prodi" class="form-control @error('nama_prodi') is-invalid @enderror" value="{{$prodi->nama_prodi}}" placeholder="Masukan Nama prodi">
                            @error('nama_prodi')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-warning btn-sm">Update</button>
                            <a href="{{ route('prodi.index') }}" class="btn btn-success btn-sm">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
