<header class="mb-auto">
    <div class="header">
        <h3 class="float-md-start mb-0">
            <div class="header_logo">
                <a href="{{route('home')}}">
                    <img width="50" height="50" src="{{asset('logo.png')}}">
                    <span class="title_logo">Электронное пособие</span>
                </a>
            </div>
        </h3>

        <nav class="nav nav-masthead justify-content-center float-md-end">
            @if(true)
                <a data-bs-toggle="offcanvas" href="#offcanvasLogin" role="button" aria-controls="offcanvasLogin"
                   class="nav-link {{request()->routeIs('#') ?  'active': ''}}" href="#">Войти</a>

                <a data-bs-toggle="offcanvas" href="#offcanvasRegistr" role="button" aria-controls="offcanvasRegistr"
                   class="nav-link {{request()->routeIs('#') ?  'active': ''}}" href="#">Регистрация</a>
            @else

            @endif
            <x-panels.offcanvas name="Login"/>
            <x-panels.offcanvas name="Registr"/>

            <div class="nav nav-masthead menu">
                <a class="nav-link {{request()->routeIs('home') ?  'active': ''}}" aria-current="page" href="{{route('home')}}">Главная</a>
                <a class="nav-link {{request()->routeIs('theory') ?  'active': ''}}" href="{{route('theory')}}">Теория</a>
                <a class="nav-link {{request()->routeIs('') ?  'active': ''}}" href="#">Тестирование</a>
            </div>

            <div class="burger-btn float-md-end">
                <a class="dropdown-toggle" href="#" id="dropdown" data-bs-toggle="dropdown">
                    <button onclick="clickMenu()" class="cl burger navbar-toggler" type="button">
                        <span class="cl lines up"></span>
                        <span class="cl lines mid"></span>
                        <span class="cl lines down"></span>
                    </button>
                </a>
                <ul id="menu" class="menu-burger dropdown-menu" aria-labelledby="dropdown" data-bs-popper="none">
                    <a class="nav-link {{request()->routeIs('home') ?  'active': ''}}" aria-current="page" href="{{route('home')}}">Главная</a>
                    <a class="nav-link {{request()->routeIs('theory') ?  'active': ''}}" href="{{route('theory')}}">Теория</a>
                    <a class="nav-link {{request()->routeIs('add') ?  'active': ''}}" href="#">Тестирование</a>
                </ul>
            </div>
        </nav>
    </div>
</header>
</header>
