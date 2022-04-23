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
                <a class="theory-link">электромагнитной индукции</a>
            </span></p>
        <p class="text m-5px lead">
            <a href="#"
            class="btn btn-lg btn-secondary fw-bold border-white text-dark bg-white">
                Начать тестирование
            </a>
        </p>
    </div>

@endsection
