@extends('layouts.admin')

@section('content')

    <header class="page-header">
        <h2>Banner</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="javascript:void(0);">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Banner </span></li>

            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"></a>
        </div>
    </header>

    <!-- start: page -->
    {!! Form::model($banner,['method' => 'PATCH', 'action' => ['BannerController@update', $banner->id ],'class'=>'form-horizontal form-bordered','files'=>true ]) !!}
    {{csrf_field()}}
    <div class="row">
        <div class="col-md-12">

            <section class="panel">
                <header class="panel-heading">

                    <h2 class="panel-title">Banner</h2>

                </header>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-10">

                            <div class="form-group @if ($errors->has('title')) has-error  @endif">
                                <label class="col-sm-4 control-label"> Title: <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="title" value="{{$banner->title}}">

                                    @if ($errors->has('title'))
                                        <label for="name" class="error">{{ $errors->first('title') }}</label>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group @if ($errors->has('sub_title')) has-error  @endif">
                                <label class="col-sm-4 control-label"> Sub Title: <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="sub_title" value="{{$banner->sub_title}}">

                                @if ($errors->has('sub_title'))
                                        <label for="sub_title" class="error">{{ $errors->first('sub_title') }}</label>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label"> Image: </label>
                                <div class="col-sm-6">
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
                                    <label for="sub_title" class="error">Image size is required (eg: 1200X628)</label>

                                </div>
                                <div class="col-sm-2">
                                    <img src="{{$banner->image_url}}" style="width: 300px;">
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-sm-4 control-label"> Active/Inactive:</label>
                                <div class="col-sm-8">
                                    <input type="checkbox" value="1" @if($banner->is_active) checked @endif name="is_active">
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
