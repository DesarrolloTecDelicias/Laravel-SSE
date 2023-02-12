<div class="row mt-2 pb-2 d-flex align-items-center flex-column">
    <div class="col-lg-4 col-md-6 col-sm-12">
        <button class="btn btn-block bg-gradient-primary" wire:click="save">{{ $title }}</button>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
        <a href="{{ route($route) }}" class="btn btn-block bg-gradient-danger">Cancelar</a>
    </div>
</div>