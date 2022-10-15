<div class="flex justify-center">
    <a wire:click="$emit('{{ $view }}', {{ $id }})" class="p-1 rounded cursor-pointer" title="Ver postulados">
        <i class="fa fa-eye text-warning"></i>
    </a>

    <a wire:click="$emit('{{ $edit }}', {{ $id }})" class="p-1 rounded cursor-pointer">
        <i class="fas fa-edit text-info"></i>
    </a>

    <a wire:click="$emit('{{ $delete }}', {{ $id }})" class="p-1 rounded cursor-pointer">
        <i class="fa fa-trash text-danger"></i>
    </a>
</div>