@extends('layouts.admin')

@section('content')

    <header class="page-header">
        <h2>Manage Blogs</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="javascript:void(0);">
                        <i class="fa fa-home"></i>
                    </a>
                </li>

                <li><span>Blogs</span></li>
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

            <a href="{{route('blogs.create')}}" class="btn btn-primary pull-right">Create Blog</a>
            <h2 class="panel-title">Manage Blogs</h2>
        </header>
        <div class="panel-body">
            <table class="table table-no-more table-bordered table-striped mb-none">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th class="hidden-xs hidden-sm">Created</th>
                    <th class="text-right">Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($blogs as $key=> $blog)

                    <tr>
                        <td data-title="Id">{{$blog->id}}</td>
                        <td data-title="Name" >{{$blog->category->name}}</td>
                        <td data-title="Icon" >{{$blog->title}}</td>
                        <td data-title="URL" >{!! $blog->description !!}</td>
                        <td data-title="Created">{{date('d-M-Y',strtotime($blog->created_at))}}</td>
                        <td data-title="Actions" class="text-right actions">
                            {!! Form::model($blog,['method' => 'DELETE', 'action' => ['BlogController@destroy', $blog->id ], 'id'=>'frmdeletblog_'.$blog->id ]) !!}
                            <button class="delete-row" type="button" onclick="deleteBlog('{{$blog->id}}')"><i class="fa fa-trash-o"></i></button>
                            {!! Form::close() !!}
                            <a href="{{route('blogs.edit',$blog->id)}}" class=""><i class="fa fa-pencil"></i></a>
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
        function deleteBlog(b_id){

            var status= confirm('Are you sure want to delete this Blog?');
            if(status == true){

                event.preventDefault();
                document.getElementById('frmdeletblog_'+b_id).submit();
                return true;
            }else{
                return false;
            }


        }

    </script>

@endsection
