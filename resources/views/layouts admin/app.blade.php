<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Link to Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link to Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #343a40;
            color: white;
            transition: all 0.5s ease-in-out;
        }

        .sidebar.collapsed {
            width: 70px;
        }

        .sidebar.collapsed .main-header {
            height: 77px;
        }

        .sidebar.collapsed .nav-link {
            text-align: center;
            font-size: 14px;
        }

        .sidebar.collapsed .nav-link i {
            margin-right: 0;
        }

        .sidebar.collapsed .nav-link span {
            display: none;
        }

        .sidebar.collapsed .main-header img {
            display: inline-block;
        }

        .sidebar.collapsed .main-header h4 {
            display: none;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #343a40;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            transition: all 0.3s ease;
        }

        .content.collapsed {
            margin-left: 70px;
        }

        .navbar {
            margin-left: 250px;
            transition: all 0.3s ease;
        }

        .navbar.collapsed {
            margin-left: 70px;
        }

        .main-header {
            padding: 20px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
        }

        .sidebar .nav-item {
            padding: 10px;
        }

        .sidebar .nav-item.active {
            background-color: #007bff;
        }

        /* Menyesuaikan posisi dropdown */
        .dropdown-menu {
            left: auto !important;    /* Membiarkan posisi otomatis */
            right: 0px !important;      /* Mengatur dropdown ke kanan */
            padding: 0 0;          /* Menambahkan padding pada dropdown */
        }

        /* Menyesuaikan margin pada icon profil */
        .nav-item.dropdown {
            margin-right: 10px;       /* Menambahkan margin kanan agar tidak terlalu mepet */
        }

        .dropdown-item {
            padding: 10px 0px 10px 10px;  /* Memberikan padding lebih agar tombol tidak terlalu kecil */
            display: flex;
            align-items: center;  /* Menyelaraskan ikon dan teks secara vertikal */
        }

        .dropdown-item i {
            margin-right: 8px;  /* Memberikan jarak antara ikon dan teks */
        }


        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }
            .sidebar.collapsed {
                display: block;
                width: 250px;
            }
            .content {
                margin-left: 0px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <!-- Profile Icon with Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="profile-icon">
                            <i class="fas fa-user"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <!-- Logout Form in Dropdown -->
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="main-header">
            <h4>ASW</h4>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('admin.users.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.users.index') }}">
                    <i class="fas fa-users"></i> <span>User Management</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('despar.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('despar.index') }}">
                    <i class="fas fa-users"></i> <span>Destinasi Management</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('desa.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('desa.index') }}">
                    <i class="fas fa-users"></i> <span>Desa M</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('kecamatan.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('kecamatan.index') }}">
                    <i class="fas fa-users"></i> <span>Kecamatan M</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('kabupaten.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('kabupaten.index') }}">
                    <i class="fas fa-users"></i> <span>Kabupaten M</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('provinsi.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('provinsi.index') }}">
                    <i class="fas fa-users"></i> <span>Provinsi M</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-cogs"></i> <span>Permission</span></a>
            </li>
        </ul>
    </div>

    <!-- Collapse Button -->
    <button id="sidebarToggle" class="btn btn-light" style="position: fixed; top: 10px; left: 10px; z-index: 1000; background-color: #419944; color: #ffffff; border-color: #419944;">
        ☰
    </button>

    <!-- Content -->
    <div class="content" id="content">
        @yield('content')
    </div>

    <!-- Include jQuery, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Toggle Sidebar
        document.getElementById('sidebarToggle').addEventListener('click', function () {
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content');
            const navbar = document.getElementById('navbar');  // ambil navbar
            sidebar.classList.toggle('collapsed');
            content.classList.toggle('collapsed');
            navbar.classList.toggle('collapsed');   // toggle class collapsed pada navbar
        });
    </script>
</body>
</html>
