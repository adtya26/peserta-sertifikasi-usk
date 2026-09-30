@extends('layouts.app')
@section('title', 'Data Skema')

@section('content')
<div class="d-flex justify-content-between mb-3">
  <h3>Data Skema Sertifikasi</h3>
  <a href="{{ route('skema.create') }}" class="btn btn-primary">+ Tambah Skema</a>
</div>

<div class="card"><div class="table-responsive">
<table class="table table-striped mb-0">
  <thead>
    <tr><th>#</th><th>Kode</th><th>Nama Skema</th><th>Deskripsi</th><th>Peserta</th><th width="160">Aksi</th></tr>
  </thead>
  <tbody>
    @forelse ($skemas as $s)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $s->kode_skema }}</td>
        <td>{{ $s->nama_skema }}</td>
        <td>{{ $s->deskripsi }}</td>
        <td>{{ $s->pesertas_count }}</td>
        <td>
          <a href="{{ route('skema.edit', $s) }}" class="btn btn-sm btn-warning">Ubah</a>
          <form action="{{ route('skema.destroy', $s) }}" method="post" class="d-inline"
                onsubmit="return confirm('Yakin hapus skema ini?')">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-danger">Hapus</button>
          </form>
        </td>
      </tr>
    @empty
      <tr><td colspan="6" class="text-center text-muted">Belum ada data.</td></tr>
    @endforelse
  </tbody>
</table>
</div></div>
@endsection