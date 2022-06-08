<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //Show all Categories
    public function index(){
        return view('backend.category.index',[
            'categories'=> Category::query()->paginate(10),
        ]);
        // 'tags' => Tag::query()->latest()->paginate(10)
    }
    //Create new Category
    public function create(){
        return view('backend.category.create');
    }
    //Store new Category in DB
    public function store(CategoryRequest $request){
        Category::create($request->validated());

        return redirect()->route('admin.category.index')->with(['success'=>'Category Added Successfully']) ;
    }
    //Edit Category
    public function edit(Category $category){
        return view('backend.category.update',compact('category'));
    }
    //update Category && Store in DB
    public function update(Category $category,CategoryRequest $request){
        $category->update($request->validated());

        return redirect()->route('admin.category.index')->with(['success'=>'Category Updated Successfully']) ;
    }
    //update Category && Store in DB
    public function destroy(Category $category){
        $category->delete();
        return redirect()->route('admin.category.index')->with(['success'=>'Category Deleted Successfully']) ;
    }
    public function show($slug)
    {

        $category = Category::select('id','title','slug')->where('slug',$slug)->first();
        return view('backend.category.Show',['posts'=> Post::get()],compact('category'));
    }
}



