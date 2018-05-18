<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-material-design.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/adminlte.min.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <div class="py-md-5"></div>
    </div>
    <script src="{{asset('js/jquery-1.8.3.min.js')}}"></script>
    {{--<script src="{{ asset('js/jquery-3.2.1.min.js') }}" ></script>--}}
    <script src="{{asset('js/bootstrap.bundle.min.js')}} "></script>
    {{--<script src="{{ asset('js/popper.min.js') }}" ></script>--}}
    {{--<script src="{{ asset('js/bootstrap.min.js') }}"></script>--}}



    <script src="{{ asset('js/mdb.min.js') }}" ></script>

    <script src="{{ asset('js/bootstrap-material-design.min.js') }}" ></script>
    <script src="{{ asset('js/moment-with-locales.min.js') }}" ></script>
    <script src="{{ asset('js/bootstrap-material-datetimepicker.js') }}" ></script>
    {{--<script src="{{asset('js/bootstrap.bundle.min.js')}} "></script>--}}
    <script src="{{asset('js/adminlte.min.js')}}"></script>
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function()
        {
            $('#date').bootstrapMaterialDatePicker
            ({
                time: false,
                clearButton: true
            });

            $('#lundiB').bootstrapMaterialDatePicker
            ({
                date: false,
                shortTime: false,
                format: 'HH:mm',
            });
            $('#lundiE').bootstrapMaterialDatePicker
            ({
                date: false,
                shortTime: false,
                format: 'HH:mm'
            });
            $('#mardiB').bootstrapMaterialDatePicker
            ({
                date: false,
                shortTime: false,
                format: 'HH:mm',
            });
            $('#mardiE').bootstrapMaterialDatePicker
            ({
                date: false,
                shortTime: false,
                format: 'HH:mm'
            });

            $('#mercrediB').bootstrapMaterialDatePicker
            ({
                date: false,
                shortTime: false,
                format: 'HH:mm',
            });
            $('#mercrediE').bootstrapMaterialDatePicker
            ({
                date: false,
                shortTime: false,
                format: 'HH:mm'
            });
            $('#jeudiB').bootstrapMaterialDatePicker
            ({
                date: false,
                shortTime: false,
                format: 'HH:mm',
            });
            $('#jeudiE').bootstrapMaterialDatePicker
            ({
                date: false,
                shortTime: false,
                format: 'HH:mm'
            });
            $('#vendrediB').bootstrapMaterialDatePicker
            ({
                date: false,
                shortTime: false,
                format: 'HH:mm',
            });
            $('#vendrediE').bootstrapMaterialDatePicker
            ({
                date: false,
                shortTime: false,
                format: 'HH:mm'
            });
            $('#samediB').bootstrapMaterialDatePicker
            ({
                date: false,
                shortTime: false,
                format: 'HH:mm',
            });
            $('#samediE').bootstrapMaterialDatePicker
            ({
                date: false,
                shortTime: false,
                format: 'HH:mm'
            }); $('#dimancheB').bootstrapMaterialDatePicker
            ({
                date: false,
                shortTime: false,
                format: 'HH:mm',
            });
            $('#dimancheE').bootstrapMaterialDatePicker
            ({
                date: false,
                shortTime: false,
                format: 'HH:mm'
            });

            $('#date-format').bootstrapMaterialDatePicker
            ({
                format: 'YYYY-MM-DD  HH:mm'
            });
            $('#date-format1').bootstrapMaterialDatePicker
            ({
                format: 'YYYY-MM-DD  HH:mm'
            });
            $('#date-fr').bootstrapMaterialDatePicker
            ({
                format: 'DD/MM/YYYY HH:mm',
                lang: 'fr',
                weekStart: 1,
                cancelText : 'ANNULER',
                nowButton : true,
                switchOnClick : true
            });

            $('#date-end').bootstrapMaterialDatePicker
            ({
                weekStart: 0, format: 'DD/MM/YYYY HH:mm'
            });
            $('#date-start').bootstrapMaterialDatePicker
            ({
                weekStart: 0, format: 'DD/MM/YYYY HH:mm', shortTime : true
            }).on('change', function(e, date)
            {
                $('#date-end').bootstrapMaterialDatePicker('setMinDate', date);
            });

            $('#min-date').bootstrapMaterialDatePicker({ format : 'DD/MM/YYYY HH:mm', minDate : new Date() });

            $.material.init()
        });
    </script>
    <script>
        $(".js-example-tags").select2({
            tags: true
        });
        $(".js-example-tags1").select2({
            tags: true
        });
        $(".js-example-tags2").select2({
            tags: true
        });
        $(".js-example-tags3").select2({
            tags: true
        });
        $(".js-example").select2({

        });
    </script>
    @yield('script' or ' ')
</body>
</html>
