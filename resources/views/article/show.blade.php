@extends('layouts.app')

@section('content')
    <h1>{{$article->name}}</h1>
    <a href="{{ route('articles.edit', ['id' => $article->id]) }}">Изменить статью</a><br>
    {{$article->body}}
@endsection
