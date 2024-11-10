@extends('layouts.app')

@section('title', 'Aggiungi Film')

@section('content')
<h1>Aggiungi Nuovo Film</h1>
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('films.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="titolo">Titolo:</label>
    <input type="text" id="titolo" name="titolo" value="{{ old('titolo') }}" required>
    <br>
    <label for="regista">Regista:</label>
    <input type="text" id="regista" name="regista" value="{{ old('regista') }}" required>
    <br>
    <label for="durata">Durata (minuti):</label>
    <input type="number" id="durata" name="durata" value="{{ old('durata') }}" required>
    <br>
    <label for="descrizione">Descrizione:</label>
    <textarea id="descrizione" name="descrizione">{{ old('descrizione') }}</textarea>
    <br>
    <label for="immagine_copertina">Immagine di Copertina:</label>
    <input type="file" id="immagine_copertina" name="immagine_copertina">
    <br>
    <button type="submit">Salva</button>
</form>
@endsection
