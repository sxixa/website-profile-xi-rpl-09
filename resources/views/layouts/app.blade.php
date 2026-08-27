<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Profil XI RPL</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: #f8fafc;
            color: #1e293b;
        }

        /* Navbar Styling */
        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 1.5rem;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .navbar-brand {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1e293b;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .navbar-brand span {
            color: #2563eb;
        }

        .navbar-menu {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            list-style: none;
        }

        .navbar-link {
            text-decoration: none;
            color: #64748b;
            font-size: 0.95rem;
            font-weight: 500;
            padding: 0.5rem 0.75rem;
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .navbar-link:hover {
            color: #2563eb;
            background-color: #eff6ff;
        }

        .navbar-link.active {
            color: #2563eb;
            font-weight: 600;
            background-color: #eff6ff;
        }

        /* Tempat merender konten halaman */
        .main-content {
            min-height: calc(100vh - 70px);
        }
    </style>
</head>
<body>

    <!-- Header / Navbar Slicing -->
    <header class="navbar">
        <div class="navbar-container">
            <!-- Brand Logo / Nama Kelas -->
            <a href="{{ url('/') }}" class="navbar-brand">
                XI <span>RPL</span>
            </a>

            <!-- Menu Navigasi Tim -->
            <ul class="navbar-menu">
                <li>
                    <a href="{{ url('/profil') }}" class="navbar-link {{ Request::is('profil') ? 'active' : '' }}">
                        Profil
                    </a>
                </li>
                <li>
                    <a href="{{ url('/anggota') }}" class="navbar-link {{ Request::is('anggota') ? 'active' : '' }}">
                        Anggota
                    </a>
                </li>
                <li>
                    <a href="{{ url('/kontak') }}" class="navbar-link {{ Request::is('kontak') ? 'active' : '' }}">
                        Kontak
                    </a>
                </li>
            </ul>
        </div>
    </header>

    <!-- Slot tempat halaman kontak.blade.php / profil.blade.php ditampilkan -->
    <main class="main-content">
        @yield('content')
    </main>

</body>
</html>