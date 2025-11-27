@extends('layouts.app')

@section('content')
<div class="container">

    <h2>Detail Sesi</h2>

    <div class="card mb-3">
        <div class="card-body">

            <h4>Klien: {{ $session->client->user->nama_lengkap }}</h4>
            <p><strong>Tanggal Janji:</strong> {{ $session->tanggal_janji }}</p>
            <p><strong>Status:</strong> {{ $session->status }}</p>

        </div>
    </div>

    <h3>Catatan Klinis</h3>

    @if ($notes->isEmpty())
        <p>Belum ada catatan klinis.</p>
    @else
        @foreach ($notes as $note)
            <div class="card mb-2">
                <div class="card-body">
                    <p>{{ $note->catatan }}</p>
                    <small>Dibuat pada: {{ $note->created_at }}</small>
                </div>
            </div>
        @endforeach
    @endif

</div>
@endsection
