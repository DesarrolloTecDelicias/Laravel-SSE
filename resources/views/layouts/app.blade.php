<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php $school = env('SCHOOL'); @endphp
    <link rel="icon" href="{{asset ("image/school/$school/favicon.ico")}}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <title>{{ config('app.name') }} | {{ $title }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('template')}}/plugins/fontawesome-free/css/all.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{asset('template')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('template')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('template')}}/plugins/toastr/toastr.min.css">

    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('template')}}/plugins/daterangepicker/daterangepicker.css">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset('template')}}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <!-- Swiper JS-->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('template')}}/css/adminlte.min.css">

    <!-- Own Swiper Theme -->
    <link rel="stylesheet" href="{{asset('css')}}/swiper.min.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('template')}}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet"
        href="{{asset('template')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        @include('layouts.partials.preloader')

        <!-- Navbar -->
        @include('layouts.partials.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @switch(Auth::user()->role)

        @case('admin') @livewire('layout.admin.sidebar') @break
        @case('committee') @livewire('layout.admin.sidebar') @break
        @case('graduate') @livewire('layout.graduate.sidebar') @break
        @case('company') @livewire('layout.company.sidebar') @break
        @default
        @include('layouts.partials.sidebar') @break

        @endswitch

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @include('layouts.partials.header')
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <!-- Page Content -->
                <div class="container-fluid">
                    {{ $slot }}
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        @include('layouts.partials.footer')

    </div>
    <!-- ./wrapper -->

    <div id="backdrop" class="modal-backdrop fade show" style="display: none"></div>

    @stack('modals')

    @livewireScripts

    <!-- AdminLTE Template Scripts -->

    <!-- jQuery -->
    <script src="{{asset('template')}}/plugins/jquery/jquery.min.js"></script>

    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('template')}}/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="{{asset('template')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- ChartJS -->
    <script src="{{asset('template')}}/plugins/chart.js/Chart.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="{{asset('template')}}/plugins/sweetalert2/sweetalert2.min.js"></script>

    <!-- Toastr -->
    <script src="{{asset('template')}}/plugins/toastr/toastr.min.js"></script>

    <!-- daterangepicker -->
    <script src="{{asset('template')}}/plugins/moment/moment.min.js"></script>
    <script src="{{asset('template')}}/plugins/daterangepicker/daterangepicker.js"></script>

    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('template')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
    </script>

    <!-- Summernote -->
    <script src="{{asset('template')}}/plugins/summernote/summernote-bs4.min.js"></script>

    <!-- overlayScrollbars -->
    <script src="{{asset('template')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js">
    </script>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Messages -->
    <script src="{{asset('js/message.js')}}"></script>

    <!-- Input Files -->
    <script src="{{asset('template')}}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

    <!-- AdminLTE App -->
    <script src="{{asset('template')}}/js/adminlte.js"></script>

    <!-- Random Color  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/randomcolor/0.6.1/randomColor.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/randomcolor/0.6.1/randomColor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>

    <script src="{{asset('template')}}/plugins/select2/js/select2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            const errors = [];
            const swiper = new Swiper(".mySwiper", {
                effect: "coverflow",
                grabCursor: true,
                centeredSlides: true,
                slidesPerView: "auto",
                coverflowEffect: {
                    rotate: 50,
                    stretch: 0,
                    depth: 100,
                    modifier: 1,
                    slideShadows: false,
                },
                    pagination: {
                    el: ".swiper-pagination",
                },
            });
            
            bsCustomFileInput.init();
                
            // Event for message
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
                    if (errors.includes(error.message)) return;
                    errors.push(error.message);
                }
            })
    
            // Event for message confirmation
            window.addEventListener('confirmation', async (event) => {
                const result = await Swal.fire({
                    title: '¿Estás seguro?',
                    text: `Se eliminará el registro ${event.detail.name}`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí eliminar!',
                    cancelButtonText: 'Cancelar',
                })
                
                if(result.isConfirmed){
                    Livewire.emit(event.detail.event, event.detail.id);
                }
            })

            // Event for modal
            window.addEventListener('openModal', async (event) => {
                if(event.detail.modal){
                    $(document.body).addClass('modal-open');
                    $("#backdrop").css("display", "inline-block");
                }
                else {
                    $(document.body).removeClass('modal-open');
                    $("#backdrop").css("display", "none");
                }
            })

            $('.select2-class').select2({
                placeholder: 'Seleccione una opción',
            });

            //Reports and statistics
            $("#print_button").click(() => {
                window.print();
            });
        })

        const validateNumbers = (e) => {
            if (e.keyCode < 45 || e.keyCode> 57) e.returnValue = false;
        };  
    </script>

    {{-- Own scripts --}}
    @yield('scripts')
</body>

</html>