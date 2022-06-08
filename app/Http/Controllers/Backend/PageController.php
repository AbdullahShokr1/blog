<?php

namespace App\Http\Controllers\Backend;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Requests\PageRequest;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("backend.page.index",[
            'pages' => Page::get(),
        ]);
        // [
        //     'pages' => Post::when('search', fn ($query) => $query->search(request('search')))
        //     ->latest()
        //     ->paginate(20)
        // ]
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        if(($request -> photo) != Null){
            $file_name = $this -> saveImages($request -> photo,'images/posts');
        }else{
            $file_name = "Post Photo";
        }
        $my_page = [
            'title' => $request -> title,
            'description' => $request -> description,
            'keywords' => $request -> keywords,
            'content' => $request -> content,
            'schema' => $request -> schema,
            'telephone' => $request -> telephone,
            'slug' => $request -> slug,
            'photo'=>$file_name,
        ];

        Page::create($my_page,$request->validated());

        return redirect()->route('admin.page.index')->with(['success'=>'Page Added Successfully']) ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('backend.page.update',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, Page $page)
    {
        if(($request -> photo) != Null){
            $file_name = $this -> saveImages($request -> photo,'images/posts');
        }else{
            $file_name = $post -> photo;
        }
        $my_page = [
            'title' => $request -> title,
            'description' => $request -> description,
            'keywords' => $request -> keywords,
            'content' => $request -> content,
            'schema' => $request -> schema,
            'telephone' => $request -> telephone,
            'slug' => $request -> slug,
            'photo'=>$file_name,
        ];

        $page->update($my_page,$request->validated());

        return redirect()->route('admin.page.index')->with(['success'=>'Page Updated Successfully']) ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('admin.page.index')->with(['success'=>'Page Deleted Successfully']) ;
    }

    protected function saveImages($photo,$folder)
    {
        $file_ex = $photo->getClientOriginalExtension();
        $file_name = time() . '.' . $file_ex;
        $path = $folder;
        $photo->move($path, $file_name);
        return $file_name;
    }
}
