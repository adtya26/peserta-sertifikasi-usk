@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<h3>Dashboard</h3>

<div class="stat-grid">
  <div class="kartu kartu-isi stat biru">
    <div class="label">Total Peserta</div>
    <p class="angka">{{ $totalPeserta }}</p>
  </div>
  <div class="kartu kartu-isi stat hijau">
    <div class="label">Total Skema Sertifikasi</div>
    <p class="angka">{{ $totalSkema }}</p>
  </div>
</div>

<div class="kartu">
  <div class="kartu-judul">Jumlah Peserta per Skema</div>
  <div class="tabel-wrap">
    <table class="tabel">
      <thead><tr><th>Skema</th><th>Jumlah Peserta</th></tr></thead>
      <tbody>
        @foreach ($perSkema as $s)
          <tr><td>{{ $s->nama_skema }}</td><td>{{ $s->pesertas_count }}</td></tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection