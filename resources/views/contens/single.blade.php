@extends('main')
@section('section')
{{--    <h1>{{$single->author}}</h1>--}}
    <h1>{{$single->tittle}}</h1>
    <p><a href="/authors/{{$single->user->id}}">{{$single->user->name}}</a> | Category:  <a href="/cat/{{$category->slug}}">{{$category->name}}</a></p>
    <div>{!! $single->body !!}</div>
@endsection
