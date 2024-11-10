@extends('layouts.app')

@section('title', 'Dettagli Film')

@section('content')
<h1>{{ $film->titolo }}</h1>
@if ($film->immagine_copertina)
    <img src="{{ asset('images/' . $film->immagine_copertina) }}" alt="{{ $film->titolo }}" width="200">
@endif
<p><strong>Regista:</strong> {{ $film->regista }}</p>
<p><strong>Durata:</strong> {{ $film->durata }} minuti</p>
<p><strong>Descrizione:</strong> {{ $film->descrizione }}</p>
<a href="{{ route('films.edit', $film) }}">Modifica</a>
<form action="{{ route('films.destroy', $film) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit">Elimina</button>
</form>
<a href="{{ route('films.index') }}">Torna all'elenco</a>
@endsection
