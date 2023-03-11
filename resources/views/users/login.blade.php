@extends('layout.app')
@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb pt-5">
            <div class="pull-right">
                <a class="btn btn-secondary" href="{{ route('user.index') }}"> Back</a>
            </div>
            <div class="pull-left mb-2">
                <h2>User Login</h2>
            </div>

    </div>
</div>

<form action="" method="POST" enctype="multipart/form-data" id="loginForm">
@csrf
<div id="errors-list"></div>
<div id="success-list"></div>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>User Name:</strong>
                <input type="text" name="user_name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Password:</strong>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
        </div>
    </div>

    <div class="row">
        <div  class="align-center m-2 col-md-6">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </div>

</form>
<script type="text/javascript">

    $(function() {

        $(document).on("submit", "#loginForm", function() {
            var e = this;
            $(this).find("[type='submit']").attr('disabled',true);
            $(this).find("[type='submit']").html("Login...");

            $.ajax({
                url: 'api/user/login',
                data: $(this).serialize(),
                type: "POST",
                dataType: 'json',
                success: function (data) {

                  $(e).find("[type='submit']").html("Login");
                  $(e).find("[type='submit']").attr('disabled',false);

                  if (data.status) {
                    $("#success-list").append("<div class='alert alert-success'>Success</div>");
                    setTimeout(window.location = 'user-index',20000);
                  }else{

                      $(".alert").remove();
                      $.each(data.errors, function (key, val) {
                          $("#errors-list").append("<div class='alert alert-danger'>" + val + "</div>");
                      });
                  }

                }
            });

            return false;
        });

      });

  </script>
@endsection
