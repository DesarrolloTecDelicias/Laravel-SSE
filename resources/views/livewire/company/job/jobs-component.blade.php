<div>
    <x-slot name="title">
        Empleos
    </x-slot>

    <x-slot name="header">
        Administrar empleos disponibles
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="d-flex justify-content-end">
                <button type="button" class="btn bg-gradient-success mb-4" wire:click="launchModal">
                    Agregar nueva actividad
                </button>
            </div>

            <div class="py-4">
                <livewire:tables.company.job.job-table userId={{$companyId}} />
            </div>

            <!-- Modal -->
            <div class="modal fade @if($modal)show @endif" tabindex="-1" role="dialog" aria-hidden="true"
                style="@if($modal)display: block; padding-right: 16px; @else display: none; @endif ">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                {{ isset($state['id']) ? 'Editar' : 'Guardar' }} Empleo
                            </h5>
                            <button type="button" class="close" wire:click="launchModal">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="title">Título del empleo</label>
                                <input id="name" wire:model.defer="state.title" type="text"
                                    class="form-control @error('title') is-invalid @enderror"
                                    placeholder="Ejemplo: Analista de Datos">
                                @error('title')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Descripción del empleo</label>
                                <textarea id="description" wire:model.defer="state.description"
                                    class="form-control @error('description') is-invalid @enderror"
                                    style="resize: none;" rows="4"
                                    placeholder="Ejemplo: Se busca ingeniero en sistemas con conocimientos en el lenguaje C# y base de datos Microsoft SQL Server para análisis de datos"></textarea>
                                @error('description')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="salary">Salario</label>
                                $<input id="salary" wire:model.defer="state.salary" type="text"
                                    class="form-control @error('salary') is-invalid @enderror"
                                    placeholder="Ejemplo: $5000 mensuales">
                                @error('salary')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="id_career">Carrera</label>
                                <div class="controls">
                                    <select id="id_career" wire:model.defer="state.id_career"
                                        class="form-control @error('id_career') is-invalid @enderror"
                                        title="Mencione la carrera preferente">
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

            <!-- Modal -->
            <div class="modal fade @if($postulateModal)show @endif" tabindex="-1" role="dialog" aria-hidden="true"
                style="@if($postulateModal)display: block; padding-right: 16px; @else display: none; @endif ">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                Ver postulados
                            </h5>
                            <button type="button" class="close" wire:click="launchPostulateModal">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @foreach ($postulates as $postulate)
                               {{ $postulate }}
                            @endforeach
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-gradient-danger"
                                wire:click="launchPostulateModal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>