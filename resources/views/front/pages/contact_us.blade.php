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
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="row contact-2">
                        <div class="col-md-6">
                            <div class="form-group name">
                                <input type="text" name="name" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group email">
                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group subject">
                                <input type="text" name="subject" class="form-control" placeholder="Subject">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group number">
                                <input type="text" name="phone" class="form-control" placeholder="Number">
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
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <ul class="contact_box">
                        <li> <i class="fa fa-map-marker icon_round" aria-hidden="true"></i><span class="office_add">OFFICE ADDRESS</span> <br/>519, level 5. Standard Chartered Tower Emaar Square. Downtown Burj Khalifa Dubai. U.A.E.</li>
                        <li><i class="fa fa-envelope  icon_round" aria-hidden="true"></i><span class="office_add">PHONE NUMBER</span> <br/><a href="mailto:info@blackstone.com">info@blackstone.com</a> </li>
                        <li><i class="fa fa-phone  icon_round" aria-hidden="true"></i><span class="office_add">EMAIL ADDRESS</span> <br/><a href="tel:+971526282552">+ 971526282552</a> </li>

                    </ul>
                </div>
            </div>
        </div>
    </section>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d231281.63884529352!2d55.08766287470379!3d25.07559354644518!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f43496ad9c645%3A0xbde66e5084295162!2sDubai+-+United+Arab+Emirates!5e0!3m2!1sen!2sin!4v1543983888154" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

@endsection

@section('scripts')

    <script type="text/javascript">



    </script>

@endsection