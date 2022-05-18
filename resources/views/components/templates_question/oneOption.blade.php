@foreach($data["vars"][$question["id"]] as $i => $var)
    <div class="form-check var-group">
        <input class="form-check-input var-item" type="radio" name="answers[{{$question["id"]}}]" id="question{{$index}}_{{$i}}">
        <label class="form-check-label var-item-label" for="question{{$index}}_{{$i}}">
            {{$var}} Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, quis!
        </label>
    </div>
@endforeach
