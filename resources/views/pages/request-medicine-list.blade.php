@extends('layouts.app')
@section('styles')
<style>
    #request-headline h3{ 
        text-align: center;
        box-shadow: 0 1px 7px 0;
        padding: 10px;
        font-size: 20px;
        color: darkgreen;
    }
</style>
@endsection

@section('content')
<div class="container pb-5">
    <div class="row" style="justify-content: center">
        <div class="col-md-6 col-lg-6 p-5 text-success" id="request-headline">
            <h3>Patient Request Medicine List</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Patient Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Pharmacy Name</th>
                        <th>Pharmacy Address</th>
                        <th>Request Info</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pharmacies as $pharmacy)
                    <tr>
                        <td>{{$pharmacy->patient_name}}</td>
                        <td>{{$pharmacy->email}}</td>
                        <td>{{$pharmacy->phone}}</td>
                        <td>{{$pharmacy->name}}</td>
                        <td>{{$pharmacy->address}}</td>
                        <td>{{$pharmacy->reason}}</td>
                    </tr>
                    @empty
                        <div>No data found</div>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@endsection