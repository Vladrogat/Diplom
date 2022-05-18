@extends('layouts.home')

@section('title', "Тест по " . $section["name"])
<!--
    данные из бд
    $data [ time, questions, ids, result] | $section
-->
@section('content')
    <form id="form-result" onsubmit="" action="{{route("question.result", $section)}}" method="post">
        <div class="question">
            @csrf
            <div id="carouselIndicators" class="carousel slide slider" data-bs-touch="true" data-bs-ride="carousel" data-bs-interval="false">
                <div class="carousel-indicators">
                    @foreach($data["questions"] as $index => $question)
                        <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="{{$index }}"
                                class="{{$index == 0 ?"active": ""}}" aria-current="{{$index == 0 ?"true":""}}" aria-label="Slide {{$index + 1}}"></button>
                    @endforeach

                </div>
                <div class="carousel-inner ">
                    @foreach($data["questions"] as $index => $question)
                        <div class="carousel-item {{$index == 0? "active":""}}">
                            <div class="question__content">
                                <div class="question__text">
                                    {{$question["question"]}}
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae neque nulla vitae. Accusantium ad odio quasi suscipit vel. Dolore illum minus quaerat repellendus?
                                </div>
                                <div class="question__var">
                                    @switch($question["idTypeQuestion"])
                                        @case(1)
                                            <x-templates_question.oneOption :data="$data" :question="$question" :index='$index+1'></x-templates_question.oneOption>
                                            @break
                                        @case(2)
                                            <x-templates_question.severalOption :data="$data" :question="$question" :index='$index+1'></x-templates_question.severalOption>
                                            @break
                                        @case(3)
                                            <x-templates_question.writeOption :data="$data" :question="$question" :index='$index+1'></x-templates_question.writeOption>
                                        @default
                                    @endswitch
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev " type="button" data-bs-target="#carouselIndicators"  data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Предыдущий</span>
                </button>
                <button class="carousel-control-next " type="button" data-bs-target="#carouselIndicators"  data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Следующий</span>
                </button>
            </div>
        </div>
        <button type="submit" class="btn btn-start btn-primary start-test">Завершить</button>
    </form>
@endsection

