<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <script src="/js/bootstrap.bundle.min.js"></script>
    @yield('style')

    <link href="/css/home.css" rel="stylesheet">
    @livewireStyles
</head>

<body style="font-family: 'Trebuchet MS', sans-serif;">

    <livewire:home.header.header>

    @yield('content')

    <livewire:home.sections.footer>

    @include('sweetalert::alert')

    {{-- BootStrap Tooltip --}}
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
    {{--END BootStrap Tooltip --}}
    @yield('script')
    @livewireScripts
</body>

</html>





