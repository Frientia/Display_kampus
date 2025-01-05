@extends('layout.app')
@section('content')
<link href="{{ asset('css/dosen.css') }}" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5 bg-body">
                <div class="card-header bg-secondary text-white fw-bold">{{ __('Edit Dosen') }}</div>
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="{{ route('dosen.update', $dosen->id_dosen) }}" method="POST">

                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="" class="form-label">ID Dosen</label>
                            <input type="text" name="id_dosen" class="form-control @error('id_dosen') is-invalid @enderror" value="{{$dosen->id_dosen}}" placeholder="Masukan ID Dosen" readonly>
                            @error('id_dosen')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Dosen</label>
                            <input type="text" name="nama_dosen" class="form-control @error('nama_dosen') is-invalid @enderror" value="{{$dosen->nama_dosen}}" placeholder="Masukan Nama Dosen">
                            @error('nama_dosen')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$dosen->email}}" placeholder="Masukan Email">
                            @error('email')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">No Telepon</label>
                            <input type="numeric" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror" value="{{$dosen->no_telp}}" placeholder="Masukan Nomor Telepon">
                            @error('no_telp')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Matkul</label>
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
                            <button class="btn btn-warning btn-sm">Update</button>
                            <a href="{{ route('dosen.index') }}" class="btn btn-success btn-sm">Kembali</a>
                        </div>
                        <div class="mb-6">

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
