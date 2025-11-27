<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin Panel</a>

        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.client.index') }}">Kelola Client</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.professional.index') }}">Kelola Professional</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.professional.verify') }}">Verifikasi Professional</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

</body>
</html>
