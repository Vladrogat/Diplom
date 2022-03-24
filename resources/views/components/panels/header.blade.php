<header class="mb-auto">
    <div>
        <h3 class="float-md-start mb-0">
            <div>
                <img width="50" height="50" src="{{asset('logo.png')}}"><span class="h">Электронное пособие</span>
            </div>
        </h3>
        <nav class="nav nav-masthead justify-content-center float-md-end">
            <a class="nav-link {{request()->routeIs('home') ?  'active': ''}}" aria-current="page" href="{{route('home')}}">Главная</a>
            <a class="nav-link" href="#">Теория</a>
            <a class="nav-link" href="#">Тестирование</a>
            <a class="nav-link {{request()->routeIs('contact') ?  'active': ''}}" href="{{route('contact')}}">Контакты</a>
        </nav>
    </div>
</header>