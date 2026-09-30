<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkemaRequest;
use App\Models\Skema;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SkemaController extends Controller
{
    public function index(): View
    {
        $skemas = Skema::withCount('pesertas')->latest('id')->get();

        return view('skema.index', compact('skemas'));
    }

    public function create(): View
    {
        return view('skema.form', ['skema' => new Skema()]);
    }

    public function store(SkemaRequest $request): RedirectResponse
    {
        Skema::create($request->validated());

        return redirect()->route('skema.index')->with('success', 'Skema berhasil ditambahkan.');
    }

    public function edit(Skema $skema): View
    {
        return view('skema.form', compact('skema'));
    }

    public function update(SkemaRequest $request, Skema $skema): RedirectResponse
    {
        $skema->update($request->validated());

        return redirect()->route('skema.index')->with('success', 'Skema berhasil diubah.');
    }

    public function destroy(Skema $skema): RedirectResponse
    {
        if ($skema->pesertas()->exists()) {
            return redirect()->route('skema.index')
                ->with('error', 'Skema tidak dapat dihapus karena masih digunakan oleh data peserta.');
        }

        try {
            $skema->delete();
        } catch (QueryException $e) {
            return redirect()->route('skema.index')
                ->with('error', 'Terjadi kesalahan saat menghapus skema.');
        }

        return redirect()->route('skema.index')->with('success', 'Skema berhasil dihapus.');
    }
}