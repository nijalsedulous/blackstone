@extends('layouts.admin')

@section('content')

    <header class="page-header">
        <h2>Property</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="javascript:void(0);">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Property </span></li>
                <li><span>Create</span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"></a>
        </div>
    </header>

    <!-- start: page -->
    <form id="frmproperty" action="{{route('properties.store')}}" class="form-horizontal form-bordered" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}

        <div class="row">
            <div class="col-md-12">

                <section class="panel">
                    <header class="panel-heading">

                        <h2 class="panel-title">Property</h2>

                    </header>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group @if ($errors->has('country_id')) has-error  @endif">
                                    <label class="col-sm-4 control-label">Country:<span class="text-danger">*</span> </label>
                                    <div class="col-sm-8">
                                        {!! Form::select('country_id', $countries, old('country_id'), ['class'=>'form-control mb-md','placeholder' => 'Select Country']); !!}

                                        @if ($errors->has('name'))
                                            <label for="name" class="error">{{ $errors->first('country_id') }}</label>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group @if ($errors->has('name')) has-error  @endif">
                                    <label class="col-sm-4 control-label"> Name:<span class="text-danger">*</span> </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="name" value="{{old('name')}}">

                                        @if ($errors->has('name'))
                                            <label for="name" class="error">{{ $errors->first('name') }}</label>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group @if ($errors->has('address')) has-error  @endif">
                                    <label class="col-sm-4 control-label"> Address:<span class="text-danger">*</span> </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="address" value="{{old('address')}}">

                                        @if ($errors->has('address'))
                                            <label for="name" class="error">{{ $errors->first('address') }}</label>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label"> Property PDF: </label>
                                    <div class="col-sm-8">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="input-append">
                                                <div class="uneditable-input">
                                                    <i class="fa fa-file fileupload-exists"></i>
                                                    <span class="fileupload-preview"></span>
                                                </div>
                                                <span class="btn btn-default btn-file">
																<span class="fileupload-exists">Change</span>
																<span class="fileupload-new">Select PDF </span>
																<input type="file" name="properpty_pdf" />
															</span>
                                                <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label"> Video Url: </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="video_url" value="{{old('video_url')}}">
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Meta Title:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="meta_title" value="{{old('meta_title')}}">

                                   </div>
                                </div>

                                <div class="form-group ">
                                    <label class="col-sm-4 control-label"> Meta Description: </label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" rows="5" id="meta_description" name="meta_description"></textarea>

                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class="col-sm-4 control-label"> Active/Inactive:</label>
                                    <div class="col-sm-8">
                                        <input type="checkbox" value="1" checked name="is_active">
                                    </div>
                                </div>


                                <div class="form-group" id="imageElement">
                                    <label class="col-sm-4 control-label">Banner Image:<span class="text-danger">*</span></label>
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
																<input type="file" name="banner_image" />
															</span>
                                                <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                            </div>
                                        </div>
                                        <label for="sub_title" class="error">Image size is required (1906X726) in px</label>

                                    </div>
                                </div >


                            </div>
                        </div>

                    </div>

                </section>

            </div>

        </div>

        <div class="row">
            <div class="col-xs-12">
                <section class="panel">
                    <header class="panel-heading">

                        <h2 class="panel-title">Property Description</h2>
                    </header>
                    <div class="panel-body">

                            <div class="form-group">
                                <label class="col-md-3 control-label">Descirption</label>
                                <div class="col-md-9">
                                    <textarea class="summernote" name="property_description" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'>{{old('property_description')}}</textarea>
                                </div>
                            </div>

                    </div>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">


                <section class="panel">
                    <header class="panel-heading">

                        <h2 class="panel-title">Property Images <small class="text-danger">Image size is required (635X350) in px</small></h2>


                    </header>
                    <div class="panel-body">
                        <div class="input-group control-group increment" >
                            <input type="file" name="images_name[]" class="form-control">
                            <div class="input-group-btn">
                                <button class="btn btn-success" type="button"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="clone hide">
                            <div class="control-group input-group" style="margin-top:10px">
                                <input type="file" name="images_name[]" class="form-control">
                                <div class="input-group-btn">
                                    <button class="btn btn-danger" type="button"><i class="fa fa-times"></i> </button>
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


            $(".btn-success").click(function(){
                var html = $(".clone").html();
                $(".increment").after(html);
            });

            $("body").on("click",".btn-danger",function(){
                $(this).parents(".control-group").remove();
            });

        });



    </script>

@endsection
