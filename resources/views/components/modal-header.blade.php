<div class="modal-header">
    <h5 class="modal-title">
        {{ $stateid ? 'Editar' : 'Guardar' }} {{ $model }}
    </h5>
    <button type="button" class="close" wire:click="launchModal">
        <span aria-hidden="true">&times;</span>
    </button>
</div>