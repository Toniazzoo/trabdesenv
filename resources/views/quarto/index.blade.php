@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Quartos</h1>
    <a href="{{ route('quartos.create') }}" class="btn btn-success mb-3">Cadastrar Novo Quarto</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>Número</th>
                <th>Tipo</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($quartos as $quarto)
                <tr>
                    <td>{{ $quarto->number }}</td>
                    <td>{{ $quarto->type }}</td>
                    <td>R$ {{ number_format($quarto->price, 2, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('quartos.edit', $quarto->id) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('quartos.destroy', $quarto->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este quarto?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Nenhum quarto cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
