<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Orario;
use App\Models\Programmazione;
use App\Models\Sala;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProgrammazioneController extends Controller
{

    public function index() {
        $programmazioni = Programmazione::with(['film', 'sala'])->get();
        return view('programmazioni.index', compact('programmazioni'));
    }

    public function create() {
        $films = Film::all();
        $salas = Sala::all();
        return view('programmazioni.create', compact('films', 'salas'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'film_id' => 'required|exists:films,id',
            'sala_id' => 'required|exists:salas,id',
            'data_inizio' => 'required|date',
            'data_fine' => 'required|date|after_or_equal:data_inizio',
            'orari' => 'array|nullable',
            'orari.*' => 'nullable|date_format:H:i'
        ]);

        $programmazione = Programmazione::create($validated);

        if (!empty($validated['orari'])) {
            foreach ($validated['orari'] as $orario) {
                if ($orario) {
                    $programmazione->orari()->create(['orario' => $orario]);
                }
            }
        }

        return redirect()->route('programmazioni.index')->with('success', 'Programmazione aggiunta con successo');
    }


    public function show(Programmazione $programmazione) {
        return view('programmazioni.show', compact('programmazione'));
    }



    public function edit(Programmazione $programmazione) {

        $films = Film::all();
        $salas = Sala::all();
        return view('programmazioni.edit', compact('programmazione', 'films', 'salas'));
    }



    public function update(Request $request, Programmazione $programmazione) {
        $validated = $request->validate([
            'film_id' => 'required|exists:films,id',
            'sala_id' => 'required|exists:salas,id',
            'data_inizio' => 'required|date',
            'data_fine' => 'required|date|after_or_equal:data_inizio',
            'orari' => 'array|nullable',
            'orari.*' => 'nullable|date_format:H:i'
        ]);

        $programmazione->update($validated);

        // Cancella gli orari esistenti e aggiungi i nuovi orari
        $programmazione->orari()->delete();

        // Aggiungere la validazione degli orari separatamente
        $orari = $request->input('orari', []);
        foreach ($orari as $orario) {
            if (!empty($orario)) {
                $programmazione->orari()->create(['orario' => $orario]);
            }
        }

        return redirect()->route('programmazioni.index')->with('success', 'Programmazione aggiornata con successo');
    }



    public function destroy(Programmazione $programmazione) {
        Log::info('Deleting programmazione: ' . $programmazione->id);

        $programmazione->delete();

        Log::info('Programmazione deleted successfully');

        return redirect()->route('programmazioni.index')->with('success', 'Programmazione eliminata con successo');
    }




    public function oggi() {
        $oggi = Carbon::today();
        $programmazioni = Programmazione::whereDate('data_inizio', '<=', $oggi)
                                        ->whereDate('data_fine', '>=', $oggi)
                                        ->with(['film', 'orari'])
                                        ->get()
                                        ->groupBy('film_id');

        return view('programmazioni.oggi', compact('programmazioni'));
    }


    public function weeklySchedule() {
        $oggi = Carbon::today();
        $startOfWeek = $oggi->copy()->startOfWeek();
        $endOfWeek = $oggi->copy()->endOfWeek();

        // Aggiorniamo la query per considerare tutte le programmazioni nella settimana
        $programmazioni = Programmazione::where(function($query) use ($startOfWeek, $endOfWeek) {
            $query->whereBetween('data_inizio', [$startOfWeek, $endOfWeek])
                  ->orWhereBetween('data_fine', [$startOfWeek, $endOfWeek])
                  ->orWhere(function($q) use ($startOfWeek, $endOfWeek) {
                      $q->where('data_inizio', '<=', $endOfWeek)
                        ->where('data_fine', '>=', $startOfWeek);
                  });
        })->with(['film', 'sala', 'orari'])->get();

        $films = Film::all();
        $daysOfWeek = collect(range(0, 6))->map(function($day) use ($startOfWeek) {
            return $startOfWeek->copy()->addDays($day);
        });

        return view('programmazioni.settimanale', compact('programmazioni', 'films', 'daysOfWeek'));
    }








    public function destroyOrario(Orario $orario) {
        $orario->delete();
        return back()->with('success', 'Orario eliminato con successo');
    }



}
