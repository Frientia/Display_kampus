<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Papan Informasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body onload="updateDateTime()">
    <div class="container-fluid bg-primary text-white py-2">
        <div class="d-flex justify-content-between align-items-center">
            <img src="{{ asset('utama/img/logog.png') }}" alt="Logo" style="height: 50px;">
            <div>
                <span id="time" class="fw-bold"></span> <br>
                <small id="date"></small>
            </div>
        </div>
    </div>

    <!-- Marquee -->
    <div class="bg-dark text-white py-2">
        <marquee>Mahasiswa Institut Bisnis Sarana Global berhasil meraih Prestasi Juara 1 Desain | Global Berhasil Meraih Medali Gold</marquee>
    </div>

    <!-- Content -->
    <div class="container my-4">
        <div class="row">
            <!-- Slider -->
            <div class="col-lg-8 mb-4">
                <div id="carouselExample" class="carousel slide mb-4" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('utama/img/campus.jpg') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://via.placeholder.com/1200x400" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <!-- Jadwal Cards -->
                <div class="row">
                    <div class="col-md-3 mb-4">
                        <div class="card text-center">
                            <img src="{{ asset('utama/img/campus.jpg') }}" class="card-img-top" alt="Jadwal Mata Kuliah">
                            <div class="card-body">
                                <h5 class="card-title">Jadwal Mata Kuliah</h5>
                                <a href="#" class="btn btn-warning">Lihat Jadwal</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card text-center">
                            <img src="{{ asset('utama/img/campus.jpg') }}" class="card-img-top" alt="Jadwal Dosen">
                            <div class="card-body">
                                <h5 class="card-title">Jadwal Dosen</h5>
                                <a href="#" class="btn btn-warning">Lihat Jadwal</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card text-center">
                            <img src="{{ asset('utama/img/campus.jpg') }}" class="card-img-top" alt="Jadwal Agenda">
                            <div class="card-body">
                                <h5 class="card-title">Jadwal Agenda</h5>
                                <a href="#" class="btn btn-warning">Lihat Jadwal</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card text-center">
                            <img src="{{ asset('utama/img/campus.jpg') }}" class="card-img-top" alt="Jadwal Staff">
                            <div class="card-body">
                                <h5 class="card-title">Jadwal Staff</h5>
                                <a href="#" class="btn btn-warning">Lihat Jadwal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informasi Terkini & Petugas Hari Ini -->
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">Informasi Terkini</div>
                    <ul class="list-group list-group-flush">
                        @foreach ($agendas as $agenda)
                            <li class="list-group-item">
                                {{ $agenda->nama_agenda }} - {{ \Carbon\Carbon::parse($agenda->tanggal)->format('d F Y') }}
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="card">
                    <div class="card-header bg-primary text-white">Petugas Hari Ini</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Ibu Puan Mahasiswa</li>
                        <li class="list-group-item">Bapak Aditya Rusdi</li>
                        <li class="list-group-item">Prof. Yadi S.KM</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script>
        function updateDateTime() {
            const now = new Date();
            const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

            const day = days[now.getDay()];
            const date = now.getDate();
            const month = months[now.getMonth()];
            const year = now.getFullYear();

            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');

            document.getElementById('time').textContent = `${hours}:${minutes}:${seconds} WIB`;
            document.getElementById('date').textContent = `${day}, ${date} ${month} ${year}`;
        }

        setInterval(updateDateTime, 1000);
    </script>
</body>
</html>
