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
            <h3>Patient Request Sample List</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Patient ID</th>
                        <th>Patient Name</th>
                        <th>Patient Email</th>
                        <th>Sample Info</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($request_samples as $request_sample)
                    <tr>
                        <td>{{$request_sample->id}}</td>
                        <td>{{$request_sample->name}}</td>
                        <td>{{$request_sample->email}}</td>
                        <td>{{$request_sample->sample_info}}</td>
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