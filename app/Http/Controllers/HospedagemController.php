<?php

namespace App\Http\Controllers;

use App\Models\Hospedagem;
use App\Models\Hospede;
use Illuminate\Http\Request;

class HospedagemController extends Controller
{
    public function index()
    {
        $hospedagens = Hospedagem::with('hospede')->get();
        return view('hospedagens.index', compact('hospedagens'));
    }

    public function create()
    {
        $hospedes = Hospede::all();
        return view('hospedagens.create', compact('hospedes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'hospede_id' => 'required|exists:hospedes,id',
            'data_inicio' => 'required|date|before_or_equal:data_fim',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
        ]);

        Hospedagem::create($validated);

        return redirect()->route('hospedagens.index')->with('success', 'Hospedagem criada com sucesso!');
    }

    public function edit(Hospedagem $hospedagem)
    {
        return view('hospedagens.edit', compact('hospedagem'));
    }

    public function update(Request $request, Hospedagem $hospedagem)
    {
        $validated = $request->validate([
            'hospede_id' => 'required|exists:hospedes,id',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
        ]);

        $hospedagem->update($validated);

        return redirect()->route('hospedagens.index')
            ->with('success', 'Hospedagem atualizada com sucesso!');
    }

    public function destroy(Hospedagem $hospedagem)
    {
        $hospedagem->delete();
        return redirect()->route('hospedagens.index')->with('success', 'Hospedagem excluída com sucesso!');
    }
}
