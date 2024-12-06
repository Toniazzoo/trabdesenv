@extends('layouts.app')

@section('content')
    <h1>Cadastrar Quarto</h1>
    <form action="{{ route('quartos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="number" class="form-label">Número do Quarto</label>
            <input type="text" name="number" id="number" class="form-control" value="{{ old('number') }}">
            @error('number') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Tipo</label>
            <input type="text" name="type" id="type" class="form-control" value="{{ old('type') }}">
            @error('type') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Preço</label>
            <input type="number" name="price" id="price" step="0.01" class="form-control" value="{{ old('price') }}">
            @error('price') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
@endsection
