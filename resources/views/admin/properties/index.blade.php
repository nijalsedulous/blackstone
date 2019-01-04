@extends('layouts.admin')

@section('content')

    <header class="page-header">
        <h2>Manage Properties</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="javascript:void(0);">
                        <i class="fa fa-home"></i>
                    </a>
                </li>

                <li><span>Properties</span></li>
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

            <a href="{{route('properties.create')}}" class="btn btn-primary pull-right">Create Property</a>
            <h2 class="panel-title">Manage Properties</h2>
        </header>
        <div class="panel-body">
            <table class="table table-no-more table-bordered table-striped mb-none">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Country</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th class="hidden-xs hidden-sm">Created</th>
                    <th class="text-right">Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($properties as $key=> $property)

                    <tr>
                        <td data-title="Id">{{$property->id}}</td>
                        <td data-title="Name" >{{$property->name}}</td>
                        <td data-title="Name" >{{$property->country->name}}</td>
                        <td data-title="Name" >{{$property->address}}</td>
                        <td data-title="Name" >@if($property->is_active) Active @else Inactive @endif</td>
                        <td data-title="Created">{{date('d-M-Y',strtotime($property->created_at))}}</td>
                        <td data-title="Actions" class="text-right actions">
                            {!! Form::model($property,['method' => 'DELETE', 'action' => ['PropertyController@destroy', $property->id ], 'id'=>'frmdeletproperty_'.$property->id ]) !!}
                            <button class="delete-row" type="button" onclick="deleteProperty('{{$property->id}}')"><i class="fa fa-trash-o"></i></button>
                            {!! Form::close() !!}
                            <a href="{{route('properties.edit',$property->id)}}" class=""><i class="fa fa-pencil"></i></a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>

        <div class="pull-right">{{ $properties->links() }}</div>
    </section>
    <!-- end: page -->


@endsection

@section('scripts')

    <script>
        function deleteProperty(property_id){

            var status= confirm('Are you sure want to delete this property?');
            if(status == true){

                event.preventDefault();
                document.getElementById('frmdeletproperty_'+property_id).submit();
                return true;
            }else{
                return false;
            }


        }

    </script>

@endsection
