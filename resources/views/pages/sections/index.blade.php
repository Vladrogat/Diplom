@extends('layouts.home')

@section('title', "Тестирование")

@section('content')
    <div class="row">
        @foreach($sections as $section)
            <x-panels.sectionBlock :section="$section"/>
        @endforeach
    </div>
    <div class="d-flex">
        <form class="col-md card-test" action="{{route("chapters.show", $chapters[0])}}" method="get">
            <div class="card-body card-final">
                <h3 class="card-title mb-2 " title="Итоговый по Электромагнетизму">Итоговый по Электромагнетизму</h3>
                <h6 class="card-subtitle mb-2 text-muted">
                   Итоговый тест включающий все темы раздела "Электромагнетизм"
                </h6>
            </div>
            <button class="btn-block" type="submit"></button>
        </form>
        <form class="col-md card-test card-final" action="{{route("chapters.show", $chapters[1])}}" method="get">
            <div class="card-body">
                <h3 class="card-title mb-2 " title="Итоговый по Электромагнитной индукции">Итоговый по Электромагнитной индукции</h3>
                <h6 class="card-subtitle mb-2 text-muted">
                    Итоговый тест включающий все темы раздела "Электромагнитная индукция"
                </h6>
            </div>
            <button class="btn-block" type="submit"></button>
        </form>
    </div>
@endsection
