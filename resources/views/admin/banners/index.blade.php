@extends('layouts.admin')

@section('content')

    <header class="page-header">
        <h2>Manage Banners</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="javascript:void(0);">
                        <i class="fa fa-home"></i>
                    </a>
                </li>

                <li><span>Banners</span></li>
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

            <a href="{{route('banners.create')}}" class="btn btn-primary pull-right">Create Banner</a>
            <h2 class="panel-title">Manage Banners</h2>
        </header>
        <div class="panel-body">
            <table class="table table-no-more table-bordered table-striped mb-none">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Title</th>
                    <th>Sub Title</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th class="hidden-xs hidden-sm">Created</th>
                    <th class="text-right">Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($banners as $key=> $banner)

                    <tr>
                        <td data-title="Id" width="5%">{{$banner->id}}</td>
                        <td data-title="Name"  width="20%">{{$banner->title}}</td>
                        <td data-title="Description" >{{$banner->sub_title}}</td>
                        <td data-title="Type" >{{ucfirst($banner->banner_type)}}</td>
                        <td data-title="URL" width="10%">@if($banner->is_active) Active @else Inactive @endif </td>
                        <td data-title="Created" width="10%">{{date('d-M-Y',strtotime($banner->created_at))}}</td>
                        <td data-title="Actions" class="text-right actions">
                            {!! Form::model($banner,['method' => 'DELETE', 'action' => ['BannerController@destroy', $banner->id ], 'id'=>'frmdeletbanner_'.$banner->id ]) !!}
                            <button class="delete-row" type="button" onclick="deleteBanner('{{$banner->id}}')"><i class="fa fa-trash-o"></i></button>
                            {!! Form::close() !!}
                            <a href="{{route('banners.edit',$banner->id)}}" class=""><i class="fa fa-pencil"></i></a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>

    </section>
    <!-- end: page -->


@endsection

@section('scripts')

    <script>
        function deleteBanner(b_id){

            var status= confirm('Are you sure want to delete this Banner?');
            if(status == true){

                event.preventDefault();
                document.getElementById('frmdeletbanner_'+b_id).submit();
                return true;
            }else{
                return false;
            }


        }

    </script>

@endsection
