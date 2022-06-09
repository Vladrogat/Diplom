@foreach($data["vars"][$question["id"]] as $key => $var)
    <div class="form-check var-group">
        <input value="{{$var}}" class="form-check-input var-item" type="radio" name="answers[{{$question["id"]}}]" id="question{{$index}}_{{$key}}">
        <label class="form-check-label var-item-label" for="question{{$index}}_{{$key}}">
            @if($key == "file")
                <img class="img label-img" src="{{asset("phots/" . $var)}}" alt="не удалось">
            @else
                {{$var}}
            @endif
        </label>
    </div>
@endforeach
