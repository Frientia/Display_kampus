@extends('layout.app')
@section('content')

@if(session('berhasil'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session("berhasil") }}',
            timer: 2000,
            showConfirmButton: false
        });
    </script>
@endif

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>AdminLTE 4 | Jadwal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="AdminLTE 4 | Jadwal">
    <meta name="description" content="AdminLTE - Data Jadwal">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../../dist/css/adminlte.css">
</head>

<body>

<div class="main-content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h2 class="text-center">HALAMAN JADWAL</h2>
            </div>
        </div>
    </div>

    <div class="card w-100">
        <div class="card-header">
            <h3 class="card-title">Data Jadwal</h3>
            <a href="{{ route('jadwal.create') }}"><button class="btn btn-success">Tambah Jadwal</button></a>

            <div class="card-tools">
                <ul class="pagination pagination-sm float-end">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
            </div>
        </div> <!-- /.card-header -->

        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Id Jadwal</th>
                    <th>Hari</th>
                    <th>Tanggal</th>
                    <th>Jam Masuk</th>
                    <th>Jam Selesai</th>
                    <th>Mata Kuliah</th>
                    <th>Dosen</th>
                    <th>Ruangan</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($jadwal as $j)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $j->id_jadwal }}</td>
                        <td>{{ $j->hari }}</td>
                        <td>{{ $j->tanggal }}</td>
                        <td>{{ $j->jam_masuk }}</td>
                        <td>{{ $j->jam_selesai }}</td>
                        <td>{{ $j->id_matkul }}</td>
                        <td>{{ $j->id_dosen }}</td>
                        <td>{{ $j->id_ruangan }}</td>
                        <td>{{ $j->id_kelas }}</td>
                        <td class="d-flex gap-2">
                            <a href="{{ route('jadwal.edit', $j->id_jadwal) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('jadwal.destroy', $j->id_jadwal) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div> <!-- /.card-body -->
    </div> <!-- /.card -->
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data ini akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        })
    }
</script>

</body>
@endsection
