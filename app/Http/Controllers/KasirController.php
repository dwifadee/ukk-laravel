<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masakan;

class KasirController extends Controller
{
    public function index()
    {
        $masakans = Masakan::all();
        return view('pages.kasir', ['masakans' => $masakans]);
    }

}
