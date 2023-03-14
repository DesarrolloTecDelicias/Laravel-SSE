<div>
    <x-header title="Administradores" header="Administrar Administradores" />

    <div class="pb-4">
        <div class="mx-auto sm:px-6 lg:px-8">
            @if(auth()->user()->role == 'admin')
            <x-add-button model="Soporte" lastVowal="o" />
            @endif

            <div class="pb-4">
                <livewire:tables.admin.configuration.support-table />
            </div>

            <!-- Modal -->
            <div class="modal fade @if($modal)show @endif" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true"
                style="@if($modal)display: block; padding-right: 16px; @else display: none; @endif ">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <x-modal-header model="Soporte" :stateid="isset($state['id'])" />

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Nombre del Soporte</label>
                                <input wire:model.defer="state.name" type="text" autocomplete="off"
                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                    placeholder="Nombre soporte">
                                @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                <input wire:model.defer="state.email" type="text" autocomplete="off"
                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                    placeholder="Correo Electrónico">
                                @error('email')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input wire:model.defer="state.password" type="text" autocomplete="off"
                                    class="form-control @error('password') is-invalid @enderror" id="password"
                                    placeholder="Contraseña">
                                @error('password')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <x-modal-footer model="Soporte" :stateid="isset($state['id'])" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>