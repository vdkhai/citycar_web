<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="favicon.ico">
        <title>Citicar - @yield('title')</title>

        <link rel="stylesheet" href="{{ mix('tinydash/css/app.css') }}">
        <!-- Fonts CSS -->
        <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <!-- App CSS -->
        <link rel="stylesheet" href="{{ mix('tinydash/css/app-light.css') }}" id="lightTheme" disabled>
        <link rel="stylesheet" href="{{ mix('tinydash/css/app-dark.css') }}" id="darkTheme" disabled>

       <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="{{ mix('tinydash/js/app.js') }}"></script>
    </head>
    <body class="vertical light">

        <div class="wrapper">
            <nav class="topnav navbar navbar-light">
                <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
                     <i class="fe fe-menu navbar-toggler-icon"></i>
                </button>
                {{--  <form class="form-inline mr-auto searchform text-muted">
                    <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search" placeholder="Type something..." aria-label="Search">
                </form>  --}}
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
                            <i class="fe fe-sun fe-16"></i>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted my-2 pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{--  <span class="avatar avatar-sm mt-2">
                                <img src="./assets/avatars/face-1.jpg" alt="..." class="avatar-img rounded-circle">
                            </span>  --}}
                            <span>{{ \Auth::user()['name'] }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            {{--  <a class="dropdown-item" href="{{ route('profile.index') }}">
                                My Profile
                            </a>  --}}
                            <a class="dropdown-item" href="{{ route('profile.index') }}">
                                Change Password
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
                <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
                  <i class="fe fe-x"><span class="sr-only"></span></i>
                </a>
                <nav class="vertnav navbar navbar-light">
                  <!-- nav bar -->
                    <div class="w-100 mb-4 d-flex">
                        <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{ route('index') }}">
                        <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
                            <g>
                            <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                            <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                            <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                            </g>
                        </svg>
                        </a>
                    </div>
                    <ul class="navbar-nav flex-fill w-100 mb-2">
                        <li class="nav-item dropdown">
                            <a href="{{ route('admin.index') }}" class="nav-link">
                                <i class="fe fe-home fe-16"></i>
                                <span class="ml-3 item-text">Dashboard</span>
                            </a>
                        </li>
                    </ul>
                    <p class="text-muted nav-heading mt-4 mb-1">
                        <span>Management</span>
                    </p>
                    <ul class="navbar-nav flex-fill w-100 mb-2">
                        <li class="nav-item dropdown">
                            <a href="{{ route('admin.users.index') }}" class="nav-link">
                                <i class="fe fe-users fe-16"></i>
                                <span class="ml-3 item-text">Users</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="{{ route('admin.posts.index') }}" class="nav-link">
                                <i class="fe fe-layers fe-16"></i>
                                <span class="ml-3 item-text">Car Posts</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="{{ route('admin.brands.index') }}" class="nav-link">
                                <i class="fe fe-layers fe-16"></i>
                                <span class="ml-3 item-text">Car Brands</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="{{ route('admin.models.index') }}" class="nav-link">
                                <i class="fe fe-layers fe-16"></i>
                                <span class="ml-3 item-text">Car Models</span>
                            </a>
                        </li>
                        {{--  <li class="nav-item dropdown">
                            <a href="{{ '' }}" class="nav-link">
                                <i class="fe fe-box fe-16"></i>
                                <span class="ml-3 item-text">Car Brands</span>
                            </a>
                        </li>  --}}
                    </ul>
                    {{--  <ul class="navbar-nav flex-fill w-100 mb-2">
                        <li class="nav-item dropdown">
                        <a href="#ui-elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                            <i class="fe fe-box fe-16"></i>
                            <span class="ml-3 item-text">Car Posts</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
                            <li class="nav-item">
                            <a class="nav-link pl-3" href="./ui-color.html"><span class="ml-1 item-text">Colors</span>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link pl-3" href="./ui-typograpy.html"><span class="ml-1 item-text">Typograpy</span></a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link pl-3" href="./ui-icons.html"><span class="ml-1 item-text">Icons</span></a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link pl-3" href="./ui-buttons.html"><span class="ml-1 item-text">Buttons</span></a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link pl-3" href="./ui-notification.html"><span class="ml-1 item-text">Notifications</span></a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link pl-3" href="./ui-modals.html"><span class="ml-1 item-text">Modals</span></a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link pl-3" href="./ui-tabs-accordion.html"><span class="ml-1 item-text">Tabs & Accordion</span></a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link pl-3" href="./ui-progress.html"><span class="ml-1 item-text">Progress</span></a>
                            </li>
                        </ul>
                        </li>
                    </ul>  --}}
                </nav>
            </aside>
            <main role="main" class="main-content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('danger'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('danger') }}
                            </div>
                        @endif
                        <div class="col-12">
                            @yield('content')
                        </div> <!-- .col-12 -->
                    </div> <!-- .row -->
                </div> <!-- .container-fluid -->
            </main> <!-- main -->
        </div> <!-- .wrapper -->

        <script>
            /* defind global options */
            Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
            Chart.defaults.global.defaultFontColor = colors.mutedColor;
        </script>
        <script>
            $('.select2').select2(
            {
                theme: 'bootstrap4',
            });
            $('.select2-multi').select2(
            {
                multiple: true,
                theme: 'bootstrap4',
            });
            $('.drgpicker').daterangepicker(
            {
                singleDatePicker: true,
                timePicker: false,
                showDropdowns: true,
                autoUpdateInput: false,
                locale:
                {
                    cancelLabel: 'Clear',
                    format: 'DD/MM/YYYY'
                }
            });
            $('.drgpicker').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('DD/MM/YYYY'));
            });
            $('.drgpicker').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });
            $('.time-input').timepicker(
            {
                'scrollDefault': 'now',
                // 'scrollDefault': '',
                'zindex': '9999' /* fix modal open */
            });
            /** date range picker */
            if ($('.datetimes').length)
            {
                $('.datetimes').daterangepicker(
                {
                    timePicker: true,
                    startDate: moment().startOf('hour'),
                    endDate: moment().startOf('hour').add(32, 'hour'),
                    locale:
                    {
                        format: 'M/DD hh:mm A'
                    }
                });
            }
            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end)
            {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
            $('#reportrange').daterangepicker(
            {
                startDate: start,
                endDate: end,
                ranges:
                {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);
            cb(start, end);
            $('.input-placeholder').mask("00/00/0000",
            {
                placeholder: "__/__/____"
            });
            $('.input-zip').mask('00000-000',
            {
                placeholder: "____-___"
            });
            $('.input-money').mask("#.##0,00",
            {
                reverse: true
            });
            $('.input-phoneus').mask('(000) 000-0000');
            $('.input-mixed').mask('AAA 000-S0S');
            $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ',
            {
                translation:
                {
                'Z':
                {
                    pattern: /[0-9]/,
                    optional: true
                }
                },
                placeholder: "___.___.___.___"
            });
            // editor
            var editor = document.getElementById('editor');
            if (editor)
            {
                var toolbarOptions = [
                [
                {
                    'font': []
                }],
                [
                {
                    'header': [1, 2, 3, 4, 5, 6, false]
                }],
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote', 'code-block'],
                [
                {
                    'header': 1
                },
                {
                    'header': 2
                }],
                [
                {
                    'list': 'ordered'
                },
                {
                    'list': 'bullet'
                }],
                [
                {
                    'script': 'sub'
                },
                {
                    'script': 'super'
                }],
                [
                {
                    'indent': '-1'
                },
                {
                    'indent': '+1'
                }], // outdent/indent
                [
                {
                    'direction': 'rtl'
                }], // text direction
                [
                {
                    'color': []
                },
                {
                    'background': []
                }], // dropdown with defaults from theme
                [
                {
                    'align': []
                }],
                ['clean'] // remove formatting button
                ];
                var quill = new Quill(editor,
                {
                modules:
                {
                    toolbar: toolbarOptions
                },
                theme: 'snow'
                });
            }
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function()
            {
                'use strict';
                window.addEventListener('load', function()
                {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form)
                {
                    form.addEventListener('submit', function(event)
                    {
                    if (form.checkValidity() === false)
                    {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                    }, false);
                });
                }, false);
            })();
        </script>
        {{-- <script>
            var uptarg = document.getElementById('drag-drop-area');
            if (uptarg)
            {
                var uppy = Uppy.Core().use(Uppy.Dashboard,
                {
                inline: true,
                target: uptarg,
                proudlyDisplayPoweredByUppy: false,
                theme: 'dark',
                width: 770,
                height: 210,
                plugins: ['Webcam']
                }).use(Uppy.Tus,
                {
                endpoint: 'https://master.tus.io/files/'
                });
                uppy.on('complete', (result) =>
                {
                console.log('Upload complete! We’ve uploaded these files:', result.successful)
                });
            }
        </script> --}}

        <!-- Global site tag (gtag.js) - Google Analytics -->
        {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag()
            {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', 'UA-56159088-1');
        </script> --}}
    </body>
</html>
