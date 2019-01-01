<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Country;



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
}
