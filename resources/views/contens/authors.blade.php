@extends('main')
@section('section')

    <h1>{{$authors}}</h1>
    <div class="container">
        <div class="row">
    @foreach($posts as $pos)
        <div class="col-md-3 m-2">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Author : {{$pos->user->name}} </h5>
                    <p>Category : <a href="/cat/{{$pos->category->slug}}">{{$pos->category->name}}</a></p>
                    <p class="card-text">{{$pos->excerpt}}</p>
                    <a href="/p/{{$pos->id}}" class="card-link">Card link</a>
                </div>
            </div>
        </div>
    @endforeach
        </div>
    </div>
@endsection
