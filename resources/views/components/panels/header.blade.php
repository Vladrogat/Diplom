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
            <a class="nav-link {{request()->routeIs('home') ?  'active': ''}}" aria-current="page" href="{{route('home')}}">Главная</a>
            <a class="nav-link {{request()->routeIs('theory') ?  'active': ''}}" href="{{route('theory')}}">Теория</a>
            <a class="nav-link {{request()->routeIs('add') ?  'active': ''}}" href="#">Тестирование</a>
        </nav>

    </div>
</header>
