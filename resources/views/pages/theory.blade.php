@extends('layouts.home')

@section('title', 'Теория')

@section('content')
    <div class="theory">
        <x-panels.menu-theory :chapters="$chapters"/>
        <div class="doc">

        </div>
    </div>
@endsection
