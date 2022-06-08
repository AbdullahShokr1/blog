<?php

namespace App\Http\Controllers\Backend;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("backend.post.index",[
            'posts' => Post::when('search', fn ($query) => $query->search(request('search')))
            ->latest()
            ->paginate(15)
        ],[
            'categories'=> Category::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.post.create',[
            'users'=> User::get(),
            'categories'=> Category::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        if(($request -> photo) != Null){
            $file_name = $this -> saveImages($request -> photo,'images/posts');
        }else{
            $file_name = "Post Photo";
        }
        $my_post = [
            'title' => $request -> title,
            'description' => $request -> description,
            'keywords' => $request -> keywords,
            'content' => $request -> contentt,
            'schema' => $request -> schema,
            'category_id' => $request -> category_id,
            'writer_id' => $request -> writer_id,
            'telephone' => $request -> telephone,
            'slug' => $request -> slug,
            'photo'=>$file_name,
        ];

        Post::create($my_post,$request->validated());

        return redirect()->route('admin.post.index')->with(['success'=>'Post Added Successfully']) ;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('backend.post.update',[
            'users'=> User::get(),
            'categories'=> Category::get(),

        ],compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\PostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post,PostRequest $request)
    {
        if(($request -> photo) != Null){
            $file_name = $this -> saveImages($request -> photo,'images/posts');
        }else{
            $file_name = $post -> photo;
        }
        $my_post = [
            'title' => $request -> title,
            'description' => $request -> description,
            'keywords' => $request -> keywords,
            'content' => $request -> contentt,
            'schema' => $request -> schema,
            'category_id' => $request -> category_id,
            'writer_id' => $request -> writer_id,
            'telephone' => $request -> telephone,
            'slug' => $request -> slug,
            'photo'=>$file_name,
        ];

        $post->update($my_post,$request->validated());

        return redirect()->route('admin.post.index')->with(['success'=>'Post Updated Successfully']) ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.post.index')->with(['success'=>'Post Deleted Successfully']) ;
    }
    protected function saveImages($photo,$folder)
    {
        $file_ex = $photo->getClientOriginalExtension();
        $file_name = time() . '.' . $file_ex;
        $path = $folder;
        $photo->move($path, $file_name);
        return $file_name;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("backend.post.show",['posts'=> Post::get()]);
    }
}
