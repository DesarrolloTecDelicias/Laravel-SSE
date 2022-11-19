@if (!env('ENABLE_MAIL'))
@php header("Location: " . URL::to('/login'), true, 302); exit(); @endphp
@endif

<head>
    <title>Restablecer contraseña</title>
    @php $school = env('SCHOOL'); @endphp
    <link rel="icon" href="{{asset ("image/school/$school/favicon.ico")}}">
</head>

<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <a href="{{route('welcome')}}"><img style="width:330px; height:150px;"
                    src="{{asset('image/school/logonew.png')}}" alt=""></a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600 text-justify">
            {{ __('¿Olvidaste tu contraseña? No hay problema. Simplemente háganos saber su dirección de correo electrónico y le enviaremos
            un enlace de restablecimiento de contraseña que le permitirá elegir una nueva.') }}
        </div>

        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>