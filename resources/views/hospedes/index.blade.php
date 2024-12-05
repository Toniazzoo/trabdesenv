@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Hóspedes</h1>
    <a href="{{ route('hospedes.create') }}" class="btn btn-success mb-3">Cadastrar Novo Hóspede</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Data de Nascimento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hospedes as $hospede)
                <tr>
                    <td>{{ $hospede->nome }}</td>
                    <td>{{ $hospede->cpf }}</td>
                    <td>{{ $hospede->data_nascimento }}</td>
                    <td>
                        <a href="{{ route('hospedes.edit', $hospede) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('hospedes.destroy', $hospede) }}" method="POST" style="display:inline;">
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
