<!DOCTYPE html>
<?php
use Illuminate\Support\Facades\Route;
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>Admin App</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->

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
        <link href="{{ asset('dist/css/jquery.datetimepicker.css') }}" rel="stylesheet">  
        <link href="{{ asset('dist/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">  
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet">  

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

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
        <!-- <script src="{{ asset('plugins/morris/morris.min.js') }}"></script>  -->

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
        <script src="{{ asset('dist/js/jquery.datetimepicker.full.js') }}"></script>
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
        <!-- <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script> -->
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('dist/js/demo.js') }}"></script>

  <script src="{{ asset('plugins/chartjs/Chart.bundle.min.js') }}">></script>
  <script src="{{ asset('dist/js/pdfmake.js') }}"></script>
  <script src="{{ asset('dist/js/vfs_fonts.js') }}"></script>
  <link href="{{ asset('dist/css/buttons.dataTables.min.css') }}" rel="stylesheet">  
  <script src="{{ asset('dist/js/moment.min.js') }}"></script>
  <script src="{{ asset('dist/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('dist/js/jszip.min.js') }}"></script>
  <script src="{{ asset('dist/js/buttons.html5.min.js') }}"></script>


     <link href="{{ asset('dist/css/multi-select.css') }}" rel="stylesheet">
  <script src="{{ asset('dist/js/jquery.multi-select.js') }}"></script>
  
<script src="dist/js/jquery.form.js"></script>

    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="#" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>A</b>LT</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b></b>Admin App</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->
                            <?php 
                                $check_config  = DB::table('func_data') 
                                    ->where('type','apply_needed')
                                    ->where('data','1')
                                    ->first();
                            ?>

                            <?php if($check_config){ ?>
                                <button class="btn btn-danger" onclick="apply_config()" style="color:white;margin: 7px;">Apply Config</button>
                            <?php } ?>

                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->

                    <?php $currentPath = Route::getFacadeRoot()->current()->uri(); ?>

                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <!-- <li class="header"></li> -->
                        
                        
<!--                                      <li class="treeview">
                            <a href="{{url ('campaignreports')}}" >
                                <i class="fa fa-download"></i>
                                <span>Campaign Detail Report  </span>
                            </a>

                        </li> 

                                     <li class="treeview">
                            <a href="{{url ('campaignreportsnew')}}" >
                                <i class="fa fa-download"></i>
                                <span>Campaign Detail Report New  </span>
                            </a>

                        </li> 

                                     <li class="treeview">
                            <a href="{{url ('campaignreports2')}}" >
                                <i class="fa fa-download"></i>
                                <span>New Contacts Report  </span>
                            </a>

                        </li> -->
                        <li class="treeview">
                            <a href="{{url ('setup1')}}" >
                                <i class="fa fa-arrows"></i>
                                <span>Setup Ext.conf  </span>
                            </a>

                        </li>
                        <li class="treeview">
                            <a href="{{url ('setup2')}}" >
                                <i class="fa fa-arrows"></i>
                                <span>Setup Queues.conf  </span>
                            </a>

                        </li>
                       
        
                        <li class="treeview">
                            <a href="{{url ('logout')}}" >
                                <i class="fa fa-mail-reply"></i>
                                <span>Logout</span>
                            </a>

                        </li>   

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

<script type="text/javascript">

    function apply_config(){
            $.ajax({
                        url: "{{ url('apply_config') }}",
                        type: 'GET',
                        data: {
                            
                        },
                        success: function (response) {


                            if(response === 'success'){

                                    // alert('Reload Successfully!');
                                    location.reload();

                            }else{
                                    alert('Error Occurred!');
                                    location.reload();
                                
                            }
                        }
                    });
    }    
    
</script>