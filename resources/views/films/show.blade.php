@extends('layouts.app')

@section('title', 'Mostra Film')

@section('content')
    <h1>{{ $film->titolo }}</h1>
    <p><strong>Regista:</strong> {{ $film->regista }}</p>
    <p><strong>Durata:</strong> {{ $film->durata }} minuti</p>
    <p><strong>Descrizione:</strong> {{ $film->descrizione }}</p>
    <a href="{{ route('films.edit', $film) }}">Modifica</a>
    <form action="{{ route('films.destroy', $film) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Elimina</button>
    </form>
    <a href="{{ route('films.index') }}">Torna all'elenco</a>
@endsection
