@extends('layouts.home')

@section('title', 'Профиль ' . $user->login)

@section('content')
    <div class="d-flex flex-d-column align-i-center center">
        <h1>Добро пожаловать {{ $user->name }}!</h1>
        @if (count($results) == 0)
            <h2 class="head">У вас нет пройденых тестов</h2>
        @else
            <h2 class="head">Ваши результаты:</h2>
            @foreach ($results as $result)
                <div class="col-md card-test card-result">
                    <div class="card-body block-result">
                        <h3>
                            @if ($result['isFinal'])
                                Итоговый по {{ $result['chapter'] }}
                            @else
                                {{ $result['section'] }}
                            @endif
                        </h3>
                        <table>
                            <tr>
                                <th>Время</th>
                                <th>Оценка</th>
                                <th>Число баллов</th>
                            </tr>
                            <tr>
                                <td class="time-td">{{ $result['time'] }}</td>
                                <td>{{ $result['grade'] }}</td>
                                <td>{{ $result['points'] }}</td>
                            </tr>
                        </table>
                        @if ($result['grade'] < 3 && !$result['isFinal'])
                            Рекомендуется просмотреть упражнения по данной теме и повторить попытку
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
