<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Aplikasi') - Data Peserta Sertifikasi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
  <div class="container">
    <a class="navbar-brand" href="{{ route('dashboard') }}">Data Peserta Sertifikasi</a>
    <div class="navbar-nav me-auto">
      <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
      <a class="nav-link" href="{{ route('peserta.index') }}">Peserta</a>
      <a class="nav-link" href="{{ route('skema.index') }}">Skema</a>
    </div>
    <span class="navbar-text me-3">Halo, {{ auth()->user()->name }}</span>
    <form action="{{ route('logout') }}" method="post" class="d-inline">
      @csrf
      <button class="btn btn-sm btn-light">Logout</button>
    </form>
  </div>
</nav>

<div class="container">
  @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif
  @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
      {{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>