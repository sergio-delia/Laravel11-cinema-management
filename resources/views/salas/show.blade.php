@extends('layouts.app')

@section('title', 'Dettagli Sala')

@section('content')
    <h1>{{ $sala->nome }}</h1>
    <p><strong>Capienza:</strong> {{ $sala->capienza }}</p>
    <a href="{{ route('salas.edit', $sala) }}">Modifica</a>
    <form action="{{ route('salas.destroy', $sala) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Elimina</button>
    </form>
    <a href="{{ route('salas.index') }}">Torna all'elenco</a>
@endsection
