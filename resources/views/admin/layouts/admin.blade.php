<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My shop
        @yield('title')
    </title>
    <meta name="description" content="Free open source Tailwind CSS Store template">
    <meta name="keywords" content="tailwind,tailwindcss,tailwind css,css,starter template,free template,store template, shop layout, minimal, monochrome, minimalistic, theme, nordic">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <script src="/js/bootstrap.bundle.min.js"></script>

    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link href="/css/admin.css" rel="stylesheet">
    <link href="/dist/mds.bs.datetimepicker.style.css" rel="stylesheet"/>

    @livewireStyles
</head>

<body style="font-family: 'Trebuchet MS', sans-serif;">

    <livewire:home.header.header>

    <div class="row mx-2">
        <!-- Aside template-->
        <div class="col-md-2 px-sm-2 p-2 ">
            @include('admin.sections.aside')
        </div>

        <!-- Main template -->
        <div class="col-md-10 p-2" style="background: #F8F8F8">

                @yield('content')
        </div>

    </div>

    {{-- BootStrap Tooltip --}}
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
    {{--END BootStrap Tooltip --}}
    @include('sweetalert::alert')

    @livewireScripts

</body>

</html>





