@extends('layouts.app')
@section('title', 'Detail Peserta')

@section('content')
<h3>Detail Peserta</h3>

<div class="kartu kartu-isi">
  <table class="tabel-detail">
    <tr><th>NIK</th><td>{{ $peserta->nik }}</td></tr>
    <tr><th>Nama</th><td>{{ $peserta->nama }}</td></tr>
    <tr><th>Email</th><td>{{ $peserta->email }}</td></tr>
    <tr><th>No. HP</th><td>{{ $peserta->no_hp }}</td></tr>
    <tr><th>Tanggal Lahir</th><td>{{ $peserta->tanggal_lahir?->format('d-m-Y') ?? '-' }}</td></tr>
    <tr><th>Alamat</th><td>{!! nl2br(e($peserta->alamat)) !!}</td></tr>
    <tr><th>Skema</th><td>{{ $peserta->skema?->kode_skema ?? '-' }} - {{ $peserta->skema?->nama_skema ?? '-' }}</td></tr>
    <tr><th>Didaftarkan</th><td>{{ $peserta->created_at?->format('d-m-Y H:i') ?? '-' }}</td></tr>
  </table>
</div>

<div style="margin-top: 1rem;">
  <a href="{{ route('peserta.index') }}" class="btn btn-abu">Kembali</a>
  <a href="{{ route('peserta.edit', $peserta) }}" class="btn btn-ubah">Ubah</a>
</div>
@endsection