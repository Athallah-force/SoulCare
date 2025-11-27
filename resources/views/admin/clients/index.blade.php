@extends('admin.layouts.main')

@section('title', 'Kelola Client')

@section('content')
<h2 class="mb-4">Kelola Client</h2>

<a href="{{ route('admin.client.create') }}" class="btn btn-primary mb-3">+ Tambah Client</a>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Nomor Telepon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clients as $i => $client)
        <tr>
            <td>{{ $i+1 }}</td>
            <td>{{ $client->name }}</td>
            <td>{{ $client->email }}</td>
            <td>{{ $client->nomor_telepon }}</td>
            <td>
                <a href="{{ route('admin.client.edit', $client->id) }}" class="btn btn-sm btn-warning">Edit</a>

                <form action="{{ route('admin.client.delete', $client->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-sm btn-danger">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
