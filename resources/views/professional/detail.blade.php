@extends('admin.layout')

@section('content')
<h2 class="mb-4">Detail Profesional</h2>

<div class="card p-4">
    <h4>{{ $professional->nama_lengkap }}</h4>
    <p>Email: {{ $professional->email }}</p>
    <p>Nomor Telepon: {{ $professional->nomor_telepon }}</p>
    <p>Keahlian: {{ $professional->keahlian ?? '-' }}</p>
    <p>Pengalaman: {{ $professional->pengalaman ?? '-' }}</p>

    <hr>

    <h5>Dokumen</h5>
    @if($professional->dokumen)
        <a href="{{ asset('storage/'.$professional->dokumen) }}" target="_blank" class="btn btn-info btn-sm">
            Lihat Dokumen
        </a>
    @else
        <p class="text-muted">Tidak ada dokumen.</p>
    @endif

    <hr>

    <form action="{{ route('admin.professional.verify', $professional->id) }}" method="POST" class="d-inline">
        @csrf
        <button class="btn btn-success">Verifikasi</button>
    </form>

    <form action="{{ route('admin.professional.reject', $professional->id) }}" method="POST" class="d-inline">
        @csrf
        <button class="btn btn-danger">Tolak</button>
    </form>
</div>
@endsection
