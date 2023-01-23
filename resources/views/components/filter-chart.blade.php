<div class="row d-flex justify-content-between">
    <div class="col-2">
        <div class="form-group">
            <label for="dataFilterStart">Fecha de Inicio</label>
            <div class="controls">
                <input type="date" class="form-control" wire:model.defer="dataFilterStart" id="dataFilterStart">
            </div>
        </div>
    </div>

    <div class="col-2">
        <div class="form-group">
            <label for="dataFilterEnd">Fecha Fin</label>
            <div class="controls">
                <input type="date" class="form-control" wire:model.defer="dataFilterEnd" id="dataFilterEnd">
            </div>
        </div>
    </div>

    <div class="col-6" wire:ignore>
        <div class="form-group">
            <label for="careerSelected">Carrera</label>
            <select id="careerSelected" class="select2-class form-control" title="Mencionar carrera"
                multiple="multiple">
                @foreach ($careers as $career)
                <option @if(array_key_exists($career->id, $selected))selected @endif
                    value="{{ $career->id }}">
                    {{ $career->name }}
                </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-2">
        <div class="form-group text-center">
            <label>Aplicar filtros</label>
            <div class="controls">
                <button type="button" class="btn bg-gradient-info w-100" wire:click.prevent="changeChart">
                    Generar
                </button>
            </div>
        </div>
    </div>
</div>