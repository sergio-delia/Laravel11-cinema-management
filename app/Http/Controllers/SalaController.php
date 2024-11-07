<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use Illuminate\Http\Request;

class SalaController extends Controller
{
    public function index() {
        $salas = Sala::all();
        return view('salas.index', compact('salas'));
    }

    public function create() {
        return view('salas.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nome' => 'required|max:255',
            'capienza' => 'required|integer|min:1',
        ]);

        Sala::create($validated);
        return redirect()->route('salas.index');
    }

    public function show(Sala $sala) {
        return view('salas.show', compact('sala'));
    }

    public function edit(Sala $sala) {
        return view('salas.edit', compact('sala'));
    }

    public function update(Request $request, Sala $sala) {
        $validated = $request->validate([
            'nome' => 'required|max:255',
            'capienza' => 'required|integer|min:1',
        ]);

        $sala->update($validated);
        return redirect()->route('salas.index');
    }

    public function destroy(Sala $sala) {
        $sala->delete();
        return redirect()->route('salas.index');
    }
}
