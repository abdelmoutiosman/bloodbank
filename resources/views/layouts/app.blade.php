@inject('notification', 'App\Models\Notification')
<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BloodBank</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('adminlte/plugins/sweetalert/sweetalert.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    @if(app()->getlocale() == 'ar')
      <link rel="stylesheet" href="{{ asset('adminlte/css/font-awesome-rtl.min.css') }}">
      <link rel="stylesheet" href="{{ asset('adminlte/css/AdminLTE-rtl.min.css') }}">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cairo:400,700">
      <link rel="stylesheet" href="{{ url('adminlte/css/rtl/bootstrap-rtl.min.css') }}">
      <link rel="stylesheet" href="{{ url('adminlte/css/rtl/rtl.css') }}">
    @else
      <!-- Google Font -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="{{asset('adminlte/plugins/font-awesome/css/font-awesome.min.css')}}">
      {{--    alt--}}
      <link rel="stylesheet" href="{{asset('adminlte/css/AdminLTE.min.css')}}">
    @endif
    <!-- AdminLTE Skins. Choose a skin from the css/skins
           folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('adminlte/css/skins/_all-skins.min.css')}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
      .swal2-popup{
        font-size: 1.5rem !important;
      }
    </style>
    @stack('css')
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
      <header class="main-header">
        @if(app()->getlocale() == 'ar')
          <!-- Logo -->
            <a href="{{url('/home')}}" class="logo">
              <!-- mini logo for sidebar mini 50x50 pixels -->
              <span class="logo-mini">{{__('messages.BloodBank')}}</span>
              <!-- logo for regular state and mobile devices -->
              <span class="logo-lg">{{__('messages.BloodBank')}}</span>
            </a>
          @else
          <!-- Logo -->
            <a href="{{url('/home')}}" class="logo">
              <!-- mini logo for sidebar mini 50x50 pixels -->
              <span class="logo-mini"><b>B</b>Bank</span>
              <!-- logo for regular state and mobile devices -->
              <span class="logo-lg"><b>Blood</b>Bank</span>
            </a>
        @endif
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
             <!-- Messages: style can be found in dropdown.less-->
{{--          <li class="dropdown messages-menu">--}}
{{--            <a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
{{--              <i class="fa fa-envelope-o"></i>--}}
{{--              <span class="label label-success">4</span>--}}
{{--            </a>--}}
{{--            <ul class="dropdown-menu">--}}
{{--              <li class="header">You have 4 messages</li>--}}
{{--              <li>--}}
{{--                <!-- inner menu: contains the actual data -->--}}
{{--                <ul class="menu">--}}
{{--                  <li><!-- start message -->--}}
{{--                    <a href="#">--}}
{{--                      <div class="pull-left">--}}
{{--                        <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">--}}
{{--                      </div>--}}
{{--                      <h4>--}}
{{--                        Support Team--}}
{{--                        <small><i class="fa fa-clock-o"></i> 5 mins</small>--}}
{{--                      </h4>--}}
{{--                      <p>Why not buy a new awesome theme?</p>--}}
{{--                    </a>--}}
{{--                  </li>--}}
{{--                  <!-- end message -->--}}
{{--                </ul>--}}
{{--              </li>--}}
{{--              <li class="footer"><a href="#">See All Messages</a></li>--}}
{{--            </ul>--}}
{{--          </li>--}}
            <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">{{$notification->count()}}</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have {{$notification->count()}} notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> {{$notification->count()}} new members joined today
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
            <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <ul class="menu">
                      @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li>
                          <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                          </a>
                        </li>
                      @endforeach
                    </ul>
                  </li>
                </ul>
              </li>
            <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{{asset('adminlte/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                <span class="hidden-xs">@if(Auth::check())  {{auth()->user()->name}}  @endif</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
{{--                  <li class="user-header">--}}
{{--                    <img src="{{asset('adminlte/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">--}}
{{--                    <p>--}}
{{--                      @if(Auth::check())  {{auth()->user()->name}}  @endif--}}
{{--                      <small>Member since Nov. 2012</small>--}}
{{--                    </p>--}}
{{--                  </li>--}}
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="text-center">
                      <form action="{{ url('logout') }}" method="post" id='signoutForm'>
                        @csrf
                        <script type="">
                          function submitSignout() {
                            document.getElementById('signoutForm').submit();
                          }
                        </script>
                        {!! Form::open(['method' => 'post', 'url' => url('logout'),'id'=>'signoutForm']) !!}
                        {!! Form::close() !!}
                      </form>
                        <div class="form-group">
                            <a href="{{url('user/edit-profile',auth()->user()->id)}}"><i class="fa fa-user"></i> {{__('messages.Profile')}}</a>
                        </div>
                        <div class="form-group">
                            <a href="#" onclick="submitSignout()"><i class="fa fa-sign-out"></i> {{__('messages.Sign Out')}}</a>
                        </div>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- =============================================== -->
      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
{{--          <div class="user-panel">--}}
{{--            <div class="pull-left image">--}}
{{--              <img src="{{asset('adminlte/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">--}}
{{--            </div>--}}
{{--            <div class="pull-left info">--}}
{{--                <p>@if(Auth::check())  {{auth()->user()->name}}  @endif</p>--}}
{{--                <a href="{{url('user/edit-profile',auth()->user()->id)}}"><i class="fa fa-circle text-success"></i> Online</a>--}}
{{--            </div>--}}
{{--          </div>--}}
            @if(app()->getlocale() == 'ar')
                <div class="user-panel">
                    <div class="pull-right image">
                        <img src="{{asset('adminlte/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-right info">
                        <p>@if(Auth::check())  {{auth()->user()->name}}  @endif</p>
                        <a href="{{url('user/edit-profile',auth()->user()->id)}}"><i class="fa fa-circle text-success"></i> {{__('messages.Online')}}</a>
                    </div>
                </div>
            @else
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{asset('adminlte/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>@if(Auth::check())  {{auth()->user()->name}}  @endif</p>
                        <a href="{{url('user/edit-profile',auth()->user()->id)}}"><i class="fa fa-circle text-success"></i> {{__('messages.Online')}}</a>
                    </div>
                </div>
        @endif
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> <span>{{__('messages.Dashboard')}}</span></a>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-list"></i> <span>{{__('messages.Posts')}}</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url(route('post.index'))}}"><i class="fa fa-circle-o"></i> {{__('messages.Posts')}}</a></li>
                <li><a href="{{url(route('categorie.index'))}}"><i class="fa fa-circle-o"></i> {{__('messages.Categories')}}</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-list"></i> <span>{{__('messages.Governorates')}}</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url(route('governorate.index'))}}"><i class="fa fa-circle-o"></i>{{__('messages.Governorates')}}</a></li>
                <li><a href="{{url(route('city.index'))}}"><i class="fa fa-circle-o"></i>{{__('messages.Cities')}}</a></li>
              </ul>
            </li>
            <li><a href="{{url(route('client.index'))}}"><i class="fa fa-users"></i> <span>{{__('messages.Clients')}}</span></a>
            <li><a href="{{url(route('order.index'))}}"><i class="fa fa-heart"></i> <span>{{__('messages.Orders')}}</span></a></li>
            <li><a href="{{url(route('contact.index'))}}"><i class="fa fa-phone"></i> <span>{{__('messages.Contacts')}}</span></a></li>
            <li><a href="{{url(route('setting.index'))}}"><i class="fa fa-cogs"></i> <span>{{__('messages.Settings')}}</span></a></li>
            <li><a href="{{url('user/change-password')}}"><i class="fa fa-key"></i> <span>{{__('messages.Change Password')}}</span></a></li>
            <li><a href="{{url(route('user.index'))}}"><i class="fa fa-users"></i> <span>{{__('messages.Users')}}</span></a></li>
            <li><a href="{{url(route('role.index'))}}"><i class="fa fa-list"></i> <span>{{__('messages.Roles')}}</span></a></li>
            <li><a href="{{url(route('permission.index'))}}"><i class="fa fa-list"></i> <span>{{__('messages.Permissions')}}</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      <!-- =============================================== -->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            @yield('page_title')
            <small>@yield('small_title')</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> {{__('messages.Home')}}</a></li>
            <li class="active">@yield('page_title')</li>
          </ol>
        </section>
        @yield('content')
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
{{--        <div class="pull-right hidden-xs">--}}
{{--          <b>Version</b> 2.4.0--}}
{{--        </div>--}}
        <strong>{{__('messages.Copyright')}} &copy; 2014-2016 <a href="#">{{auth()->user()->name}}</a>.</strong> {{__('messages.All rights reserved.')}}
      </footer>
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript:void(0)">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript:void(0)">
                  <i class="menu-icon fa fa-user bg-yellow"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                    <p>New phone +1(800)555-1234</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript:void(0)">
                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                    <p>nora@example.com</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript:void(0)">
                  <i class="menu-icon fa fa-file-code-o bg-green"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                    <p>Execution time 5 seconds</p>
                  </div>
                </a>
              </li>
            </ul>
            <!-- /.control-sidebar-menu -->
            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript:void(0)">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript:void(0)">
                  <h4 class="control-sidebar-subheading">
                    Update Resume
                    <span class="label label-success pull-right">95%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript:void(0)">
                  <h4 class="control-sidebar-subheading">
                    Laravel Integration
                    <span class="label label-warning pull-right">50%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript:void(0)">
                  <h4 class="control-sidebar-subheading">
                    Back End Framework
                    <span class="label label-primary pull-right">68%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                  </div>
                </a>
              </li>
            </ul>
            <!-- /.control-sidebar-menu -->
          </div>
          <!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
          <!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Allow mail redirect
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Other sets of options are available
                </p>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Expose author name in posts
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Allow the user to show his name in blog posts
                </p>
              </div>
              <!-- /.form-group -->
              <h3 class="control-sidebar-heading">Chat Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Show me as online
                  <input type="checkbox" class="pull-right" checked>
                </label>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Turn off notifications
                  <input type="checkbox" class="pull-right">
                </label>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Delete chat history
                  <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                </label>
              </div>
              <!-- /.form-group -->
            </form>
          </div>
          <!-- /.tab-pane -->
        </div>
      </aside>
      <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->
    <!-- jQuery 3 -->
    <script src="{{asset('adminlte/plugins/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('adminlte/plugins/jquery-confirm/jquery.confirm.min.js')}}"></script>
    <script src="{{asset('adminlte/plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('adminlte/plugins/sweetalert/sweetalert.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <!-- Bootstrap 3.3.7 -->
    <!-- SlimScroll -->
    <script src="{{asset('adminlte/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('adminlte/plugins/fastclick/lib/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('adminlte/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('adminlte/js/demo.js')}}"></script>
    <script src="{{asset('js/confirm.js')}}"></script>
    <script src="{{asset('adminlte/plugins/jquery-print-this/printThis.js')}}"></script>
    <script>
      $(document).ready(function () {
        $('.sidebar-menu').tree()
      });
    </script>
    @stack('scripts')
    @stack('print-order')
    @stack('showpassword')
  </body>
</html>
