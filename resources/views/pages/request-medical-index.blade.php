@extends('layouts.app')
@section('styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    form input {
        width: 100%;
    }

    #sub-notification {
        background: linear-gradient(#242D66 50%, #fff 50%);
        font-size: 17px;
        padding: 4%;
        color: #333;
    }

    #sub-notification p {
        letter-spacing: 1px;
        font-weight: 600
    }

    #sub-notification .modal-footer {
        border: none;
    }

    #sub-notification .btn {
        border-radius: 10px;
        margin: 0 auto;
        margin-bottom: -4%;
    }

    div#notification {
        margin: 10% 0 0 0;
        padding-bottom: 0 !important;
    }
    #icon .fa{ font-weight: normal; font-size: 90px;color: #fff; }
</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <h3 class="text-center text-success font-weight-bold">Your Request to Admin</h3>
            <hr>
        </div>
    </div>
    <div class="row" style="justify-content: center">
        <div class="col-md-6 col-lg-6">
            <h5>Request details</h5>
            <form action="{{ route('requestmedical.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @foreach ($details as $item)
                @if (auth()->user())
                <div class="row">
                    <div class="col-lg-6">
                        <div>
                            <p>Your Name<span>*</span></p>
                            <input type="text" id="name" name="user-name" value="{{ auth()->user()->name }}" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <p>Your Email<span>*</span></p>
                            <input id="email" name="user-email" type="email" value="{{ auth()->user()->email }}"
                                readonly>
                        </div>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-md-12 col-lg-12">
                        <p><span>Type*</span></p>
                        <input type="text" name="type" value="{{$item->ctg_name}}" readonly>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-md-12 col-lg-12">
                        <p><span>{{$item->ctg_name}} Name*</span></p>
                        <input type="text" id="name" name="request_name" value="{{$item->name}} " readonly>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-md-12 col-lg-12">
                        <p><span>{{$item->ctg_name}} Address*</span></p>
                        <input type="text" id="name" name="request_address" value="{{$item->address}} " readonly>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-md-12 col-lg-12">
                        <p><span>{{$item->ctg_name}} Description*</span></p>
                        <input type="text" id="name" name="request_description" value="{{$item->description}} "
                            readonly>
                    </div>
                </div>
                @endif
                <div class="row pt-3">
                    <div class="col-md-12 col-lg-12">
                        <p><span style="font-weight:bold; color: red; font-size: 18px">Request Reason*</span></p>
                        <textarea name="request_reason" id="reason" cols="63" rows="5"></textarea>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-md-12 col-lg-12">
                        <button type="submit" class="btn btn-success btn-lg" style="float: right">Send</button>
                    </div>
                </div>
                @endforeach
            </form>
            <div class="modal fade" id="centralModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div id="sub-notification" class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 text-center" id="icon">
                                    <h1><i class="fa fa-check-circle"></i></h1>
                                </div>
                                <div class="col-md-12 text-center" id="notification">
                                    <p>Thank you for request. We will get back to you within 24 hours. For any
                                        queries, call us at +8801710000000</p>
                                    <button type="button" class="btn btn-danger btn-sm" id="submit"
                                        data-dismiss="modal">Okay</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-6 col-lg-6">
            @include('partials.map')
        </div> --}}
    </div>
</div>
@endsection
@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type='text/javascript'
    src='https://maps.google.com/maps/api/js?language=en&key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&region=GB'>
</script>
<script>
    $(document).ready(function () {
        @if (session()->has('modal'))
           $("#centralModal").modal("toggle");
        @endif
    });
</script>
{{-- <script defer>
    function initialize() {
		var mapOptions = {
			zoom: 12,
			minZoom: 4,
			maxZoom: 17,
			zoomControl:true,
			zoomControlOptions: {
  				style:google.maps.ZoomControlStyle.DEFAULT
			},
			center: new google.maps.LatLng({{ $latitude }}, {{ $longitude }}),
mapTypeId: google.maps.MapTypeId.ROADMAP,
scrollwheel: false,
panControl:false,
mapTypeControl:false,
scaleControl:false,
overviewMapControl:false,
rotateControl:false
}
var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
var image = new google.maps.MarkerImage("assets/images/pin.png", null, null, null, new google.maps.Size(40,52));
var places = @json($mapHospitals);

for(place in places)
{
place = places[place];
console.log(place.longitude);
if(place.latitude && place.longitude)
{
var marker = new google.maps.Marker({
position: new google.maps.LatLng(place.latitude, place.longitude),
icon:image,
map: map,
title: place.name
});
var infowindow = new google.maps.InfoWindow();
google.maps.event.addListener(marker, 'click', (function (marker, place) {
return function () {
infowindow.setContent(generateContent(place))
infowindow.open(map, marker);
}
})(marker, place));
}
}
}
google.maps.event.addDomListener(window, 'load', initialize);

function generateContent(place)
{
var content = `
<div class="gd-bubble" style="">
    <div class="gd-bubble-inside">
        <div class="geodir-bubble_desc">
            <div class="geodir-bubble_image">
                <div class="geodir-post-slider">
                    <div class="geodir-image-container geodir-image-sizes-medium_large ">
                        <div id="geodir_images_5de53f2a45254_189" class="geodir-image-wrapper" data-controlnav="1">
                            <ul class="geodir-post-image geodir-images clearfix">
                                <li>
                                    <div class="geodir-post-title">
                                        <h4 class="geodir-entry-title">
                                            <a
                                                href="{{ route('requestmedical.index', '') }}/`+place.id+`">`+place.name+`</a>
                                        </h4>
                                    </div>
                                    <a href="" class="align size-medium_large" width="1400" height="930"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="geodir-bubble-meta-side">
        <div class="geodir-output-location">
            <div class="geodir-output-location geodir-output-location-mapbubble">
                <div class="geodir_post_meta  geodir-field-post_title"><span
                        class="geodir_post_meta_icon geodir-i-text">
                        <i class="fas fa-minus" aria-hidden="true"></i>
                        <span class="geodir_post_meta_title">Place Title: </span></span>`+place.name+`</div>
                <div class="geodir_post_meta  geodir-field-address" itemscope=""
                    itemtype="http://schema.org/PostalAddress">
                    <span class="geodir_post_meta_icon geodir-i-address"><i class="fas fa-map-marker-alt"
                            aria-hidden="true"></i>
                        <span class="geodir_post_meta_title">Address: </span></span><span
                        itemprop="streetAddress">`+place.address+`</span>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>`;

return content;

}
</script> --}}
@endsection