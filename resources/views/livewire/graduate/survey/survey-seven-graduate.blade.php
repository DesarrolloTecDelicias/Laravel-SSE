<div>
    <x-header title="Comentarios y Sugerencias" />    

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

    <x-save-component route='graduate.dashboard' />
</div>