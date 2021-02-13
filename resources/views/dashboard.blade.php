@extends('layouts.app')
@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome {{ Auth::user()->name  }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in! Now, you can visit portal.') }}
                    <br><br>
                    <a href="/portal" class="btn btn-secondary"> Go to Portal</a>
                </div>
                
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="centralModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div id="sub-notification" class="modal-content">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12 text-center" id="icon">
                <h1><i class="fa fa-check-circle"></i></h1>
              </div>
              <div class="col-md-12 text-center" id="notification">
                <p>Thank you <b>{{auth()->user()->name}}</b> for signing up. For any queries, call us at +8801700000000</p>
                <button type="button" class="btn btn-danger btn-sm" id="submit" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
      </div>
  </div>
</div>
<br><br><br><br><br><br><br><br><br><br>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            @if (session()->has('modal'))
               $("#centralModal").modal("toggle");
            @endif
        });
    </script>
@endsection