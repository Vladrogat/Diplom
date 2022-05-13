<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <x-panels.styles/>
    <title>@yield('title')</title>
</head>
<body class="d-flex h-100 text-center text-white back">
    <div class="container-fluid wraper">
        <div class="container d-flex w-100 h-100 p-3 mx-auto flex-column">
            <x-panels.header :user="$user" :errors="$errors" :typeError="$typeError"/>
            <main>
                @yield('content')
            </main>
            <x-panels.footer/>
        </div>
    </div>

    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
</body>
</html>
