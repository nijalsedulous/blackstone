@extends('layouts.front')
@section('pageTitle', 'Properties')

@section('content')

    <div class="inner_title_bg">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>PROPERTIES LIST</h1>
                <div class="breadcrumbs"> <a href="/">Home</a>Properties List</div>
            </div>
        </div>
    </div>
    <section class="ptb8050">
        <div class="container">
            <div class="row search-area">
                <div class="col-lg-9 col-md-6 col-sm-6 col-xs-12"><div class="Country_sel">Select Country :</div></div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {{--<select class="selectpicker search-fields selectBox" name="location" >--}}
                            {{--<option v-model="">Select Location</option>--}}
                            {{--<option>United Kingdom</option>--}}
                            {{--<option>American Samoa</option>--}}
                            {{--<option>Belgium</option>--}}
                            {{--<option>Canada</option>--}}
                            {{--<option>Delaware</option>--}}
                        {{--</select>--}}

                        {!! Form::select('country_id', $countries, $selected_country, ['class'=>'selectpicker search-fields selectBox','placeholder' => 'Select Location','onchange'=>'filter_property(this)']); !!}

                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($properties as $property)
                    <?php $property_image =$property->property_images->first();

                    ?>
                     <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="property-box"> <a href="/property/{{$property->slug_name}}" class="property-img" >
                                    <div class="property-thumbnail"> <img class="d-block w-100" style="height:215px;" src="{{$property_image->image_path}}" alt="{{$property->name}}"> </div>
                                    <div class="property_detail">
                                        <h3 class="pro_name">{{$property->name}}</h3>
                                        <div class="location"><i class="fa fa-map-marker" aria-hidden="true"></i>{{$property->address}}</div>
                                        <p>{{$property->country->name}}</p>
                                    </div>
                                </a>
                            </div>
                </div>
                @endforeach

            </div>
            <div style="text-align: center">{{ $properties->links() }}</div>
        </div>
    </section>

@endsection

@section('scripts')

    <script type="text/javascript">


        function filter_property(obj){

            if(obj.value != ""){
                window.location.href = '/properties?country_id='+obj.value;
            }
        }

    </script>

@endsection