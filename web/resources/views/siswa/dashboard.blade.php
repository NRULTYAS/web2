@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center text-uppercase fw-bold">Dashboard Siswa</h1>

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- Form Pendaftaran --}}
    <div class="card border-2 mb-5" style="border-color: #8B4513; background-color: #f5f5dc;">
        <div class="card-header bg-transparent" style="border-bottom: 2px solid #8B4513;">
            <h4 class="mb-0 text-uppercase text-center text-dark">
                {{ $pendaftaran ? 'Edit Data Pendaftaran' : 'Form Pendaftaran' }}
            </h4>
        </div>
        <div class="card-body">
            <form action="{{ $pendaftaran ? route('siswa.update') : route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" required
                               value="{{ old('nama', $pendaftaran->nama ?? '') }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" required
                               value="{{ old('tanggal_lahir', $pendaftaran->tanggal_lahir ?? '') }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select" required>
                            <option value="">-- Pilih --</option>
                            <option value="Laki-laki" {{ old('jenis_kelamin', $pendaftaran->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin', $pendaftaran->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Agama</label>
                        <select name="agama" class="form-select" required>
                            @php
                                $agamaList = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu'];
                            @endphp
                            <option value="">-- Pilih --</option>
                            @foreach($agamaList as $agama)
                                <option value="{{ $agama }}" {{ old('agama', $pendaftaran->agama ?? '') == $agama ? 'selected' : '' }}>
                                    {{ $agama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" rows="2" required>{{ old('alamat', $pendaftaran->alamat ?? '') }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Orang Tua/Wali</label>
                        <input type="text" name="nama_ortu" class="form-control" required
                               value="{{ old('nama_ortu', $pendaftaran->nama_ortu ?? '') }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">No. HP</label>
                        <input type="text" name="no_hp" class="form-control" required
                               value="{{ old('no_hp', $pendaftaran->no_hp ?? '') }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Upload Akte Kelahiran</label>
                        <input type="file" name="akte" class="form-control" {{ $pendaftaran ? '' : 'required' }}>
                        @if($pendaftaran && $pendaftaran->akte)
                            <small class="text-muted">Saat ini: <a href="{{ asset('storage/' . $pendaftaran->akte) }}" target="_blank">Lihat Akte</a></small>
                        @endif
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Upload Kartu Keluarga</label>
                        <input type="file" name="kk" class="form-control" {{ $pendaftaran ? '' : 'required' }}>
                        @if($pendaftaran && $pendaftaran->kk)
                            <small class="text-muted">Saat ini: <a href="{{ asset('storage/' . $pendaftaran->kk) }}" target="_blank">Lihat KK</a></small>
                        @endif
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-outline-dark">
                        {{ $pendaftaran ? 'Update Pendaftaran' : 'Kirim Pendaftaran' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Informasi Pengumuman --}}
    <div class="card border-2" style="border-color: #8B4513; background-color: #f5f5dc;">
        <div class="card-header bg-transparent" style="border-bottom: 2px solid #8B4513;">
            <h4 class="mb-0 text-uppercase text-center text-dark">Pengumuman</h4>
        </div>
        <div class="card-body">
            <ul class="mb-0">
                <li>Pendaftaran dibuka hingga <strong>15 Juli</strong>.</li>
                <li>Pengumuman hasil seleksi pada <strong>20 Juli</strong>.</li>
                <li>Status kelulusan bisa dilihat di menu <a href="{{ route('siswa.pengumuman') }}">Pengumuman</a>.</li>
            </ul>
        </div>
    </div>
</div>
@endsection
