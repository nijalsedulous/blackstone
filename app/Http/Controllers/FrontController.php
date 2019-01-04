<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Country;
use App\Models\Property_contact;
use App\Models\Contact;
use App\Models\Blog;

use Validator;

class FrontController extends Controller
{

    public function properties(Request $request){

        $selected_country="";
        if(isset($request->country_id)){
            $properties= Property::where('is_active',1)
                                    ->where('country_id',$request->country_id)
                                    ->get();
            $selected_country= $request->country_id;

        }else{
            $properties= Property::where('is_active',1)->get();

        }
        $pro_countires = Property::where('is_active',1)->groupBy('country_id')->get(['country_id']);

        $data['properties']=$properties;
        $data['countries']=Country::whereIn('id',$pro_countires)->pluck('name', 'id')->toArray();
        $data['selected_country']=$selected_country;
        return view('front.properties.properties_list',$data);
    }

    public function property_details($id){

        $property = Property::find($id);
        if($property != null){
            $similar_properties = Property::where('is_active',1)
                                            ->where('country_id',$property->country_id)
                                            ->where('id','<>',$id)
                                            ->get();

            $data['similar_properties'] = $similar_properties;
            $data['property']=$property;
            return view('front.properties.property_details',$data);
        }else{
            abort('404');
        }

    }

    public function download_pdf($id){

        $property = Property::find($id);
        if($property != null){
            $pathToFile = public_path().$property->pdf_url;
            return response()->download($pathToFile);
        }else{
            abort('404');
        }
    }

    public function store_contacts(Request $request){

        $property_id = $request->property_id;
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'phone' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect('/property/'.$property_id)
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();

        $property_contact = new Property_contact();
        $property_contact->property_id = $input['property_id'];
        $property_contact->name = $input['name'];
        $property_contact->email = $input['email'];
        $property_contact->subject = $input['subject'];
        $property_contact->phone = $input['phone'];
        $property_contact->message = $input['message'];
        $property_contact->save();

        $request->session()->flash('message', 'Property Contact has been added successfully!');
        return redirect('/property/'.$property_id);

    }

    public function save_contact(Request $request){


        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'phone' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect('/contact-us')
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();

        $contact = new Contact();
        $contact->name = $input['name'];
        $contact->email = $input['email'];
        $contact->subject = $input['subject'];
        $contact->phone = $input['phone'];
        $contact->message = $input['message'];
        $contact->save();

        $request->session()->flash('message', 'Contact has been added successfully!');
        return redirect('/contact-us');

    }

    public function blog(){
        $blogs= Blog::all();
        $data['blogs']=$blogs;
        return view('front.blogs.blog_list',$data);
    }

    public function blog_details($id){

        $blog = Blog::find($id);
        if($blog != null){

            $data['blog']=$blog;
            return view('front.blogs.blog_details',$data);
        }else{
            abort('404');
        }
    }
}
