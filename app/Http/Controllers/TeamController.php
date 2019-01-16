<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use Validator;
use File;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams= Team::all();
        $data['teams']=$teams;
        return view('admin.teams.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teams.create');
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
            'position' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('teams.create')
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        if(isset($input['team_image'])){
            $team_image = $this->saveTeamImage($request);
            $input['image_url'] = $team_image;
        }
        Team::create($input);

        $request->session()->flash('message', 'Team has been added successfully!');
        return redirect()->route('teams.index');
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
        $data['team']=Team::find($id);
        return view('admin.teams.edit',$data);
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
            'position' => 'required',


        ]);

        if ($validator->fails()) {
            return redirect()->route('teams.edit',$id)
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        $team = Team::find($id);
        $old_team_image =$team->image_url;
        $team->name=$input['name'];
        $team->position=$input['position'];

        if(isset($input['team_image'])){

            $team_image = $this->saveTeamImage($request);

            //unlink previous image
            $team_image_path = $old_team_image;

            if(File::exists(public_path().$team_image_path)) {
                File::delete(public_path().$team_image_path);
            }

            $team->image_url=$team_image;
        }

        $team->save();

        $request->session()->flash('message', 'Team has been updated successfully!');
        return redirect()->route('teams.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::where('id',$id);
        $team_image_path = $team->first()->image_url;
        if(File::exists(public_path().$team_image_path)) {
            File::delete(public_path().$team_image_path);
        }
        $team->delete();
        \Session::flash('message', 'Team has been deleted successfully!');
        return redirect()->route('teams.index');
    }


    public function saveTeamImage($request){

        $team_path = 'uploads/teams/';
        if(!File::exists($team_path)) {
            File::makeDirectory($team_path, 0777, true, true);
        }
        $file_name = $request->file('team_image')->getClientOriginalName();
        $file_extension = $request->file('team_image')->getClientOriginalExtension();
        $unique_name = md5($file_name. time());
        $new_file_name = $unique_name.".".$file_extension;
        $request->file('team_image')->move($team_path, $new_file_name);
        return "/".$team_path.$new_file_name;

    }
}
