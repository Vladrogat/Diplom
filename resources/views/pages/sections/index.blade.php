@extends('layouts.home')

@section('title', "Тестирование")

@section('content')
    <div class="title">
        Lorem ipsum dolor sit amet,
        consectetur adipisicing elit.
        Assumenda corporis eius eos laborum porro.
        Blanditiis culpa esse excepturi impedit suscipit!
        lorem20
    </div>
    <div class="row">
        @foreach($sections as $section)
            <x-panels.sectionBlock :section="$section"/>
        @endforeach
            <div class="col-md card-test" >
                <div class="card-body">
                    <h3 class="card-title text-truncate">{{$section["name"]}}</h3>
                    <h6 class="card-subtitle mb-2 text-muted">
                       quas recusandae sunt veniam!</h6>
                    <div class="bottom_block">
                        <span class="card-text time_block float-start">30 - 80 c</span>
                        <form action="{{route("sections.show", $section)}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-start btn-primary float-end">Старт</button>
                        </form>
                    </div>
                </div>
            </div>
    </div>
@endsection
