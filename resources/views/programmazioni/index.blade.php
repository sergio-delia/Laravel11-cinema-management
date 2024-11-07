@extends('layouts.app')

@section('title', 'Elenco Programmazione')

@section('content')
    <h1>Elenco delle Programmazioni</h1>
    <a href="{{ route('programmazioni.create') }}">Aggiungi Nuova Programmazione</a>
    <table>
        <tr>
            <th>Film</th>
            <th>Sala</th>
            <th>Data Inizio</th>
            <th>Data Fine</th>
            <th>Orario</th>
            <th>Azioni</th>
        </tr>
        @foreach ($programmazioni as $programmazione)
        <tr>
            <td>{{ $programmazione->film->titolo }}</td>
            <td>{{ $programmazione->sala->nome }}</td>
            <td>{{ $programmazione->data_inizio }}</td>
            <td>{{ $programmazione->data_fine }}</td>
            <td>{{ $programmazione->orario }}</td>
            <td>
                <a href="{{ route('programmazioni.edit', $programmazione) }}">Modifica</a>
                <form action="{{ route('programmazioni.destroy', $programmazione) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Elimina</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
