@extends('layouts.front')
@section('pageTitle', 'Contact Us')

@section('content')

    <div class="inner_title_bg">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Contact us</h1>
                <div class="breadcrumbs"> <a href="/">Home</a>Contact us </div>
            </div>
        </div>
    </div>
    <section class="ptb80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="title_mrg">
                        <h2 class="title">Contact Us</h2>
                    </div>
                </div>
            </div>
            @if (Session::has('message'))
                <div class="alert alert-success">
                    <strong> {{ Session::get('message') }}</strong>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    {{Form::open(['url' => '/contact/save_contact', 'method' => 'post','id'=>'contactFrom'])}}
                    {{csrf_field()}}
                    <div class="row contact-2">
                        <div class="col-md-6">
                            <div class="form-group name">
                                <input type="text" name="name" class="form-control" placeholder="Name" >
                                @if ($errors->has('name'))
                                    <div class="text-danger">Name field is required.</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group email">
                                <input type="email" name="email" class="form-control" placeholder="Email" >
                                @if ($errors->has('email'))
                                    <div class="text-danger">Email field is required.</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group subject">
                                <input type="text" name="subject" class="form-control" placeholder="Subject" >
                                @if ($errors->has('subject'))
                                    <div class="text-danger">Subject field is required.</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group number">
                                <input type="text" name="phone" class="form-control" placeholder="Number" >
                                @if ($errors->has('phone'))
                                    <div class="text-danger">Phone field is required.</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group message">
                                <textarea class="form-control" name="message" placeholder="Write message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="send-btn text-center">
                                <button type="submit" class="btn_black">Send Message</button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <ul class="contact_box">
                        <li> <i class="fa fa-map-marker icon_round" aria-hidden="true"></i><span class="office_add">OFFICE ADDRESS</span> <br/>{!! $setting->address !!}</li>
                        <li><i class="fa fa-envelope  icon_round" aria-hidden="true"></i><span class="office_add"> EMAIL ADDRESS</span> <br/><a href="mailto:{!! $setting->busniess_email !!}">{!! $setting->busniess_email !!}</a> </li>
                        <li><i class="fa fa-phone  icon_round" aria-hidden="true"></i><span class="office_add">PHONE NUMBER</span> <br/><a href="tel:+{!! $setting->phone1 !!}">+ {!! $setting->phone1 !!}</a> </li>

                    </ul>
                </div>
            </div>
        </div>
    </section>
    {!! $setting->google_map !!}

@endsection

@section('scripts')

    <script type="text/javascript">

        jQuery(document).ready(function($) {


            $("#contactFrom").validate({
                rules: {
                    name: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    subject: "required",
                    phone: "required",

                },
                messages: {
                    name: "Please enter your name",
                    email: "Please enter a valid email address",
                    subject: "Please enter the subject",
                    phone: "Please enter the number"

                }
            });

        });
    </script>

@endsection