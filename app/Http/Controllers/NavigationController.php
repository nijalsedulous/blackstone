<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Navigation;
use Validator;

class NavigationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $navigations= Navigation::all();

        $data['navigations']=$navigations;

        return view('admin.navigations.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.navigations.create');
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
            'nav_type' => 'required',
            'url' => 'required',
            'sort_order' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect()->route('navigations.create')
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        Navigation::create($input);

        $request->session()->flash('message', 'Navigation has been added successfully!');
        return redirect()->route('navigations.index');
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
        $data['navigation']=Navigation::find($id);
        return view('admin.navigations.edit',$data);
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
            'nav_type' => 'required',
            'url' => 'required',
            'sort_order' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect()->route('navigations.edit',$id)
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        $nav = Navigation::find($id);
        $nav->name=$input['name'];
        $nav->nav_type=$input['nav_type'];
        $nav->url=$input['url'];
        $nav->sort_order=$input['sort_order'];
        $nav->save();

        $request->session()->flash('message', 'Navigation has been updated successfully!');
        return redirect()->route('navigations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Navigation::where('id',$id)->delete();

        \Session::flash('message', 'Navigation has been deleted successfully!');
        return redirect()->route('navigations.index');
    }
}
