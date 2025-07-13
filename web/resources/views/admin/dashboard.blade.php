@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard Admin</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($siswas->count())
        <table class="table table-bordered table-striped">
            <thead class="table-warning">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Alamat</th>
                    <th>Nama Orang Tua</th>
                    <th>No HP</th>
                    <th>Akte</th>
                    <th>KK</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($siswas as $siswa)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $siswa->nama }}</td>
                        <td>{{ $siswa->tanggal_lahir }}</td>
                        <td>{{ $siswa->jenis_kelamin }}</td>
                        <td>{{ $siswa->agama }}</td>
                        <td>{{ $siswa->alamat }}</td>
                        <td>{{ $siswa->nama_ortu }}</td>
                        <td>{{ $siswa->no_hp }}</td>
                        <td>
                            <a href="{{ asset('storage/' . $siswa->akte) }}" target="_blank">Lihat Akte</a>
                        </td>
                        <td>
                            <a href="{{ asset('storage/' . $siswa->kk) }}" target="_blank">Lihat KK</a>
                        </td>
                        <td>
                            @if($siswa->diterima == 1)
                                <span class="badge bg-success">Diterima</span>
                            @elseif($siswa->diterima === 0)
                                <span class="badge bg-danger">Ditolak</span>
                            @else
                                <span class="badge bg-secondary">Belum Diumumkan</span>
                            @endif
                        </td>
                        <td>
                            @if(is_null($siswa->diterima))
                                <form action="{{ route('admin.terima', $siswa->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn btn-success btn-sm" onclick="return confirm('Yakin ingin menerima siswa ini?')">Terima</button>
                                </form>
                                <form action="{{ route('admin.tolak', $siswa->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menolak siswa ini?')">Tolak</button>
                                </form>
                            @elseif($siswa->diterima == 1)
                                <form action="{{ route('admin.tolak', $siswa->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin membatalkan penerimaan dan menolak siswa ini?')">Tolak</button>
                                </form>
                            @elseif($siswa->diterima === 0)
                                <form action="{{ route('admin.terima', $siswa->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn btn-success btn-sm" onclick="return confirm('Yakin ingin membatalkan penolakan dan menerima siswa ini?')">Terima</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Tidak ada data pendaftaran siswa.</p>
    @endif
</div>
@endsection
