<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories= Category::all();

        $data['categories']=$categories;

        return view('admin.categories.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
            'name' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect()->route('categories.create')
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        $input['slug_name'] = strtolower(str_replace(" ","-",$input['name']));

        Category::create($input);

        $request->session()->flash('message', 'Category has been added successfully!');
        return redirect()->route('categories.index');
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
        $data['category']=Category::find($id);
        return view('admin.categories.edit',$data);
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
            'name' => 'required',


        ]);

        if ($validator->fails()) {
            return redirect()->route('categories.edit',$id)
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        $cat = Category::find($id);
        $cat->name=$input['name'];
        $cat->slug_name = strtolower(str_replace(" ","-",$input['name']));


        $cat->save();

        $request->session()->flash('message', 'Category has been updated successfully!');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id',$id)->delete();

        \Session::flash('message', 'Category has been deleted successfully!');
        return redirect()->route('categories.index');
    }
}
