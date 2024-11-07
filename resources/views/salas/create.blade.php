@extends('layouts.app')

@section('title', 'Aggiungi Sala')

@section('content')
    <h1>Aggiungi Nuova Sala</h1>
    <form action="{{ route('salas.store') }}" method="POST">
        @csrf
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        <br>
        <label for="capienza">Capienza:</label>
        <input type="number" id="capienza" name="capienza" required>
        <br>
        <button type="submit">Salva</button>
    </form>
@endsection
