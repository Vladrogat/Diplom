@extends('layouts.home')

@section('title', 'Тест по ' . $chapter['name'])
<!--
    данные из бд
    $data [ time, questions, result] | $chapter
-->
@section('content')
    <form id="form-result" onsubmit="" action="{{ route('question.resultChapter', $chapter) }}" method="post">
        <input id="time" type="hidden" name="time" value="0">
        <div class="question">
            @csrf
            <div class="timer">
                <span class="time"></span>
                <progress class="timer-progress" value="" max="{{ $data['time'] }}"></progress>
            </div>
            <div id="carouselIndicators" class="carousel slide slider" data-bs-touch="true" data-bs-ride="carousel"
                data-bs-interval="false">
                <div class="carousel-indicators">
                    @foreach ($data['questions'] as $index => $question)
                        <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="{{ $index }}"
                            class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : '' }}"
                            aria-label="Slide {{ $index + 1 }}"></button>
                    @endforeach

                </div>
                <div class="carousel-inner ">
                    @foreach ($data['questions'] as $index => $question)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <div class="question__content">
                                <div class="question__text">
                                    {{ $question['question'] }}

                                    @if (!empty($question['img']))
                                        <div class="img question-img">
                                            <img class="img question-img" src=" {{ asset('phots/' . $question['img']) }}"
                                                alt="">
                                        </div>
                                    @endif
                                </div>
                                <div class="question__var">
                                    @switch($question["idTypeQuestion"])
                                        @case(1)
                                            <x-templates_question.oneOption :data="$data" :question="$question" :index='$index + 1'>
                                            </x-templates_question.oneOption>
                                        @break

                                        @case(2)
                                            <x-templates_question.severalOption :data="$data" :question="$question"
                                                :index='$index + 1'></x-templates_question.severalOption>
                                        @break

                                        @case(3)
                                            <x-templates_question.writeOption :data="$data" :question="$question" :index='$index + 1'>
                                            </x-templates_question.writeOption>
                                        @break

                                        @case(4)
                                            <x-templates_question.matchDefinitions :data="$data" :question="$question"
                                                :index='$index + 1'></x-templates_question.matchDefinitions>
                                        @break

                                        @default
                                    @endswitch
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev " type="button" data-bs-target="#carouselIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Предыдущий</span>
                </button>
                <button class="carousel-control-next " type="button" data-bs-target="#carouselIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Следующий</span>
                </button>
            </div>
        </div>
        <button type="submit" class="btn btn-start btn-primary start-test">Завершить</button>
    </form>
@endsection
