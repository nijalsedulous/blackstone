<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Validator;
use File;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services= Service::all();
        $data['services']=$services;
        return view('admin.services.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
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
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('services.create')
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        if(isset($input['service_image'])){
            $service_image = $this->saveServiceImage($request);
            $input['image'] = $service_image;
        }
        Service::create($input);

        $request->session()->flash('message', 'Service has been added successfully!');
        return redirect()->route('services.index');
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
        $data['service']=Service::find($id);
        return view('admin.services.edit',$data);
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
            'description' => 'required',


        ]);

        if ($validator->fails()) {
            return redirect()->route('services.edit',$id)
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        $service = Service::find($id);
        $old_service_image =$service->image;
        $service->name=$input['name'];
        $service->description=$input['description'];

        if(isset($input['service_image'])){

            $service_image = $this->saveServiceImage($request);

            //unlink previous image
            $service_image_path = $old_service_image;

            if(File::exists(public_path().$service_image_path)) {
               File::delete(public_path().$service_image_path);
            }

            $service->image=$service_image;
        }

        $service->save();

        $request->session()->flash('message', 'Service has been updated successfully!');
        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::where('id',$id);
        $service_image_path = $service->first()->image;
        if(File::exists(public_path().$service_image_path)) {
            File::delete(public_path().$service_image_path);
        }
        $service->delete();
        \Session::flash('message', 'Service has been deleted successfully!');
        return redirect()->route('services.index');
    }

    public function saveServiceImage($request){

        $service_path = 'uploads/services/';
        if(!File::exists($service_path)) {
            File::makeDirectory($service_path, 0777, true, true);
        }
        $file_name = $request->file('service_image')->getClientOriginalName();
        $file_extension = $request->file('service_image')->getClientOriginalExtension();
        $unique_name = md5($file_name. time());
        $new_file_name = $unique_name.".".$file_extension;
        $request->file('service_image')->move($service_path, $new_file_name);
        return "/".$service_path.$new_file_name;

    }
}
