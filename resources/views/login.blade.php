<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin App</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <!-- Font Awesome -->
   <link rel="stylesheet" href="{{ asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}">
  
  <!-- Ionicons -->
   <link rel="stylesheet" href="{{asset('plugins/ionicons-master/css/ionicons.min.css')}}">
  
   <!-- DataTables -->
    
  <link href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet">    
  <!-- Theme style -->
  <link href="{{ asset('dist/css/AdminLTE.min.css') }}" rel="stylesheet"> 
   <link href="{{ asset('dist/css/style.css') }}" rel="stylesheet">  
  
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
   
  <link href="{{ asset('dist/css/skins/_all-skins.min.css') }}" rel="stylesheet">  
  <!-- iCheck -->
  <link href="{{ asset('plugins/iCheck/all.css') }}" rel="stylesheet">  
  <link href="{{ asset('plugins/iCheck/flat/blue.css') }}" rel="stylesheet">  
  
  <!-- Morris chart -->
  <link href="{{ asset('plugins/morris/morris.css') }}" rel="stylesheet">  
   
  <!-- jvectormap -->
  <link href="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet">  

  <!-- Date Picker -->
  <link href="{{ asset('plugins/datepicker/datepicker3.css') }}" rel="stylesheet">  
  
  <!-- iCheck for checkboxes and radio inputs -->
  
  <!-- Daterange picker -->
  <link href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet">  
  
  <!-- bootstrap wysihtml5 - text editor -->
  <link href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet">  
  
  <!-- jQuery 2.2.3 -->
<script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script> 
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jQueryUI/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script> 
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script> 
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script> 
 
<!-- Morris.js charts -->
<script src="{{ asset('dist/js/raphael-min.js') }} "></script>
<script src="{{ asset('plugins/morris/morris.min.js') }}"></script> 

<!-- Sparkline -->
<script src="{{ asset('plugins/sparkline/jquery.sparkline.min.js') }}"></script> 
<!-- jvectormap -->
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script> 
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script> 

<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/knob/jquery.knob.js') }}"></script> 
<!-- daterangepicker -->
<script src="{{ asset('dist/js/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script> 
<!-- datepicker -->
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script> 

<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script> 

<!-- Slimscroll -->
<script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script> 
<!-- iCheck 1.0.1 -->
<script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script> 
<!-- FastClick -->
<script src="{{ asset('plugins/fastclick/fastclick.js') }}"></script> 
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/app.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>

  
</head>
<body >
<div class="login-box">
  <div class="login-logo">
       <a href="" class="logo">
           <!-- <img src="{{ asset('dist/img/logo.png') }}" class="img-responsive center-block" alt="Responsive image"> -->
           <h2 style="color: #367fa9;"><strong>ASTERISK ADMIN APP</strong></h2>
     </a>   
  </div>
  <div class="login-box-body box box-danger" style="border: 3px solid #337ab7">
   
    <form action="login.php" method="post">
      <p class="login-box-msg">
      
      <p id="p1" style='color:#FF0000' ></p>
       
</p>    
      <div class="form-group has-feedback">
        <input type="text" name="username" id="username" class="form-control" onkeypress="if(event.keyCode==13) checkusers()" placeholder="User Name">
        <span class="fa fa-user form-control-feedback"></span>

        <span class=""></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" id="password" onkeypress="if(event.keyCode==13) checkusers()" class="form-control " placeholder="Password">
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>

               <span class=""></span>
      </div>
      
        <div class="">
            <button type="button" onclick="checkusers()" class="btn btn-primary btn-block btn-flat" name="Complete">Login</button>
        </div> 
       
         

        
        
  </form>
  </div>
 
</div>

<script>
function checkusers(){
		    var usernames=document.getElementById('username').value;
		    var password=document.getElementById('password').value;
		    var response;
		   $.ajax({
                url: 'checkloginusers',
                type: 'GET',
                data: { usernames: usernames ,password:password},
                success: function(response)
                {
					 if(response=="correct"){
						   location.href = "{{url ('setup1')}} ";
					 } else{
						   document.getElementById("p1").innerHTML = "<strong>Your Username or Password is Incorrect.</strong>";
					 }
					  
                } ,
                error: function(response) {
						document.getElementById("p1").innerHTML = "<strong>Your Username or Password is Incorrect.</strong>";
					}
            });
            

           
	  }

</script>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' 
    });
  });
</script>
</body>
</html>
