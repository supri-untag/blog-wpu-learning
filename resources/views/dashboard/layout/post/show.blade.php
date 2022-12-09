@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $post->tittle }}</h1>
    </div>
    <div class="col-md-10 p-3">
        <a href="/dashboard/post" class="btn bg-success text-light pb-2 mb-1"> <span data-feather="skip-back"></span> Back</a>
        <a href="/dashboard/post/{{ $post->slug }}/edit" class="btn bg-warning pb-2 mb-1"><span data-feather="edit"></span> Edit</a>
        <form class="d-inline" action="/dashboard/post/{{ $post->slug }}" method="post" data-id="{{$post->id}}">
            @csrf
            @method('delete')
            <button class="btn bg-danger text-light p-2 mb-1 border-0 deletePost"><span data-feather="x-circle"></span> Delete</button>
        </form>
        <p>Category:  <a href="/cat/{{$post->category->slug}}">{{$post->category->name}}</a></p>
        @if($post->image)
            <div>
                <img style="max-height:400px; max-width: 1200px;" class="img-fluid" src="{{asset('storage/'. $post->image )}}" class="card-img-top" alt="{{$post->tittle}}">

            </div>
        @else
            <img src="https://source.unsplash.com/800x400?{{$post->tittle}}" class="card-img-top" alt="{{$post->tittle}}">
        @endif
        <div>{!! $post->body !!}</div>
    </div>
@endsection
