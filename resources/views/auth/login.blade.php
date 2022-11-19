<head>
    <title>Iniciar Sesión</title>
    @php $school = env('SCHOOL'); @endphp
    <link rel="icon" href="{{asset (" image/school/$school/favicon.ico")}}">
</head>
<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <a href="{{route('welcome')}}"><img style="width:330px; height:150px;"
                    src="{{asset('image/school/logonew.png')}}" alt=""></a>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Correo Electrónico') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus autocomplete="off" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="off" />
            </div>


            <div class="flex items-center justify-end mt-4">
                @if (Route::has('forgot.password'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900"
                    href="{{ env('ENABLE_MAIL') ? route('password.request') : route('forgot.password') }}">
                    {{ __('¿Olvidaste tu contraseña?') }}
                </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Iniciar Sesión') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>