@extends('layouts.admin')

@section('content')

    <header class="page-header">
        <h2>Navigation</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="javascript:void(0);">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Navigation</span></li>
                <li><span></span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"></a>
        </div>
    </header>

    <!-- start: page -->
    {!! Form::model($navigation,['method' => 'PATCH', 'action' => ['NavigationController@update', $navigation->id ] ]) !!}

    {{csrf_field()}}

        <div class="row">
            <div class="col-md-12">

                <section class="panel">
                    <header class="panel-heading">

                        <h2 class="panel-title">Navigation</h2>

                    </header>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="inputSuccess">Nav Type: <span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <label class="checkbox-inline">
                                            <input type="radio" id="inlineCheckbox1" @if($navigation->nav_type == 'header') checked @endif name="nav_type" value="header"> Header
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="radio" id="inlineCheckbox2" @if($navigation->nav_type == 'footer') checked @endif  name="nav_type" value="footer"> Footer
                                        </label>

                                    </div>
                                </div>

                                <div class="form-group @if ($errors->has('name')) has-error  @endif">
                                    <label class="col-sm-4 control-label"> Name: <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="name" value="{{$navigation->name}}">

                                        @if ($errors->has('name'))
                                            <label for="name" class="error">{{ $errors->first('name') }}</label>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group @if ($errors->has('url')) has-error  @endif">
                                    <label class="col-sm-4 control-label"> URL Name: <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="url" value="{{$navigation->url}}">

                                        @if ($errors->has('url'))
                                            <label for="name" class="error">{{ $errors->first('url') }}</label>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label"> Active/Inactive: </label>
                                    <div class="col-sm-8">
                                        <input type="checkbox" value="1" @if($navigation->is_active) checked @endif name="is_active">
                                    </div>
                                </div>

                                <div class="form-group @if ($errors->has('sort_order')) has-error  @endif">
                                    <label class="col-sm-4 control-label"> Sort Order: <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="number" min="1" class="form-control" name="sort_order" value="{{$navigation->sort_order}}">

                                        @if ($errors->has('sort_order'))
                                            <label for="sort_order" class="error">{{ $errors->first('sort_order') }}</label>
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
