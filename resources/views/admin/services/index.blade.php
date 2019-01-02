@extends('layouts.admin')

@section('content')

    <header class="page-header">
        <h2>Manage Services</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="javascript:void(0);">
                        <i class="fa fa-home"></i>
                    </a>
                </li>

                <li><span>Services</span></li>
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

            <a href="{{route('services.create')}}" class="btn btn-primary pull-right">Create Service</a>
            <h2 class="panel-title">Manage Services</h2>
        </header>
        <div class="panel-body">
            <table class="table table-no-more table-bordered table-striped mb-none">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th class="hidden-xs hidden-sm">Created</th>
                    <th class="text-right">Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($services as $key=> $service)

                    <tr>
                        <td data-title="Id" width="5%">{{$service->id}}</td>
                        <td data-title="Name"  width="20%">{{$service->name}}</td>
                        <td data-title="Description" >{{$service->description}}</td>
                        <td data-title="URL" width="10%"><img src="{{$service->image}}"> </td>
                        <td data-title="Created" width="10%">{{date('d-M-Y',strtotime($service->created_at))}}</td>
                        <td data-title="Actions" class="text-right actions">
                            {!! Form::model($service,['method' => 'DELETE', 'action' => ['ServiceController@destroy', $service->id ], 'id'=>'frmdeletservice_'.$service->id ]) !!}
                            <button class="delete-row" type="button" onclick="deleteService('{{$service->id}}')"><i class="fa fa-trash-o"></i></button>
                            {!! Form::close() !!}
                            <a href="{{route('services.edit',$service->id)}}" class=""><i class="fa fa-pencil"></i></a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>

        {{--<div class="pull-right">{{ $expenses->links() }}</div>--}}
    </section>
    <!-- end: page -->


@endsection

@section('scripts')

    <script>
        function deleteService(s_id){

            var status= confirm('Are you sure want to delete this Service?');
            if(status == true){

                event.preventDefault();
                document.getElementById('frmdeletservice_'+s_id).submit();
                return true;
            }else{
                return false;
            }


        }

    </script>

@endsection
