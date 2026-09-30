@extends('layouts.app')
@section('title', 'Data Skema')

@section('content')
<div class="baris-judul">
  <h3>Data Skema Sertifikasi</h3>
  <a href="{{ route('skema.create') }}" class="btn btn-utama">+ Tambah Skema</a>
</div>

<div class="kartu">
  <div class="tabel-wrap">
    <table class="tabel">
      <thead>
        <tr><th>#</th><th>Kode</th><th>Nama Skema</th><th>Deskripsi</th><th>Peserta</th><th>Aksi</th></tr>
      </thead>
      <tbody>
        @forelse ($skemas as $s)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $s->kode_skema }}</td>
            <td>{{ $s->nama_skema }}</td>
            <td>{{ $s->deskripsi }}</td>
            <td>{{ $s->pesertas_count }}</td>
            <td class="aksi">
              <a href="{{ route('skema.edit', $s) }}" class="btn btn-kecil btn-ubah">Ubah</a>
              <form action="{{ route('skema.destroy', $s) }}" method="post" class="form-inline"
                    onsubmit="return confirm('Yakin hapus skema ini?')">
                @csrf @method('DELETE')
                <button class="btn btn-kecil btn-hapus">Hapus</button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="6" class="tengah redup">Belum ada data.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection