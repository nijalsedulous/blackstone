<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;

use Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs= Blog::all();

        $data['blogs']=$blogs;

        return view('admin.blogs.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories']=Category::pluck('name', 'id')->toArray();
        return view('admin.blogs.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect()->route('blogs.create')
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        Blog::create($input);

        $request->session()->flash('message', 'Blog has been added successfully!');
        return redirect()->route('blogs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['blog']=Blog::find($id);
        $data['categories']=Category::pluck('name', 'id')->toArray();
        return view('admin.blogs.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect()->route('blogs.edit',$id)
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        $bg = Blog::find($id);
        $bg->category_id=$input['category_id'];
        $bg->title=$input['title'];
        $bg->description=$input['description'];
        $bg->save();

        $request->session()->flash('message', 'Blog has been updated successfully!');
        return redirect()->route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::where('id',$id)->delete();

        \Session::flash('message', 'Blog has been deleted successfully!');
        return redirect()->route('blogs.index');
    }
}
