<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container">
        <div class="login-form">
            <h2>Selamat Datang</h2>
            <form action="{{ route('login') }}" method="POST" id="loginForm">
                @csrf
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="Username" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </div>
                
                <button type="submit" class="btn-login">Masuk</button>
                
            </form>
        </div>
        <div class="login-image">
            <img src="{{ asset('images/campus.jpg') }}" alt="Campus Image">
        </div>
    </div>

    <script>
        // Menampilkan SweetAlert setelah login berhasil
        @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Login Berhasil',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 2000
        });
        @endif
        @if(session('warning'))
        Swal.fire({
            icon: 'success',
            title: 'Logout Berhasil',
            text: '{{ session('warning') }}',
            showConfirmButton: false,
            timer: 2000
        });
        @endif
      
    </script>
</body>
</html>
