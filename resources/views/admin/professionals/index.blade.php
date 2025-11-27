@extends('admin.layouts.main')

@section('title', 'Kelola Professional')

@section('content')
<h2 class="mb-4">Kelola Professional</h2>

<a href="{{ route('admin.professional.create') }}" class="btn btn-primary mb-3">+ Tambah Professional</a>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Verifikasi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($professionals as $i => $p)
        <tr>
            <td>{{ $i+1 }}</td>
            <td>{{ $p->name }}</td>
            <td>{{ $p->email }}</td>
            <td>{{ $p->nomor_telepon }}</td>
            <td>
                @if ($p->is_verified)
                    <span class="badge bg-success">Terverifikasi</span>
                @else
                    <span class="badge bg-warning">Belum</span>
                    <a href="{{ route('admin.professional.verify', $p->id) }}" 
                       class="btn btn-sm btn-success mt-1">
                       Verifikasi
                    </a>
                @endif
            </td>
            <td>
                <a href="{{ route('admin.professional.edit', $p->id) }}" class="btn btn-sm btn-warning">Edit</a>

                <form action="{{ route('admin.professional.delete', $p->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
