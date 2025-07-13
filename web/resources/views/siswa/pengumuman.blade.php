@extends('layouts.app')

@section('title', 'Pengumuman')

@section('content')
<div class="container">
    <h1 class="mb-4">Pengumuman Hasil Pendaftaran</h1>

    @if($pendaftaran)
        <div class="card">
            <div class="card-body">
                <h5>Nama: {{ $pendaftaran->nama }}</h5>
                <p>Status:
                    @if($pendaftaran->diterima == 1)
                        <span class="badge bg-success">Diterima</span>
                    @elseif($pendaftaran->diterima === 0)
                        <span class="badge bg-danger">Ditolak</span>
                    @else
                        <span class="badge bg-secondary">Belum Diumumkan</span>
                    @endif
                </p>
            </div>
        </div>
    @else
        <p>Anda belum mengisi data pendaftaran.</p>
    @endif
</div>
@endsection
