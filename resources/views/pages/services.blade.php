@extends('layouts.app')

@section('content')
        <br>
        <h1>{{$title}}</h1>
        <hr><br>
        <p><b>Select your choice</b></p>
        <br><br>
        <ul type="button" class="list-group">
        <li type="button" style="width:60%" class="btn btn-block btn-secondary btn-lg" onclick="window.location.href='/requestmedical'"> Request Medical Assistant </li>
        <li type="button" style="width:60%" class="btn btn-block btn-primary btn-lg" onclick="window.location.href='/samplecollection   '"> Sample Collection </li>
        <li type="button" style="width:60%" class="btn btn-block btn-success btn-lg" onclick="window.location.href='/medicinedelivery'"> Medicine Delivery </li>
        </ul>
        <br><br><br><br><br><br>
@endsection
