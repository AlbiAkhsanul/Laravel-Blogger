<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.posts.index',[
            'title' => 'My Posts',
            'posts' => Post::where('user_id', auth()->user()->id)->orderBy('title')->get()->all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create',[
            'title' => 'New Post',
            'categories' => Category::orderBy('name')->get()->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => ['required','min:5','max:40'],
            'slug' => ['required','unique:posts'],
            'category_id' => ['required'],
            'image' => ['image','file','max:5000'],
            'body' => ['required','min:30']
        ];

        $validatedData = $request->validate($rules);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['exercpt'] = Str::limit(strip_tags($request->body),200,'...');

        Post::create($validatedData);
        return redirect('/dashboard/posts')->with('success','Succesfully Added A New Post!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        if($post->user_id !== auth()->user()->id) {
            abort(403);
        }

        return view('dashboard.posts.show',[
            'title' => $post->title,
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if($post->user_id !== auth()->user()->id) {
            abort(403);
        }

        return view('dashboard.posts.edit',[
            'title' => 'Edit Post',
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $rules =[
            'title' => ['required','min:5','max:70'],
            'category_id' => ['required'],
            'image' => ['image','file','max:5000'],
            'body' => ['required','min:30']
        ];

        if($request->slug != $post->slug){
          $rules['slug'] = ['required','unique:posts'];  
        };

        $validatedData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['exercpt'] = Str::limit(strip_tags($request->body),200,'...');

        Post::where('id',$post->id)
            ->update($validatedData);

        return redirect('/dashboard/posts')->with('success','Succesfully Edit Post!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if($post->user_id !== auth()->user()->id) {
            abort(403);
        }
        
        if($post->image){
            Storage::delete($post->image);
        }

        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success','Succesfully Deleted A Post!');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }
}
