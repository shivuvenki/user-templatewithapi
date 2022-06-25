<!doctype html>
<html lang="en">
<head>
        
        <meta charset="utf-8" />
        <title>Login |User Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="User Template Panel" name="description" />
   

    </head>
    <link href="{{ asset('assets/css/login.css')}}"  rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>   
   
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
function toastr_error(msg){
    toastr.error(msg,'',{
    timeOut: 5000,
    "closeButton": true,
    "debug": false,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": true,
    "onclick": null,
    "showDuration": "5000",
    "hideDuration": "5000",
    "extendedTimeOut": "3000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut",
    "tapToDismiss": false
    });
}
function toastr_success(msg){
    toastr.success(msg,'',{
    timeOut: 5000,
    "closeButton": true,
    "debug": false,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": true,
    "onclick": null,
    "showDuration": "5000",
    "hideDuration": "5000",
    "extendedTimeOut": "3000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut",
    "tapToDismiss": false
    });
}
</script>
    <body>
    <div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="{{ asset('assets/images/logo.png')}}" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form action="#">
      <input type="text" id="user_id" class="fadeIn second"  name="user_id" placeholder="Enter User Id">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
      <input type="button" class="fadeIn fourth" value="Log In" onclick="login_with_userid_password();">
    </form>

   

  </div>
</div>
        <!-- end account-pages -->

      
    </body>

</html>
   <script type="text/javascript">
    
    function login_with_userid_password(){
        
        let user_id = $( "#user_id" ).val();
        let password = $( "#password" ).val();
        
        if(user_id==""){
            toastr_error("Please enter User ID.");
        }else if(password==""){
            toastr_error("Please enter password.");
        }else{

            var CSRF = "{{ csrf_token() }}";
            $.ajax({
                type:"post",
                url:"{{url('login-with-userid-password-ajax')}}",
                data:{user_id:user_id, password:password},
                headers: {'X-CSRF-TOKEN': CSRF},
                success: function(data){
                    //console.log(data);
                    //alert(data.msg);
                    if(data.status==1){
                        toastr_success(data.msg);
                        window.location.href=data.redirect_to;
                        //window.location.href="{{url('dashboard')}}";
                    }else{
                        toastr_error(data.msg);
                    }
                    
                }
            });  
        }
    }
    
    
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-bs-toggle="tooltip"]').tooltip()
        });
        // ==============================================================
        // Login and Recover Password
        // ==============================================================
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>