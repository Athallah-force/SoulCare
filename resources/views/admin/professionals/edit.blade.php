@extends('admin.layouts.main')

@section('title', 'Edit Client')

@section('content')
<h2 class="mb-4">Edit Client</h2>

<form action="{{ route('admin.client.update', $client->id) }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="name" class="form-control" value="{{ $client->name }}" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ $client->email }}" required>
    </div>

    <div class="mb-3">
        <label>Nomor Telepon</label>
        <input type="text" name="nomor_telepon" class="form-control" value="{{ $client->nomor_telepon }}">
    </div>

    <div class="mb-3">
        <label>Password Baru (opsional)</label>
        <input type="password" name="password" class="form-control">
        <small>Kosongkan jika tidak ingin mengubah password.</small>
    </div>

    <button class="btn btn-primary">Update</button>
</form>
@endsection
