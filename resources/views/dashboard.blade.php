@extends('layout.app')
@section('content')
<!-- Main Content -->
<div class="main-content">
    <div class="container mt-4">
        <h2 class="text-center mb-4">Selamat Datang Di Dashboard</h2>
        <div class="row">
            <!-- Card untuk Tabel Agenda -->
            <div class="col-md-4">
                <div class="card shadow-sm bg-primary text-white">
                    <div class="card-body text-center">
                        <h5 class="card-title">
                            <i class="fas fa-calendar-alt"></i> Agenda
                        </h5>
                        <p class="mt-2">Total Data: <strong>{{ $agendaCount }}</strong></p>
                    </div>
                </div>
            </div>

            <!-- Card untuk Tabel Akuns -->
            <div class="col-md-4">
                <div class="card shadow-sm bg-success text-white">
                    <div class="card-body text-center">
                        <h5 class="card-title">
                            <i class="fas fa-users"></i> Akuns
                        </h5>
                        <p class="mt-2">Total Data: <strong>{{ $akunsCount }}</strong></p>
                    </div>
                </div>
            </div>

            <!-- Card untuk Tabel Dosen -->
            <div class="col-md-4">
                <div class="card shadow-sm bg-info text-white">
                    <div class="card-body text-center">
                        <h5 class="card-title">
                            <i class="fas fa-chalkboard-teacher"></i> Dosen
                        </h5>
                        <p class="mt-2">Total Data: <strong>{{ $dosenCount }}</strong></p>
                    </div>
                </div>
            </div>

            <!-- Card untuk Tabel Jadwal -->
            <div class="col-md-4">
                <div class="card shadow-sm bg-warning text-dark">
                    <div class="card-body text-center">
                        <h5 class="card-title">
                            <i class="fas fa-clock"></i> Jadwal
                        </h5>
                        <p class="mt-2">Total Data: <strong>{{ $jadwalCount }}</strong></p>
                    </div>
                </div>
            </div>

            <!-- Card untuk Tabel Kelas -->
            <div class="col-md-4">
                <div class="card shadow-sm bg-danger text-white">
                    <div class="card-body text-center">
                        <h5 class="card-title">
                            <i class="fas fa-school"></i> Kelas
                        </h5>
                        <p class="mt-2">Total Data: <strong>{{ $kelasCount }}</strong></p>
                    </div>
                </div>
            </div>

            <!-- Card untuk Tabel Matkul -->
            <div class="col-md-4">
                <div class="card shadow-sm bg-secondary text-white">
                    <div class="card-body text-center">
                        <h5 class="card-title">
                            <i class="fas fa-book"></i> Matkul
                        </h5>
                        <p class="mt-2">Total Data: <strong>{{ $matkulCount }}</strong></p>
                    </div>
                </div>
            </div>

            <!-- Card untuk Chart -->
            <div class="col-md-12 mt-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-center">Statistik Data</h5>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Tambahkan FontAwesome CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" integrity="sha512-dOgUT6OFeZKOYPA76SLsb3AXUnm0QhKt9QvpXYgLdLj/1S+JcHPfji/zZVAlANlIRXT35If8LA65z3hbYI2Q2A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar', // Tipe chart (bar, line, pie, dll)
        data: {
            labels: ['Agenda', 'Akun', 'Dosen', 'Jadwal', 'Kelas', 'Matkul'], // Label untuk data
            datasets: [{
                label: 'Total Data',
                data: [{{ $agendaCount }}, {{ $akunsCount }}, {{ $dosenCount }}, {{ $jadwalCount }}, {{ $kelasCount }}, {{ $matkulCount }}], // Data yang ditampilkan
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)', // Warna untuk setiap bar
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 206, 86, 0.2)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)', // Warna border bar
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

@if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 2000
        });
    </script>
@endif
@endsection
