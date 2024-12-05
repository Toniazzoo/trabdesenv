<?php

namespace App\Http\Controllers;

use App\Models\Hospede;
use Illuminate\Http\Request;

class HospedeController extends Controller
{
    // Método para listar os hóspedes
    public function index()
    {
        // Obtém todos os hóspedes do banco de dados
        $hospedes = Hospede::all();

        // Retorna a view de listagem, passando os dados dos hóspedes
        return view('hospedes.index', compact('hospedes'));
    }

    // Método para exibir o formulário de criação de hóspede
    public function create()
    {
        // Retorna a view de criação
        return view('hospedes.create');
    }

    // Método para armazenar os dados do hóspede no banco
    public function store(Request $request)
    {
        // Valida os dados recebidos do formulário
        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:255|unique:hospedes',
            'data_nascimento' => 'required|date',
            'descricao' => 'nullable|string',
        ]);

        // Cria o hóspede no banco de dados
        Hospede::create($request->all());

        // Redireciona para a lista de hóspedes com uma mensagem de sucesso
        return redirect()->route('hospedes.index')->with('success', 'Hóspede cadastrado com sucesso!');
    }

    // Método para exibir o formulário de edição do hóspede
    public function edit(Hospede $hospede)
    {
        // Retorna a view de edição com os dados do hóspede
        return view('hospedes.edit', compact('hospede'));
    }

    // Método para atualizar os dados do hóspede no banco
    public function update(Request $request, Hospede $hospede)
    {
        // Valida os dados recebidos do formulário
        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:255|unique:hospedes,cpf,' . $hospede->id,
            'data_nascimento' => 'required|date',
            'descricao' => 'nullable|string',
        ]);

        // Atualiza os dados do hóspede no banco de dados
        $hospede->update($request->all());

        // Redireciona para a lista de hóspedes com uma mensagem de sucesso
        return redirect()->route('hospedes.index')->with('success', 'Hóspede atualizado com sucesso!');
    }

    // Método para excluir um hóspede do banco
    public function destroy(Hospede $hospede)
    {
        // Exclui o hóspede do banco de dados
        $hospede->delete();

        // Redireciona para a lista de hóspedes com uma mensagem de sucesso
        return redirect()->route('hospedes.index')->with('success', 'Hóspede excluído com sucesso!');
    }
}
