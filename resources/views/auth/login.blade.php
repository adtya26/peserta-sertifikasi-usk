<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container" style="max-width:420px; margin-top:12vh;">
  <div class="card shadow-sm">
    <div class="card-body p-4">
      <h4 class="text-center mb-1">Login Administrator</h4>
      <p class="text-center text-muted">Aplikasi Pengelolaan Data Peserta Sertifikasi</p>

      @if ($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
      @endif

      <form method="post" action="{{ route('login.proses') }}">
        @csrf
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" value="{{ old('email') }}" class="form-control" autofocus>
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control">
        </div>
        <button class="btn btn-primary w-100">Masuk</button>
      </form>
    </div>
  </div>
</div>
</body>
</html>