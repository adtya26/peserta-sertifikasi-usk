@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<h3 class="mb-3">Dashboard</h3>
<div class="row g-3 mb-4">
  <div class="col-md-6">
    <div class="card text-bg-primary"><div class="card-body">
      <div>Total Peserta</div><h2>{{ $totalPeserta }}</h2>
    </div></div>
  </div>
  <div class="col-md-6">
    <div class="card text-bg-success"><div class="card-body">
      <div>Total Skema Sertifikasi</div><h2>{{ $totalSkema }}</h2>
    </div></div>
  </div>
</div>

<div class="card">
  <div class="card-header">Jumlah Peserta per Skema</div>
  <table class="table mb-0">
    <thead><tr><th>Skema</th><th>Jumlah Peserta</th></tr></thead>
    <tbody>
      @foreach ($perSkema as $s)
        <tr><td>{{ $s->nama_skema }}</td><td>{{ $s->pesertas_count }}</td></tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection