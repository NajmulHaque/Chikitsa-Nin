@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <h4 class="text-center text-success font-weight-bold">{{$title}}</h4>
            <hr>
        </div>
    </div>
    <div class="row" style="justify-content: center">
        <div class="col-md-6 col-lg-6">
            <form action="{{ route('sample-request.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if (auth()->user())
                <div class="row">
                    <div class="col-lg-6">
                        <div>
                            <p>Your Name<span>*</span></p>
                            <input type="text" id="name" name="name" value="{{ auth()->user()->name }}" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <p>Your Email<span>*</span></p>
                            <input id="email" name="email" type="email" value="{{ auth()->user()->email }}"
                                readonly>
                        </div>
                    </div>
                </div>
                @endif
                <div class="row pt-3">
                    <div class="col-md-12 col-lg-12">
                        <h5>Do you want to request for collecting sample?</h5>
                        <p><span style="font-weight:bold; color: red; font-size: 15px">Write the reasons briefly here*</span></p>
                        <textarea name="sample_info" id="reason" cols="63" rows="5"></textarea>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-md-12 col-lg-12">
                        <button type="submit" class="btn btn-success btn-lg" style="float: right">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection