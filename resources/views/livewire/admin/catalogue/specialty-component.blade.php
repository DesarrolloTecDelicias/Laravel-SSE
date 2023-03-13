<div>
    <x-header title="Especialidades" header="Administrar especialidades" />

    <div class="pb-4">
        <div class="mx-auto sm:px-6 lg:px-8">
            <x-add-button model="especialidad" />

            <div class="pb-4">
                <livewire:tables.admin.catalogue.specialties-table />
            </div>

            <!-- Modal -->
            <div class="modal fade @if($modal)show @endif" tabindex="-1" role="dialog" aria-hidden="true"
                style="@if($modal)display: block; padding-right: 16px; @else display: none; @endif ">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <x-modal-header model="Especialidad" :stateid="isset($state['id'])" />
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="career_id">Carrera</label>
                                <div class="controls">
                                    <select id="career_id" wire:model.defer="state.career_id"
                                        class="form-control @error('career_id') is-invalid @enderror"
                                        title="Mencione la carrera">
                                        <option value='' selected disabled="">Selecciona una opción</option>
                                        @foreach ($careers as $career)
                                        <option value="{{ $career->id }}">{{ $career->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('career_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <x-input-component idInput='name' title="Nombre de la especialidad" lg="12" md="12"
                                sm="12" />
                                <x-input-component idInput='reticle' title="Retícula" lg="12" md="12" sm="12" />
                        </div>
                        <x-modal-footer model="Especialidad" :stateid="isset($state['id'])" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>