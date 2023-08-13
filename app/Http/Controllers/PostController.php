<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class PostController extends Controller{
    public function index(){
        $title = 'All Posts';
        $categoryName = null;
        $writer = null;
        $writerUsername = null;
        $categorySlug = null;
        if(request('category')){
            $category = Category::firstWhere('slug',request('category'));
            $title = $category->name;
            $categoryName = $category->name;
            $categorySlug = $category->slug;
        }
        if(request('user')){
            $user = User::firstWhere('username',request('user'));
            $title = $user->name;
            $writer = $user->name;
            $writerUsername = $user->username;
        }

        return view('posts.index',[  
            'title'=> $title,
            'categoryName' => $categoryName,
            'writer' => $writer,
            'writerUsername' => $writerUsername,
            'categorySlug' => $categorySlug,
            'categories' => Category::all(),           
            'posts' => Post::latest()->filter(request(['search','category','user']))->paginate(12)->withQueryString()
            
        ]);
    }

    public function getPostBySlug(Post $post){
        return view('posts.post',[
            'title' => $post->title,
            'post' => $post
        ]);
    }
}
