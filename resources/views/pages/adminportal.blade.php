@extends('layouts.app')

@section('content')
        <br>
        <h1>{{$title}}</h1>
        <hr><br>
        <p><b>Check Request</b></p>
        <br><br>
        <ul type="button" class="list-group">
        <li type="button" style="width:60%" class="btn btn-block btn-info btn-lg" onclick="window.location.href='{{route('request-medical.list')}}'"> Request or Medical Assistant </li>
        <li type="button" style="width:60%" class="btn btn-block btn-primary btn-lg" onclick="window.location.href='{{route('request-sample.list')}}'"> Request for Sample Collection  </li>
        <li type="button" style="width:60%" class="btn btn-block btn-secondary btn-lg" onclick="window.location.href='{{route('request-medicine.list')}}'"> Request for Medicine Delivery </li>
        </ul>
        <br><br><br><br><br><br>
@endsection
