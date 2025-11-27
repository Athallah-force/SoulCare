@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Verifikasi Profesional</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pendingProfessionals as $profile)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $profile->user->nama_lengkap }}</td>
                <td>{{ $profile->user->email }}</td>
                <td>
                    <span class="badge bg-warning">Pending</span>
                </td>
                <td>
                    <form action="{{ route('admin.professionals.verify.process', $profile->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">Verifikasi</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Tidak ada profesional yang menunggu verifikasi.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
