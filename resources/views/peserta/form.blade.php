@extends('layouts.app')
@section('title', $peserta->exists ? 'Ubah Peserta' : 'Tambah Peserta')

@section('content')
<h3>{{ $peserta->exists ? 'Ubah Peserta' : 'Tambah Peserta' }}</h3>

<div class="kartu kartu-isi">
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
      <div class="form-grup">
        <label>{{ $label }} *</label>
        <input type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $default) }}"
               class="input @error($name) salah @enderror">
        @error($name) <div class="teks-salah">{{ $message }}</div> @enderror
      </div>
    @endforeach

    <div class="form-grup">
      <label>Alamat *</label>
      <textarea name="alamat" rows="3"
                class="input @error('alamat') salah @enderror">{{ old('alamat', $peserta->alamat) }}</textarea>
      @error('alamat') <div class="teks-salah">{{ $message }}</div> @enderror
    </div>

    <div class="form-grup">
      <label>Skema Sertifikasi *</label>
      <select name="skema_id" class="input @error('skema_id') salah @enderror">
        <option value="">-- Pilih Skema --</option>
        @foreach ($skemaList as $s)
          <option value="{{ $s->id }}" @selected(old('skema_id', $peserta->skema_id) == $s->id)>
            {{ $s->nama_skema }}
          </option>
        @endforeach
      </select>
      @error('skema_id') <div class="teks-salah">{{ $message }}</div> @enderror
    </div>

    <button class="btn btn-utama">Simpan</button>
    <a href="{{ route('peserta.index') }}" class="btn btn-abu">Batal</a>
  </form>
</div>
@endsection