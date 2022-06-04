@extends('layouts.home')

@section('title', $chapter["name"])

@section('content')

    <h1>{{$chapter["name"]}}</h1>
    <div class="description">
        <p class="text">
            <span>
                На прохождения тестов выделяется
                ограниченное количество времени
                вопросы с одним варинтом ответа выделяеться 30 секунд,
                вопросы с несколькими вариантами ответа выделяется 40 секунд,
                вопросы на сопоставления определений выделяется 50 секунд,
                вопросы с вводом ответа выделяется 1 минута<br>
                Оценивание происходит по числу правильных ответов<br>
                3 - 50% - 60%<br>
                4 - 70% - 80%<br>
                5 - 90% - 100%<br>
            </span>
        </p>

    </div>
    <form action="{{route("question.index", $chapter)}}" method="get">
        <button type="submit" class="btn btn-start btn-primary start-test">
            Начать
        </button>
    </form>
@endsection
