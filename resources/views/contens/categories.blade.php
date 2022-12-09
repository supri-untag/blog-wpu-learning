@extends('main')
@section('section')

    <h1>Category: {{$cat}}</h1>
    <div class="container">
        <div class="row">
    @foreach($post as $pos)
        <div class="col-md-3 m-2">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Author : <a href="/authors/{{$pos->user->id}}">{{$pos->user->name}}</a> </h5>
                    <p class="card-text">{{$pos->excerpt}}</p>
                    <a href="/p/{{$pos->id}}" class="card-link">Card link</a>
                </div>
            </div>
        </div>
    @endforeach
        </div>
    </div>
@endsection
