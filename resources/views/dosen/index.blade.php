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
    <title>AdminLTE 4 | Simple Tables</title><!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="AdminLTE 4 | Simple Tables">
    <meta name="author" content="ColorlibHQ">
    <meta name="description" content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS.">
    <meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard"><!--end::Primary Meta Tags--><!--begin::Fonts-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous"><!--end::Fonts--><!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css" integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous"><!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css" integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous"><!--end::Third Party Plugin(Bootstrap Icons)--><!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="../../../dist/css/adminlte.css"><!--end::Required Plugin(AdminLTE)-->
</head> <!--end::Head--> <!--begin::Body-->

<body>
    <div class="main-content">
        <div class="row"></div>
        <div class="col-md-12">
            <div class="card">
                <h2 class="text-center">HALAMAN DOSEN</h2>
            </div>
        </div>

        <div class="card w-100">
            <div class="card-header">
                <h3 class="card-title">Data Dosen</h3>
                <a href="{{route('dosen.create')}}"><button class="btn btn-success">Tambah Dosen</button></a>

                <div class="card-tools">
                    <ul class="pagination pagination-sm float-end">
                        {{ $dosen->links('pagination::bootstrap-4') }}
                    </ul>
                </div>

            </div>
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id Dosen</th>
                            <th>Nama Dosen</th>
                            <th>Email</th>
                            <th>No Telp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dosen as $d)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$d->id_dosen}}</td>
                            <td>{{$d->nama_dosen}}</td>
                            <td>{{$d->email}}</td>
                            <td>{{$d->no_telp}}</td>
                            <td>

                                <div class="btn-group" role="group">
                                    <a href="{{ route('dosen.edit', $d->id_dosen) }}" class="btn btn-warning btn-sm" style="margin-right: 5px; width: 60px; text-align: center;">Edit</a>
                                    <button type="button" class="btn btn-sm btn-danger" style="width: 60px;" onclick="confirmDelete({{ $d->id_dosen }})">Hapus</button>
                                </div>
                                <form id="delete-form-{{ $d->id_dosen }}" action="{{ route('dosen.destroy', $d->id_dosen) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
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
