<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pendaftaran;

class SiswaController extends Controller
{
    // Halaman dashboard siswa
    public function dashboard()
    {
        $pendaftaran = Pendaftaran::where('user_id', Auth::id())->first();
        return view('siswa.dashboard', compact('pendaftaran'));
    }

    // Simpan data pendaftaran baru
    public function store(Request $request)
    {
        // Cegah double pendaftaran
        if (Pendaftaran::where('user_id', Auth::id())->exists()) {
            return redirect()->back()->with('error', 'Anda sudah pernah mendaftar.');
        }

        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|string|max:50',
            'alamat' => 'required|string|max:255',
            'nama_ortu' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'akte' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'kk' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // Simpan file
        $aktePath = $request->file('akte')->store('dokumen', 'public');
        $kkPath = $request->file('kk')->store('dokumen', 'public');

        // Simpan ke database
        Pendaftaran::create([
            'nama' => $validated['nama'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'agama' => $validated['agama'],
            'alamat' => $validated['alamat'],
            'nama_orang_tua' => $validated['nama_ortu'], // mapping ke DB
            'no_hp' => $validated['no_hp'],
            'akte' => $aktePath,
            'kk' => $kkPath,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('siswa.dashboard')->with('success', 'Pendaftaran berhasil dikirim!');
    }

    // Halaman edit data
    public function edit()
    {
        $pendaftaran = Pendaftaran::where('user_id', Auth::id())->firstOrFail();
        return view('siswa.edit', compact('pendaftaran'));
    }

    // Proses update data pendaftaran
    public function update(Request $request)
    {
        $pendaftaran = Pendaftaran::where('user_id', Auth::id())->firstOrFail();

        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|string|max:50',
            'alamat' => 'required|string|max:255',
            'nama_ortu' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'akte' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'kk' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // Siapkan data yang akan diupdate
        $data = [
            'nama' => $validated['nama'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'agama' => $validated['agama'],
            'alamat' => $validated['alamat'],
            'nama_orang_tua' => $validated['nama_ortu'],
            'no_hp' => $validated['no_hp'],
        ];

        // Upload baru jika ada file akte atau kk
        if ($request->hasFile('akte')) {
            $data['akte'] = $request->file('akte')->store('dokumen', 'public');
        }

        if ($request->hasFile('kk')) {
            $data['kk'] = $request->file('kk')->store('dokumen', 'public');
        }

        $pendaftaran->update($data);

        return redirect()->route('siswa.dashboard')->with('success', 'Data pendaftaran berhasil diperbarui.');
    }

    // Halaman pengumuman hasil seleksi
    public function pengumuman()
    {
        $pendaftaran = Pendaftaran::where('user_id', Auth::id())->first();
        return view('siswa.pengumuman', compact('pendaftaran'));
    }
}
