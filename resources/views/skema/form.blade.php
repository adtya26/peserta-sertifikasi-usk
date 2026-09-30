@extends('layouts.app')
@section('title', $skema->exists ? 'Ubah Skema' : 'Tambah Skema')

@section('content')
<h3 class="mb-3">{{ $skema->exists ? 'Ubah Skema' : 'Tambah Skema' }}</h3>

<div class="card"><div class="card-body">
<form method="post" novalidate
      action="{{ $skema->exists ? route('skema.update', $skema) : route('skema.store') }}">
  @csrf
  @if ($skema->exists) @method('PUT') @endif

  <div class="mb-3">
    <label class="form-label">Kode Skema *</label>
    <input type="text" name="kode_skema" value="{{ old('kode_skema', $skema->kode_skema) }}"
           class="form-control @error('kode_skema') is-invalid @enderror">
    @error('kode_skema') <div class="invalid-feedback">{{ $message }}</div> @enderror
  </div>

  <div class="mb-3">
    <label class="form-label">Nama Skema *</label>
    <input type="text" name="nama_skema" value="{{ old('nama_skema', $skema->nama_skema) }}"
           class="form-control @error('nama_skema') is-invalid @enderror">
    @error('nama_skema') <div class="invalid-feedback">{{ $message }}</div> @enderror
  </div>

  <div class="mb-3">
    <label class="form-label">Deskripsi</label>
    <textarea name="deskripsi" rows="3" class="form-control">{{ old('deskripsi', $skema->deskripsi) }}</textarea>
  </div>

  <button class="btn btn-primary">Simpan</button>
  <a href="{{ route('skema.index') }}" class="btn btn-secondary">Batal</a>
</form>
</div></div>
@endsection