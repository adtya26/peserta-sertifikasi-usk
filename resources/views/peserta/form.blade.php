@extends('layouts.app')
@section('title', $peserta->exists ? 'Ubah Peserta' : 'Tambah Peserta')

@section('content')
<h3 class="mb-3">{{ $peserta->exists ? 'Ubah Peserta' : 'Tambah Peserta' }}</h3>

<div class="card"><div class="card-body">
<form method="post" novalidate
      action="{{ $peserta->exists ? route('peserta.update', $peserta) : route('peserta.store') }}">
  @csrf
  @if ($peserta->exists) @method('PUT') @endif

  @php
    $inputs = [
      ['nik', 'NIK (16 digit)', 'text'],
      ['nama', 'Nama Lengkap', 'text'],
      ['email', 'Email', 'email'],
      ['no_hp', 'No. HP', 'text'],
      ['tanggal_lahir', 'Tanggal Lahir', 'date'],
    ];
  @endphp

  @foreach ($inputs as [$name, $label, $type])
    @php
      $default = $name === 'tanggal_lahir' ? $peserta->tanggal_lahir?->format('Y-m-d') : $peserta->{$name};
    @endphp
    <div class="mb-3">
      <label class="form-label">{{ $label }} *</label>
      <input type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $default) }}"
             class="form-control @error($name) is-invalid @enderror">
      @error($name) <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
  @endforeach

  <div class="mb-3">
    <label class="form-label">Alamat *</label>
    <textarea name="alamat" rows="3"
              class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $peserta->alamat) }}</textarea>
    @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
  </div>

  <div class="mb-3">
    <label class="form-label">Skema Sertifikasi *</label>
    <select name="skema_id" class="form-select @error('skema_id') is-invalid @enderror">
      <option value="">-- Pilih Skema --</option>
      @foreach ($skemaList as $s)
        <option value="{{ $s->id }}" @selected(old('skema_id', $peserta->skema_id) == $s->id)>
          {{ $s->nama_skema }}
        </option>
      @endforeach
    </select>
    @error('skema_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
  </div>

  <button class="btn btn-primary">Simpan</button>
  <a href="{{ route('peserta.index') }}" class="btn btn-secondary">Batal</a>
</form>
</div></div>
@endsection