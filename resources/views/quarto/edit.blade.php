@extends('layouts.app')

@section('content')
    <h1>Editar Quarto</h1>
    <form action="{{ route('quartos.update', $quarto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="number">Número:</label>
            <input type="text" name="number" id="number" class="form-control" value="{{ old('number', $quarto->number) }}" required>
        </div>

        <div class="form-group">
            <label for="type">Tipo:</label>
            <input type="text" name="type" id="type" class="form-control" value="{{ old('type', $quarto->type) }}" required>
        </div>

        <div class="form-group">
            <label for="price">Preço:</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $quarto->price) }}" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $quarto->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Salvar Alterações</button>
    </form>
@endsection
