<div class="col-md card-test" >
    <div class="card-body">
        <h3 class="card-title" title="{{$section["name"]}}">{{$section["name"]}}</h3>
        <h6 class="card-subtitle mb-2 text-muted">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.  itaque omnis provident quas recusandae sunt veniam!</h6>
        <div class="bottom_block">
            <span class="card-text time_block float-start">30 - 80 c</span>
            <form action="{{route("sections.show", $section)}}" method="get">
                <button type="submit" class="btn btn-primary btn-submit btn-text float-end">
                    Открыть
                </button>
            </form>
        </div>
    </div>
</div>

