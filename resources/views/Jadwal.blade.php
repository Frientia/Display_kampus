<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Matakuliah</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f1f4f9;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #1a2a5b;
            color: white;
            padding: 10px 30px;
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
        }

        .current-time {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 2px;
        }

        .date {
            font-size: 16px;
        }

        .container {
            margin: 30px auto;
            width: 95%;
            display: flex;
            flex-direction: column;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        #backButton {
            background-color: #1a2a5b;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            transition: background-color 0.3s ease;
        }

        #backButton:hover {
            background-color: #13204a;
        }

        .filters-container {
            display: flex;
            gap: 20px;
        }

        .filters-container select {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
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
            <p>Jadwal Matakuliah</p>
        </div>
        <div class="time-date-container">
            <p id="current-time" class="current-time"></p>
            <p id="current-date" class="date">1 Januari 2025</p>
        </div>
    </header>

    <div class="container">
        <div class="top-bar">
            <button id="backButton" onclick="window.location.href='/'">
                <i class="fas fa-arrow-left"></i> Kembali
            </button>

            <div class="filters-container">
                <form id="filterForm" method="GET" action="{{ URL('jadwalhome') }}">
                    <select name="konsentrasi" id="konsentrasi" onchange="this.form.submit()">
                        <option value="">Semua Konsentrasi</option>
                        @foreach ($konsentrasiList as $id => $nama)
                            <option value="{{ $id }}" {{ $id == $konsentrasiId ? 'selected' : '' }}>{{ $nama }}</option>
                        @endforeach
                    </select>

                    <select name="semester" id="semester" onchange="this.form.submit()">
                        <option value="">Semua Semester</option>
                        @foreach ($semesterList as $id => $nama)
                            <option value="{{ $id }}" {{ $id == $semesterId ? 'selected' : '' }}>{{ $nama }}</option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>

        <!-- Jadwal Tabel -->
        <table>
            <thead>
                <tr>
                    <th><i class="fas fa-hashtag"></i> No.</th>
                    <th><i class="fas fa-book"></i> Matakuliah</th>
                    <th><i class="fas fa-clock"></i> Jam</th>
                    <th><i class="fas fa-door-open"></i> Ruangan</th>
                    <th><i class="fas fa-door-open"></i> Kelas</th>
                    <th><i class="fas fa-graduation-cap"></i> SKS</th>
                    <th><i class="fas fa-chalkboard-teacher"></i> Dosen</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($jadwal as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="border p-2">{{ $item->nama_matkul }}</td>
                        <td class="border p-2">{{ $item->jam_masuk }} - {{ $item->jam_selesai }}</td>
                        <td class="border p-2">{{ $item->nama_ruangan }}</td>
                        <td class="border p-2">{{ $item->nama_kelas }}</td>
                        <td class="border p-2">{{ $item->sks }}</td>
                        <td class="border p-2">{{ $item->nama_dosen }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <footer>
        <script>
            // Function to update the current time every second
            function updateTime() {
                var currentTimeElement = document.getElementById("current-time");
                var date = new Date();
                var hours = date.getHours();
                var minutes = date.getMinutes();
                var seconds = date.getSeconds();
                var currentTime = `${hours}:${minutes < 10 ? '0' : ''}${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
                currentTimeElement.textContent = currentTime;
            }

            // Refresh every second
            setInterval(updateTime, 1000);
            updateTime(); // Initialize the time on page load
        </script>

        <p>Global Institute &copy; 2025</p>
    </footer>
</body>
</html>
