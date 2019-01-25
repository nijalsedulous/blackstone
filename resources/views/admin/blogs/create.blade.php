@extends('layouts.admin')

@section('content')

    <header class="page-header">
        <h2>Blog</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="javascript:void(0);">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Blog </span></li>
                <li><span>Create</span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"></a>
        </div>
    </header>

    <!-- start: page -->
    <form id="frmcourier" action="{{route('blogs.store')}}" class="form-horizontal form-bordered" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}

        <div class="row">
            <div class="col-md-12">

                <section class="panel">
                    <header class="panel-heading">

                        <h2 class="panel-title">Blog</h2>

                    </header>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-10">


                                <div class="form-group @if ($errors->has('category_id')) has-error  @endif">
                                    <label class="col-sm-4 control-label"> Category: <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                    {!! Form::select('category_id', $categories, old('category_id'), ['class'=>'form-control mb-md','placeholder' => 'Select Category']); !!}

                                    @if ($errors->has('category_id'))
                                            <label for="category_id" class="error">{{ $errors->first('category_id') }}</label>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group @if ($errors->has('title')) has-error  @endif">
                                    <label class="col-sm-4 control-label"> Title: <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="title" value="{{old('title')}}">

                                        @if ($errors->has('title'))
                                            <label for="title" class="error">{{ $errors->first('title') }}</label>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label"> Image: </label>
                                    <div class="col-sm-8">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="input-append">
                                                <div class="uneditable-input">
                                                    <i class="fa fa-file fileupload-exists"></i>
                                                    <span class="fileupload-preview"></span>
                                                </div>
                                                <span class="btn btn-default btn-file">
																<span class="fileupload-exists">Change</span>
																<span class="fileupload-new">Select Image </span>
																<input type="file" name="blog_image" />
															</span>
                                                <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                            </div>
                                        </div>
                                        <label for="sub_title" class="error">Image size is required (800X500) in px</label>

                                    </div>
                                </div>

                                <div class="form-group @if ($errors->has('description')) has-error  @endif">
                                    <label class="col-sm-4 control-label"> Description: <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <textarea class="summernote" name="description" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'>{{old('description')}}</textarea>


                                    @if ($errors->has('description'))
                                            <label for="description" class="error">{{ $errors->first('description') }}</label>
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
