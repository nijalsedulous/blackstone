@extends('layouts.admin')

@section('content')

    <header class="page-header">
        <h2>Manage Countries</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="javascript:void(0);">
                        <i class="fa fa-home"></i>
                    </a>
                </li>

                <li><span>Countries</span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"></a>
        </div>
    </header>

    @if (Session::has('message'))
        <div class="alert alert-success">
            <strong> {{ Session::get('message') }}</strong>
        </div>
    @endif


    <section class="panel">
        <header class="panel-heading">

            <a href="{{route('clients.create')}}" class="btn btn-primary pull-right">Create Country</a>
            <h2 class="panel-title">Manage Countries</h2>
        </header>
        <div class="panel-body">
            <table class="table table-no-more table-bordered table-striped mb-none">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Country Name</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th class="hidden-xs hidden-sm">Created</th>
                    <th class="text-right">Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($clients as $key=> $client)

                    <tr>
                        <td data-title="Id" width="5%">{{$client->id}}</td>
                        <td data-title="Name"  width="20%">{{$client->name}}</td>
                        <td data-title="Description" width="15%" ><img src="{{$client->country_flag}}"></td>
                        <td data-title="URL" >{{$client->description}}</td>
                        <td data-title="Created">{{date('d-M-Y',strtotime($client->created_at))}}</td>
                        <td data-title="Actions" class="text-right actions">
                            {!! Form::model($client,['method' => 'DELETE', 'action' => ['ClientController@destroy', $client->id ], 'id'=>'frmdeleteclient_'.$client->id ]) !!}
                            <button class="delete-row" type="button" onclick="deleteClient('{{$client->id}}')"><i class="fa fa-trash-o"></i></button>
                            {!! Form::close() !!}
                            <a href="{{route('clients.edit',$client->id)}}" class=""><i class="fa fa-pencil"></i></a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>

        <div class="pull-right">{{ $clients->links() }}</div>
    </section>
    <!-- end: page -->


@endsection

@section('scripts')

    <script>
        function deleteClient(c_id){

            var status= confirm('Are you sure want to delete this Client?');
            if(status == true){

                event.preventDefault();
                document.getElementById('frmdeleteclient_'+c_id).submit();
                return true;
            }else{
                return false;
            }


        }

    </script>

@endsection
