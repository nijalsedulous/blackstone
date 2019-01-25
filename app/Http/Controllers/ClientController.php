<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Validator;
use File;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients= Client::orderBy('created_at','desc')->paginate('15');
        $data['clients']=$clients;
        return view('admin.clients.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clients.create');
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
            'country_flag' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('clients.create')
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        if(isset($input['country_flag'])){
            $country_flag = $this->saveClientImage($request);
            $input['country_flag'] = $country_flag;
        }
        $input['slug_name'] = strtolower(str_replace(" ","-",$input['name']));
        Client::create($input);

        $request->session()->flash('message', 'Client has been added successfully!');
        return redirect()->route('clients.index');
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
        $data['client']=Client::find($id);
        return view('admin.clients.edit',$data);
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
            return redirect()->route('clients.edit',$id)
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        $client = Client::find($id);
        $old_country_flag =$client->country_flag;
        $client->name=$input['name'];
        $client->slug_name = strtolower(str_replace(" ","-",$input['country_name']));
        $client->description=$input['description'];

        if(isset($input['country_flag'])){

            $country_flag = $this->saveClientImage($request);

            //unlink previous image
            $client_image_path = $old_country_flag;

            if(File::exists(public_path().$client_image_path)) {
                File::delete(public_path().$client_image_path);
            }

            $client->country_flag=$country_flag;
        }

        $client->save();

        $request->session()->flash('message', 'Client has been updated successfully!');
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::where('id',$id);
        $client_image_path = $client->first()->country_flag;
        if(File::exists(public_path().$client_image_path)) {
            File::delete(public_path().$client_image_path);
        }
        $client->delete();
        \Session::flash('message', 'Client has been deleted successfully!');
        return redirect()->route('clients.index');
    }

    public function saveClientImage($request){

        $client_path = 'uploads/clients/';
        if(!File::exists($client_path)) {
            File::makeDirectory($client_path, 0777, true, true);
        }
        $file_name = $request->file('country_flag')->getClientOriginalName();
        $file_extension = $request->file('country_flag')->getClientOriginalExtension();
        $unique_name = md5($file_name. time());
        $new_file_name = $unique_name.".".$file_extension;
        $request->file('country_flag')->move($client_path, $new_file_name);
        return "/".$client_path.$new_file_name;

    }
}
