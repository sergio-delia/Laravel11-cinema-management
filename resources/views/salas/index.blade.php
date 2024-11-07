@extends('layouts.app')

@section('title', 'Elenco Sale')

@section('content')
    <h1>Elenco delle Sale</h1>
    <a href="{{ route('salas.create') }}">Aggiungi Nuova Sala</a>
    <table>
        <tr>
            <th>Nome</th>
            <th>Capienza</th>
            <th>Azioni</th>
        </tr>
        @foreach ($salas as $sala)
        <tr>
            <td>{{ $sala->nome }}</td>
            <td>{{ $sala->capienza }}</td>
            <td>
                <a href="{{ route('salas.edit', $sala) }}">Modifica</a>
                <form action="{{ route('salas.destroy', $sala) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Elimina</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
