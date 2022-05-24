@extends('layouts.home')

@section('title', 'Электромегнетизм и электромагнитная индукция')

@section('content')

    <div class="d-flex flex-d-column align-i-center center">
        <h1>Добро пожаловать!</h1>
        <p class="text">
            <span>
                На данном сайте вы можете пройти тестирование,
                а так же изучить материал посвященный
                <a class="theory-link">электромегнетизму</a> и
                <a class="theory-link">электромагнитной индукции</a>.
                @if(empty($user))
                   Для начала изучения создайте профиль или  войдите в учетную запись
                @endif
            </span>
        </p>
        <p class=" m-5px lead">
            <a href="{{route("sections.index")}}"
            class="text btn btn-lg btn-secondary fw-bold border-white text-dark bg-white">
                Начать тестирование
            </a>
        </p>
    </div>

@endsection
