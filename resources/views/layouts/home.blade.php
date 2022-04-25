<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <x-panels.styles/>
    <title>@yield('title')</title>
</head>
<body class="d-flex h-100 text-center text-white">
    <div class="container-fluid back">
        <div class="w-100 h-100 wraper">
            <div class="container d-flex w-100 h-100 p-3 mx-auto flex-column">
                <x-panels.header :user="$user"/>
                <main class="px-3">
                    @yield('content')
                </main>
                <x-panels.footer/>
            </div>
        </div>

    </div>

    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
</body>
</html>
