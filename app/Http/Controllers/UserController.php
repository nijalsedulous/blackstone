<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\User_profile;
use Validator;


class UserController extends Controller
{


    public function profile($id){

        $profile = User::find($id);
        $data['profile']=$profile;
        return view('admin.users.profile',$data);
    }

    public function update_profile(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|max:255|unique:users,email,'.$id,
            'phone' => 'required',
            'address' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect(\Auth::user()->user_type.'/profile/'.$id)
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        $user = User::find($id);
        if($user != null){
            $user->email = $input['email'];
            $user->save();
        }
        $user_profile = User_profile::where('user_id',$id)->first();
        if($user_profile != null){

            $user_profile->first_name = $input['first_name'];
            $user_profile->last_name = $input['last_name'];
            $user_profile->phone = $input['phone'];
            $user_profile->address = $input['address'];
            $user_profile->city = $input['city'];
            $user_profile->state = $input['state'];
            $user_profile->country = $input['country'];
            $user_profile->save();
        }
        $request->session()->flash('message', 'Profile has been updated successfully!');
        return redirect(\Auth::user()->user_type.'/profile/'.$id);

    }

    public function change_password(){

        $id = \Auth::user()->id;
        $user = User::find($id);
        return view('admin.users.change_password')->with('user',$user);
    }

    public function updatePassword(Request $request, $id){

        $rules = [
            'password' => 'required|confirmed',
            'password_confirmation'=>'required'
        ];

        $validator = \Validator::make($request->all(), $rules);

        if($validator->fails()) {

            return redirect(\Auth::user()->user_type.'/change_password')
                ->withErrors($validator)
                ->withInput();
        }
        $user = User::find($id);
        $user->password = \Hash::make($request->password);
        $user->save();

        $request->session()->flash('message', 'Password has been changed successfully!');

        return redirect('/'.\Auth::user()->user_type.'/change_password');

    }
}
