@extends('layout.app')
@section('content')
<link href="{{ asset('css/jadwal.css') }}" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5 bg-body">
                <div class="card-header bg-secondary text-white fw-bold">{{ __('Edit Jadwal') }}</div>
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="{{ route('jadwal.update', $jadwal->id_jadwal) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="hari" class="form-label">Hari</label>
                            <select name="hari" id="hari" class="form-control @error('hari') is-invalid @enderror">
                                <option value="">Pilih Hari</option>
                                <option value="Senin" {{ $jadwal->hari == 'Senin' ? 'selected' : '' }}>Senin</option>
                                <option value="Selasa" {{ $jadwal->hari == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                                <option value="Rabu" {{ $jadwal->hari == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                                <option value="Kamis" {{ $jadwal->hari == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                                <option value="Jumat" {{ $jadwal->hari == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                                <option value="Sabtu" {{ $jadwal->hari == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                                <option value="Minggu" {{ $jadwal->hari == 'Minggu' ? 'selected' : '' }}>Minggu</option>
                            </select>
                            @error('hari')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ $jadwal->tanggal }}" placeholder="Masukkan Tanggal">
                            @error('tanggal')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="jam_masuk" class="form-label">Jam Masuk</label>
                            <input type="time" name="jam_masuk" class="form-control @error('jam_masuk') is-invalid @enderror" value="{{ $jadwal->jam_masuk }}" placeholder="Masukkan Jam Masuk">
                            @error('jam_masuk')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="jam_selesai" class="form-label">Jam Selesai</label>
                            <input type="time" name="jam_selesai" class="form-control @error('jam_selesai') is-invalid @enderror" value="{{ $jadwal->jam_selesai }}" placeholder="Masukkan Jam Selesai">
                            @error('jam_selesai')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="id_dosen" class="form-label">Dosen</label>
                            <select name="id_matkul" class="form-control @error('id_matkul') is-invalid @enderror">
                                <option value="">Pilih Mata Kuliah</option>
                                @foreach($matkul as $matkull)
                                    <option value="{{ $matkull->id_matkul }}" {{ $jadwal->id_matkul == $matkull->id_matkul ? 'selected' : '' }}>
                                        {{ $matkull->nama_matkul }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="id_dosen" class="form-label">Dosen</label>
                            <select name="id_dosen" class="form-control @error('id_dosen') is-invalid @enderror">
                                <option value="">Pilih Dosen</option>
                                @foreach($dosen as $dosenn)
                                    <option value="{{ $dosenn->id_dosen }}" {{ $jadwal->id_dosen == $dosenn->id_dosen ? 'selected' : '' }}>
                                        {{ $dosenn->nama_dosen }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_dosen')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="id_ruangan" class="form-label">Ruangan</label>
                            <select name="id_ruangan" class="form-control @error('id_ruangan') is-invalid @enderror">
                                <option value="">Pilih Ruangan</option>
                                @foreach($ruangan as $item)
                                    <option value="{{ $item->id_ruangan }}" {{ isset($jadwal) && $jadwal->id_ruangan == $item->id_ruangan ? 'selected' : '' }}>
                                        {{ $item->nama_ruangan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_ruangan')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="id_kelas" class="form-label">Kelas</label>
                            <select name="id_kelas" class="form-control @error('id_kelas') is-invalid @enderror">
                                <option value="">Pilih Kelas</option>
                                @foreach($kelas as $kelass)
                                    <option value="{{ $kelass->id_kelas }}" {{ isset($jadwal) && $jadwal->id_kelas == $kelass->id_kelas ? 'selected' : '' }}>
                                        {{ $kelass->nama_kelas }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_kelas')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-warning btn-sm">Update</button>
                            <a href="{{ route('jadwal.index') }}" class="btn btn-success btn-sm">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
