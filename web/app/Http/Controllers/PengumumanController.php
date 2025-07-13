<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Pendaftaran;

class PengumumanController extends Controller
{
    public function index()
    {
        $pendaftaran = Pendaftaran::where('user_id', Auth::id())->first();

        return view('siswa.pengumuman', compact('pendaftaran'));
    }
}
