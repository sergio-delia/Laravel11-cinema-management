@extends('layouts.app')

@section('title', 'Aggiungi Programmazione')

@section('content')
<h1>Aggiungi Nuova Programmazione</h1>
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
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
    <label for="orari">Orari (fino a 8):</label>
    @for ($i = 0; $i < 8; $i++)
        <input type="time" name="orari[]" placeholder="Orario {{ $i + 1 }}">
        <br>
    @endfor
    <button type="submit">Salva</button>
</form>
@endsection
