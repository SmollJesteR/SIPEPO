<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balita;
use App\Models\IbuHamil;
use App\Models\Lansia;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.home');
    }

    public function pendataan()
    {
        return view('dashboard.pendataan');
    }

    public function history()
    {
        $balitas = Balita::latest()->get();
        $ibuHamils = IbuHamil::latest()->get();
        $lansias = Lansia::latest()->get();
        
        return view('dashboard.history', compact('balitas', 'ibuHamils', 'lansias'));
    }

    public function statistik()
    {
        $balitas = Balita::latest()->get();
        $ibuHamils = IbuHamil::latest()->get();
        $lansias = Lansia::latest()->get();
        
        return view('dashboard.statistik', compact('balitas', 'ibuHamils', 'lansias'));
    }

    public function about()
    {
        return view('dashboard.about');
    }
}
