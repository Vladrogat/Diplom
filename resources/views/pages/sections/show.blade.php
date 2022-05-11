@extends('layouts.home')

@section('title', $section["name"])

@section('content')

    <h1>{{$section["name"]}}</h1>
    <div class="description">

    </div>
    <form action="" method="get">
        @csrf
        <button type="submit" class="btn btn-start btn-primary start-test">
            Начать
        </button>
    </form>
@endsection
