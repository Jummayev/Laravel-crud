<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Update post</title>
</head>
<body>
<div class="card ">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" aria-current="true" href="#">Update post</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('posts.index') }}">All Posts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('posts.create') }}">Create Posts</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="container mt-5">
            <h1>Create post</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="m-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('posts.update', [$post]) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" name="title" value="{{ old('title', $post->title) }}" class="form-control" id="title"
                           placeholder="Title">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content:</label>
                    <textarea name="content" class="form-control" id="content" rows="3"
                              placeholder="Content">{{ old('content', $post->content) }}</textarea>
                </div>
                <input type="submit" value="Add post" class="btn btn-success">
            </form>
        </div>
    </div>
</div>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
-->
</body>
</html>
