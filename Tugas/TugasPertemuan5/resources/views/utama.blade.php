<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'sistem toko')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="container">
            <a href="/" class="brand">🌸 MyApp</a>
            <ul class="nav-links">
                <li><a href="/dashboard">Dashboard</a></li>
                <li><a href="/profile">Profile</a></li>
                <li><a href="/konten">Konten</a></li>
                <li><a href="/product/5">Produk</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container">
        <h1>@yield('title-page')</h1>
        @yield('konten')
    </main>

    <footer class="footer">
        <p>© {{ date('Y') }} Framework Pemrograman Web</p>
    </footer>
</body>
</html>
