@extends('layouts.app')

@section('content')
        <div position="left">
        
        <h1><?php echo $title; ?></h1>
        <hr>
        <video width="420" height="340" controls>
                <source src="images/num1.mp4" type="video/mp4">
                <source src="images/num1.ogg" type="video/ogg">
        </video>
        <p>Using the app the user can - <br>
        Request for medical assistance. (Thus getting that sensor box and online medical assistance)<br>

        Do self test/ diagnosis. (sample collection at home, and getting result through app)<br>
                
        Get medicine delivery.<br>
                
        Report any kind of inconveniences of the services.</p>
        </div>
@endsection
