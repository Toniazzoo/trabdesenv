<?php

namespace App\Http\Controllers;

use App\Models\Quarto;
use Illuminate\Http\Request;

class QuartoController extends Controller
{

    public function index()
    {
        $quartos = Quarto::all();
        return view('quarto.index', compact('quartos'));
    }

    public function create()
    {
        return view('quarto.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'number' => 'required|unique:quartos,number|max:10',
            'type' => 'required|max:50',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|max:255',

        ]);

        Quarto::create($validated);

        return redirect()->route('quartos.index')->with('success', 'Quarto criado com sucesso.');
    }

    public function edit($id)
    {
        $quarto = Quarto::findOrFail($id);
        return view('quarto.edit', compact('quarto'));
    }

    public function update(Request $request, $id)
    {
        $quarto = Quarto::findOrFail($id);

        $validated = $request->validate([
            'number' => 'required|unique:quartos,number,' . $quarto->id . '|max:10',
            'type' => 'required|max:50',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|max:255',
        ]);

        $quarto->update($validated);

        return redirect()->route('quartos.index')->with('success', 'Quarto atualizado com sucesso.');
    }


    public function destroy($id)
    {
        $quarto = Quarto::findOrFail($id);
        $quarto->delete();

        return redirect()->route('quartos.index')->with('success', 'Quarto excluído com sucesso.');
    }
}
