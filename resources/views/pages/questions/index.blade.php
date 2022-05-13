@extends('layouts.home')

@section('title', "Тест по " . $section["name"])
<!--
    данные из бд
    $data [ time, questions] | $section | $question
-->
@section('content')
    <div class="question">
        <div class="question__content">
            <div class="question__text">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis facilis reprehenderit sit?
            </div>
            <div class="question__var">

            </div>
        </div>
        <div class="question__nav">
            <nav>
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    @foreach($data["questions"] as $index => $q_item)
                        <li id="{{$q_item["id"]}}" class="page-item {{ $q_item["id"] == $question["id"] ?  'active': ''}}">
                            <a class="page-link" href="{{route("question.show", [$section, $q_item])}}">
                                {{$index + 1}}
                            </a>
                        </li>
                    @endforeach
                    <li class="page-item">
                        <button type="submit" class="page-link" href="">Next</button>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
