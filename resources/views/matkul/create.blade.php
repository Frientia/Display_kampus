@extends('layout.app')
@section('content')
<link href="{{ asset('css/matkul.css') }}" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5 bg-body">
                <div class="card-header bg-primary text-white fw-bold">{{ __('Tambah Matkul') }}</div>
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="{{ route('matkul.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">ID Matkul</label>
                            <input type="text" name="id_matkul" class="form-control @error('id_matkul') is-invalid @enderror" placeholder="Masukan ID Matkul">
                            @error('id_matkul')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Matkul</label>
                            <input type="text" name="nama_matkul" class="form-control @error('nama_matkul') is-invalid @enderror" placeholder="Masukan Nama Matkul">
                            @error('nama_matkul')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-danger btn-sm">Simpan</button>
                            <a href="{{ route('matkul.index') }}" class="btn btn-success btn-sm">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
