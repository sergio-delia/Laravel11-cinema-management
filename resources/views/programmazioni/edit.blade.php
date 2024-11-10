@extends('layouts.app')

@section('title', 'Modifica Programmazione')

@section('content')
<h1>Modifica Programmazione</h1>

@php
    Log::info('Programmazione ID in the view: ' . $programmazione->id);
@endphp

<form action="{{ route('programmazioni.update', $programmazione->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="film_id">Film:</label>
    <select id="film_id" name="film_id" required>
        @foreach ($films as $film)
            <option value="{{ $film->id }}" {{ $programmazione->film_id == $film->id ? 'selected' : '' }}>{{ $film->titolo }}</option>
        @endforeach
    </select>
    <br>
    <label for="sala_id">Sala:</label>
    <select id="sala_id" name="sala_id" required>
        @foreach ($salas as $sala)
            <option value="{{ $sala->id }}" {{ $programmazione->sala_id == $sala->id ? 'selected' : '' }}>{{ $sala->nome }}</option>
        @endforeach
    </select>
    <br>
    <label for="data_inizio">Data Inizio:</label>
    <input type="date" id="data_inizio" name="data_inizio" value="{{ $programmazione->data_inizio }}" required>
    <br>
    <label for="data_fine">Data Fine:</label>
    <input type="date" id="data_fine" name="data_fine" value="{{ $programmazione->data_fine }}" required>
    <br>
    <button type="submit">Salva Modifiche</button>
</form>

@endsection
