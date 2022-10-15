<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php $school = env('SCHOOL'); @endphp
    <link rel="icon" href="{{asset ("image/school/$school/favicon.ico")}}">

    <title>{{ config('app.name', 'S.S.E') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('template')}}/plugins/toastr/toastr.min.css">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset('template')}}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('template')}}/css/adminlte.min.css">

    <!-- Own Swiper Theme -->
    <link rel="stylesheet" href="{{asset('css')}}/swiper.min.css">
</head>

<body>
    <div class="font-sans text-gray-900 antialiased">
        @yield('body')
    </div>

    @livewireScripts

    <!-- AdminLTE Template Scripts -->

    <!-- jQuery -->
    <script src="{{asset('template')}}/plugins/jquery/jquery.min.js"></script>

    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('template')}}/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="{{asset('template')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="{{asset('template')}}/plugins/sweetalert2/sweetalert2.min.js"></script>

    <!-- Toastr -->
    <script src="{{asset('template')}}/plugins/toastr/toastr.min.js"></script>

    <!-- AdminLTE App -->
    <script src="{{asset('template')}}/js/adminlte.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
                window.addEventListener('message',async event => {
                    try {
                        const type = event.detail.type;
                        const message = event.detail.message;
                        
                        switch(type) {
                            case 'success':
                                toastr.success(message);
                                break;
                            case 'error':
                                toastr.error(message);
                                break;
                            case 'info':
                                toastr.info(message);
                                break;
                            case 'warning':
                                toastr.warning(message);
                                break;                                                                  
                        }
                    } catch (error) {
                         return;
                    }
                })
    
            })
    </script>
</body>

</html>