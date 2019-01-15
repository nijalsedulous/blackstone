<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts= Contact::orderBy('created_at','desc')->paginate('15');
        $data['contacts']=$contacts;

        return view('admin.contacts.index',$data);
    }

    public function searchContact(Request $request){
        $input =$request->all();

        $contact_id = isset($input['contact_id'])?$input['contact_id']:'';
        $from_date = isset($input['from_date'])?date('Y-m-d',strtotime($input['from_date'])):'';
        $end_date = isset($input['end_date'])?date('Y-m-d',strtotime($input['end_date'])):'';

        if($contact_id > 0){

            $contacts= Contact::where('contacts.id',$contact_id)
                                ->OrderBy('created_at','desc')->paginate('15');
            $input['contact_name']= Contact::where('contacts.id',$contact_id)->first()->name;


        }else if($from_date !="" && $end_date != ""){
            $contacts= Contact::whereDate('created_at','>=', $from_date)
                                ->whereDate('created_at', '<=',$end_date)
                                ->OrderBy('created_at','desc')->paginate('15');

        }else if($contact_id > 0 && $from_date !="" && $end_date != "") {

            $contacts = Contact::whereDate('created_at', '>=', $from_date)
                ->whereDate('created_at', '<=', $end_date)
                ->where('contacts.id', $contact_id)
                ->OrderBy('created_at', 'desc')->paginate('15');
        }else{
            $contacts= Contact::orderBy('created_at','desc')->paginate('15');
        }

        $data['contacts']=$contacts;

        $data['input_data']=$input;
        return view('admin.contacts.index',$data);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::where('id',$id)->delete();
        \Session::flash('message', 'Contact has been deleted successfully!');
        return redirect()->route('contacts.index');
    }


    public function getContacts(Request $request){
        $input = $request->all();
        $search_key = $input['searchTerm'];
        $contacts = Contact::where('name','like',"%{$search_key}%")
                         ->orderBy('name','asc')->get();
        $contact_data=[];
        foreach ($contacts as $contact){
            $temp=[];
            $temp['id']= $contact->id;
            $temp['text']= $contact->name;
            $contact_data[]=$temp;
        }
        return $contact_data;
    }

}
