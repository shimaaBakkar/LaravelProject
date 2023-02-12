<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">ITI Blog</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <button class="btn btn-dark" data-bs-toggle="dropdown" aria-expanded="false">
                  All posts
                </button>
              </li>
            </ul>
          </div>
        </div>
    </nav>


    <div class="container">
        <div class="m-5">
            {{-- {{route('posts.create',$post['id'])}} --}}
            <button type="button" class="btn btn-success m-3"><a href="{{route('posts.create')}}">Add post</a></button>
            {{-- <a href="{{route('posts.create',$post)}}" class="btn btn-info">Add post</a> --}}

            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">title</th>
                    <th scope="col">posted_by</th>
                    <th scope="col">created_at</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post )
                    <tr>
                        <th scope="row">{{$post['id']}}</th>
                        <td>{{$post['title']}}</td>
                        <td>{{isset($post->user->name)?$post->user->name:"notFound"}}</td>
                        <td>{{$post['created_at']}}</td>
                        <td>
                            <a href="{{route('posts.show',$post['id'])}}" class="btn btn-info">view</a>
                            <a href="{{route('posts.edit',$post['id'])}}" class="btn btn-primary">edit</a>
                            <form action="{{route('posts.destroy',$post['id'])}}" method="POST" style="display: inline-block">
                                @csrf
                                @method('delete',$post['id'])
                                    <button type="submit" href="#" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')" >Delete</button>
                            </form>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>


 {{-- <script>
    var deleteLinks = document.querySelectorAll('.delete');
for (var i = 0; i < deleteLinks.length; i++) {
    deleteLinks[i].addEventListener('click', function(event) {
        event.preventDefault();
        var choice = confirm(this.getAttribute('data-confirm'));
        if (choice) {
            window.location.href = this.getAttribute('href');
        }
    });
}
 </script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
var deleteLinks = document.querySelectorAll('.delete');
for (var i = 0; i < deleteLinks.length; i++) {
    deleteLinks[i].addEventListener('click', function(event) {
        event.preventDefault();
        var choice = confirm(this.getAttribute('data-confirm'));
        if (choice) {
            window.location.href = this.getAttribute('href');
        }
    });
}
    </script>
  </body>
</html>
