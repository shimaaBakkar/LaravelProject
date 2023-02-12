<?php

namespace App\Http\Controllers;

use App\Http\Controllers\destroy;

use Illuminate\Http\Request;

use App\Models\Post;

use App\Models\User;

use Illuminate\Validation\Validator;

// use Illuminate\Support\Facades\DB;



class PostController extends Controller
{
    public function index()
    {
        $allposts = Post::all();
        $users = User::all();
        return view('index', ['posts' => $allposts ]);
    }

    public function show($postId)
    {
        // $data = Post::find($post);

        $post = Post::where('id', $postId)->first();
        $post = Post::find($postId);
        return view('show', ['post' => $post]);
    }

    public function edit($post)
    {
        $users = User::all();
        $post = Post::find($post);
        // dd($post);
        return view('edit', ['post' => $post],['users'=> $users]);
    }


    public function update($post , Request $request){

        $post= post::find($post);
        $data = $request->all();
            // dd($data);
            $title = $data['title'];
            $description = $data['description'];
            $post_creator = $data['post_creator'];
        $post->update([
            'title'=>$title,
            'description'=>$description,
            'userId'=>$post_creator,

        ]);
        return (redirect ('posts'));
    }


    public function create()
    {
        $users = User::all();
        // dd($users);

        return view('create',['users'=>$users]);
    }


    // public function store(Request $request)
    // {
    //     $data = $request->all();
    //     $title = $data['title'];
    //     $description = $data['description'];
    //     $userId = $data['post_creator'];

    //     Post::create([
    //         'title' => $title,
    //         'description' => $description,
    //         'userId' => $userId,
    //     ]);
    //     return (redirect ('posts'));
    // }

    public function store(Request $request)
{
    // The incoming request is valid...

    // Retrieve the validated input data...
    $validated = $request->validated();

    // Retrieve a portion of the validated input data...
    $validated = $request->safe()->only(['title', 'description','post_creator']);
    $validated = $request->safe()->except(['title', 'description','post_creator']);

    return response()->noContent();
}

/**
 * Configure the validator instance.
 */
public function withValidator(Validator $validator): void
{
    $validator->after(function (Validator $validator) {
        if ($this->somethingElseIsInvalid()) {
            $validator->errors()->add('field', 'Something went wrong!');
        }
    });
}

// protected function validator(Validator $validator)
// {
//     return Validator::make ($data,
//         [
//         'title' => ['required', 'string', 'min:3', 'unique:users'],
//         'description' => ['required', 'string','min:10', 'unique:users'],
//         'password' => [ 'string', 'min:8'],
//     ]);
// }

    public function destroy($id){

        $data = Post::find($id);
        $data->delete();
        // $data = destroy($id);
        // $data = $this->destroy($id);
          return(redirect ('posts'));
    }


    public function archive(){


        $posts=post::onlyTrashed()->get();

        // dd($postes);
        return view("posts.archive",["post"=>$posts]);


    }


    public function restore(Request $request ,post $postId){

        //    $post->all();
            //  dd($postId);
        $postId->restore();

        return redirect()->to("posts/");

    }



}
