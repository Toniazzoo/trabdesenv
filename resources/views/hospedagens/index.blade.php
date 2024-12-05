@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Hospedagens</h1>
    <a href="{{ route('hospedagens.create') }}" class="btn btn-success mb-3">Cadastrar Nova Hospedagem</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Hóspede</th>
                <th>Data de Início</th>
                <th>Data de Fim</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hospedagens as $hospedagem)
                <tr>
                    <td>{{ $hospedagem->hospede->nome }}</td>
                    <td>{{ $hospedagem->data_inicio }}</td>
                    <td>{{ $hospedagem->data_fim }}</td>
                    <td>
                        <a href="{{ route('hospedagens.edit', $hospedagem) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('hospedagens.destroy', $hospedagem) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
