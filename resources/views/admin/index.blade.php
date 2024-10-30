<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="text-center">Admin Dashboard</h1>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Welcome, {{ Auth::user()->name }}!</h4>
                </div>
                <div class="card-body">
                    <p>Anda berhasil login sebagai Admin.</p>
                    <p>Gunakan menu navigasi untuk mengelola data sekolah.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Quick Links</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="{{ route('guru.index') }}">Kelola Data Guru</a></li>
                        <li class="list-group-item"><a href="{{ route('siswa.index') }}">Kelola Data Siswa</a></li>
                        <li class="list-group-item"><a href="{{ route('wakasek.index') }}">Kelola Data Wakasek</a></li>
                        <li class="list-group-item"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                    </ul>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
