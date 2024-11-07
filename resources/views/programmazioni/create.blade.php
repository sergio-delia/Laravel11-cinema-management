@extends('layouts.app')

@section('title', 'Aggiungi Programmazione')

@section('content')
    <h1>Aggiungi Nuova Programmazione</h1>
    <form action="{{ route('programmazioni.store') }}" method="POST">
        @csrf
        <label for="film_id">Film:</label>
        <select id="film_id" name="film_id" required>
            @foreach ($films as $film)
            <option value="{{ $film->id }}">{{ $film->titolo }}</option>
            @endforeach
        </select>
        <br>
        <label for="sala_id">Sala:</label>
        <select id="sala_id" name="sala_id" required>
            @foreach ($salas as $sala)
            <option value="{{ $sala->id }}">{{ $sala->nome }}</option>
            @endforeach
        </select>
        <br>
        <label for="data_inizio">Data Inizio:</label>
        <input type="date" id="data_inizio" name="data_inizio" required>
        <br>
        <label for="data_fine">Data Fine:</label>
        <input type="date" id="data_fine" name="data_fine" required>
        <br>
        <label for="orario">Orario:</label>
        <input type="time" id="orario" name="orario" required>
        <br>
        <button type="submit">Salva</button>
    </form>
@endsection
