@extends('layout.app')
@section('content')
<link href="{{ asset('css/dosen.css') }}" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5 bg-body">
                <div class="card-header bg-primary text-white fw-bold">{{ __('Tambah Dosen') }}</div>
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="{{ route('dosen.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Id Dosen</label>
                            <input type="text" name="id_dosen" class="form-control @error('id_dosen') is-invalid @enderror" placeholder="Masukan ID Dosen">
                            @error('id_dosen')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Dosen</label>
                            <input type="text" name="nama_dosen" class="form-control @error('nama_dosen') is-invalid @enderror" placeholder="Masukan Nama Dosen">
                            @error('nama_dosen')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukan Email">
                            @error('email')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nomor Telepon</label>
                            <input type="numeric" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror" placeholder="Masukan Nomor Telepon">
                            @error('no_telp')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="id_matkul" class="form-label">Nama Matkul</label>
                            <select name="id_matkul" class="form-control">
                                <option value="">-- Pilih Mata Kuliah --</option>
                                @foreach($matkuls as $matkul)
                                    <option value="{{ $matkul->id_matkul }}">{{ $matkul->nama_matkul }}</option>
                                @endforeach
                            </select>
                            @error('id_matkul')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-danger btn-sm">Simpan</button>
                            <a href="{{ route('dosen.index') }}" class="btn btn-success btn-sm">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
