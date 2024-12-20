@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cadastrar Hospedagem</h1>
    <form action="{{ route('hospedagem.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="hospede_id">Hóspede</label>
            <select name="hospede_id" id="hospede_id" class="form-control" required>
                <option value="">Selecione um hóspede</option>
                @foreach($hospedes as $hospede)
                    <option value="{{ $hospede->id }}">{{ $hospede->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="quarto">Quarto</label>
            <select name="quarto_id" id="quarto" class="form-control" required>
                <option value="">Selecione um Quarto</option>
                @foreach($quartos as $quarto)
                    <option value="{{ $quarto->id }}">{{ $quarto->number." - ".$quarto->type }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="data_inicio">Data de Início</label>
            <input type="date" name="data_inicio" id="data_inicio" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="data_fim">Data de Fim</label>
            <input type="date" name="data_fim" id="data_fim" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection
