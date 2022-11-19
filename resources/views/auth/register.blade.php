<head>
    <title>Registro Egresado</title>
    @php $school = env('SCHOOL'); @endphp
    <link rel="icon" href="{{asset (" image/school/$school/favicon.ico")}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>

<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <a href="{{route('welcome')}}">
                <img style="width:190px; height:120px; margin-top: 10px;" src="{{asset('image/school/SSE2.png')}}"
                    alt="" />
            </a>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <div class="alert alert-info text-justify" role="alert">
            El correo electrónico y el número de control son datos únicos que no se pueden repetir! Si llegas a tener
            una alerta que estos datos ya han sido registrados cuando no es así, te invitamos a comunicarte con el
            departamento de Vinculación para solucionar este detalle.
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <x-jet-input id="role" class="d-none" name="role" :value="15" />
            <div>
                <x-jet-label for="name" value="{{ __('Nombre(s)') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="fathers_surname" value="{{ __('Apellido Paterno') }}" />
                <x-jet-input id="fathers_surname" class="block mt-1 w-full" type="text" name="fathers_surname"
                    :value="old('fathers_surname')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="mothers_surname" value="{{ __('Apellido Materno') }}" />
                <x-jet-input id="mothers_surname" class="block mt-1 w-full" type="text" name="mothers_surname"
                    :value="old('mothers_surname')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Correo Electrónico') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
            </div>

            <div class="mt-4">
                <x-jet-label for="income_year" value="{{ __('Año de ingreso') }}" />
                <select id="income_year" name="income_year" title="Por favor selecciona tu año de ingreso"
                    class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    value="{{ old('income_year') }}" required>
                    <option value="" selected="" disabled="">
                        Selecciona año de ingreso
                    </option>
                    @for ($i = 1986; $i < Date('Y'); $i++) <option value="{{ $i }}" @if (old('income_year')==$i)
                        {{ 'selected' }} @endif>
                        {{ $i }}
                        </option>
                        @endfor
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="income_month" value="{{ __('Período de ingreso') }}" />
                <select id="income_month" name="income_month" title="Por favor selecciona tu período de ingreso"
                    class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    value="{{ old('income_month') }}" required>
                    <option value="" selected="" disabled="">
                        Selecciona tu período de ingreso
                    </option>
                    @foreach ($months as $month)
                    <option value="{{ $month }}" @if (old('income_month')==$month) {{ 'selected' }} @endif>
                        {{ $month }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="career" value="{{ __('Carrera') }}" />
                <select id="career" name="career" title="Por favor selecciona tu carrera"
                    title="Por favor selecciona tu carrera"
                    class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    value="{{ old('career') }}" required>
                    <option value="" selected="" disabled="">
                        Selecciona tu carrera
                    </option>
                    @foreach ($careers as $career)
                    <option value="{{ $career->name }}" @if (old('career')==$career->name)
                        {{ 'selected' }} @endif>{{ $career->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="control_number" value="{{ __('Número de Control') }}" />
                <x-jet-input autocomplete="off" title="Porfavor ingrese un número de control correcto"
                    id="control_number" name="control_number" title="Por favor escribe tu número de control"
                    class="block mt-1 w-full" type="text" :value="old('control_number')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="year_graduated" value="{{ __('Año de egreso') }}" />
                <select id="year_graduated" name="year_graduated" title="Por favor selecciona tu año de egreso"
                    class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    value="{{ old('year_graduated') }}" required>
                    <option value="" selected="" disabled="">
                        Selecciona año de egreso
                    </option>
                    @for ($i = 1990; $i <= Date('Y'); $i++) <option value="{{ $i }}" @if (old('year_graduated')==$i)
                        {{ 'selected' }} @endif>
                        {{ $i }}
                        </option>
                        @endfor
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="month_graduated" value="{{ __('Período de egreso') }}" />
                <select id="month_graduated" name="month_graduated" title="Por favor selecciona tu período de egreso"
                    title="Por favor selecciona tu período de egreso"
                    class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    value="{{ old('month_graduated') }}" required>
                    <option value="" selected="" disabled="">
                        Selecciona tu período de egreso
                    </option>
                    @foreach ($months as $month)
                    <option value="{{ $month }}" @if (old('month_graduated')==$month) {{ 'selected' }} @endif>
                        {{ $month }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-4">
                <x-jet-label for="terms">
                    <div class="flex items-center">
                        <x-jet-checkbox name="terms" id="terms" />

                        <div class="ml-2">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'"
                                class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of
                                Service').'</a>',
                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'"
                                class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy
                                Policy').'</a>',
                            ]) !!}
                        </div>
                    </div>
                </x-jet-label>
            </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('¿Ya te encuentras registrado?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>