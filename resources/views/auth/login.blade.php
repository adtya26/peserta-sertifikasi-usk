<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
<div class="login-wrap">
  <div class="kartu">
    <div class="kartu-isi">
      <h4>Login Administrator</h4>
      <p class="sub redup">Aplikasi Pengelolaan Data Peserta Sertifikasi</p>

      @if ($errors->any())
        <div class="alert alert-error">{{ $errors->first() }}</div>
      @endif

      <form method="post" action="{{ route('login.proses') }}">
        @csrf
        <div class="form-grup">
          <label>Email</label>
          <input type="email" name="email" value="{{ old('email') }}" class="input" autofocus>
        </div>
        <div class="form-grup">
          <label>Password</label>
          <input type="password" name="password" class="input">
        </div>
        <button class="btn btn-utama btn-penuh">Masuk</button>
      </form>
    </div>
  </div>
</div>
</body>
</html>