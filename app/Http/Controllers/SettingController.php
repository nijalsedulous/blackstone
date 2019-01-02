<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Validator;
use File;


class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting= Setting::get()->first();

        $data['setting']=$setting;

        return view('admin.settings.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
        //
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
             'site_name' => 'required',
             'site_url' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('settings.index')
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        $setting = Setting::find($id);
        if($setting != null){
            $setting->site_name = $input['site_name'];
            $setting->site_url = $input['site_url'];
            $setting->site_description = $input['site_description'];
            $setting->address = $input['address'];
            $setting->phone1 = $input['phone1'];
            $setting->phone2 = $input['phone2'];
            $setting->busniess_email = $input['busniess_email'];
            $setting->copyrights = $input['copyrights'];
            $setting->google_map = $input['google_map'];
            $setting->meta_title = $input['meta_title'];
            $setting->meta_description = $input['meta_description'];
            if(isset($input['site_logo'])){
              $logo_url = $this->saveSiteLogo($request);
                $setting->logo = $logo_url;
            }
            $setting->save();
            $request->session()->flash('message', 'Setting has been updated successfully!');
            return redirect()->route('settings.index');

        }else{
            abort('404');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function saveSiteLogo($request){

        $logo_path = 'uploads/';
        if(!File::exists($logo_path)) {
            File::makeDirectory($logo_path, 0777, true, true);
        }
        $file_name = $request->file('site_logo')->getClientOriginalName();
        $file_extension = $request->file('site_logo')->getClientOriginalExtension();
        $unique_name = md5($file_name. time());
        $new_file_name = $unique_name.".".$file_extension;
        $request->file('site_logo')->move($logo_path, $new_file_name);
        return "/".$logo_path.$new_file_name;

    }
}
