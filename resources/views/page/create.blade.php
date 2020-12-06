@extends('layouts.app')

@section('header', 'Создать страницу')

@section('content')
    {{ Form::model($page, ['url' => route('pages.store')]) }}
        @include('page.form')
        {{ Form::submit('Сохранить') }}
    {{ Form::close() }}
@endsection
