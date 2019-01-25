@extends('layouts.admin')

@section('content')

    <header class="page-header">
        <h2>Country</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="javascript:void(0);">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Country </span></li>

            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"></a>
        </div>
    </header>

    <!-- start: page -->
    {!! Form::model($client,['method' => 'PATCH', 'action' => ['ClientController@update', $client->id ],'class'=>'form-horizontal form-bordered','files'=>true ]) !!}
    {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">

                <section class="panel">
                    <header class="panel-heading">

                        <h2 class="panel-title">Country</h2>

                    </header>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-10">

                                <div class="form-group @if ($errors->has('name')) has-error  @endif">
                                    <label class="col-sm-4 control-label"> Country Name: <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="name" value="{{$client->name}}">

                                        @if ($errors->has('name'))
                                            <label for="name" class="error">{{ $errors->first('name') }}</label>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group @if ($errors->has('description')) has-error  @endif">
                                    <label class="col-sm-4 control-label"> Description: <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <textarea rows="4" class="form-control" name="description">{{$client->description}}</textarea>

                                    @if ($errors->has('description'))
                                            <label for="description" class="error">{{ $errors->first('description') }}</label>
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
																<input type="file" name="country_flag" />
															</span>
                                                <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                            </div>
                                        </div>
                                        <label for="sub_title" class="error">Image size is required (116X75) in px</label>

                                    </div>
                                    <div class="col-sm-2">
                                        <img src="{{$client->country_flag}}">
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
