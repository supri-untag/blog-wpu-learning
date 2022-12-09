<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$tittle ?? 'Login Page'}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/signin.css')}}">
</head>
<body class="text-center">

<main class="form-signin w-100 m-auto">
    @if(session()->has('success'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif(session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session()->get('loginError')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    @endif
    <form method="post" action="/login">
        @csrf
        <img class="mb-4" src="{{asset('img/brand/bootstrap-logo.svg')}}" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating">
            <input value="{{ old('email') }}" name="email"  type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-floating">
            <input value="{{ old('password') }}" name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="checkbox mb-3">
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        <p>Pengguna Baru? <a href="/register">Buat Akun!!</a></p>
        <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
    </form>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
