<div>
    <x-slot name="title">
        Especialidades
    </x-slot>

    <x-slot name="header">
        Administrar especialidades
    </x-slot>

    <div class="pb-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="d-flex justify-content-end">
                <button type="button" class="btn bg-gradient-success mb-4" wire:click="launchModal">
                    Agregar nueva especialidad
                </button>
            </div>

            <div class="pb-4">
                <livewire:tables.admin.catalogue.specialties-table />
            </div>

            <!-- Modal -->
            <div class="modal fade @if($modal)show @endif" tabindex="-1" role="dialog" aria-hidden="true"
                style="@if($modal)display: block; padding-right: 16px; @else display: none; @endif ">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                {{ isset($state['id']) ? 'Editar' : 'Guardar' }} Especialidad</h5>
                            <button type="button" class="close" wire:click="launchModal">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="id_career">Carrera</label>
                                <div class="controls">
                                    <select id="id_career" wire:model.defer="state.id_career"
                                        class="form-control @error('id_career') is-invalid @enderror"
                                        title="Mencione la carrera">
                                        <option value='' selected disabled="">Selecciona una opción</option>
                                        @foreach ($careers as $career)
                                        <option value="{{ $career->id }}">{{ $career->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('id_career')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Nombre de la especialidad</label>
                                <input id="name" wire:model.defer="state.name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="Especialidad">
                                @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-gradient-primary" wire:click="save">
                                {{ isset($state['id']) ? 'Editar' : 'Guardar' }}
                            </button>
                            <button type="button" class="btn bg-gradient-danger"
                                wire:click="launchModal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>