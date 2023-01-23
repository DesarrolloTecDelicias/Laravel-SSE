<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema de Seguimiento de Egresados</title>
    @php $school = env('SCHOOL'); @endphp
    <link rel="icon" href="{{asset('image/school/'.$school. '/favicon.ico')}}">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app-landing.css') }}">

    @livewireStyles
</head>

<body>
    <section id="hero" class="p-0 min-vh-100 pb-5 d-flex align-items-center">
        <div class="container">
            <div class="row main-hero-content">
                <div class="col-md-6 d-flex justify-content-center align-items-center flex-column">
                    <h1 class="title-h1 text-center">Sistema Seguimiento de Egresados</h1>
                    <p class="text-center">Esta página no exite o se encuentra en mantenimiento.</p>
                </div>
                <div class="col-md-6 d-flex justify-center flex-wrap text-center">
                    <a href="https://storyset.com/web" class="text-light"><img
                            src="{{asset('image/school/404.png')}}" class="img-fluid" alt="">
                        <br /> Web illustrations by Storyset</a>
                </div>
            </div>
        </div>
    </section>
</body>

</html>