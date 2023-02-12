<div class="modal-footer">
    <button type="button" class="btn bg-gradient-primary" wire:click="save">
        {{ $stateid ? 'Editar' : 'Guardar' }}
    </button>
    <button type="button" class="btn bg-gradient-danger" wire:click="launchModal">Cancelar</button>
</div>