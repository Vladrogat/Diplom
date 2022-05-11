@extends('layouts.home')

@section('title', "Тестирование")

@section('content')
    <div class="row">
        @foreach($sections as $section)
            <x-panels.sectionBlock :section="$section"/>
        @endforeach
    </div>
@endsection
