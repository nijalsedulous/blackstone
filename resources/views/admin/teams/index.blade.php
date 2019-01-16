@extends('layouts.admin')

@section('content')

    <header class="page-header">
        <h2>Manage Teams</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="javascript:void(0);">
                        <i class="fa fa-home"></i>
                    </a>
                </li>

                <li><span>Teams</span></li>
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

            <a href="{{route('teams.create')}}" class="btn btn-primary pull-right">Create Team</a>
            <h2 class="panel-title">Manage Team</h2>
        </header>
        <div class="panel-body">
            <table class="table table-no-more table-bordered table-striped mb-none">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Image</th>
                    <th class="hidden-xs hidden-sm">Created</th>
                    <th class="text-right">Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($teams as $key=> $team)

                    <tr>
                        <td data-title="Id" width="5%">{{$team->id}}</td>
                        <td data-title="Name"  width="20%">{{$team->name}}</td>
                        <td data-title="Description" >{{$team->position}}</td>
                        <td data-title="URL" width="10%"><img src="{{$team->image_url}}" style="width: 100px;"> </td>
                        <td data-title="Created" width="10%">{{date('d-M-Y',strtotime($team->created_at))}}</td>
                        <td data-title="Actions" class="text-right actions">
                            {!! Form::model($team,['method' => 'DELETE', 'action' => ['TeamController@destroy', $team->id ], 'id'=>'frmdeletteam_'.$team->id ]) !!}
                            <button class="delete-row" type="button" onclick="deleteTeam('{{$team->id}}')"><i class="fa fa-trash-o"></i></button>
                            {!! Form::close() !!}
                            <a href="{{route('teams.edit',$team->id)}}" class=""><i class="fa fa-pencil"></i></a>
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
        function deleteTeam(t_id){

            var status= confirm('Are you sure want to delete this Team?');
            if(status == true){

                event.preventDefault();
                document.getElementById('frmdeletteam_'+t_id).submit();
                return true;
            }else{
                return false;
            }


        }

    </script>

@endsection
