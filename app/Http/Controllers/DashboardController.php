<?php

namespace App\Http\Controllers;

use App\Models\Masakan;
use App\Models\Meja;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $masakans = Masakan::all();
        $meja = Meja::all();
        return view('pages.dashboard', ['masakans' => $masakans, 'meja' => $meja]);
    }
}
