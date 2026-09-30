@extends('layouts.app')
@section('title', $skema->exists ? 'Ubah Skema' : 'Tambah Skema')

@section('content')
<h3>{{ $skema->exists ? 'Ubah Skema' : 'Tambah Skema' }}</h3>

<div class="kartu kartu-isi">
  <form method="post" novalidate
        action="{{ $skema->exists ? route('skema.update', $skema) : route('skema.store') }}">
    @csrf
    @if ($skema->exists) @method('PUT') @endif

    <div class="form-grup">
      <label>Kode Skema *</label>
      <input type="text" name="kode_skema" value="{{ old('kode_skema', $skema->kode_skema) }}"
             class="input @error('kode_skema') salah @enderror">
      @error('kode_skema') <div class="teks-salah">{{ $message }}</div> @enderror
    </div>

    <div class="form-grup">
      <label>Nama Skema *</label>
      <input type="text" name="nama_skema" value="{{ old('nama_skema', $skema->nama_skema) }}"
             class="input @error('nama_skema') salah @enderror">
      @error('nama_skema') <div class="teks-salah">{{ $message }}</div> @enderror
    </div>

    <div class="form-grup">
      <label>Deskripsi</label>
      <textarea name="deskripsi" rows="3" class="input">{{ old('deskripsi', $skema->deskripsi) }}</textarea>
    </div>

    <button class="btn btn-utama">Simpan</button>
    <a href="{{ route('skema.index') }}" class="btn btn-abu">Batal</a>
  </form>
</div>
@endsection