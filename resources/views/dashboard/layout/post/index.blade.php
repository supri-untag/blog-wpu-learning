@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Post</h1>
    </div>
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-lg-10" role="alert">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="table-responsive col-lg-11">
        <a href="/dashboard/post/create" class="btn bg-info pb-2 mb-3 text-light">Create New Post</a>
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tittle</th>
                <th scope="col">Kategory</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $post->tittle }}</td>
                <td>{{ $post->category->name }}</td>
                <td>
                    <a href="/dashboard/post/{{ $post->slug }}" class="badge bg-primary m-0"> <span data-feather="home"></span></a>
                    <a href="/dashboard/post/{{ $post->slug }}/edit" class="badge bg-warning m-0"> <span data-feather="edit"></span></a>
                    <form class="d-inline" action="/dashboard/post/{{ $post->slug }}" method="post" data-id="{{$post->id}}">
                        @csrf
                        @method('delete')
                        <button class="badge bg-danger m-0 border-0 deletePost"><span data-feather="x-circle"></span></button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
