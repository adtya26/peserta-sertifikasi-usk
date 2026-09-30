<?php

namespace App\Http\Controllers;

use App\Http\Requests\PesertaRequest;
use App\Models\Peserta;
use App\Models\Skema;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PesertaController extends Controller
{
    public function index(Request $request): View
    {
        $q = trim((string) $request->query('q', ''));

        $pesertas = Peserta::with('skema')
            ->when($q !== '', function ($query) use ($q) {
                $query->where(function ($w) use ($q) {
                    $w->where('nama', 'like', "%{$q}%")
                      ->orWhere('nik', 'like', "%{$q}%")
                      ->orWhere('email', 'like', "%{$q}%")
                      ->orWhereHas('skema', fn ($s) => $s->where('nama_skema', 'like', "%{$q}%"));
                });
            })
            ->latest('id')
            ->paginate(10)
            ->withQueryString();

        return view('peserta.index', compact('pesertas', 'q'));
    }

    public function create(): View
    {
        return view('peserta.form', [
            'peserta' => new Peserta(),
            'skemaList' => Skema::orderBy('nama_skema')->get(),
        ]);
    }

    public function store(PesertaRequest $request): RedirectResponse
    {
        try {
            Peserta::create($request->validated());
        } catch (QueryException $e) {
            return back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }

        return redirect()->route('peserta.index')->with('success', 'Data peserta berhasil ditambahkan.');
    }

    public function show(Peserta $peserta): View
    {
        $peserta->load('skema');

        return view('peserta.show', compact('peserta'));
    }

    public function edit(Peserta $peserta): View
    {
        return view('peserta.form', [
            'peserta' => $peserta,
            'skemaList' => Skema::orderBy('nama_skema')->get(),
        ]);
    }

    public function update(PesertaRequest $request, Peserta $peserta): RedirectResponse
    {
        try {
            $peserta->update($request->validated());
        } catch (QueryException $e) {
            return back()->withInput()->with('error', 'Terjadi kesalahan saat mengubah data.');
        }

        return redirect()->route('peserta.index')->with('success', 'Data peserta berhasil diubah.');
    }

    public function destroy(Peserta $peserta): RedirectResponse
    {
        try {
            $peserta->delete();
        } catch (QueryException $e) {
            return redirect()->route('peserta.index')->with('error', 'Terjadi kesalahan saat menghapus data.');
        }

        return redirect()->route('peserta.index')->with('success', 'Data peserta berhasil dihapus.');
    }
}