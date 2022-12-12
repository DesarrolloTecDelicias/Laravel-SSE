<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php $school = env('SCHOOL'); @endphp
    <link rel="icon" href="{{asset ('image/school/'.$school.'/favicon.ico')}}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <title>Reporte General Opciones</title>

    <!-- AdminLTE Template Styles -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('template')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('template')}}/css/adminlte.min.css">

    <style>
        @media print {
            #buttonPrint {
                visibility: hidden;
                display: none;
                height: 0;
                widows: 0;
            }

            .bg-tec.text-white,
            .bg-tec.text-white.text-center th {
                background-color: #1f3d6d !important;
                color: white !important;
                -webkit-print-color-adjust: exact;
            }

            .table-print {
                page-break-after: always;
            }

            .bg-tr td{
                background-color: #d8dbdf !important;
                -webkit-print-color-adjust: exact;
            }

            @media print {
                .table-print {
                    page-break-after: always;
                }
            }
        }
    </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center" id="buttonPrint">
                    <div class="col-6 d-flex justify-content-center">
                        <button type="button" class="btn btn-success btn-lg buttonPrint my-2"
                            onclick="window.print()">IMPRIMIR
                            REPORTE</button>
                    </div>
                </div>
                <div class="row d-flex justify-content-between my-3 px-3">
                    <div class="d-flex justify-content-center flex-column w-75">
                        <h2 class="my-auto">{{ ucwords(env('SCHOOL_NAME')) }}</h2>
                        <h5 class="mt-2">Fecha de cohorte: <span class="text-bold">{{ $state['dataFilterStart']
                                }}</span> a:
                            <span class="text-bold">{{ $state['dataFilterEnd'] }}</span>
                        </h5>
                        <h6>Carrera(s): @foreach ($state['careers'] as $key => $career)
                            <span class="text-bold">{{ $career }}@if(!($key ==
                                array_key_last($state['careers']))){!!","!!}@endif</span>
                            @endforeach
                        </h6>
                    </div>
                    <div class="d-flex justify-content-end w-25">
                        @php $school = env('SCHOOL'); @endphp
                        <img src="{{asset ('image/school/TecNM.png')}}" class="mx-1" width="190" height="70" alt="">
                        <img src="{{asset('image/school/'.$school.'/logo.png')}}" class="mx-3" width="60" height="70"
                            alt="">
                    </div>
                </div>

                @foreach ($state['surveys'] as $survey)
                @php
                $instance = $state['hashInstance'][$survey];
                @endphp
                <table class="table table-print table-bordered w-100">
                    <thead>
                        <tr class="bg-tec text-white text-center">
                            <th colspan="3" scope="col">
                                {{ $instance->title }}
                                <br />
                                Un total de: {{ $instance->total }} egresado(s) respondió esta
                                encuesta
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($instance->options as $key => $option)
                        <tr class="bg-tr" style="background-color: #d8dbdf !important; -webkit-print-color-adjust: exact;">
                            <td colspan="3"><b>{{ $key }}</b></td>
                        </tr>

                        @foreach ($option as $key => $value)
                        <tr>
                            <td>{{ $key }}</td>
                            <td>{{ $value['quantity'] }}</td>
                            <td>{{ $value['percentage'] }}%</td>
                        </tr>
                        @endforeach

                        @endforeach
                    </tbody>
                </table>
                @endforeach


            </div>
        </div>

    </div>
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

    <!-- AdminLTE App -->
    <script src="{{asset('template')}}/js/adminlte.js"></script>

    <!-- Random Color  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/randomcolor/0.6.1/randomColor.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/randomcolor/0.6.1/randomColor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>

</body>

</html>