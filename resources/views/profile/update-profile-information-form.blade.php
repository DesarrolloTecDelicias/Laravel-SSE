<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Información del perfil') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Actualiza la información de tu perfil y correo electrónico.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
        <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
            <!-- Profile Photo File Input -->
            <input type="file" class="hidden" wire:model="photo" x-ref="photo" x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

            <x-jet-label for="photo" value="{{ __('Photo') }}" />

            <!-- Current Profile Photo -->
            <div class="mt-2" x-show="! photoPreview">
                <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                    class="rounded-full h-20 w-20 object-cover">
            </div>

            <!-- New Profile Photo Preview -->
            <div class="mt-2" x-show="photoPreview" style="display: none;">
                <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                    x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                </span>
            </div>

            <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                {{ __('Select A New Photo') }}
            </x-jet-secondary-button>

            @if ($this->user->profile_photo_path)
            <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                {{ __('Remove Photo') }}
            </x-jet-secondary-button>
            @endif

            <x-jet-input-error for="photo" class="mt-2" />
        </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name"
                autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        @if(Auth::user()->role == 'graduate')

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="career_id" value="{{ __('Carrera') }}" />
            <select id="career_id" wire:model.defer="state.career_id"
                class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <option value="" selected disabled="">
                    Selecciona tu carrera
                </option>
                @foreach (App\Models\Career::all() as $career)
                <option value="{{ $career->id }}" @if (Auth::user()->career_id)
                    {{ 'selected' }} @endif>{{ $career->name }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="career" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="income_year" value="{{ __('Año de ingreso') }}" />
            <select id="income_year" wire:model.defer="state.income_year"
                class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <option value="" selected disabled="">
                    Selecciona año de ingreso
                </option>
                @for ($i = 1986; $i < Date('Y'); $i++) <option value="{{ $i }}" @if (Auth::user()->income_year==$i)
                    {{ 'selected' }} @endif>
                    {{ $i }}
                    </option>
                    @endfor
            </select>
            <x-jet-input-error for="income_year" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="income_month" value="{{ __('Período de ingreso') }}" />
            <select id="income_month" wire:model.defer="state.income_month"
                class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <option value="" selected disabled="">
                    Selecciona tu período de ingreso
                </option>
                @foreach (App\Constants\Constants::MONTH as $month)
                <option value="{{ $month }}" @if (Auth::user()->income_month==$month) {{ 'selected' }} @endif>
                    {{ $month }}
                </option>
                @endforeach
            </select>
            <x-jet-input-error for="income_month" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="year_graduated" value="{{ __('Año de egreso') }}" />
            <select id="year_graduated" wire:model.defer="state.year_graduated"
                class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <option value="" selected disabled="">
                    Selecciona año de egreso
                </option>
                @for ($i = 1986; $i <= Date('Y'); $i++) <option value="{{ $i }}" @if (Auth::user()->year_graduated==$i)
                    {{ 'selected' }} @endif>
                    {{ $i }}
                    </option>
                    @endfor
            </select>
            <x-jet-input-error for="year_graduated" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="month_graduated" value="{{ __('Período de egreso') }}" />
            <select id="month_graduated" wire:model.defer="state.month_graduated"
                class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <option value="" selected disabled="">
                    Selecciona tu período de egreso
                </option>
                @foreach (App\Constants\Constants::MONTH as $month)
                <option value="{{ $month }}" @if (Auth::user()->month_graduated==$month) {{ 'selected' }} @endif>
                    {{ $month }}
                </option>
                @endforeach
            </select>
            <x-jet-input-error for="month_graduated" class="mt-2" />
        </div>

        @endif

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>