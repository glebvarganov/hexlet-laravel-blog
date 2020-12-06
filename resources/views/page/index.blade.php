@extends('layouts.app')

@section('header', 'Список статей')

@section('content')

    @if (Session::has('flash_message'))
        <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
    @endif

    @foreach ($pages as $page)
        <h3><a href="{{ route('pages.show', $page) }}">{{ $page->title }}</a> <small>{{ $page->status }}</small></h3>
        <p>{{ $page->body }}</p>
    @endforeach
@endsection
