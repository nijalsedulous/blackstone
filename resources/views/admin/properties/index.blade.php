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

    <section class="panel">
        <div class="panel-body">
            <form id="frmproperty" action="{{route('properties.search_property')}}" class="" method="POST" >
                {{csrf_field()}}
                <div class="row">


                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Property Name</label>
                            <?php $property_name ="";
                            if(isset($input_data) && isset($input_data['property_name'])){
                                $property_name = $input_data['property_name'];
                            }
                            ?>
                            <input type="text" name="property_name" class="form-control" value="{{$property_name}}">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Country</label>

                            <?php $country_id =null;
                            if(isset($input_data) && isset($input_data['country_id'])){
                                $country_id = $input_data['country_id'];
                            }
                            ?>
                            {{Form::select('country_id', $countries, $country_id, ['placeholder' => 'Select Conuntry','class'=>'form-control'])}}
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
