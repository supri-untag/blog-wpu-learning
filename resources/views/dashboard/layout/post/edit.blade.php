@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Post</h1>
    </div>
    <div class="offset-lg-1 col-lg-9">
        <form action="/dashboard/post/{{ $post->slug }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="tittle" class="form-label">Tittle</label>
                <input type="text" class="form-control @error('tittle') is-invalid @enderror" id="tittle" name="tittle" required autofocus value="{{old('tittle',$post->tittle)}}">
                @error('tittle')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{old('slug',$post->slug)}}">
                @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <select name="category_id"  id="categories" class="form-select @error('category_id') is-invalid @enderror" aria-label="Default select example">
                    <option value="">Select One</option>
                    @foreach($categories as $category)
                        @if( old('category_id',$post->category->id) == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('category_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="input-group mb-3">
                @if($post->image)
                    <img src="{{asset('storage/'.$post->image)}}" class="img-fluid img-fluid col-sm-5 imgPreview"> <br>
                    <input type="hidden" value="{{$post->image}}" name="oldImage">
                @else
                    <img class="img-fluid img-fluid col-sm-5 imgPreview" style="display: none;"> <br>

                @endif
            </div>
            <div class="input-group mb-3">
                <input name="image"  id="image" type="file" class="form-control @error('image') is-invalid @enderror"  aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                @error('body')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Fail </strong> {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @enderror
                <input id="body" type="hidden" name="body" value="{{ old('body',$post->body)}}">
                <trix-editor input="body"></trix-editor>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>



@endsection
