<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.categories.index',[
            'title' => 'Post Categories',
            'categories' => Category::orderBy('name')->get()->all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.create',[
            'title' => 'New Category',
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules =[
            'name' => ['required','min:3','max:30'],
            'image' => ['image','file','max:2000'],
        ];

        $validatedData = $request->validate($rules);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('category-images');
        }

        Category::create($validatedData);
        return redirect('/dashboard/categories')->with('success','Succesfully Added A New Category!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit',[
            'title' => 'Edit Category',
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $rules =[
            'name' => ['required','min:3','max:20'],
            'image' => ['image','file','max:2000'],
        ];

        if($request->slug != $category->slug){
            $rules['slug'] = ['required','unique:posts'];  
        };

        $validatedData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('category-images');
        }

        Category::where('id',$category->id)
            ->update($validatedData);

        return redirect('/dashboard/categories')->with('success','Succesfully Edit Category!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if($category->image){
            Storage::delete($category->image);
        }

        Category::destroy($category->id);
        return redirect('/dashboard/categories')->with('success','Succesfully Deleted A Category!');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}
