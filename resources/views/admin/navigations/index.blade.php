@extends('layouts.admin')

@section('content')

    <header class="page-header">
        <h2>Manage Navigations</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="javascript:void(0);">
                        <i class="fa fa-home"></i>
                    </a>
                </li>

                <li><span>Navigations</span></li>
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

            <a href="{{route('navigations.create')}}" class="btn btn-primary pull-right">Create Navigation</a>
            <h2 class="panel-title">Manage Navigations</h2>
        </header>
        <div class="panel-body">
            <table class="table table-no-more table-bordered table-striped mb-none">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>URL Name</th>
                    <th>Status</th>
                    <th>Sort Order</th>
                    <th class="hidden-xs hidden-sm">Created</th>
                    <th class="text-right">Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($navigations as $key=> $nav)

                    <tr>
                        <td data-title="Id">{{$nav->id}}</td>
                        <td data-title="Name" >{{$nav->name}}</td>
                        <td data-title="Icon" >{{ucfirst($nav->nav_type)}}</td>
                        <td data-title="URL" >{{$nav->url}}</td>
                        <td>@if($nav->is_active) Active @else Inactive @endif</td>
                        <td>{{$nav->sort_order}}</td>
                        <td data-title="Created">{{date('d-M-Y',strtotime($nav->created_at))}}</td>
                        <td data-title="Actions" class="text-right actions">
                            {!! Form::model($nav,['method' => 'DELETE', 'action' => ['NavigationController@destroy', $nav->id ], 'id'=>'frmdeletenav_'.$nav->id ]) !!}
                            <button class="delete-row" type="button" onclick="deleteNav('{{$nav->id}}')"><i class="fa fa-trash-o"></i></button>
                            {!! Form::close() !!}
                            <a href="{{route('navigations.edit',$nav->id)}}" class=""><i class="fa fa-pencil"></i></a>
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
        function deleteNav(nav_id){

            var status= confirm('Are you sure want to delete this Navigation?');
            if(status == true){

                event.preventDefault();
                document.getElementById('frmdeletenav_'+nav_id).submit();
                return true;
            }else{
                return false;
            }


        }

    </script>

@endsection
