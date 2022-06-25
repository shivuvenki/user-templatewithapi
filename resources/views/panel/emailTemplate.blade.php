<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 20px 10px;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: dodgerblue;
  color: white;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}
</style>
<style>
* {
  box-sizing: border-box;
}

input[type=text],input[type=email], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit], input[type=button] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit], input[type=button]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 15%;
  margin-top: 6px;
  margin:10px;
}

.col-75 {
  float: left;
  width: 60%;
  margin-top: 6px;
  margin:10px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
<style>
/* css for loader */


.spinner {
  width: 40px;
  height: 40px;
  background-color: green;
 left: 50%;
  margin-left: -20px;
  top: 50%;
  margin-top: -20px;
  position: fixed;
/*  border-radius: 50%;*/
 
  -webkit-animation: sk-rotateplane 1.2s infinite ease-in-out;
  animation: sk-rotateplane 1.2s infinite ease-in-out;
}

@-webkit-keyframes sk-rotateplane {
  0% { -webkit-transform: perspective(120px) }
  50% { -webkit-transform: perspective(120px) rotateY(180deg) }
  100% { -webkit-transform: perspective(120px) rotateY(180deg)  rotateX(180deg) }
}

@keyframes sk-rotateplane {
  0% { 
    transform: perspective(120px) rotateX(0deg) rotateY(0deg);
    -webkit-transform: perspective(120px) rotateX(0deg) rotateY(0deg) 
  } 50% { 
    transform: perspective(120px) rotateX(-180.1deg) rotateY(0deg);
    -webkit-transform: perspective(120px) rotateX(-180.1deg) rotateY(0deg) 
  } 100% { 
    transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg);
    -webkit-transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg);
  }
}


#loading-overlay {
    position: absolute;
    width: 100%;
    height:100%;
    left: 0;
    top: 0;
    display: none;
    align-items: center;
    background-color: #000;
    z-index: 99999;
    opacity: 0.5;
}
.loading-icon{ position:absolute;border-top:2px solid #fff;border-right:2px solid #fff;border-bottom:2px solid #fff;border-left:2px solid #767676;border-radius:25px;width:25px;height:25px;margin:0 auto;position:absolute;left:50%;margin-left:-20px;top:50%;margin-top:-20px;z-index:4;-webkit-animation:spin 1s linear infinite;-moz-animation:spin 1s linear infinite;animation:spin 1s linear infinite;}
@-moz-keyframes spin { 100% { -moz-transform: rotate(360deg); } }
@-webkit-keyframes spin { 100% { -webkit-transform: rotate(360deg); } }
@keyframes spin { 100% { -webkit-transform: rotate(360deg); transform:rotate(360deg); } }  
</style>
</head>
<body>

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
<div class="header">
  <a href="#default" class="logo">Welcome {{Session::get('name')}}</a>
  <div class="header-right">
    <a href="{{url('/userPanel')}}">Create Template</a>
    <a href="{{url('/view-template')}}">View template</a>
    <a class="active" href="{{url('/email-template')}}">Email Template</a>
    <a href="{{url('logout')}}">Logout</a>
  </div>
</div>


  <h3>Send Email Template</h3>
  <div class="container">
  <form action="#">
  <input type="hidden" class="form-control " id="templa_text" name="templa_text" value="" >
  <div class="row">
      <div class="col-25">
        <label for="country">Template Id</label>
      </div>
      <div class="col-75">
        <select id="em_template_id" name="em_template_id" onchange="GetTemplate(this.value);">
        <option value="" >select</option>
        @if(!empty($all_tem->all_template))
           @foreach($all_tem->all_template as $templ)
           <option value="{{$templ->id}}">{{$templ->em_template_id}}</option>
           @endforeach
				   @endif	
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Email</label>
      </div>
      <div class="col-75">
        <input type="email" id="email" name="email" placeholder="Your Email..">
      </div>
    </div>
   
   
    
    <div class="row">
    <div class="col-25"></div>
      <input type="button" value="Send Template" onclick="send_email_template();">
    </div>
  </form>
</div>

<div id="loading-overlay">
<div class="spinner first_fm" style="visibility: hidden;">  <div class="double-bounce1"></div>
  <div class="double-bounce2"></div></div>
 </div>
</body>

<script type="text/javascript">
     function GetTemplate(em_templateid){
        let em_template_id = em_templateid;
        var CSRF = "{{ csrf_token() }}";
        $.ajax({
            type:"post",
            url:"{{url('get-template-em-ajax')}}",
            data:{em_template_id:em_template_id},
            headers: {'X-CSRF-TOKEN': CSRF},
			beforeSend:function(){
				$("#loading-overlay").show();
				$(".first_fm").css('visibility','visible');},
            success: function(data){
                console.log(data);
                $("#templa_text").val(data.em_temp);
            },
complete:function(){
	$("#loading-overlay").hide();
	$(".first_fm").css('visibility','hidden');}
        });
    }
    function send_email_template(){
        
        let em_template_id = $( "#em_template_id" ).val();
        let templa_text = $( "#templa_text" ).val();
        let email = $( "#email" ).val();
        
        
        if(em_template_id==""){
            toastr_error("Please enter Temaplate Id.");
        }
       else if(email==""){
            toastr_error("Please enter Email.");
        }
        else{

            var CSRF = "{{ csrf_token() }}";
            $.ajax({
                type:"post",
                url:"{{url('send-email-template-ajax')}}",
                data:{em_template_id:em_template_id,email:email,templa_text:templa_text},
                headers: {'X-CSRF-TOKEN': CSRF},
                beforeSend:function(){
				$("#loading-overlay").show();
				$(".first_fm").css('visibility','visible');},
                success: function(data){
                    console.log(data);
                    //alert(data.msg);
                    if(data.status==1){
                        toastr_success(data.msg);
                       location.reload();
                       // window.location.href="{{url('view-template')}}";
                    }else{
                        toastr_error(data.msg);
                    }
                    
                },
complete:function(){
	$("#loading-overlay").hide();
	$(".first_fm").css('visibility','hidden');}
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
</html>