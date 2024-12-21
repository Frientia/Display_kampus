@extends('layout.app')
@section('content')
<!-- Main Content -->
<div class="main-content">
    <div class="container mt-4">
        <h2 class="text-center mb-4">Dashboard</h2>
        <div class="row">
            <!-- Card 3 (Customizable) -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Judul Card</h5>
                        <p>Konten di sini.</p>
                    </div>
                </div>
            </div>
             <!-- Card 3 (Customizable) -->
             <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Judul Card</h5>
                        <p>Konten di sini.</p>
                    </div>
                </div>
            </div>
             <!-- Card 3 (Customizable) -->
             <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Judul Card</h5>
                        <p>Konten di sini.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
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
</body>
</html>
@endsection
