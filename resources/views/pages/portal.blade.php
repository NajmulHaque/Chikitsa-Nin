@extends('layouts.app')

@section('content')
        <br>
        <h1>{{$title}}</h1>
        <hr><br>
        <p><b>Select your portal</b></p>
        <br><br>
        <ul type="button" class="list-group">
           @if (auth()->user()->role_id == 1)
                <li type="button" style="width:60%" class="btn btn-block btn-secondary btn-lg" onclick="window.location.href='/adminportal'"> Admin Portal </li>
           @elseif (auth()->user()->role_id == 2)
                <li type="button" style="width:60%" class="btn btn-block btn-info btn-lg" onclick="window.location.href='/doctorportal'"> Doctor Portal </li>
           @else
                <li type="button" style="width:60%" class="btn btn-block btn-primary btn-lg" onclick="window.location.href='/services'"> Patient Portal </li>
           @endif
        </ul>
        <br><br><br><br><br><br>
@endsection
