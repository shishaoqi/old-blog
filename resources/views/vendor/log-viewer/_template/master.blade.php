<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Xenon Boostrap Admin Panel" />
    <meta name="author" content="" />
    <title>Blog Admin</title>
    <link rel="stylesheet" href="{{asset('backend/css/fonts/linecons/css/linecons.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/fonts/fontawesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/xenon-core.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/xenon-forms.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/xenon-components.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/xenon-skins.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/custom.css')}}">
    @yield('css')
    @include('log-viewer::_template.style')
    <style>
        body{
            padding-top: 0px;
        }
    </style>
    <script src="{{asset('backend/js/jquery-1.11.1.min.js')}}"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body class="page-body">
    <!-- settings-pane -->
    @include('admin.layouts.settingsPane')
    <div class="page-container">
        <!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
        <!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
        <!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
        <!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
        <div class="sidebar-menu toggle-others fixed">
            <div class="sidebar-menu-inner">
                <header class="logo-env">
                    <!-- logo -->
                    <div class="logo">
                        <a href="dashboard-1.html" class="logo-expanded">
                            <img src="{{asset('backend/images/logo@2x.png')}}" width="80" alt="" />
                        </a>
                        <a href="dashboard-1.html" class="logo-collapsed">
                            <img src="{{asset('backend/images/logo-collapsed@2x.png')}}" width="40" alt="" />
                        </a>
                    </div>
                    <!-- This will toggle the mobile menu and will be visible only on mobile devices -->
                    <div class="mobile-menu-toggle visible-xs">
                        <a href="#" data-toggle="user-info-menu">
                            <i class="fa-bell-o"></i>
                            <span class="badge badge-success">7</span>
                        </a>
                        <a href="#" data-toggle="mobile-menu">
                            <i class="fa-bars"></i>
                        </a>
                    </div>
                    <!-- This will open the popup with user profile settings, you can use for any purpose, just be creative -->
                    <div class="settings-icon">
                        <a href="#" data-toggle="settings-pane" data-animate="true">
                            <i class="linecons-cog"></i>
                        </a>
                    </div>
                </header>
                <!-- left menu -->
                @include('admin.layouts.leftMenu')
            </div>
        </div>
        <div class="main-content">
            <!-- nav content -->
            @include('admin.layouts.nav')

            @include('log-viewer::_template.navigation')
            @yield('content')
            @include('log-viewer::_template.footer')

            <!-- Main Footer -->
            <!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
            <!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
            <!-- Or class "fixed" to  always fix the footer to the end of page -->
            <footer class="main-footer sticky footer-type-1">
                <div class="footer-inner">
                    <!-- Add your copyright text here -->
                    <div class="footer-text">
                        &copy; 2014
                        <strong>Xenon</strong> theme by <a href="http://laborator.co" target="_blank">Laborator</a>
                    </div>
                    <!-- Go to Top Link, just add rel="go-top" to any link to add this functionality -->
                    <div class="go-up">
                        <a href="#" rel="go-top">
                            <i class="fa-angle-up"></i>
                        </a>
                    </div>
                </div>
            </footer>
        </div>
        <!-- chat -->
        @include('admin.layouts.chat')
    </div>
    <div class="page-loading-overlay">
        <div class="loader-2"></div>
    </div>

    
    <!-- Modal 7 (Ajax Modal)-->
    <div class="modal fade" id="modal-7">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Dynamic Content</h4>
                </div>
                <div class="modal-body">
                    Content is loading...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-info">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Modal 6 (Long Modal)-->
    <div class="modal fade" id="modal-6">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Modal Content is Responsive</h4>
                </div>
                
                <div class="modal-body">
                  
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-info">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Scripts -->
    <script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/js/TweenMax.min.js')}}"></script>
    <script src="{{asset('backend/js/resizeable.js')}}"></script>
    <script src="{{asset('backend/js/joinable.js')}}"></script>
    <script src="{{asset('backend/js/xenon-api.js')}}"></script>
    <script src="{{asset('backend/js/xenon-toggles.js')}}"></script>
    <!-- JavaScripts initializations and stuff -->
    <script src="{{asset('backend/js/xenon-custom.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.1/moment-with-locales.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.15.35/js/bootstrap-datetimepicker.min.js"></script>
    <script>
        Chart.defaults.global.responsive      = true;
        Chart.defaults.global.scaleFontFamily = "'Source Sans Pro'";
        Chart.defaults.global.animationEasing = "easeOutQuart";
    </script>
    @yield('js')
    @yield('modals')
    @yield('scripts')
</body>
</html>

