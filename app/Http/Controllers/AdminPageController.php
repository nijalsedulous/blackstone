<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use File;
use Validator;


class AdminPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages= Page::all();

        $data['pages']=$pages;

        return view('admin.pages.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
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
            'content' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect()->route('pages.create')
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        if(isset($input['page_image'])){
            $page_image = $this->savePageImage($request);
            $input['image_url'] = $page_image;
        }
        Page::create($input);

        $request->session()->flash('message', 'Page has been added successfully!');
        return redirect()->route('pages.index');
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
        $data['page']=Page::find($id);
        return view('admin.pages.edit',$data);
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
            'content' => 'required',


        ]);

        if ($validator->fails()) {
            return redirect()->route('pages.edit',$id)
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        $page = Page::find($id);
        $old_page_image =$page->image_url;
        $page->name=$input['name'];
        $page->content=$input['content'];
        $page->meta_title=$input['meta_title'];
        $page->meta_description=$input['meta_description'];


        if(isset($input['page_image'])){

            $page_image = $this->savePageImage($request);

            //unlink previous image
            $page_image_path = $old_page_image;

            if(File::exists(public_path().$page_image_path)) {
                File::delete(public_path().$page_image_path);
            }

            $page->image_url=$page_image;
        }

        $page->save();

        $request->session()->flash('message', 'Page has been updated successfully!');
        return redirect()->route('pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $page = Page::where('id',$id);
        $page_image_path = $page->first()->image_url;
        if(File::exists(public_path().$page_image_path)) {
            File::delete(public_path().$page_image_path);
        }
        $page->delete();

        \Session::flash('message', 'Page has been deleted successfully!');
        return redirect()->route('pages.index');
    }

    public function savePageImage($request){

        $page_path = 'uploads/pages/';
        if(!File::exists($page_path)) {
            File::makeDirectory($page_path, 0777, true, true);
        }
        $file_name = $request->file('page_image')->getClientOriginalName();
        $file_extension = $request->file('page_image')->getClientOriginalExtension();
        $unique_name = md5($file_name. time());
        $new_file_name = $unique_name.".".$file_extension;
        $request->file('page_image')->move($page_path, $new_file_name);
        return "/".$page_path.$new_file_name;

    }
}
