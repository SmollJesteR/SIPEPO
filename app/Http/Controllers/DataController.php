<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balita;
use App\Models\IbuHamil;
use App\Models\Lansia;
use App\Exports\BalitaExport;
use App\Exports\IbuHamilExport;
use App\Exports\LansiaExport;
use Maatwebsite\Excel\Facades\Excel;

class DataController extends Controller
{
    public function storeBalita(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'lingkar_kepala' => 'nullable|numeric',
            'berat_badan' => 'nullable|numeric',
            'tinggi_badan' => 'nullable|numeric',
            'imunisasi' => 'nullable|array',
            'nama_orang_tua' => 'nullable|string|max:255',
            'kontak_orang_tua' => 'nullable|string|max:20'
        ]);

        Balita::create($validated);
        
        return redirect()->back()->with('success', 'Data balita berhasil disimpan!');
    }

    public function storeIbuHamil(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'usia_kehamilan' => 'required|integer|min:1',
            'berat_badan' => 'nullable|numeric',
            'tinggi_badan' => 'nullable|numeric',
            'lingkar_perut' => 'nullable|numeric',
            'lingkar_lengan' => 'nullable|numeric',
            'tekanan_darah' => 'nullable|string|max:20',
            'nomor_wa' => 'nullable|string|max:20',
            'alamat' => 'nullable|string'
        ]);

        IbuHamil::create($validated);
        
        return redirect()->back()->with('success', 'Data ibu hamil berhasil disimpan!');
    }

    public function storeLansia(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tekanan_darah' => 'nullable|string|max:20',
            'tinggi_badan' => 'nullable|numeric',
            'berat_badan' => 'nullable|numeric',
            'alamat' => 'nullable|string',
            'nomor_wa' => 'nullable|string|max:20'
        ]);

        Lansia::create($validated);
        
        return redirect()->back()->with('success', 'Data lansia berhasil disimpan!');
    }

    public function exportBalita()
    {
        return Excel::download(new BalitaExport, 'data_balita_' . date('Y-m-d') . '.xlsx');
    }

    public function exportIbuHamil()
    {
        return Excel::download(new IbuHamilExport, 'data_ibu_hamil_' . date('Y-m-d') . '.xlsx');
    }

    public function exportLansia()
    {
        return Excel::download(new LansiaExport, 'data_lansia_' . date('Y-m-d') . '.xlsx');
    }
}
