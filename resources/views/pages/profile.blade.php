@extends('layouts.home')

@section('title', $user->login)

@section('content')
    <div class="d-flex flex-d-column align-i-center center">
        <h1>Добро пожаловать! <?=$user->email?></h1>
    </div>
@endsection
