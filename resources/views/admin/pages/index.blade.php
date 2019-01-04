@extends('layouts.admin')

@section('content')

    <header class="page-header">
        <h2>Manage Pages</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="javascript:void(0);">
                        <i class="fa fa-home"></i>
                    </a>
                </li>

                <li><span>Pages</span></li>
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

            <a href="{{route('pages.create')}}" class="btn btn-primary pull-right">Create Page</a>
            <h2 class="panel-title">Manage Blogs</h2>
        </header>
        <div class="panel-body">
            <table class="table table-no-more table-bordered table-striped mb-none">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Meta Title</th>
                    <th>Meta Description</th>
                    <th class="hidden-xs hidden-sm">Created</th>
                    <th class="text-right">Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($pages as $key=> $page)

                    <tr>
                        <td data-title="Id">{{$page->id}}</td>
                        <td data-title="Name" >{{$page->name}}</td>
                        <td data-title="Icon" >{{$page->meta_title}}</td>
                        <td data-title="URL" >{!! $page->meta_description !!}</td>
                        <td data-title="Created">{{date('d-M-Y',strtotime($page->created_at))}}</td>
                        <td data-title="Actions" class="text-right actions">
                            {!! Form::model($page,['method' => 'DELETE', 'action' => ['AdminPageController@destroy', $page->id ], 'id'=>'frmdeletpage_'.$page->id ]) !!}
                            <button class="delete-row" type="button" onclick="deletePage('{{$page->id}}')"><i class="fa fa-trash-o"></i></button>
                            {!! Form::close() !!}
                            <a href="{{route('pages.edit',$page->id)}}" class=""><i class="fa fa-pencil"></i></a>
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
        function deletePage(p_id){

            var status= confirm('Are you sure want to delete this Page?');
            if(status == true){

                event.preventDefault();
                document.getElementById('frmdeletpage_'+p_id).submit();
                return true;
            }else{
                return false;
            }


        }

    </script>

@endsection
