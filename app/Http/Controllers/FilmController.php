<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index() {
        $films = Film::all();
        return view('films.index', compact('films'));
    }

    public function create() {
        return view('films.create');
    }

    public function show(Film $film) {
        return view('films.show', compact('film'));
    }

    public function edit(Film $film) {
        return view('films.edit', compact('film'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'titolo' => 'required|max:255',
            'regista' => 'required|max:255',
            'durata' => 'required|integer|min:1',
            'descrizione' => 'nullable|string',
            'immagine_copertina' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('immagine_copertina')) {
            $imageName = time().'.'.$request->immagine_copertina->extension();
            $request->immagine_copertina->move(public_path('images'), $imageName);
            $validated['immagine_copertina'] = $imageName;
        }

        Film::create($validated);
        return redirect()->route('films.index')->with('success', 'Film aggiunto con successo');
    }


    public function update(Request $request, Film $film) {
        $validated = $request->validate([
            'titolo' => 'required|max:255',
            'regista' => 'required|max:255',
            'durata' => 'required|integer|min:1',
            'descrizione' => 'nullable|string',
            'immagine_copertina' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('immagine_copertina')) {
            $imageName = time().'.'.$request->immagine_copertina->extension();
            $request->immagine_copertina->move(public_path('images'), $imageName);
            $validated['immagine_copertina'] = $imageName;
        }

        $film->update($validated);
        return redirect()->route('films.index');
    }



    public function destroy(Film $film) {
        $film->delete();
        return redirect()->route('films.index');
    }
}

