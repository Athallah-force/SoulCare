@extends('admin.layout')

@section('content')
<h2 class="mb-4">Profesional Pending Verifikasi</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Keahlian</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($pending as $pro)
        <tr>
            <td>{{ $pro->nama_lengkap }}</td>
            <td>{{ $pro->email }}</td>
            <td>{{ $pro->keahlian ?? '-' }}</td>
            <td>
                <a href="{{ route('admin.professional.detail', $pro->id) }}" class="btn btn-primary btn-sm">
                    Lihat Detail
                </a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center">Tidak ada profesional yang menunggu verifikasi.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
