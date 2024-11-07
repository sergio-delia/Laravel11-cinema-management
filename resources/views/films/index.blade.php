@extends('layouts.app')

@section('title', 'Gestione Film')

@section('content')
<h1>Elenco dei Film</h1>
<a href="{{ route('films.create') }}">Aggiungi Nuovo Film</a>
<table>
    <tr>
        <th>Titolo</th>
        <th>Regista</th>
        <th>Durata</th>
        <th>Azioni</th>
    </tr>
    @foreach ($films as $film)
    <tr>
        <td>{{ $film->titolo }}</td>
        <td>{{ $film->regista }}</td>
        <td>{{ $film->durata }} minuti</td>
        <td>
            <a href="{{ route('films.edit', $film) }}">Modifica</a>
            <form action="{{ route('films.destroy', $film) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Elimina</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
