<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $siswas = Pendaftaran::latest()->get();
        return view('admin.dashboard', compact('siswas'));
    }

    public function terima($id)
    {
        $siswa = Pendaftaran::findOrFail($id);
        $siswa->diterima = 1; // Gunakan integer, bukan boolean literal
        $siswa->save();

        return redirect()->back()->with('success', 'Siswa diterima.');
    }

    public function tolak($id)
    {
        $siswa = Pendaftaran::findOrFail($id);
        $siswa->diterima = 0; // Gunakan integer, bukan boolean literal
        $siswa->save();

        return redirect()->back()->with('success', 'Siswa ditolak.');
    }
}
