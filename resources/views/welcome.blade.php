@extends('layouts.app')

@section('content')
<div class="container" id="messageContainer">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="alert alert-danger">
                    <strong>Alert !</strong> Please input url to be shorten.
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
</div>
<script>
$("#generateUrl").click(function(){
         var urlToBeShorten = $('#url').val();
         if(urlToBeShorten==''){
                $('#messageContainer').show();
                $('#messageContainer').delay(3000).fadeOut('slow');
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
                            alert(response);
                        }
                });
         }       
});          
</script>
@endsection
