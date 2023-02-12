<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"></head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">ITI Blog Post</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" href="#">All Posts</a>
            </div>
        </div>
    </div>
</nav>
<div class="container">
    <form action="{{route('posts.update',['post' => $post -> id])}}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
            <label class="form-label">Title</label>
            <textarea name="title" class="form-control" value="">{{$post -> title}}</textarea>

        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" value="">{{$post -> description}}</textarea>
        </div>
        <div class="mb-3 ">
            <label class="form-label" for="exampleCheck1">Post Creator</label>

            <select name="post_creator" class="form-control">
                @foreach ($users as $user)
                <option value="{{$user->id}}" @if ($user->id == $post->userId) selected @endif>
                    {{$user->name}}
                </option>
                @endforeach
            </select>
        </div>

        {{-- <div class="mb-3 ">
            <label class="form-label" for="exampleCheck1">Post Creator</label>
            <select name="post_creator" class="form-control">
               @foreach($users as $user)
                   <option value="{{$user->id}}">{{$user->name}}</option>
               @endforeach
            </select>
        </div> --}}
    <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>