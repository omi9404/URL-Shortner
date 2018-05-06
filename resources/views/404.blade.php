@extends('layouts.app')
@section('content')
<!--Url Shotrtender container starts here-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 margin-top-3-per">
            <div class="card text-align-center">
                <h2>404</h2>
				<p>The page you are looking for doesn not exist.</p>
				
				<a href="{{URL::to('/')}}">Please click here for go back to the homepage</a>
            </div>
        </div>
    </div>
@endsection