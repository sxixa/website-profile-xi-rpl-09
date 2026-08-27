@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Developer Anggota - XI RPL 1</title>
    <style>
        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        header {
            text-align: center;
            margin-bottom: 40px;
        }

        header h1 {
            color: #2c3e50;
            font-size: 2.2rem;
            margin-bottom: 8px;
        }

        header p {
            color: #7f8c8d;
            font-size: 1rem;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 20px;
        }

        .card {
            background: #ffffff;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border-top: 4px solid #3498db;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .card h3 {
            color: #2c3e50;
            font-size: 1.25rem;
            margin-bottom: 4px;
        }

        .role {
            display: inline-block;
            background-color: #e8f4fc;
            color: #2980b9;
            font-size: 0.85rem;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 20px;
            margin-bottom: 14px;
        }

        .card p {
            color: #555;
            font-size: 0.95rem;
            line-height: 1.5;
        }
    </style>
</head>
<body>

    <div class="container">
        <header>
            <h1>Anggota Tim Developer</h1>
            <p>Tim di balik pengembangan aplikasi dan sistem proyek XI RPL</p>
        </header>

        <div class="team-grid">
            <div class="card">
                <h3>Muhammad Jibrilian Sidiq Akasya</h3>
                <span class="role">Project Manager</span>
                <p>Bertanggung jawab mengelola alur proyek, membagi tugas tim, dan memastikan target selesai tepat waktu.</p>
            </div>

            <div class="card">
                <h3>Synta Awaling</h3>
                <span class="role"> Developer Profile </span>
                <p>Merancang profil anggota tim.</p>
            </div>

            <div class="card">
                <h3>Taufiq Nur Muhammad Irvan</h3>
                <span class="role"> Developer Anggota</span>
                <p>Mengurus dokumentasi dan komunikasi antar anggota tim.</p>
            </div>

            <div class="card">
                <h3>Abdul Jamil Febriansyah</h3>
                <span class="role">Developer Kontak</span>
                <p>Membuat halaman kontak untuk tim.</p>
            </div>
        </div>
    </div>

</body>
</html>
@endsection