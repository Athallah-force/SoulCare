@extends('admin.layouts.main')

@section('title', 'Tambah Client')

@section('content')
<h2 class="mb-4">Tambah Client</h2>

<form action="{{ route('admin.client.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Nomor Telepon</label>
        <input type="text" name="nomor_telepon" class="form-control">
    </div>

    <button class="btn btn-primary">Simpan</button>
</form>
@endsection
