@extends('layouts.home')

@section('title', 'Теория')

@section('content')
    <div class="theory">
        <x-panels.menu-theory :chapters="$chapters"/>
        <div class="doc">
            <iframe class="doc-word" src="https://drive.google.com/file/d/1XGVAdbdLo5lX_Op11h2rUciR74tuP43H/preview" allow="autoplay"></iframe>
        </div>
    </div>
@endsection
