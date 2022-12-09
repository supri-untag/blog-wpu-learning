<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     *
     */
    public function index()
    {
        return view('dashboard.layout.post.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->with('category')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.layout.post.create',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'tittle' => 'required|min:5',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'body' => 'required',
            'image' => 'image|file|max:3084'
        ]);
        if ($request->file('image')){
            $validate['image'] = $request->file('image')->store('image-post');
        }
        $validate['user_id'] = auth()->user()->id;
        $validate['excerpt'] = Str::limit(strip_tags($request->body), 50);
        Post::create($validate);
        return redirect('/dashboard/post')->with('success', 'New Post Has been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.layout.post.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.layout.post.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Post $post)
    {
        $validate = [
            'tittle' => 'required|min:5',
            'category_id' => 'required',
            'body' => 'required'
        ];
        if ($request->slug != $post->slug) {
            $validate['slug'] = 'required|unique:posts';
        }
        $validateSuccess = $request->validate($validate);
        if ($request->file('image')){
            if ($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateSuccess['image'] = $request->file('image')->store('image-post');
        }
        $validateSuccess['excerpt'] = Str::limit(strip_tags($request->body), 50);
        Post::where('id',$post->id)
            ->update($validateSuccess);
        return redirect('/dashboard/post')->with('success', 'Post Has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        return redirect('/dashboard/post')->with('success', 'Post Has been Deleted!');
    }

    public function createSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->tittle, ['unique' => true]);
        return response()->json(['slug' => $slug]);
    }
}
