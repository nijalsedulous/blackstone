@extends('layouts.admin')

@section('content')

    <header class="page-header">
        <h2>Page</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="javascript:void(0);">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Page </span></li>
                <li><span>Create</span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"></a>
        </div>
    </header>

    <!-- start: page -->
    <form id="frmcourier" action="{{route('pages.store')}}" class="form-horizontal form-bordered" method="POST">
        {{csrf_field()}}

        <div class="row">
            <div class="col-md-12">

                <section class="panel">
                    <header class="panel-heading">

                        <h2 class="panel-title">Page</h2>

                    </header>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group @if ($errors->has('name')) has-error  @endif">
                                    <label class="col-sm-4 control-label"> Name: <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="name" value="{{old('name')}}">

                                        @if ($errors->has('name'))
                                            <label for="name" class="error">{{ $errors->first('name') }}</label>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group ">
                                    <label class="col-sm-4 control-label"> Meta Title:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="meta_title" value="{{old('meta_title')}}">


                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label"> Meta Description:</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" rows="5" id="meta_description" name="meta_description">{{old('meta_description')}}</textarea>


                                    </div>
                                </div>

                                <div class="form-group @if ($errors->has('content')) has-error  @endif">
                                    <label class="col-sm-4 control-label"> Content: <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <textarea class="summernote" name="content" data-plugin-summernote data-plugin-options='{ "height": 300, "codemirror": { "theme": "ambiance" } }'>{{old('content')}}</textarea>


                                    @if ($errors->has('content'))
                                            <label for="content" class="error">{{ $errors->first('content') }}</label>
                                        @endif
                                    </div>
                                </div>



                            </div>
                        </div>

                    </div>

                </section>

            </div>

        </div>


        <footer class="panel-footer ">
            <div class="row">
                <div class="col-sm-9 col-sm-offset-3">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </div>

        </footer>
    </form>


    <!-- end: page -->

@endsection

@section('scripts')

    <script type="text/javascript">

        jQuery(document).ready(function($) {

        });



    </script>

@endsection
