<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $post = Post::latest();

        $input = $request->input('search');
        if ($input !== null){
            $post->where('tittle', 'like', '%'. $input.'%');
        }
        $dataView =array(
            'test' => $input,
            'post' => $post->with(['user', 'category'])->get()
        );
        return view('contens.conten')->with($dataView);
    }

    public function single(Post $post)
    {
//        $singlePost = Post::all()->where('id',$post);
        return view('contens.single', [
            'single'=> $post,
            'category' => $post->category

        ]);
    }

    public function authors(User $user)
    {
        return view('contens.authors',[
            'authors' => $user->name,
            'posts' => $user->post->load('user', 'category')
        ]);
    }
}
