<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema de Seguimiento de Egresados</title>
    @php $school = env('SCHOOL'); @endphp
    <link rel="icon" href="{{asset('image/school/' .$school.'/favicon.ico')}}">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app-landing.css') }}">

    @livewireStyles

    <link rel="stylesheet" href="{{asset('template/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Styles -->
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">

    <style>
        .section-title-heading {
            text-align: center;
        }

        .title-text::before {
            content: "Sistema de Seguimiento de Egresados" !important;
        }

        @media (max-width: 992px) {
            .section-title-heading {
                text-align: center;
            }

            .title-text::before {
                content: "" !important;
            }

            .title-text {
                content: "" !important;
            }

            .title-text::after {
                content: "S.S.E" !important;
            }
        }
    </style>

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light text-light fixed-top">
            <div class="container">
                <h5 class="navbar-brand text-light title-text"></h5>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation text-white text-light">
                    <i class="fas fa-bars text-white text-light" style="font-size:28px;"></i>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" target="_blank" href="{{ env('SCHOOL_WEB') }}">
                                {{ env('SCHOOL_SHORT_NAME') }}
                            </a>
                        </li>

                        @if (Route::has('login'))
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('verified.user') }}">Tablero</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Cerrar Sesión</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('graduate.register') }}">Registro Egresado</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('company.register') }}">Registro Empresas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
                        </li>
                        @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero section -->
    <section id="hero">
        <div class="container">
            <div class="row main-hero-content">
                <div class="col-md-6">
                    <h1 class="title-h1">Sistema Seguimiento de Egresados</h1>
                    <p>El SSE es el sistema que permite el análisis del desempeño e impacto de los egresados en el
                        sector productivo.</p>
                    <div class="hero-buttons d-flex justify-content-center mb-4 mb-lg-0 mb-sm-4">
                        <a href="#features" class="btn btn-outline-primary btn-white">Conocer más!</a>
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-center flex-wrap text-center">
                    <a href="https://www.freepik.com/vectorjuice" class="text-light"><img
                            src="{{asset('image/school/students.png')}}" class="img-fluid" alt="">
                        <br /> Designed by vectorjuice / Freepik</a>
                </div>
            </div>
        </div>
    </section>

    <!-- About section -->
    <section id="about">
        <div class="container">
            <div class="row section-title justify-content-center">
                <h2 class="section-title-heading">¿Por qué es importante?</h2>
            </div>
            <div class="row justify-content-center text-center mt-5">
                <div class="col-md-4">
                    <i class="lni lni-bar-chart mb-2"></i>
                    <h3>Recabar Información</h3>
                    <p class="text-justify">Producir indicadores que permitan a la universidad conocer la situación del
                        egresado de la institución.</p>
                </div>
                <div class="col-md-4">
                    <i class="lni lni-certificate mb-2"></i>
                    <h3>Titulación</h3>
                    <p class="text-justify">Tener las encuestas registradas es un requisito para que los alumnos puede
                        continuar con su proceso de titulación.</p>
                </div>
                <div class="col-md-4">
                    <i class="lni lni-support mb-2"></i>
                    <h3>Ofrecer Soporte</h3>
                    <p class="text-justify">Recabar y actualizar la información ayuda para proveer de elementos para la
                        mejora continua y el
                        desarrollo profesional de nuestros egresados en el sector productivo.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Feature section -->
    <section id="features">
        <div class="container">
            <div class="row section-title justify-content-center">
                <h2 class="section-title-heading">Información Importante</h2>
            </div>
            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="feature-block">
                        <i class="lni lni-graduation w-100 text-center"></i>
                        <h3 class="text-center">Perfil de Egreso</h3>
                        <p class="text-justify">El perfil del egresado incluye un componente estable, es decir, la
                            información demográfica básica de cada individuo como
                            es, género, lugar de nacimiento, fecha de nacimiento, formación, antecedentes académicos,
                            estado civil, lugar de
                            residencia, etc. Y un componente dinámico, que es susceptible de cambiar a lo largo del
                            tiempo (lugar de residencia,
                            nivel de ingresos, estado civil, puestos de trabajo, otros estudios, etc.).</p>
                    </div>
                    <div class="feature-block mt-5">
                        <i class="lni lni-apartment w-100 text-center"></i>
                        <h3 class="text-center">Datos de empresas</h3>
                        <p class="text-justify">Los empleadores y las organizaciones a las que representan, son una
                            parte importante al que sirven las instituciones de
                            educación superior tecnológica y, en consecuencia, la información que se deriva de estos
                            debe ser analizada y utilizada
                            para emprender acciones de mejora de los planes y programas de estudio y de la calidad
                            académica en general.</p>
                    </div>
                </div>
                <div class="col-md-4 device d-flex justify-center align-items-center">
                    <img class="survey-image" src="{{asset('image/school/survey.png')}}" alt="">
                </div>
                <div class="col-md-4">
                    <div class="feature-block">
                        <i class="lni lni-handshake w-100 text-center"></i>
                        <h3 class="text-center">Desempeño del egresado</h3>
                        <p class="text-justify">Las encuestas de egresados son útiles para recopilar datos sobre la
                            situación laboral de los egresados más recientes,
                            con el fin de obtener indicadores del desempeño profesional. Las encuestas también están
                            diseñadas para contribuir a las
                            explicaciones causales de la pertinencia de las condiciones de estudio y los servicios
                            proporcionados por las
                            instituciones de educación superior, así como del desempeño de los egresados en el mercado
                            laboral.</p>
                    </div>
                    <div class="feature-block mt-5">
                        <div class="w-100 d-flex justify-content-center">
                            <i class="lni lni-thumbs-up"></i> <i class="lni lni-thumbs-down"></i>
                        </div>
                        <h3 class="text-center">Expectativas del egresado</h3>
                        <p class="text-justify">Cumplido un determinado tiempo, esperamos que nuestros egresados vuelvan
                            a completar encuestas específicas para conocer si los conocimientos adquiridos han cumplido
                            sus expectativas en el mundo laboral, que les ayudó y que es lo que podría ayudar a las
                            futuras generaciones.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer section -->
    <footer id="footer">
        <div class="container">
            <div class="row d-flex flex-column align-items-center">
                <div class="social-icons text-light">
                    <a class="text-decoration-none" title="Facebook" href="{{ env('SCHOOL_FACEBOOK') }}"
                        target="_blank">
                        <i class="lni lni-facebook-original"></i>
                    </a>
                    <a class="text-decoration-none" title="Sitio oficial" href="{{ env('SCHOOL_WEB') }}"
                        target="_blank">
                        <i class="lni lni-website"></i>
                    </a>
                    @if (env('SCHOOL_LINKEDIN'))
                    <a class="text-decoration-none" title="Linkedin" href="{{ env('SCHOOL_LINKEDIN') }}">
                        <i class="lni lni-linkedin-original"></i>
                    </a>
                    @endif
                </div>
                <div class="copyright text-center">
                    <p>Sitios de interés para el Tecnológico</p>
                </div>
            </div>
        </div>

    </footer>

    @livewireScripts

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(function(){$(window).on('scroll',function(){if($(window).scrollTop()>10){$('.navbar').addClass('active')}else{$('.navbar').removeClass('active')}})})
    </script>

</body>

</html>