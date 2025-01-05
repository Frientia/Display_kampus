@extends('layout.app')
@section('content')
<link href="{{ asset('css/matkul.css') }}" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5 bg-body">
                <div class="card-header bg-secondary text-white fw-bold">{{ __('Edit Konsentrasi') }}</div>
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="{{ route('konsentrasi.update', $konsentrasi->id_konsentrasi) }}" method="POST">

                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="" class="form-label">Id Konsentrasi</label>
                            <input type="text" name="id_konsentrasi" class="form-control @error('id_konsentrasi') is-invalid @enderror" value="{{$konsentrasi->id_konsentrasi}}" placeholder="Masukan ID Konsentrasi" readonly>
                            @error('id_konsentrasi')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Konsentrasi</label>
                            <input type="text" name="nama_konsentrasi" class="form-control @error('nama_konsentrasi') is-invalid @enderror" value="{{$konsentrasi->nama_konsentrasi}}" placeholder="Masukan Nama Konsentrasi">
                            @error('nama_konsentrasi')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="id_prodi" class="form-label">Nama Prodi</label>
                            <select name="id_prodi" class="form-control">
                                <option value="">-- Pilih Prodi --</option>
                                @foreach($prodi as $prodi)
                                    <option value="{{ $prodi->id_prodi }}" {{ $prodi->nama_prodi == $konsentrasi->id_prodi ? 'selected' : '' }} >
                                        {{ $prodi->nama_prodi }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_matkul')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-warning btn-sm">Update</button>
                            <a href="{{ route('konsentrasi.index') }}" class="btn btn-danger  btn-sm">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
