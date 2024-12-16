<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Papan Informasi</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <!-- Header -->
    <div class="bg-primary text-white py-2">
        <div class="container d-flex justify-content-between">
        <img src="{{ asset('home/img/logo.png') }}" alt="Logo Papan Informasi" style="height: 50px;">
        <div class="text-end">
            <span id="current-time">--:--:--</span> <br><span id="current-date">--, -- -- ----</span>
        </div>
        </div>
    </div>
    <!-- Main Content -->
    <div class="container mt-4">
        <div class="row">
        
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    function updateClock() {
        const now = new Date();

        // Ambil jam, menit, detik
        let hours = now.getHours();
        let minutes = now.getMinutes();
        let seconds = now.getSeconds();

        // Tambahkan nol di depan jika angkanya kurang dari 10
        hours = hours < 10 ? '0' + hours : hours;
        minutes = minutes < 10 ? '0' + minutes : minutes;
        seconds = seconds < 10 ? '0' + seconds : seconds;

        // Format jam
        const timeString = `${hours}:${minutes}:${seconds}`;

        // Ambil hari, tanggal, bulan, tahun
        const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        
        const dayName = days[now.getDay()];
        const date = now.getDate();
        const monthName = months[now.getMonth()];
        const year = now.getFullYear();

        // Format tanggal
        const dateString = `${dayName}, ${date} ${monthName} ${year}`;

        // Update elemen HTML
        document.getElementById('current-time').innerText = timeString;
        document.getElementById('current-date').innerText = dateString;
    }

    // Panggil updateClock setiap detik
    setInterval(updateClock, 1000);

    // Panggil sekali saat halaman dimuat
    updateClock();
</script>

</body>
</html>
