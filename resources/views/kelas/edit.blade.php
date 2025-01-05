@extends('layout.app')
@section('content')
<link href="{{ asset('css/kelas.css') }}" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5 bg-body">
                <div class="card-header bg-secondary text-white fw-bold">{{ __('Edit Kelas') }}</div>
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="{{ route('kelas.update', $kelas->id_kelas) }}" method="POST">

                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="" class="form-label">Id Kelas</label>
                            <input type="text" name="id_kelas" class="form-control @error('id_kelas') is-invalid @enderror" value="{{$kelas->id_kelas}}" placeholder="Masukan ID Kelas">
                            @error('id_kelas')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Kelas</label>
                            <input type="text" name="nama_kelas" class="form-control @error('nama_kelas') is-invalid @enderror" value="{{$kelas->nama_kelas}}" placeholder="Masukan Nama Kelas">
                            @error('nama_kelas')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
        <label for="id_konsentrasi" class="form-label">ID Konsentrasi</label>
        <select name="id_konsentrasi" id="id_konsentrasi" class="form-control @error('id_konsentrasi') is-invalid @enderror">
            <option value="" selected disabled>Pilih ID Konsentrasi</option>
            @foreach($konsentrasiList as $konsentrasi)
                <option value="{{ $konsentrasi->id_konsentrasi }}">{{ $konsentrasi->nama_konsentrasi }}</option>
            @endforeach
        </select>
        @error('id_konsentrasi')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
    <label for="id_semester" class="form-label">ID Semester</label>
    <select name="id_semester" id="id_semester" class="form-control @error('id_semester') is-invalid @enderror">
        <option value="" selected disabled>Pilih ID Semester</option>
        @foreach($semesterList as $semester)
            <option value="{{ $semester->id_semester }}">{{ $semester->nama_semester }}</option>
        @endforeach
    </select>
    @error('id_semester')
        <div class="alert alert-danger mt-2">{{ $message }}</div>
    @enderror
</div>
                        <div class="mb-3">
                            <button class="btn btn-warning btn-sm">Update</button>
                            <a href="{{ route('kelas.index') }}" class="btn btn-success btn-sm">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
