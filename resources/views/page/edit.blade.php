@extends('layouts.app')

@section('header', 'Изменить страницу')

@section('content')
    {{ Form::model($page, ['url' => route('pages.update', $page), 'method' => 'PATCH']) }}
        @include('page.form')
        {{ Form::submit('Обновить') }}
    {{ Form::close() }}
@endsection
