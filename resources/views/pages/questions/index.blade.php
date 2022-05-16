@extends('layouts.home')

@section('title', "Тест по " . $section["name"])
<!--
    данные из бд
    $data [ time, questions, ids, result] | $section
-->
@section('content')

    <form>
        <div class="question">
            @csrf
            <div id="carouselIndicators" class="carousel slide slider" data-bs-ride="carousel" data-bs-interval="false">
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
                                    @if(count($data["vars"][$question["id"]]) > 1)
                                        @foreach($data["vars"][$question["id"]] as $i => $var)
                                            <input id="question{{$index+1}}_{{$i}}" type="checkbox" name="answers[{{$question["id"]}}][]" value="{{$var}}"
                                                {{array_key_exists($question["id"], $data["result"]) ? "checked": ""}}>
                                            <label for="question{{$index+1}}_{{$i}}">{{$var}}</label>
                                        @endforeach
                                    @else
                                        <input type="text" name="answers[{{$question["id"]}}]" value="{{array_key_exists($question["id"], $data["result"])? $data["result"][$question["id"]]["answer"]:""}}">
                                    @endif
                                    @switch($question["idTypeQuestion"])
                                        @case(1)
                                        <x-templates_question.oneOption/>
                                        @case(2)
                                        <x-templates_question.severalOption/>
                                        @case(3)
                                        <x-templates_question.writeOption/>
                                        @case(4)
                                        <x-templates_question.matchDefinitions/>
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
        <button formmethod="post" formaction="{{route("question.result", $section)}}"  type="submit" class="btn btn-start btn-primary start-test">Завершить</button>
    </form>
@endsection
