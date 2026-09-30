@extends('layouts.app')
@section('title', 'Detail Peserta')

@section('content')
<h3 class="mb-3">Detail Peserta</h3>
<div class="card"><div class="card-body">
<table class="table table-borderless mb-0">
  <tr><th width="200">NIK</th><td>{{ $peserta->nik }}</td></tr>
  <tr><th>Nama</th><td>{{ $peserta->nama }}</td></tr>
  <tr><th>Email</th><td>{{ $peserta->email }}</td></tr>
  <tr><th>No. HP</th><td>{{ $peserta->no_hp }}</td></tr>
  <tr><th>Tanggal Lahir</th><td>{{ $peserta->tanggal_lahir?->format('d-m-Y') ?? '-' }}</td></tr>
  <tr><th>Alamat</th><td>{!! nl2br(e($peserta->alamat)) !!}</td></tr>
  <tr><th>Skema</th><td>{{ $peserta->skema?->kode_skema ?? '-' }} - {{ $peserta->skema?->nama_skema ?? '-' }}</td></tr>
  <tr><th>Didaftarkan</th><td>{{ $peserta->created_at?->format('d-m-Y H:i') ?? '-' }}</td></tr>
</table>
</div></div>
<a href="{{ route('peserta.index') }}" class="btn btn-secondary mt-3">Kembali</a>
<a href="{{ route('peserta.edit', $peserta) }}" class="btn btn-warning mt-3">Ubah</a>
@endsection