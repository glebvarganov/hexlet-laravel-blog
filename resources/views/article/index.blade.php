@extends('layouts.app')

@section('content')

    @if (Session::has('flash_message'))
        <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
    @endif

    <h1>Список статей</h1>
    @foreach ($articles as $article)
        <h3><a href="{{ route('article.show', ['id' => $article->id]) }}">{{$article->name}}</a></h3>
        <a href="/articles/{{ $article->id }}" data-confirm="Вы уверены?" data-method="delete" rel="nofollow">Удалить</a>
        {{-- Str::limit – функция-хелпер, которая обрезает текст до указанной длины --}}
        {{-- Используется для очень длинных текстов, которые нужно сократить --}}
        <div>{{Str::limit($article->body, 200)}}</div>
    @endforeach
@endsection
