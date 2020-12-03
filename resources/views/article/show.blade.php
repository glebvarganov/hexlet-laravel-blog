@extends('layouts.app')

@section('content')
    <h1>{{$article->name}}</h1>
    {{$article->body}}
@endsection
