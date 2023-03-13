<div>
    <x-header title="Convenio" header="Administrar convenio" />

    <div class="pb-4">
        <div class="mx-auto sm:px-6 lg:px-8">
            @if(auth()->user()->role == 'admin')
            <x-add-button model="convenio" lastVowal="o" />
            @endif

            <div class="pb-4">
                <livewire:tables.admin.catalogue.agreements-table />
            </div>

            <!-- Modal -->
            <div class="modal fade @if($modal)show @endif" tabindex="-1" role="dialog" aria-hidden="true"
                style="@if($modal)display: block; padding-right: 16px; @else display: none; @endif ">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <x-modal-header model="Convenio" :stateid="isset($state['id'])" />

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="user_id">Empresa a realizar convenio</label>
                                <div class="controls">
                                    <select id="user_id" wire:model.defer="state.user_id"
                                        class="form-control @error('user_id') is-invalid @enderror"
                                        title="Mencione la carrera">
                                        <option value='' selected disabled="">Selecciona una opción</option>
                                        @foreach ($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('user_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <x-input-component idInput='name' title="Nombre del convenio" lg="12" md="12" sm="12" />
                            <x-input-component idInput='description' title="Descripción del convenio" lg="12" md="12"
                                sm="12" />
                            <x-input-component idInput='type' title="Tipo del convenio" lg="12" md="12" sm="12" />
                        </div>

                        <x-modal-footer model="Convenio" :stateid="isset($state['id'])" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>