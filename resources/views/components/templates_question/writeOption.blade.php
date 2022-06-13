<div class="form-check mb-3">
    <label for="question{{ $index }}" class="form-label var-item-label">{{ $question['desc'] }}</label>
    <input id="question{{ $index }}" type="text" name="answers[{{ $question['id'] }}]"
        class="form-control input-text ">
</div>
