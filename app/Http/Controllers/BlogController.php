<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Blog::get();
        $getCategory = BlogCategory::with('blogs')->get();
        return view('blogs.index', compact('data','getCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = BlogCategory::get();
        return view('blogs.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->rules());
        $saveData = new Blog();
        $saveData->title = $request->title;
        $saveData->content = $request->content;
        $saveData->category_id = $request->category_id;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('public/image'), $filename);
            $saveData->image = $filename;
        }
        $saveData->save();
        return redirect()->back();
    }
    protected function rules(){
        return [
            'title' => ['required'],
            'content' => ['required'],
            'image' => ['required'],
            'category_id' => ['required']
        ];
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
