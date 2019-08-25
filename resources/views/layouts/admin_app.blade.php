<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}">
  <!-- Favicon -->
  <link rel="icon" href="{{asset('user/ghilogo.png')}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>
   @yield('title')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/google_font.css')}}" />
  <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="{{asset('css/open-iconic-bootstrap.min.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('css/ionicons.min.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('css/flaticon.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('css/aos.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('css/icomoon.css')}}" />

  <!-- CSS Files -->
  <link href="{{asset('css/material-dashboard.css?v=2.1.1')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <!-- <link href="{{asset('demo/demo.css')}}" rel="stylesheet" /> -->
  <!-- Jquery ui css -->
  <link rel="stylesheet" href="{{asset('css/jquery/ui/1.12.1/themes/base/jquery-ui.css')}}">
  <!-- Datatable -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/jquery/jquery.dataTables.min.css')}}">
  <!-- Toastr notification -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/toastr.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.datetimepicker.css')}}">
  <!-- summernote -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet">
  <!-- unicode font correct -->
  <link rel="stylesheet" href='https://mmwebfonts.comquas.com/fonts/?font=pyidaungsu' />
  <link rel="stylesheet" href='https://mmwebfonts.comquas.com/fonts/?font=zawgyi' />
    <style>
        p,h1,h2,h3,h4,h5,h6{
            font-family:Pyidaungsu,Zawgyi-One;
        }
    .imagePreview {
        width: 100%;
        height: 150px;
        background-position: center center;
        background:url('{{asset("images/default.jpg")}}');
        background-color:#fff;
        background-size: cover;
        background-repeat:no-repeat;
        display: inline-block;
        box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2);
    }
    .upload_btn
    {
        display:block;
        border-radius:0px;
        box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);
        margin-top:-5px;
        margin-bottom: 15px;
    }
    .imgUp
    {
        margin-bottom:15px;
    }
  </style>
    @yield('style')
</head>

