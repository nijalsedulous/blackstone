@extends('layouts.admin')

@section('content')

    <header class="page-header">
        <h2>{{ucfirst($profile->user_type)}} Profile</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="javascript:void(0);">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Profile</span></li>
                <li><span>{{$profile->name}}</span></li>
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
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">


                    <h2 class="panel-title">{{$profile->name}}</h2>
                </header>
                <div class="panel-body">
                   {{Form::open(['url' => 'admin/profile/'.$profile->id, 'method' => 'put'])}}
                        {{csrf_field()}}



                    <div class="form-group @if ($errors->has('first_name')) has-error  @endif">
                        <label class="col-md-3 control-label" for="inputDefault">First Name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{$profile->profile->first_name}}">
                            @if ($errors->has('first_name'))
                                <label for="first_name" class="error">{{ $errors->first('first_name') }}</label>
                            @endif
                        </div>
                    </div>

                    <div class="form-group @if ($errors->has('last_name')) has-error  @endif">
                        <label class="col-md-3 control-label" for="inputDefault">Last Name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{$profile->profile->last_name}}">
                            @if ($errors->has('last_name'))
                                <label for="last_name" class="error">{{ $errors->first('last_name') }}</label>
                            @endif
                        </div>
                    </div>

                    <div class="form-group  @if ($errors->has('email')) has-error  @endif">
                        <label class="col-md-3 control-label" for="inputDefault">Email</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="email" name="email" value="{{$profile->email}}">
                            @if ($errors->has('email'))
                                <label for="email" class="error">{{ $errors->first('email') }}</label>
                            @endif
                        </div>
                    </div>

                    <div class="form-group @if ($errors->has('phone')) has-error  @endif">
                        <label class="col-md-3 control-label" for="inputDefault">Phone</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="phone" name="phone" value="{{$profile->profile->phone}}">
                            @if ($errors->has('phone'))
                                <label for="phone" class="error">{{ $errors->first('phone') }}</label>
                            @endif
                        </div>
                    </div>



                    <div class="form-group @if ($errors->has('address')) has-error  @endif">
                        <label class="col-md-3 control-label" for="inputDefault">Address</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="address" name="address" value="{{$profile->profile->address}}">
                            @if ($errors->has('address'))
                                <label for="address" class="error">{{ $errors->first('address') }}</label>
                            @endif
                        </div>
                    </div>

                    <div class="form-group @if ($errors->has('country_id')) has-error  @endif">
                        <label class="col-md-3 control-label" for="inputDefault">Country</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="state_id" name="country" value="{{$profile->profile->country}}">

                        @if ($errors->has('country_id'))
                                <label for="country_id" class="error">{{ $errors->first('country_id') }}</label>
                            @endif
                        </div>
                    </div>

                    <div class="form-group @if ($errors->has('state_id')) has-error  @endif">
                        <label class="col-md-3 control-label" for="inputDefault">State</label>
                        <div class="col-md-6">


                            <input type="text" class="form-control" id="state_id" name="state" value="{{$profile->profile->state}}">

                        @if ($errors->has('state_id'))
                                <label for="state_id" class="error">{{ $errors->first('state_id') }}</label>
                            @endif
                        </div>
                    </div>


                    <div class="form-group @if ($errors->has('city_id')) has-error  @endif">
                        <label class="col-md-3 control-label" for="inputDefault">City</label>
                        <div class="col-md-6">


                            <input type="text" class="form-control" id="city_id" name="city" value="{{$profile->profile->city}}">

                        @if ($errors->has('city_id'))
                                <label for="city_id" class="error">{{ $errors->first('city_id') }}</label>
                            @endif
                        </div>
                    </div>


                    <br>


                    <footer class="panel-footer center">
                        <button class="btn btn-primary">Save</button>
                    </footer>
                    </form>

                </div>


            </section>


        </div>
    </div>


    <!-- end: page -->

@endsection

@section('scripts')

    <script type="text/javascript">

        jQuery(document).ready(function($) {

        });



    </script>

@endsection
