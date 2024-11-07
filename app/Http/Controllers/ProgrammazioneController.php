<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Programmazione;
use App\Models\Sala;
use Illuminate\Http\Request;

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
            'orario' => 'required',
        ]);

        Programmazione::create($validated);
        return redirect()->route('programmazioni.index');
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
            'orario' => 'required',
        ]);

        $programmazione->update($validated);
        return redirect()->route('programmazioni.index');
    }

    public function destroy(Programmazione $programmazione) {
        $programmazione->delete();
        return redirect()->route('programmazioni.index');
    }
}
