@extends('layouts.app')

@section('content')

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{ Form::model($article, ['url' => route('articles.store')]) }}
        {{ Form::label('name', 'Название') }}<br>
        {{ Form::text('name') }}<br><br>
        {{ Form::label('body', 'Содержание') }}<br>
        {{ Form::textarea('body') }}<br><br>
        {{ Form::submit('Создать') }}
    {{ Form::close() }}
@endsection
