<div class="accordion-block">
    <h2 class="menu-font">Список разделов</h2>
    <div class="accordion" id="accordionFlush">
        @foreach ($chapters as $id => $data)
            <div class="accordion-item">
                <h2 class="accordion-header " id="flush-heading-{{$id}}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-{{$id}}" aria-expanded="false" aria-controls="flush-collapse-{{$id}}">
                        <span>{{$data["name"]}}</span>
                    </button>
                </h2>
                @foreach($data["sections"] as $section)
                    <div id="flush-collapse-{{$id}}" class="accordion-collapse text-left collapse" aria-labelledby="flush-heading-{{$id}}" data-bs-parent="#accordionFlush">
                        <div id="{{$section["document"]}}" class="accordion-body text-black d-block text-truncate"
                             data-bs-toggle="tooltip" data-bs-placement="top" title="{{$section["name"]}}"
                             style="max-width: 320px;" onclick="clickAcordeon(this)">
                            <span>{{$section["name"]}}</span>
                        </div>
                    </div>
                @endforeach
                <div id="flush-collapse-{{$id}}" class="accordion-collapse text-left collapse" aria-labelledby="flush-heading-{{$id}}" data-bs-parent="#accordionFlush">
                    <div id="{{$data["sentences"]["document"]}}" class="accordion-body text-black d-block text-truncate"
                         data-bs-toggle="tooltip" data-bs-placement="top" title="{{$data["sentences"]["name"]}}"
                         style="max-width: 320px;" onclick="clickAcordeon(this)">
                        <span>{{$data["sentences"]["name"]}}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
