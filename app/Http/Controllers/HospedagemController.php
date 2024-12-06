<?php

namespace App\Http\Controllers;

use App\Models\Hospedagem;
use App\Models\Hospede;
use App\Models\Quarto;
use Illuminate\Http\Request;

class HospedagemController extends Controller
{
    public function index()
    {
        $hospedagens = Hospedagem::with(['hospede', 'quarto'])->get();
        return view('hospedagens.index', compact('hospedagens'));
    }

    public function create()
    {
        $hospedes = Hospede::all();
        $quartos = Quarto::where('available', true)->get();
        return view('hospedagens.create', compact('hospedes', 'quartos'));
    }

    function store(Request $request)
    {
        $request->validate([
            'hospede_id' => 'required|exists:hospedes,id',
            //  'quarto_id' => 'required|exists:quartos,id',
            'data_inicio' => 'required|date',
            'data_fim' => 'nullable|date|after_or_equal:data_inicio',
        ]);

        $hospedagem = Hospedagem::create($request->all());

        // Marca o quarto como indisponível após a hospedagem
        // $hospedagem->quarto->update(['available' => false]);

        return redirect()->route('hospedagem.index')->with('success', 'Hospedagem criada com sucesso.');
    }

    public function edit(Hospedagem $hospedagem)
    {
        $hospedes = Hospede::all();
        $quartos = Quarto::all();
        return view('hospedagens.edit', compact('hospedagem', 'hospedes', 'quartos'));
    }


    public function update(Request $request, Hospedagem $hospedagem)
    {
        // Validação dos dados recebidos do formulário
       $request->validate([
            'hospede_id' => 'required',
            //'quarto_id' => 'required|exists:quartos,id',
            'data_inicio' => 'required|date',
            'data_fim' => 'nullable|date',
        ]);

        $data = [
            'hospede_id' =>  $request->hospede_id,
            'data_inicio' => $request->data_inicio,
            'data_fim' => $request->data_fim,
        ];
       // dd( $data);

        // Atualiza a hospedagem com os dados validados
        Hospedagem::updateOrCreate(
            ['id' => $request->id],
            $data
        );
        /*
        if ($hospedagem->isDirty('quarto_id')) {
            $hospedagem->quarto->update(['available' => true]); // Marca o quarto antigo como disponível
            $hospedagem->fresh()->quarto->update(['available' => false]); // Marca o novo quarto como indisponível
        }
        */

        return redirect()->route('hospedagem.index')->with('success', 'Hospedagem atualizada com sucesso.');
    }


    public function destroy(Hospedagem $hospedagem)
    {
        // $hospedagem->quarto->update(['available' => true]);
        $hospedagem->delete();

        return redirect()->route('hospedagem.index')->with('success', 'Hospedagem excluída com sucesso.');
    }
}
