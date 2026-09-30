@extends('layouts.app')
@section('title', 'Data Peserta')

@section('content')
<div class="d-flex justify-content-between mb-3">
  <h3>Data Peserta</h3>
  <a href="{{ route('peserta.create') }}" class="btn btn-primary">+ Tambah Peserta</a>
</div>

<form method="get" class="row g-2 mb-3">
  <div class="col-md-6">
    <input type="text" name="q" value="{{ $q }}" class="form-control"
           placeholder="Cari nama / NIK / email / skema">
  </div>
  <div class="col-auto">
    <button class="btn btn-success">Cari</button>
    <a href="{{ route('peserta.index') }}" class="btn btn-outline-secondary">Reset</a>
  </div>
</form>

<div class="card"><div class="table-responsive">
<table class="table table-striped mb-0">
  <thead>
    <tr><th>#</th><th>NIK</th><th>Nama</th><th>Email</th><th>Skema</th><th width="220">Aksi</th></tr>
  </thead>
  <tbody>
    @forelse ($pesertas as $p)
      <tr>
        <td>{{ $pesertas->firstItem() + $loop->index }}</td>
        <td>{{ $p->nik }}</td>
        <td>{{ $p->nama }}</td>
        <td>{{ $p->email }}</td>
        <td>{{ $p->skema->nama_skema }}</td>
        <td>
          <a href="{{ route('peserta.show', $p) }}" class="btn btn-sm btn-info">Detail</a>
          <a href="{{ route('peserta.edit', $p) }}" class="btn btn-sm btn-warning">Ubah</a>
          <form action="{{ route('peserta.destroy', $p) }}" method="post" class="d-inline"
                onsubmit="return confirm('Yakin hapus data peserta ini?')">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-danger">Hapus</button>
          </form>
        </td>
      </tr>
    @empty
      <tr><td colspan="6" class="text-center text-muted">Data tidak ditemukan.</td></tr>
    @endforelse
  </tbody>
</table>
</div></div>

<div class="mt-3">{{ $pesertas->links() }}</div>
@endsection