<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Skema;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('dashboard', [
            'totalPeserta' => Peserta::count(),
            'totalSkema' => Skema::count(),
            'perSkema' => Skema::withCount('pesertas')->orderBy('nama_skema')->get(),
        ]);
    }
}