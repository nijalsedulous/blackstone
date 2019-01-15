@extends('layouts.admin')

@section('content')

    <header class="page-header">
        <h2>Manage Contacts</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="javascript:void(0);">
                        <i class="fa fa-home"></i>
                    </a>
                </li>

                <li><span>Contacts</span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"></a>
        </div>
    </header>

    <section class="panel">
        <div class="panel-body">
            <form id="frmcontact" action="{{route('contacts.search_contact')}}" class="" method="POST" >
                {{csrf_field()}}
            <div class="row">


                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Contact Name</label>
                        <select  class="form-control populate" id="contactSelect" name="contact_id">
                            @if(isset($input_data) && isset($input_data['contact_id']))
                                <option value="{{$input_data['contact_id']}}">{{$input_data['contact_name']}}</option>
                            @endif

                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">From Date</label>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            <?php $from_date ="";
                            if(isset($input_data) && isset($input_data['from_date'])){
                                $from_date = date('m/d/Y',strtotime($input_data['from_date']));
                            }
                            ?>
                            <input type="text" data-plugin-datepicker="" name="from_date" class="form-control" value="{{$from_date}}">
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">End Date</label>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>

                            <?php $end_date ="";
                            if(isset($input_data) && isset($input_data['end_date'])){
                                $end_date = date('m/d/Y',strtotime($input_data['end_date']));
                            }
                            ?>
                            <input type="text" data-plugin-datepicker="" name="end_date" class="form-control" value="{{$end_date}}">
                        </div>
                    </div>
                </div>



                <div class="col-md-3">
                    <div class="form-group" style="margin-top: 25px;">
                        <button type="submit" class="btn btn-success" ><i class="fa fa-search"></i> Search</button>
                    </div>
                </div>

            </div>
            </form>
        </div>
    </section>

    @if (Session::has('message'))
        <div class="alert alert-success">
            <strong> {{ Session::get('message') }}</strong>
        </div>
    @endif


    <section class="panel">
        <header class="panel-heading">

            <h2 class="panel-title">Manage Contacts</h2>
        </header>
        <div class="panel-body">
            <table class="table table-no-more table-bordered table-striped mb-none">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th class="hidden-xs hidden-sm">Created</th>
                    <th class="hidden-xs hidden-sm">Action</th>

                </tr>
                </thead>
                <tbody>

                @foreach($contacts as $key=> $contact)

                    <tr>
                        <td data-title="Id">{{$contact->id}}</td>
                        <td data-title="Name" >{{$contact->name}}</td>
                        <td data-title="Name" >{{$contact->email}}</td>
                        <td data-title="Name" >{{$contact->phone}}</td>
                        <td data-title="Name" >{{$contact->subject}}</td>
                        <td data-title="Name" >{{$contact->message}}</td>
                        <td data-title="Created">{{date('d-M-Y',strtotime($contact->created_at))}}</td>
                        <td>
                            {!! Form::model($contact,['method' => 'DELETE', 'action' => ['ContactController@destroy', $contact->id ], 'id'=>'frmdeletcontact_'.$contact->id ]) !!}
                            <button class="delete-row" type="button" onclick="deleteContact('{{$contact->id}}')"><i class="fa fa-trash-o"></i></button>
                            {!! Form::close() !!}

                        </td>

                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>

        <div class="pull-right">{{ $contacts->links() }}</div>
    </section>
    <!-- end: page -->


@endsection

@section('scripts')


    <script>
        function deleteContact(c_id){

            var status= confirm('Are you sure want to delete this contact?');
            if(status == true){

                event.preventDefault();
                document.getElementById('frmdeletcontact_'+c_id).submit();
                return true;
            }else{
                return false;
            }


        }


        jQuery(document).ready(function($) {


            $("#contactSelect").select2({
                placeholder: "Search Contact Name",
                allowClear: true,
                minimumInputLength:2,
                ajax: {
                    url: "/api/getContacts",
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            searchTerm: params.term // search term
                        };
                    },
                    processResults: function (response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
            });

        });

    </script>

@endsection
