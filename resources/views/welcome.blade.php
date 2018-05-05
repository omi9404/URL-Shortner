@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Url Shotrtender</div>

                <div class="card-body">
                    <form action="/url">
                      <div class="form-group">
                        <label for="email">Enter Url:</label>
                        <input type="url" class="form-control" id="url">
                      </div>
                      
                      <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
