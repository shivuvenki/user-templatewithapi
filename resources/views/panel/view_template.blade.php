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

input[type=text], select, textarea {
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
</head>
<body>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>   
   

<div class="header">
  <a href="#default" class="logo">Welcome {{Session::get('name')}}</a>
  <div class="header-right">
    <a  href="{{url('/userPanel')}}">Create Template</a>
    <a class="active" href="{{url('/view-template')}}">View template</a>
    <a href="{{url('/email-template')}}">Email Template</a>
    <a href="{{url('logout')}}">Logout</a>
  </div>
</div>


  <h1>View Template</h1>
  <div class="table-rep-plugin">
                                            <div class="table-responsive mb-0" data-pattern="priority-columns">
                                             <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                    <thead>
                                                    <tr>
												
                                                        <th>Sr. No</th>
                                                        <th>Template Id</th>
														                            <th>Template</th>
                                                       
                                                    </tr>
                                                    </thead>
													
                                                    <tbody>
													 
						 @if(!empty($all_tem->all_template))
						@php $i=0; @endphp
                        @foreach($all_tem->all_template as $templ)
                        @php $i++ @endphp
                       
                           <tr>
						  
                              <td>{{$i}}</td>
                              <td>{{$templ->em_template_id}}</td>
							  <td>{!! $templ->em_template !!}</td>
                            
                             
                           </tr>
						    @endforeach
							@endif					
                                                  
                                                    </tbody>
                                                </table>
                                            </div>
        
                                        </div>


</body>
<script type="text/javascript">
    
    function create_template(){
        
        let em_template = $( "#em_template" ).val();
        
        if(em_template==""){
            toastr_error("Please enter Temaplate.");
        }else{

            var CSRF = "{{ csrf_token() }}";
            $.ajax({
                type:"post",
                url:"{{url('create-template-ajax')}}",
                data:{em_template:em_template},
                headers: {'X-CSRF-TOKEN': CSRF},
                success: function(data){
                    console.log(data);
                    //alert(data.msg);
                    if(data.status==1){
                        toastr_success(data.msg);
                       // window.location.href=data.redirect_to;
                        //window.location.href="{{url('view_template')}}";
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
</html>