@extends('layouts.admin')

@section('content')

    <header class="page-header">
        <h2>Settings</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="javascript:void(0);">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Settings </span></li>

            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"></a>
        </div>
    </header>

    @if (Session::has('message'))
        <div class="alert alert-success">
            <strong> {{ Session::get('message') }}</strong>
        </div>
    @endif

    <!-- start: page -->
    {!! Form::model($setting,['method' => 'PATCH', 'action' => ['SettingController@update', $setting->id ],'files' => true ]) !!}
        {{csrf_field()}}

        <div class="row">
            <div class="col-md-12">

                <section class="panel">
                    <header class="panel-heading">

                        <h2 class="panel-title">Setting</h2>

                    </header>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">


                                <div class="form-group @if ($errors->has('site_name')) has-error  @endif">
                                    <label class="col-sm-4 control-label">Site Name:<span class="text-danger">*</span> </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="site_name" value="{{$setting->site_name}}">

                                        @if ($errors->has('site_name'))
                                            <label for="site_name" class="error">{{ $errors->first('site_name') }}</label>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group @if ($errors->has('site_url')) has-error  @endif">
                                    <label class="col-sm-4 control-label"> Site URL:<span class="text-danger">*</span> </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="site_url" value="{{$setting->site_url}}">

                                        @if ($errors->has('address'))
                                            <label for="name" class="error">{{ $errors->first('site_url') }}</label>
                                        @endif
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label class="col-sm-4 control-label"> Address: </label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" rows="3" id="address" name="address">{{$setting->address}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label"> Phone1: </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="phone1" value="{{$setting->phone1}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label"> Phone2: </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="phone2" value="{{$setting->phone2}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label"> Business Email: </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="busniess_email" value="{{$setting->busniess_email}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label"> Service Title: </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="service_title" value="{{$setting->service_title}}">
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Meta Title:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="meta_title" value="{{$setting->meta_title}}">

                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class="col-sm-4 control-label"> Meta Description: </label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" rows="5" id="meta_description" name="meta_description">{{$setting->meta_description}}</textarea>

                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class="col-sm-4 control-label"> Site Description:</label>
                                    <div class="col-sm-8">

                                        <textarea class="form-control" rows="5" id="site_description" name="site_description">{{$setting->site_description}}</textarea>

                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class="col-sm-4 control-label"> Copyrights:</label>
                                    <div class="col-sm-8">

                                        <textarea class="form-control" rows="5" id="copyrights" name="copyrights">{{$setting->copyrights}}</textarea>

                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <section class="panel">
                                    <header class="panel-heading">

                                        <h2 class="panel-title">Site Logo</h2>
                                    </header>
                                    <div class="panel-body">
                                       <div class="row">
                                           <div class="col-md-6">

                                               <div class="form-group">
                                                   <label class="col-sm-4 control-label"> Logo: </label>
                                                   <div class="col-sm-8">
                                                       <div class="fileupload fileupload-new" data-provides="fileupload">
                                                           <div class="input-append">
                                                               <div class="uneditable-input">
                                                                   <i class="fa fa-file fileupload-exists"></i>
                                                                   <span class="fileupload-preview"></span>
                                                               </div>
                                                               <span class="btn btn-default btn-file">
																<span class="fileupload-exists">Change</span>
																<span class="fileupload-new">Logo </span>
																<input type="file" name="site_logo" />
															</span>
                                                               <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>

                                           </div>

                                           <div class="col-md-6">
                                            @if(!empty($setting->logo))
                                                <div style="background-color: #0a0a0a;">
                                                <img src="{{$setting->logo}}" >
                                                </div>
                                            @endif
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

                                        <h2 class="panel-title">Google Map</h2>
                                    </header>
                                    <div class="panel-body">

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Code</label>
                                            <div class="col-md-9">
                                                <textarea class="" name="google_map" rows="10" cols="100">{{$setting->google_map}}</textarea>
                                            </div>
                                        </div>

                                    </div>
                                </section>
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
