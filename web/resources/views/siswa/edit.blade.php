@extends('layouts.app')

@section('title', 'Edit Pendaftaran')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center fw-bold text-uppercase">Edit Data Pendaftaran</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card border-2" style="border-color: #8B4513; background-color: #f5f5dc;">
        <div class="card-body">
            <form action="{{ route('siswa.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') {{-- Gunakan PUT karena update --}}

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" value="{{ old('nama', $pendaftaran->nama) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $pendaftaran->tanggal_lahir) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select" required>
                            <option value="">-- Pilih --</option>
                            <option value="Laki-laki" {{ $pendaftaran->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ $pendaftaran->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Agama</label>
                        <select name="agama" class="form-select" required>
                            <option value="">-- Pilih --</option>
                            @foreach(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu'] as $agama)
                                <option value="{{ $agama }}" {{ $pendaftaran->agama == $agama ? 'selected' : '' }}>{{ $agama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" rows="2" required>{{ old('alamat', $pendaftaran->alamat) }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Orang Tua/Wali</label>
                        <input type="text" name="nama_ortu" class="form-control" value="{{ old('nama_ortu', $pendaftaran->nama_ortu) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">No. HP</label>
                        <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $pendaftaran->no_hp) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Akte Kelahiran</label><br>
                        <small class="text-muted">Saat ini: <a href="{{ asset('storage/' . $pendaftaran->akte) }}" target="_blank">Lihat Akte</a></small>
                        <input type="file" name="akte" class="form-control mt-1">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Kartu Keluarga</label><br>
                        <small class="text-muted">Saat ini: <a href="{{ asset('storage/' . $pendaftaran->kk) }}" target="_blank">Lihat KK</a></small>
                        <input type="file" name="kk" class="form-control mt-1">
                    </div>
                </div>

                <div class="text-end">
                    <a href="{{ route('siswa.dashboard') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-outline-dark">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
