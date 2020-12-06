@extends('layouts.app')

@section('header', $page->title)

@section('content')
    {{ $page->body }}
    <hr/>
    <a href="{{ route('pages.edit', $page) }}">Изменить страницу</a><br>
    <a href="{{ route('pages.destroy', $page) }}" data-confirm="Вы уверены?" data-method="delete" rel="nofollow">Удалить</a>
@endsection
