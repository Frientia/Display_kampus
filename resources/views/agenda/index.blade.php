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
<!-- Begin::Head -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Data Agenda</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" crossorigin="anonymous">
    <!-- OverlayScrollbars -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css" crossorigin="anonymous">
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="../../../dist/css/adminlte.css">
</head>
<!-- End::Head -->

<!-- Begin::Body -->
<body>
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h2 class="text-center my-3">HALAMAN AGENDA</h2>
                </div>
            </div>
        </div>

        <div class="card w-100">
            <!-- Card Header -->
            <div class="card-header">
                <h3 class="card-title">Data Agenda</h3>          
                <a href="{{ route('agenda.create') }}" class="btn btn-success">Tambah Agenda</a>
                <div class="card-tools">
                    <ul class="pagination pagination-sm float-end mb-0">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
            <!-- End Card Header -->

            <!-- Card Body -->
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id Agenda</th>
                                <th>Nama Agenda</th>
                                <th>Tanggal</th>
                                <th>Waktu Mulai</th>
                                <th>Waktu Selesai</th>
                                <th>Deskripsi</th>
                                <th>Lokasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($agenda as $a)
                                <tr>
                                   <td>{{ $loop->iteration }}</td>
                                    <td>{{ $a->id_agenda }}</td>
                                    <td>{{ $a->nama_agenda }}</td>
                                    <td>{{ $a->tanggal }}</td>
                                    <td>{{ $a->waktu_mulai }}</td>
                                    <td>{{ $a->waktu_selesai }}</td>
                                    <td>{{ $a->deskripsi }}</td>
                                    <td>{{ $a->lokasi }}</td>
                                    <td class="d-flex gap-2">
                                        <!-- Edit Button -->
                                        <a href="{{ route('agenda.edit', $a->id_agenda) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <!-- Delete Form -->
                                        <form onsubmit="return confirm('Apakah Anda yakin?');" action="{{ route('agenda.destroy', $a->id_agenda) }}" method="POST" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End Card Body -->
        </div>
        <!-- End Card -->
    </div>

    <!-- SweetAlert for Delete Confirmation -->
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
            });
        }
    </script>

    <!-- Style for Buttons -->
    <style>
        td .btn {
            margin: 0;
        }
        td form {
            margin: 0;
            display: inline-block;
        }
    </style>
</body>
<!-- End::Body -->
</html>

@endsection
