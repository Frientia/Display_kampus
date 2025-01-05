@extends('layout.app')
@section('content')
<link href="{{ asset('css/staff.css') }}" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5 bg-body">
                <div class="card-header bg-primary text-white fw-bold">{{ __('Tambah Staff') }}</div>
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="{{ route('staff.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Id Staff</label>
                            <input type="text" name="id_staff" class="form-control @error('id_staff') is-invalid @enderror" placeholder="Masukan id staff">
                            @error('id_staff')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Staff</label>
                            <input type="text" name="nama_staff" class="form-control @error('nama_staff') is-invalid @enderror" placeholder="Masukan nama staff">
                            @error('nama_staff')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3"> 
                            <label for="" class="form-label">Jabatan</label>
                            <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" placeholder="Masukan jabatan">
                            @error('jabatan')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3"> 
                            <label for="" class="form-label">No Telp</label>
                            <input type="numeric" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror" placeholder="Masukan no_telp">
                            @error('no_telp')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-danger btn-sm">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
