@extends('professional.layout')

@section('content')
<h2 class="mb-4">Catatan Klinis</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Klien</th>
            <th>Ringkasan</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($notes as $note)
        <tr>
            <td>{{ $note->client->name }}</td>
            <td>{{ Str::limit($note->summary, 30) }}</td>
            <td>{{ $note->created_at->format('d M Y') }}</td>
            <td>
                <a href="{{ route('professional.notes.show', $note->id) }}" class="btn btn-sm btn-primary">Lihat</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $notes->links() }}
@endsection
