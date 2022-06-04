<form class="col-md col-lg card-test" action="{{route("sections.show", $section)}}" method="get">
    <div class="card-body">
        <h3 class="card-title mb-2 " title="{{$section["name"]}}">{{$section["name"]}}</h3>
        <h6 class="card-subtitle mb-2 text-muted">
            {{$section["description"]}}
        </h6>
    </div>
    <button class="btn-block" type="submit"></button>
</form>
