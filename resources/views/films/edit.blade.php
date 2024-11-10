@extends('layouts.app')

@section('title', 'Modifica Film')

@section('content')
<h1>Modifica Film</h1>
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('films.update', $film->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="titolo">Titolo:</label>
    <input type="text" id="titolo" name="titolo" value="{{ $film->titolo }}" required>
    <br>
    <label for="regista">Regista:</label>
    <input type="text" id="regista" name="regista" value="{{ $film->regista }}" required>
    <br>
    <label for="durata">Durata (minuti):</label>
    <input type="number" id="durata" name="durata" value="{{ $film->durata }}" required>
    <br>
    <label for="descrizione">Descrizione:</label>
    <textarea id="descrizione" name="descrizione">{{ $film->descrizione }}</textarea>
    <br>
    <label for="immagine_copertina">Immagine di Copertina:</label>
    @if ($film->immagine_copertina)
        <img src="{{ asset('images/' . $film->immagine_copertina) }}" alt="{{ $film->titolo }}" width="100">
    @endif
    <input type="file" id="immagine_copertina" name="immagine_copertina">
    <br>
    <button type="submit">Salva Modifiche</button>
</form>
@endsection
