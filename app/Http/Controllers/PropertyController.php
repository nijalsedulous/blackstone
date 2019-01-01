<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Property_image;

use App\Models\Country;
use Validator;
use Image;
use File;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties= Property::all();

        $data['properties']=$properties;

        return view('admin.properties.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['countries']=Country::pluck('name', 'id')->toArray();
        return view('admin.properties.create',$data);
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
            'country_id' => 'required',
            'name' => 'required',
            'address' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect()->route('properties.create')
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        $property = new Property();
        $property->country_id = $input['country_id'];
        $property->name = $input['name'];
        $property->address = $input['address'];
        $property->description = $input['property_description'];
        $property->video_url = $input['video_url'];
        $property->is_active = isset($input['is_active'])?1:0;
        $property->meta_title = $input['meta_title'];
        $property->meta_description = $input['meta_description'];
        $property->save();
        $propertyId = $property->id;
        if(isset($input['properpty_pdf'])){
            $this->savePropertyPdf($propertyId,$request);
        }

        if(isset($input['images_name'])) {
            $this->savePropertyImages($propertyId, $request);
        }


        $request->session()->flash('message', 'Property has been added successfully!');
        return redirect()->route('properties.index');
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
        $data['property']=Property::find($id);
        $data['countries']=Country::pluck('name', 'id')->toArray();
        return view('admin.properties.edit',$data);
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
            'country_id' => 'required',
            'name' => 'required',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('properties.edit',$id)
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        $property = Property::find($id);
        if($property != null){
            $property->country_id = $input['country_id'];
            $property->name = $input['name'];
            $property->address = $input['address'];
            $property->description = $input['property_description'];
            $property->video_url = $input['video_url'];
            $property->is_active = isset($input['is_active'])?1:0;
            $property->meta_title = $input['meta_title'];
            $property->meta_description = $input['meta_description'];
            $property->save();

            if(isset($input['properpty_pdf'])){
                $this->savePropertyPdf($id,$request);
            }

            if(isset($input['images_name'])) {
                $this->savePropertyImages($id, $request);
            }
        }
        $request->session()->flash('message', 'Property has been updated successfully!');
        return redirect()->route('properties.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Property_image::where('property_id',$id)->delete();
         Property::where('id',$id)->delete();
        $directory ='uploads/properties/'.$id;
        if(File::exists($directory)) {
            $files = File::delete($directory);
            File::deleteDirectory($directory);
        }

        \Session::flash('message', 'Property has been deleted successfully!');
        return redirect()->route('properties.index');
    }

    public function savePropertyPdf($propertyId,$request){

        $properties_path = 'uploads/properties';
        if(!File::exists($properties_path)) {
            File::makeDirectory($properties_path, 0777, true, true);
        }
        $properties_path_withId = $properties_path."/".$propertyId;

        if(!File::exists($properties_path_withId)) {
            File::makeDirectory($properties_path_withId, 0777, true, true);
        }
        $pdf_name = $request->file('properpty_pdf')->getClientOriginalName();

        $pdf_full_path = "/".$properties_path."/".$propertyId."/".$pdf_name;
        $destination_path = $properties_path_withId;
        $request->file('properpty_pdf')->move($destination_path, $pdf_name);
        $property = Property::find($propertyId);
        $property->pdf_url = $pdf_full_path;
        $property->save();

    }

    public function savePropertyImages($propertyId,$request){

        $properties_path = 'uploads/properties';
        if(!File::exists($properties_path)) {
            File::makeDirectory($properties_path, 0777, true, true);
        }
        $properties_path_withId = $properties_path."/".$propertyId;

        if(!File::exists($properties_path_withId)) {
            File::makeDirectory($properties_path_withId, 0777, true, true);
        }

        $image_full_path = "/".$properties_path."/".$propertyId."/";
        $images_name = $request->images_name;


        foreach ($images_name as $image){

            $file_name = $image->getClientOriginalName();
            $file_extension = $image->getClientOriginalExtension();
            $unique_name = md5($file_name. time());

            $new_file_name = $unique_name.".".$file_extension;
            $destination_path = $properties_path_withId;
            $image->move($destination_path, $new_file_name);
            $properties_image = new Property_image();
            $properties_image->property_id =$propertyId;
            $properties_image->image_name =$new_file_name;
            $properties_image->image_path =$image_full_path.$new_file_name;
            $properties_image->save();
        }
    }
}
