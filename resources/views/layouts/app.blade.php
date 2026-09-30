<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Aplikasi') - Data Peserta Sertifikasi</title>
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>

<nav class="topbar">
  <div class="wadah">
    <a class="merek" href="{{ route('dashboard') }}">Data Peserta</a>

    <div class="menu">
      <a class="{{ request()->routeIs('dashboard') ? 'aktif' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
      <a class="{{ request()->routeIs('peserta.*') ? 'aktif' : '' }}" href="{{ route('peserta.index') }}">Peserta</a>
      <a class="{{ request()->routeIs('skema.*') ? 'aktif' : '' }}" href="{{ route('skema.index') }}">Skema</a>
    </div>

    <span class="sapaan">{{ auth()->user()->name }}</span>
    <form action="{{ route('logout') }}" method="post" class="form-inline">
      @csrf
      <button class="btn btn-kecil btn-abu">Logout</button>
    </form>
  </div>
</nav>

<div class="wadah" style="padding-bottom: 3rem;">
  @if (session('success'))
    <div class="alert alert-sukses">{{ session('success') }}</div>
  @endif
  @if (session('error'))
    <div class="alert alert-error">{{ session('error') }}</div>
  @endif

  @yield('content')
</div>

</body>
</html>