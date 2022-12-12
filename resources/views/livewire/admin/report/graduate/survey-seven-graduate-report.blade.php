<div>
    <x-slot name="title">
        Reporte Comentarios
    </x-slot>

    <x-slot name="header">
        Reporte Comentarios
    </x-slot>

    <div class="py-4">
        <livewire:tables.admin.report.survey-seven-table />
    </div>


    <!-- Modal -->
    <div class="modal fade @if($modal)show @endif" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true" style="@if($modal)display: block; padding-right: 16px; @else display: none; @endif ">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                        @if ($comment != null)
                            <h5 class="modal-title">
                                Comentario de: <b>{{ $comment->user->name}}</b></h5>
                        @endif    
                    <button type="button" class="close" wire:click="launchModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if ($comment != null)
                    <p>{{ $comment['comments'] }}</p>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-danger" wire:click="launchModal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>