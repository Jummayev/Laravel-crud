<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>All Posts</title>
</head>
<body>
    <div class="card text-center mx-1" >
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="true" href="#">All Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('posts.create') }}">Create Post</a>
                </li>
                @if(isset(Auth::user()->name))
                    <li class="nav-item">
                        <button type="button" class="btn  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu">
                            <li class="align-middle">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                                     onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
        <div class="card-body">

            <h1>All Posts</h1>
            <div class="row row-cols-1 row-cols-md-4 d-flex justify-content-center  ">
                @foreach($posts as $post)
                    <div class="row row-cols-1 " >
                        <div class="card border-success mb-4 " style="max-width: 18rem;">
                            <div class="card-header bg-transparent border-success">
                                @foreach($users as $user)
                                    @if(($user->id) == ($post->user_id))
                                        {{ $user->name }}
                                    @endif
                                @endforeach()
                                </div>
                            <div class="card-body text-success">
                                <h5  class="card-title">{{  Str::limit($post->title, 30 )}}</h5>
                                <p class="card-text">{{ Str::limit($post->content, 150) }}</p>
                            </div>
                            <div class="card-footer bg-transparent border-success">
                                <div class="btn-group">
                                    <a href="{{ route('posts.show', [$post]) }}" class="btn btn-success ">Show</a>
                                    <a href="{{ route('posts.edit', [$post]) }}" class="btn btn-primary mx-2">Edit</a>
                                    <form action="{{ route('posts.destroy', [$post]) }}" method="POST" >
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    </div>









<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>

</body>
</html>
