<div>
    <x-slot name="title">
        Egresados
    </x-slot>

    <x-slot name="header">
        Administrar Egresados
    </x-slot>

    <div class="pb-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="d-flex justify-content-end">
                <button type="button" class="btn bg-gradient-success mb-4" wire:click="launchModal">
                    Agregar nuevo Egresado
                </button>
            </div>

            <div class="pb-4">
                <livewire:tables.admin.configuration.graduates-table />
            </div>

            <!-- Modal -->
            <div class="modal fade @if($modal)show @endif" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true"
                style="@if($modal)display: block; padding-right: 16px; @else display: none; @endif ">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                {{ isset($state['id']) ? 'Editar' : 'Guardar' }} Egresado</h5>
                            <button type="button" class="close" wire:click="launchModal">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Nombre(s) del Egresado</label>
                                <input wire:model.defer="state.name" type="text" autocomplete="off"
                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                    placeholder="Nombre Egresado">
                                @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="fathers_surname">Apellido Paterno</label>
                                <input wire:model.defer="state.fathers_surname" type="text" autocomplete="off"
                                    class="form-control @error('fathers_surname') is-invalid @enderror" id="fathers_surname"
                                    placeholder="Apellido Paterno">
                                @error('fathers_surname')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="mothers_surname">Apellido Materno</label>
                                <input wire:model.defer="state.mothers_surname" type="text" autocomplete="off"
                                    class="form-control @error('mothers_surname') is-invalid @enderror" id="mothers_surname"
                                    placeholder="Apellido Materno">
                                @error('mothers_surname')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Correo Electr??nico</label>
                                <input wire:model.defer="state.email" type="text" autocomplete="off"
                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                    placeholder="Correo Electr??nico">
                                @error('email')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Contrase??a</label>
                                <input wire:model.defer="state.password" type="text" autocomplete="off"
                                    class="form-control @error('password') is-invalid @enderror" id="password"
                                    placeholder="Contrase??a">
                                @error('password')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="career_id">Carrera</label>
                                <div class="controls">
                                    <select id="career_id" wire:model.defer="state.career_id"
                                        class="form-control @error('career_id') is-invalid @enderror"
                                        title="Mencione la carrera">
                                        <option value='' selected disabled="">Selecciona una opci??n</option>
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

                            <div class="form-group">
                                <label for="income_year">A??o de Ingreso</label>
                                <div class="controls">
                                    <select id="income_year" wire:model.defer="state.income_year"
                                        class="form-control @error('income_year') is-invalid @enderror"
                                        title="Mencione el a??o de ingreso">
                                        <option value='' selected disabled="">Selecciona una opci??n</option>
                                        @for ($i = 1990; $i <= Date('Y'); $i++) <option value="{{ $i }}">{{ $i }}
                                            </option>
                                            @endfor
                                    </select>
                                </div>
                                @error('income_year')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="income_month">Per??odo de Ingreso</label>
                                <div class="controls">
                                    <select id="income_month" wire:model.defer="state.income_month"
                                        class="form-control @error('income_month') is-invalid @enderror"
                                        title="Mencione el per??odo de ingreso">
                                        <option value='' selected disabled="">Selecciona una opci??n</option>
                                        @foreach ($months as $month)
                                        <option value="{{ $month }}">{{ $month }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('income_month')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="year_graduated">A??o de Egreso</label>
                                <div class="controls">
                                    <select id="year_graduated" wire:model.defer="state.year_graduated"
                                        class="form-control @error('year_graduated') is-invalid @enderror"
                                        title="Mencione el a??o de egreso">
                                        <option value='' selected disabled="">Selecciona una opci??n</option>
                                        @for ($i = 1990; $i <= Date('Y'); $i++) <option value="{{ $i }}">{{ $i }}
                                            </option>
                                            @endfor
                                    </select>
                                </div>
                                @error('year_graduated')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="month_graduated">Per??odo de Egreso</label>
                                <div class="controls">
                                    <select id="month_graduated" wire:model.defer="state.month_graduated"
                                        class="form-control @error('month_graduated') is-invalid @enderror"
                                        title="Mencione el per??odo de egreso">
                                        <option value='' selected disabled="">Selecciona una opci??n</option>
                                        @foreach ($months as $month)
                                        <option value="{{ $month }}">{{ $month }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('month_graduated')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="control_number">N??mero de Control</label>
                                <input wire:model.defer="state.control_number" type="text" maxlength="12"
                                    onkeypress="validateNumbers(event);" autocomplete="off"
                                    class="form-control @error('control_number') is-invalid @enderror"
                                    id="control_number" placeholder="N??mero de Control">
                                @error('control_number')
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