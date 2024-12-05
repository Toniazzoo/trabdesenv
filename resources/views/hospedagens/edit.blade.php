<form action="{{ route('hospedagens.update', $hospedagem->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="hospede_id">Hóspede</label>
        <select name="hospede_id" id="hospede_id" class="form-control" required>
            @foreach($hospedes as $hospede)
                <option value="{{ $hospede->id }}" {{ $hospedagem->hospede_id == $hospede->id ? 'selected' : '' }}>
                    {{ $hospede->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="data_inicio">Data Início</label>
        <input type="date" name="data_inicio" id="data_inicio" class="form-control" value="{{ $hospedagem->data_inicio }}" required>
    </div>

    <div class="form-group">
        <label for="data_fim">Data Fim</label>
        <input type="date" name="data_fim" id="data_fim" class="form-control" value="{{ $hospedagem->data_fim }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Atualizar Hospedagem</button>
</form>
