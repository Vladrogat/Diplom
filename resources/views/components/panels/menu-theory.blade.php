<div>
    <h2 class="menu-font">Список разделов</h2>
    <div class="accordion" id="accordionFlush">
        @foreach ($chapters["chapters"] as $id => $data)
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-heading-<?=$id?>">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-<?=$id?>" aria-expanded="false" aria-controls="flush-collapse-<?=$id?>">
                        <?=$data["name"]?>
                    </button>
                </h2>
                @foreach($data["sections"] as $section)
                    <div id="flush-collapse-<?=$id?>" class="accordion-collapse text-left collapse" aria-labelledby="flush-heading-<?=$id?>" data-bs-parent="#accordionFlush">
                        <div class="accordion-body text-black d-block text-truncate"
                             data-bs-toggle="tooltip" data-bs-placement="top" title="<?=$section["name"]?>"
                             style="max-width: 320px;">
                            <?=$section["name"]?>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>
