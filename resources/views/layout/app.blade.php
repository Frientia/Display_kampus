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
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Global Institute</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <!-- Tambahkan menu navbar di sini jika diperlukan -->
                </ul>
                <div class="d-flex align-items-center">
                    <!-- Gambar Profile -->
                    <img src="{{ asset('images/kobo.png') }}" alt="Logo" class="rounded-circle me-2" style="width: 40px; height: 40px;">
                    <!-- Tombol Logout -->
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="profile">
            <img src="{{ asset('images/logo.jpeg') }}" alt="Profile Image">
            <h4>Global Institute</h4>
        </div>
        <ul>
            <li><i class="fas fa-tachometer-alt"></i> <a href="#">Dashboard</a></li>
            <li>
                <i class="fas fa-user"></i> Karyawan
                <ul class="submenu">
                    <li><a href="#">Dosen</a></li>
                    <li><a href="{{route('staff.index')}}">Staff</a></li>
                </ul>
            </li>
            <li>
                <i class="fas fa-info-circle"></i> Informasi
                <ul class="submenu">
                    <li><a href="#">Agenda</a></li>
                    <li><a href="#">Jadwal</a></li>
                </ul>
            </li>
            <li>
                <i class="fas fa-building"></i> Gedung
                <ul class="submenu">
                    <li><a href="#">Kelas</a></li>
                    <li><a href="#">Ruangan</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div>
        @yield('content')
    </div>


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>