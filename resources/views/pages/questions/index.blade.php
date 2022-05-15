@extends('layouts.home')

@section('title', "Тест по " . $section["name"])
<!--
    данные из бд
    $data [ time, questions, ids, result] | $section | $question
-->
@section('content')
    <div class="question">
        <form>
            <input type="hidden" name="id" value="{{$question["id"]}}" >
            @csrf
            <div class="question__content">
                <div class="question__text">
                    {{$question["question"]}}
                </div>
                <div class="question__img">
                    <img src="" alt="">
                </div>
                <div class="question__var">
                    <!--<input type="text" name="answer" value="{{array_key_exists($question["id"], $data["result"])? $data["result"][$question["id"]]["answer"]:""}}">

                    <input type="radio" name="answer" value="1" id="">
                    <input type="radio" name="answer" value="4" id="">
                    <input type="radio" name="answer" value="6" id="">
                    -->
                    <input type="checkbox" name="answer[]" value="1" {{array_key_exists($question["id"], $data["result"]) ? "checked": ""}}>
                    <input type="checkbox" name="answer[]" value="2" {{array_key_exists($question["id"], $data["result"]) ? "checked": ""}}>
                    <input type="checkbox" name="answer[]" value="3" {{array_key_exists($question["id"], $data["result"]) ? "checked": ""}}>
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
            <div class="question__nav">
                <nav>
                    <ul class="pagination justify-content-center">
                        <li class="page-item {{array_search($question, $data["questions"]) == 0 ? "disabled": ""}}">
                            <button formaction="{{array_search($question, $data["questions"]) != 0 ? route("question.result", [$section, $data["questions"][array_search($question, $data["questions"])-1]]): "#"}}"
                                formmethod="post" type="submit" class="page-link"
                                tabindex="-1" >Предыдущий</button>
                        </li>
                        @foreach($data["questions"] as $index => $q_item)
                            <li id="{{$q_item["id"]}}" class="page-item {{ $q_item["id"] == $question["id"] ?  'active': ''}}">
                                <button type="submit" formaction="{{route("question.result", [$section, $q_item])}}" formmethod="post"
                                        class="page-link {{in_array($q_item["id"], $data["ids"]) ? "showed": ""}}">
                                    {{$index + 1}}
                                </button>
                            </li>
                        @endforeach
                        @dd(array_key_exists($question["id"], $data["result"]), $data["result"])
                        @if (array_search($question, $data["questions"]) + 1 == count($data["questions"]))
                            <li class="page-item">
                                <button formaction="" formmethod="post" type="submit" class="page-link" href="">Закончить</button>
                            </li>
                        @else
                            <li class="page-item">
                                <button formmethod="post" formaction="{{route("question.result", [$section, $data["questions"][array_search($question, $data["questions"])+1]])}}"  type="submit" class="page-link">Следующий</button>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </form>
    </div>
@endsection
