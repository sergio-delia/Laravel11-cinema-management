@extends('layouts.app')

@section('title', 'Programmazione Settimanale')

@section('content')
<h1>Programmazione Settimanale</h1>

<table border="1">
    <thead>
        <tr>
            <th>Film</th>
            @foreach ($daysOfWeek as $day)
                <th>{{ $day->format('D, d M') }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($films as $film)
            @if ($film)
                <tr>
                    <td>{{ $film->titolo }}</td>
                    @foreach ($daysOfWeek as $day)
                        <td>
                            @php
                                // Debug: Assicuriamoci che i giorni siano corretti
                                Log::info('Current Day: ' . $day->toDateString());

                                // Filtra le programmazioni valide per il giorno corrente
                                $programmazioniDelGiorno = $programmazioni->filter(function($programmazione) use ($film, $day) {
                                    return $programmazione->film_id == $film->id &&
                                           ($day->between($programmazione->data_inizio, $programmazione->data_fine));
                                });

                                Log::info('Programmazioni for Film ' . $film->titolo . ' on ' . $day->toDateString() . ': ' . $programmazioniDelGiorno->count());

                                // Debug: Verifichiamo se le programmazioni del giorno corrente sono state trovate
                                foreach ($programmazioniDelGiorno as $programmazione) {
                                    Log::info('Found Programmazione: ' . $programmazione->id . ' for Film: ' . $film->titolo);
                                }

                                $orariDelGiorno = $programmazioniDelGiorno->flatMap(function($programmazione) use ($day) {
                                    return $programmazione->orari->filter(function($orario) use ($day) {
                                        return Carbon\Carbon::parse($orario->orario)->isSameDay($day);
                                    });
                                });

                                Log::info('Orari for Film ' . $film->titolo . ' on ' . $day->toDateString() . ': ' . $orariDelGiorno->count());
                            @endphp

                            @if($orariDelGiorno->isEmpty())
                                Nessun orario disponibile
                            @else
                                @foreach ($orariDelGiorno as $orario)
                                    <div>
                                        {{ $orario->orario->format('H:i') }}
                                        <form action="{{ route('orari.destroy', $orario->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Elimina</button>
                                        </form>
                                    </div>
                                @endforeach
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endif
        @endforeach
    </tbody>
</table>
@endsection
