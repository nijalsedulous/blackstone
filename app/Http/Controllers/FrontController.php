<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Client;
use App\Models\Property_contact;
use App\Models\Contact;
use App\Models\Blog;
use App\Models\Category;


use Validator;

class FrontController extends Controller
{

    public function properties($slug_name=""){

        $selected_country="";
        if(isset($slug_name) && !empty($slug_name)){
           $cid = Client::where('slug_name',$slug_name)->first();
            $properties= Property::where('is_active',1)
                                    ->where('country_id',$cid->id)
                                    ->orderBy('created_at','desc')->paginate('9');
            $selected_country= $slug_name;

        }else{
            $properties= Property::where('is_active',1)->orderBy('created_at','desc')->paginate('9');

        }
        $pro_countires = Property::where('is_active',1)->groupBy('country_id')->get(['country_id']);

        $data['properties']=$properties;
        $data['countries']=Client::pluck('name', 'slug_name')->toArray();
        $data['selected_country']=$selected_country;
        return view('front.properties.properties_list',$data);
    }

    public function property_details($slug_name){

        $property = Property::where('slug_name',$slug_name)->first();
        if($property != null){
            $similar_properties = Property::where('is_active',1)
                                            ->where('country_id',$property->country_id)
                                            ->where('id','<>',$property->id)
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
        $property = Property::find($property_id);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'phone' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect('/property/'.$property->slug_name)
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
        return redirect('/thank-you');

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
        return redirect('/thank-you');

    }

    public function blog(){
        $blogs= Blog::orderBy('created_at','desc')->paginate('10');
        $data['blogs']=$blogs;
        return view('front.blogs.blog_list',$data);
    }

    public function blog_details($slug_name){

        $blog = Blog::where('slug_name',$slug_name)->first();
        if($blog != null){

            $data['blog']=$blog;
            return view('front.blogs.blog_details',$data);
        }else{
            abort('404');
        }
    }

    public function category_blog($slug_name){

        $category_id = Category::where('slug_name',$slug_name)->first()->id;
        $blogs= Blog::where('category_id',$category_id)->orderBy('created_at','desc')->paginate('10');
        $data['blogs']=$blogs;
        return view('front.blogs.blog_list',$data);
    }
}
