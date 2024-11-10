@extends('layouts.app')

@section('title', 'Programmazione di Oggi')

@section('content')
<h1>Programmazione di Oggi</h1>
@if($programmazioni->isEmpty())
    <p>Non ci sono film in programmazione per oggi.</p>
@else
    @foreach ($programmazioni as $filmId => $filmProgrammazioni)
        @php
            $film = $filmProgrammazioni->first()->film;
        @endphp
        <div class="film">
            <h2>{{ $film->titolo }}</h2>
            @if ($film->immagine_copertina)
                <img src="{{ asset('images/' . $film->immagine_copertina) }}" alt="{{ $film->titolo }}" width="200">
            @endif
            <p><strong>Regista:</strong> {{ $film->regista }}</p>
            <p><strong>Durata:</strong> {{ $film->durata }} minuti</p>
            <p><strong>Orari:</strong></p>
            <ul>
                @foreach ($filmProgrammazioni as $programmazione)
                    @foreach ($programmazione->orari as $orario)
                        <li>{{ $orario->orario }}</li>
                    @endforeach
                @endforeach
            </ul>
        </div>
    @endforeach
@endif
@endsection
