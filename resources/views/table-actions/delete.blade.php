<div class="flex justify-center">

    @if ($status != 2)
        @if ($status == 1)
            <a wire:click="$emit('{{ $inactive }}', {{ $id }})" class="p-1 rounded cursor-pointer">
                <i class="fas fa-times text-warning"></i>
            </a>
        @else
            <a wire:click="$emit('{{ $active }}', {{ $id }})" class="p-1 rounded cursor-pointer">
                <i class="fas fa-check text-success"></i>
            </a>
        @endif
    @endif

    <a wire:click="$emit('{{ $delete }}', {{ $id }})" class="p-1 rounded cursor-pointer">
        <i class="fa fa-trash text-danger"></i>
    </a>
</div>
