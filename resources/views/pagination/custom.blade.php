@if ($paginator->hasPages())
<nav class="paginasi">
  {{-- Tombol sebelumnya --}}
  @if ($paginator->onFirstPage())
    <span class="halaman nonaktif">‹</span>
  @else
    <a class="halaman" href="{{ $paginator->previousPageUrl() }}">‹</a>
  @endif

  {{-- Nomor halaman --}}
  @foreach ($elements as $element)
    @if (is_string($element))
      <span class="halaman nonaktif">{{ $element }}</span>
    @endif
    @if (is_array($element))
      @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
          <span class="halaman aktif">{{ $page }}</span>
        @else
          <a class="halaman" href="{{ $url }}">{{ $page }}</a>
        @endif
      @endforeach
    @endif
  @endforeach

  {{-- Tombol berikutnya --}}
  @if ($paginator->hasMorePages())
    <a class="halaman" href="{{ $paginator->nextPageUrl() }}">›</a>
  @else
    <span class="halaman nonaktif">›</span>
  @endif
</nav>
@endif