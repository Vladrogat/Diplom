<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-panels.styles/>
    <title>@yield('title')</title>
</head>
<body class="back d-flex h-100 text-center text-white bg-dark ">
    <div class="w-100 h-100 wraper">
        <div class="container d-flex w-100 h-100 p-3 mx-auto flex-column">
            <x-panels.header/>
            @yield('content')
            <x-panels.footer/>
        </div>
    </div>
</body>
</html>