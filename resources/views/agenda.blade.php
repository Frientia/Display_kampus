
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>

    <!-- Menambahkan Font Awesome untuk ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Menggunakan Google Fonts Poppins untuk font modern -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        /* Menambahkan font Poppins */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f1f4f9;
            display: flex;
            flex-direction: column;
            height: 100vh; /* Full height viewport */
        }

        /* Header */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #1a2a5b; /* Warna biru yang lebih gelap */
            color: white;
            padding: 5px 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            font-weight: 600;
        }

        .logo {
            width: 150px;
        }

        .header-text {
            text-align: center;
            flex-grow: 1;
            font-size: 24px;
        }

        .time-date-container {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            font-size: 14px;
            color: #fff;
            margin-left: auto; /* Memindahkan ke kanan */
        }

        .current-time {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 2px; /* Mengurangi jarak antara jam dan tanggal */
        }

        .date {
            font-size: 16px;
            margin-top: 0;
        }

        /* Container dan Tombol */
        .container {
            display: flex;
            justify-content: space-between; /* Tombol Kembali di kiri dan kolom cari di kanan */
            align-items: center;
            margin-top: 30px;
            padding: 0 20px;
        }

        #backButton {
            background-color: #1a2a5b;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
            transition: background-color 0.3s ease;
        }

        #backButton i {
            margin-right: 8px;
        }

        #backButton:hover {
            background-color: #13204a;
        }

        .search-container {
            display: flex;
            align-items: center;
        }

        .date-picker {
            border: 1px solid #ddd;
            width: 250px;
            padding: 10px;
            font-size: 16px;
            border-radius: 6px;
            margin-right: 10px;
            background-color: #fff;
            transition: border 0.3s ease;
        }

        .date-picker:focus {
            border-color: #1a2a5b;
        }

        table {
            width: 97%;
            margin: 30px auto;
            border-collapse: collapse;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 20px;
            text-align: center;
            font-size: 16px;
            color: #333;
        }

        th {
            background-color: #dadada;
            color: #000000;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        td {
            background-color: #fff;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f9f9f9;
            transition: background-color 0.3s ease;
        }

        tr:last-child td {
            border-bottom: none;
        }

        footer {
            background-color: #1a2a5b;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: auto;
        }
    </style>
</head>
<body>
    <header>
        <img src="{{ asset('utama/img/logog.png') }}" alt="Global Institute Logo" class="logo">
        <div class="header-text">
            <p>Agenda</p>
        </div>
        <div class="time-date-container">
            <p id="current-time" class="current-time"></p>
            <p id="current-date" class="date"></p>
        </div>
    </header>

    <div class="container">
        <!-- Tombol Kembali dengan ikon -->
        <button id="backButton"><i class="fas fa-arrow-left"></i>Kembali</button>
        <div class="search-container">
            <input type="month" id="monthFilter" class="select">
        </div>
        
    </div>

    <table id="agendaTable">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Agenda</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Lokasi</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data agenda dari server akan dimasukkan di sini -->
            <tr>
                <td>1</td>
                <td>Rapat Mingguan</td>
                <td>2025-01-10</td>
                <td>08:00 - 10:00</td>
                <td>Ruang Rapat A</td>
                <td>Diskusi mengenai perkembangan proyek.</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Workshop</td>
                <td>2025-01-12</td>
                <td>13:00 - 16:00</td>
                <td>Lab Komputer</td>
                <td>Pelatihan penggunaan sistem terbaru.</td>
            </tr>
        </tbody>
    </table>

    <footer>
        <p>&copy; 2024 Global Institute. All Rights Reserved.</p>
    </footer>

    <script>
        // Fungsi untuk memperbarui waktu secara real-time
        function updateTime() {
            const now = new Date();
            let hours = now.getHours();
            let minutes = now.getMinutes();
            let seconds = now.getSeconds();

            hours = hours < 10 ? '0' + hours : hours;
            minutes = minutes < 10 ? '0' + minutes : minutes;
            seconds = seconds < 10 ? '0' + seconds : seconds;

            const timeString = `${hours}:${minutes}:${seconds} WIB`;
            document.getElementById('current-time').textContent = timeString;
        }

        function updateDate() {
            const options = { 
                weekday: 'long', 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric' 
            };
            const currentDate = new Date().toLocaleDateString('id-ID', options);
            document.getElementById('current-date').textContent = currentDate;
        }

        setInterval(updateTime, 1000);
        updateTime();
        updateDate();

        // Tombol kembali
        document.getElementById('backButton').addEventListener('click', function() {
            window.history.back();
        });

        // Filter data berdasarkan bulan
        document.getElementById('monthFilter').addEventListener('change', function () {
        const selectedMonth = this.value; // Mendapatkan bulan yang dipilih dalam format YYYY-MM
        const agendaRows = document.querySelectorAll('#agendaTable tbody tr'); // Semua baris data agenda

        agendaRows.forEach(row => {
            const agendaDate = row.getAttribute('data-date'); // Mendapatkan tanggal dari atribut data-date (format YYYY-MM-DD)
            const agendaMonth = agendaDate.slice(0, 7); // Ekstrak bulan dan tahun dari tanggal (format YYYY-MM)

            if (!selectedMonth || agendaMonth === selectedMonth) {
                row.style.display = ''; // Tampilkan baris jika bulan cocok atau tidak ada bulan yang dipilih
            } else {
                row.style.display = 'none'; // Sembunyikan baris jika bulan tidak cocok
            }
        });
    });