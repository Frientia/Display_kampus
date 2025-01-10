<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh; /* Tinggi penuh untuk viewport */
            overflow: hidden; /* Hindari scroll horizontal */
        }
    
        /* Sidebar */
        #sidebar-wrapper {
            width: 250px;
            height: 100%;
            background-color: #343a40;
            color: white;
            overflow-y: auto;
            position: fixed;
            left: 0;
            top: 0;
        }
    
        /* Navbar */
        .navbar {
            height: 56px; /* Tinggi navbar */
            line-height: 1;
            padding: 0;
            background-color: #343a40; /* Warna navbar sama dengan sidebar */
            position: fixed;
            top: 0;
            left: 250px; /* Sesuaikan dengan lebar sidebar */
            width: calc(100% - 250px); /* Kurangi lebar sidebar dari total lebar */
            z-index: 1000; /* Pastikan navbar tetap di atas */
            display: flex;
            align-items: center;
        }
    
        .navbar .container-fluid {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
    
        .navbar .rounded-circle {
            width: 40px;
            height: 40px;
        }
    
        .navbar .btn-danger {
            padding: 5px 10px;
            font-size: 14px;
        }
    
        /* Konten Utama */
        #page-content-wrapper {
            flex-grow: 1;
            margin-top: 56px; /* Jarak dari navbar */
            margin-left: 20px; /* Jarak dari sidebar */
            overflow-y: auto;
            padding: 20px; /* Tambahkan padding untuk kenyamanan konten */
        }
    
        .list-group-item {
            border: none;
        }
    
        .list-group-item:hover {
            background-color: #495057;
        }
    
        .sidebar-heading {
            text-align: center;
            padding: 1rem;
            font-size: 1.2rem;
            font-weight: bold;
            border-bottom: 1px solid #495057;
        }
    
        .container-fluid {
            overflow-y: auto;
            height: calc(100vh - 56px); /* Kurangi tinggi navbar dari viewport */
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <div class="sidebar-heading">
                <i class="fas fa-graduation-cap me-2"></i> Global Institute
            </div>
            <div class="list-group list-group-flush">
                <a href="{{route('dashboard')}}" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                </a>
            <!-- Dropdown for Karyawan -->
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#karyawanMenu" aria-expanded="false" aria-controls="karyawanMenu">
                <i class="fas fa-user me-2"></i> Karyawan
            </a>
            <div class="collapse" id="karyawanMenu">
                <a href="{{route('dosen.index')}}" class="list-group-item list-group-item-action bg-dark text-white ps-4">Dosen</a>
                <a href="{{route('staff.index')}}" class="list-group-item list-group-item-action bg-dark text-white ps-4">Staff</a>
            </div>
            <!-- Dropdown for Informasi -->
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#informasiMenu" aria-expanded="false" aria-controls="informasiMenu">
                <i class="fas fa-info-circle me-2"></i> Informasi
            </a>
            <div class="collapse" id="informasiMenu">
                <a href="{{route('agenda.index')}}" class="list-group-item list-group-item-action bg-dark text-white ps-4">Agenda</a>
                <a href="{{route('jadwal.index')}}" class="list-group-item list-group-item-action bg-dark text-white ps-4">Jadwal</a>
                <a href="{{route('prodi.index')}}" class="list-group-item list-group-item-action bg-dark text-white ps-4">Prodi</a>
                <a href="{{route('konsentrasi.index')}}" class="list-group-item list-group-item-action bg-dark text-white ps-4">Konsentrasi</a>
                <a href="{{route('matkul.index')}}" class="list-group-item list-group-item-action bg-dark text-white ps-4">Mata Kuliah</a>
            </div>
            <!-- Dropdown for Gedung -->
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#gedungMenu" aria-expanded="false" aria-controls="gedungMenu">
                <i class="fas fa-building me-2"></i> Gedung
            </a>
            <div class="collapse" id="gedungMenu">
                <a href="{{route('kelas.index')}}" class="list-group-item list-group-item-action bg-dark text-white ps-4">Kelas</a>
                <a href="{{route('ruangan.index')}}" class="list-group-item list-group-item-action bg-dark text-white ps-4">Ruangan</a>
            </div>
        </div>
    </div>
    

     <!-- Page Content -->
     <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <div class="d-flex ms-auto">
                    <img src="{{ asset('images/kobo.png') }}" alt="Logo" class="rounded-circle me-2" style="width: 40px;">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <div class="container-fluid py-3">
            @yield('content')
        </div>
    </div>

    <script>
            // Menangani toggle pada dropdown collapse
        document.querySelectorAll('.list-group-item[data-bs-toggle="collapse"]').forEach(item => {
            item.addEventListener('click', function (e) {
                const target = document.querySelector(this.getAttribute('data-bs-target'));
                if (target.classList.contains('show')) 
                else {
                    document.querySelectorAll('.collapse').forEach(collapse => collapse.classList.remove('show')); // Tutup dropdown lainnya
                    target.classList.add('show'); // Buka dropdown yang diklik
                }
                e.preventDefault();
            });
        });
       
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
