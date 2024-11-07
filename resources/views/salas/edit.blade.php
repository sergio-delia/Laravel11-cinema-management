@extends('layouts.app')

@section('title', 'Modifica Sala')

@section('content')
    <h1>Modifica Sala</h1>
    <form action="{{ route('salas.update', $sala->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="{{ $sala->nome }}" required>
        <br>
        <label for="capienza">Capienza:</label>
        <input type="number" id="capienza" name="capienza" value="{{ $sala->capienza }}" required>
        <br>
        <button type="submit">Salva Modifiche</button>
    </form>
</body>
@endsection
