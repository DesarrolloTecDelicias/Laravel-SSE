<div>
    <x-slot name="title">
        Comentarios y Sugerencias
    </x-slot>

    <x-slot name="header">
        Comentarios y Sugerencias
    </x-slot>

    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="comments">Comentarios *</label>
                <textarea id="comments" wire:model.defer="state.comments"
                    class="form-control @error('comments') is-invalid @enderror" rows="8"
                    placeholder="Escribe aquí sus comentarios"></textarea>
                @error('comments')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="row mt-2 pb-2 d-flex align-items-center flex-column">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <button class="btn btn-block bg-gradient-primary" wire:click="save">Guardar Encuesta</button>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
            <a href="{{ route('graduate.dashboard') }}" class="btn btn-block bg-gradient-danger">Cancelar</a>
        </div>
    </div>
</div>