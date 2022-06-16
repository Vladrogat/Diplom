<label for="question{{ $index }}" class="form-label var-item-label">{{ $question['desc'] }}</label>
<table class="table-test variant" style="font-size: 13pt">
    <tr>
        @foreach ($data['vars'][$question['id']]['head'] as $header)
            <th colspan="{{ $header['colspan'] }}">{{ $header['text'] }}</th>
        @endforeach
    </tr>
    @foreach ($data['vars'][$question['id']]['rows'] as $row)
        <tr>
            @foreach ($row as $key => $col)
                <td>
                    @if (str_contains($key, 'file'))
                        <img class="img label-img" src="{{ asset('phots/' . $col) }}" alt="не удалось">
                    @else
                        {{ $col }}
                    @endif
                </td>
            @endforeach
        </tr>
    @endforeach
</table>
<table class="table-test answer" style="font-size: 13pt">
    <tr>
        @foreach ($data['vars'][$question['id']]['answers']['head'] as $header)
            <th colspan="{{ $header['colspan'] }}">{{ $header['text'] }}</th>
        @endforeach
    </tr>
    @foreach ($data['vars'][$question['id']]['answers']['answers'] as $key => $answers)
        <tr>
            @for ($i = 0; $i < count($data['vars'][$question['id']]['answers']['head']); $i++)
                <td class="select">
                    <select class="form-select" aria-label="Default select example" id=""
                        name="answers[{{ $question['id'] }}][{{ $key }}][]">
                        @foreach ($answers as $answer)
                            <option>{{ $answer }}</option>
                        @endforeach
                    </select>
                </td>
            @endfor

        </tr>
    @endforeach

</table>
