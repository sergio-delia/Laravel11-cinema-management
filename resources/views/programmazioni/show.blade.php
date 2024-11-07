@extends('layouts.app')

@section('title', 'Dettagli programmazione')

@section('content')
    <h1>Dettagli Programmazione</h1>
    <p><strong>Film:</strong> {{ $programmazione->film->titolo }}</p>
    <p><strong>Sala:</strong> {{ $programmazione->sala->nome }}</p>
    <p><strong>Data Inizio:</strong> {{ $programmazione->data_inizio }}</p>
    <p><strong>Data Fine:</strong> {{ $programmazione->data_fine }}</p>
    <p><strong>Orario:</strong> {{ $programmazione->orario }}</p>
    <a href="{{ route('programmazioni.edit', $programmazione) }}">Modifica</a>
    <form action="{{ route('programmazioni.destroy', $programmazione) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Elimina</button>
    </form>
    <a href="{{ route('programmazioni.index') }}">Torna all'elenco</a>
@endsection
