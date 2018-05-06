@extends('layouts.app')
@section('content')
<!--Message container starts here-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" id="messageDiv">
                <div class="alert alert-danger alert-dismissible display-none" id="alertMessage">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Alert !</strong> Please input url to be shorten.
                </div>
               @if (session()->has('flash_notification.error'))
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  {!! session('flash_notification.error') !!}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!--Message container ends here-->
<!--Url Shotrtender container starts here-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 margin-top-3-per">
            <div class="card">
                <div class="card-header">Url Shotrtender</div>
                <div class="card-body">
                    <form action="/url" method="post">
                      <div class="form-group">
                        <label for="email">Enter Url:</label>
                        <input type="url" class="form-control" id="url" name="url">
                      </div> 
                      <button type="button" id="generateUrl"  class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!--Url Shotrtender container ends here-->
<!--Url Redirect container starts here-->
    <div class="row justify-content-center">
        <div class="col-md-8 margin-top-3-per">
            <div class="card">
                <div class="card-header">Url Redirect</div>
                <div class="card-body">
                    <form action="/url/create" method="get">
                    {{ csrf_field() }}
                      <div class="form-group">
                        <label for="email">Enter Url:</label>
                        <input type="url" class="form-control" id="shortendUrl" name="shortendUrl">
                      </div> 
                      <button type="submit" id="redirectToURL"  class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Url Redirect container ends here-->
<!--Top 100 Board container starts here-->
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8 margin-top-3-per">
            <div class="card">
                <div class="card-header">Top 100 Board</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Sr.No.</th>
                            <th>Website Url</th>
                            <th>Shortend Url</th>
                            <th>Total Hits</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if (count($urls) >= 1)
                            @foreach ($urls as $url)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$url->url}}</td>
                                    <td>{{$url->shortenurl}}</td>
                                    <td>{{$url->hits}}</td>
                                </tr>
                            @endforeach
                            @else
                            <tr>
                                <td></td>
                                <td colspan="2">No data found</td>
                                <td></td>
                            </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<!--Top 100 Board container ends here-->
<script>
/*Insert Url by Ajax starts here*/
$("#generateUrl").click(function(){
         var urlToBeShorten = $('#url').val();
         if(urlToBeShorten==''){
                $('#successMessage').hide();
                $('#messageContainer').show();
                $('#alertMessage').show();
         }else{
                $.ajax({
                        headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '/url',
                        datatType : 'json',
                        type: 'POST',
                        data: {
                            'url' : urlToBeShorten
                        },
                        cache: false,
                        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                        
                        success:function(response) {
                            $('#alertMessage').hide();
                            $(".alert-success").remove();
                            $("#messageDiv").append('<div class="alert alert-success alert-dismissible" id="successMessage"><button type="button" class="close" data-dismiss="alert">&times;</button><span id="returenedMessage">'+response+'</span></div>');
                            
                        }
                });
         }       
});
/*Insert Url by Ajax ends here*/          
</script>
@endsection
