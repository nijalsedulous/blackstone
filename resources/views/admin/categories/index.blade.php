@extends('layouts.admin')

@section('content')

    <header class="page-header">
        <h2>Manage Blog Categories</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="javascript:void(0);">
                        <i class="fa fa-home"></i>
                    </a>
                </li>

                <li><span>Blog Categories</span></li>
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

            <a href="{{route('categories.create')}}" class="btn btn-primary pull-right">Create Blog Category</a>
            <h2 class="panel-title">Manage Blog Categories</h2>
        </header>
        <div class="panel-body">
            <table class="table table-no-more table-bordered table-striped mb-none">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>

                    <th class="hidden-xs hidden-sm">Created</th>
                    <th class="text-right">Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($categories as $key=> $category)

                    <tr>
                        <td data-title="Id">{{$category->id}}</td>
                        <td data-title="Name" >{{$category->name}}</td>
                       
                        <td data-title="Created">{{date('d-M-Y',strtotime($category->created_at))}}</td>
                        <td data-title="Actions" class="text-right actions">
                            {!! Form::model($category,['method' => 'DELETE', 'action' => ['CategoryController@destroy', $category->id ], 'id'=>'frmdeletecategory_'.$category->id ]) !!}
                            <button class="delete-row" type="button" onclick="deleteCategory('{{$category->id}}')"><i class="fa fa-trash-o"></i></button>
                            {!! Form::close() !!}
                            <a href="{{route('categories.edit',$category->id)}}" class=""><i class="fa fa-pencil"></i></a>
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
        function deleteCategory(c_id){

            var status= confirm('Are you sure want to delete this Category?');
            if(status == true){

                event.preventDefault();
                document.getElementById('frmdeletecategory_'+c_id).submit();
                return true;
            }else{
                return false;
            }


        }

    </script>

@endsection
