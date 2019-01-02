@extends('layouts.admin')

@section('content')

    <header class="page-header">
        <h2>Manage Social Media</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="javascript:void(0);">
                        <i class="fa fa-home"></i>
                    </a>
                </li>

                <li><span>Social Media</span></li>
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

            <a href="{{route('social_media.create')}}" class="btn btn-primary pull-right">Create Social Media</a>
            <h2 class="panel-title">Manage Social Media</h2>
        </header>
        <div class="panel-body">
            <table class="table table-no-more table-bordered table-striped mb-none">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Icon</th>
                    <th>URL</th>
                    <th class="hidden-xs hidden-sm">Created</th>
                    <th class="text-right">Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($social_media as $key=> $sm)

                    <tr>
                        <td data-title="Id">{{$sm->id}}</td>
                        <td data-title="Name" >{{$sm->name}}</td>
                        <td data-title="Icon" >{{$sm->icon}}</td>
                        <td data-title="URL" >{{$sm->url}}</td>
                        <td data-title="Created">{{date('d-M-Y',strtotime($sm->created_at))}}</td>
                        <td data-title="Actions" class="text-right actions">
                            {!! Form::model($sm,['method' => 'DELETE', 'action' => ['SocialMediaController@destroy', $sm->id ], 'id'=>'frmdeletmedia_'.$sm->id ]) !!}
                            <button class="delete-row" type="button" onclick="deleteSocialMedia('{{$sm->id}}')"><i class="fa fa-trash-o"></i></button>
                            {!! Form::close() !!}
                            <a href="{{route('social_media.edit',$sm->id)}}" class=""><i class="fa fa-pencil"></i></a>
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
        function deleteSocialMedia(sm_id){

            var status= confirm('Are you sure want to delete this Icon?');
            if(status == true){

                event.preventDefault();
                document.getElementById('frmdeletmedia_'+sm_id).submit();
                return true;
            }else{
                return false;
            }


        }

    </script>

@endsection
