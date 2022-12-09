@extends('main')
@section('section')
    <h1 class="text-center">Blog</h1>
    <div class="container">
        <form action="/posts">
        <div class="form-floating mb-3 d-flex mt-6 mb-6">
            <input type="text" class="form-control" name="search" value="{{request('search') ?? null }}" placeholder="type anything here..">
            <button class="btn btn-primary"  type="submit">Cari</button>
        </div>
        </form>
        @if($post->count() == 0)
            <div class="card mb-3 text-center p-10 text-danger">
                <h1> POST NOT FOUND !!</h1>
            </div>
        @else
        <div class="card mb-3">
            @if($post[0]->image)
                <div class="container" >
                <img style="max-height:400px; max-width: 1200px;" src="{{asset('storage/'.$post[0]->image)}}" class="card-img-top img-fluid" alt="{{$post[0]->image}}">
                </div>
            @else
                <img src="https://source.unsplash.com/1200x400?random" class="card-img-top img-fluid" alt="...">
            @endif

            <div class="card-body">
                <h4 class="card-title">{{$post[0]->tittle}}</h4>
                <p class="card-text">{{$post[0]->excerpt}}</p>
                <a href="/p/{{$post[0]->id}}"><button class="btn btn-primary"> Readmore.. </button></a>
                <p class="card-text"><small class="text-muted">Publish : {{$post[0]->created_at->diffForHumans()}}</small></p>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
    @foreach($post->skip(1) as $pos)
        <div class="col-md-4 ">
            <div class="card" style="min-width: 18rem;min-height: 30em;">
                <div class="card-body">
                    @if($pos->image)
                        <div class="container" style="max-height:400px; max-width: 800px;">
                        <img src="{{asset('storage/'). $pos->image}}" class="card-img-top" alt="...">
                        </div>
                    @else
                        <img src="https://source.unsplash.com/800x400?{{$pos->tittle}}" class="card-img-top" alt="...">
                    @endif
                    <h5 class="card-title">{{$pos->tittle}} </h5>
                    <p class="card-title">Author : <a href="/authors/{{$pos->user->id}}"> {{$pos->user->name}} </a></p>
                    <p>Category : <a href="/cat/{{$pos->category->slug}}">{{ $pos->category->name}}</a></p>
                    <p class="card-text">{{$pos->excerpt}}</p>
                    <a href="/p/{{$pos->id}}" class="card-link">Read more</a>
                </div>
            </div>
        </div>
    @endforeach
        </div>
        @endif
    </div>
@endsection