<body class="">
  <!-- start slibebar -->
  <div class="wrapper ">
    <div class="sidebar" data-color="green" data-background-color="white" data-image="{{asset('img/sidebar-1.jpg')}}">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="{{url('/')}}" class="simple-text logo-normal text-success text-center" target="_blank">
            <img src="{{asset('images/ghilogo.png')}}" alt="" width="80px" height="80px">
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <!-- <li class="nav-item {{Request::is('dashboard')}}">
              <a class="nav-link" href="{{url('dashboard')}}">
                <i class="material-icons">view_list</i>
                <p>Dashboard</p>
              </a>
          </li> -->
          <li class="nav-item {{$url === 'course' ? 'active' : ''}}">
              <a class="nav-link" href="{{url('admin/course')}}">
                <i class="material-icons">view_list</i>
                <p>Course</p>
              </a>
          </li>
          <li class="nav-item {{$url === 'training' ? 'active' : ''}}">
              <a class="nav-link" href="{{url('admin/training')}}">
                <i class="material-icons">view_list</i>
                <p>Training</p>
              </a>
          </li>
          <li class="nav-item {{$url === 'blog' ? 'active' : ''}}">
              <a class="nav-link" href="{{url('admin/blog')}}">
                <i class="material-icons">view_list</i>
                <p>Blog</p>
              </a>
          </li>
          <li class="nav-item {{$url === 'student' ? 'active' : ''}}">
              <a class="nav-link" href="{{url('admin/student')}}">
                <i class="material-icons">view_list</i>
                <p>Student</p>
              </a>
          </li>
          <li class="dropdown nav-item {{$url === 'trainer' ? 'active' :''}}">
            <a class="nav-link" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="material-icons">library_books</i>
              <p>Trainers &nbsp;&nbsp;&nbsp;<img src="{{asset('images/drop_down.png')}}"></p>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="nav-link" href="{{url('admin/trainer/add')}}">Add Trainers</a>
              <a class="nav-link" href="{{url('admin/trainer/show')}}">Show Trainers</a>
            </div>
          </li>
          <li class="nav-item {{$url === 'project' ? 'active' :''}}">
            <a class="nav-link" href="{{url('admin/project')}}">
              <i class="material-icons">view_list</i>
              <p>Project</p>
            </a>
          </li>
          <li class="nav-item {{$url === 'product' ? 'active' :''}}">
            <a class="nav-link" href="{{url('admin/product')}}">
              <i class="material-icons">view_list</i>
              <p>Product</p>
            </a>
          </li>
          <li class="nav-item {{$url === 'client' ? 'active' :''}}">
            <a class="nav-link" href="{{url('admin/client')}}">
              <i class="material-icons">view_list</i>
              <p>Client</p>
            </a>
          </li>
          <li class="nav-item {{$url === 'contact' ? 'active' :''}}">
            <a class="nav-link" href="{{url('admin/user-contact-us-data')}}">
              <i class="material-icons">view_list</i>
              <p>Contact</p>
            </a>
          </li>
          <li class="nav-item {{$url === 'site_profile' ? 'active' :''}}">
            <a class="nav-link" href="{{url('admin/site-profile')}}">
              <i class="material-icons">library_books</i>
              <p>Site Profile</p>
            </a>
          </li>
          <li class="dropdown nav-item {{$url === 'recycle-bin' ? 'active' :''}}">
            <a class="nav-link" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="material-icons">library_books</i>
              <p>Recycle Bin &nbsp;&nbsp;&nbsp;<img src="{{asset('images/drop_down.png')}}"></p>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="nav-link" href="{{url('admin/student/recycle-bin')}}">Student</a>
              <a class="nav-link" href="{{url('admin/course/recycle-bin')}}">Course</a>
            </div>
          </li>

          <li class="nav-item {{Request::is('logout') ? 'active' :''}}">
            <a class="nav-link" href="{{url('logout')}}">
              <i class="material-icons">logout</i>
              <p>Log out</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
        @include('inc.nav')
      <!-- End Navbar -->
        @yield('content')
    </div>
  </div>
  <!-- end slibebar -->
  <!--   Core JS Files   -->
  <script src="{{asset('js/core/jquery.min.js')}}"></script>
  <script src="{{asset('js/core/popper.min.js')}}"></script>
  <script src="{{asset('js/core/bootstrap-material-design.min.js')}}"></script>
  <script src="{{asset('js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
  <!-- Plugin for the momentJs  -->
  <script src="{{asset('js/plugins/moment.min.js')}}"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="{{asset('js/plugins/sweetalert2.js')}}"></script>
  <!-- Forms Validations Plugin -->
  <script src="{{asset('js/plugins/jquery.validate.min.js')}}"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="{{asset('js/plugins/jquery.bootstrap-wizard.js')}}"></script>
  <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="{{asset('js/plugins/bootstrap-selectpicker.js')}}"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="{{asset('js/plugins/bootstrap-datetimepicker.min.js')}}"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="{{asset('js/plugins/jquery.dataTables.min.js')}}"></script>
  <!--  Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="{{asset('js/plugins/bootstrap-tagsinput.js')}}"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="{{asset('js/plugins/jasny-bootstrap.min.js')}}"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="{{asset('js/plugins/fullcalendar.min.js')}}"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="{{asset('js/plugins/jquery-jvectormap.js')}}"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{asset('js/plugins/nouislider.min.js')}}"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="{{asset('js/ajax/libs/core-js/2.4.1/core.js')}}"></script>
  <!-- Library for adding dinamically elements -->
  <script src="{{asset('js/plugins/arrive.min.js')}}"></script>
  <!--  Google Maps Plugin    -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE')}}"></script> -->
  <!-- Chartist JS -->
  <script src="{{asset('js/plugins/chartist.min.js')}}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{asset('js/plugins/bootstrap-notify.js')}}"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('js/material-dashboard.js?v=2.1.1')}}" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <!-- <script src="{{asset('demo/demo.js')}}"></script> -->

  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
  <script type="text/javascript" src="{{asset('js/build.js')}}"></script>
  <!-- Datatable -->
  <script type="text/javascript" src="{{asset('js/jquery/jquery.dataTables.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/jquery/jquery.modal.min.js')}}"></script>
  <script src="{{asset('js/jquery/ui/1.12.1/jquery-ui.js')}}"></script>
  <!-- Toastr notification -->
  <script type="text/javascript" src="{{asset('js/toastr.min.js')}}"></script>
  <!-- Summernote -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>
  <script>
    function csrf_ajax(){
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      })
    }

    function removeShowEntryOnDataTable(datatable){
      $("#"+datatable).DataTable({
          "bInfo" : false,
          "lengthChange": false
      });
    }
  </script>
  @if(Session::has('success'))
    <script>toastr_success("{{Session('success')}}");</script>
  @endif
  <script type="text/javascript" src="{{asset('js/jquery.datetimepicker.full.js')}}"></script>
  @yield('script')
</body>

</html>
