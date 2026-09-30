@extends('layouts.app')
@section('title', 'Data Peserta')

@section('content')
<div class="baris-judul">
  <h3>Data Peserta</h3>
  <a href="{{ route('peserta.create') }}" class="btn btn-utama">+ Tambah Peserta</a>
</div>

<form method="get" class="form-cari">
  <input type="text" name="q" value="{{ $q }}" class="input"
         placeholder="Cari nama / NIK / email / skema">
  <button class="btn btn-cari">Cari</button>
  <a href="{{ route('peserta.index') }}" class="btn btn-abu">Reset</a>
</form>

<div class="kartu">
  <div class="tabel-wrap">
    <table class="tabel">
      <thead>
        <tr><th>#</th><th>NIK</th><th>Nama</th><th>Email</th><th>Skema</th><th>Aksi</th></tr>
      </thead>
      <tbody>
        @forelse ($pesertas as $p)
          <tr>
            <td>{{ $pesertas->firstItem() + $loop->index }}</td>
            <td>{{ $p->nik }}</td>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->email }}</td>
            <td>{{ $p->skema?->nama_skema ?? '-' }}</td>
            <td class="aksi">
              <a href="{{ route('peserta.show', $p) }}" class="btn btn-kecil btn-detail">Detail</a>
              <a href="{{ route('peserta.edit', $p) }}" class="btn btn-kecil btn-ubah">Ubah</a>
              <form action="{{ route('peserta.destroy', $p) }}" method="post" class="form-inline"
                    onsubmit="return confirm('Yakin hapus data peserta ini?')">
                @csrf @method('DELETE')
                <button class="btn btn-kecil btn-hapus">Hapus</button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="6" class="tengah redup">Data tidak ditemukan.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

{{ $pesertas->links() }}
@endsection