<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SNS | Admin Portal</title>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
    <!-- DataTables Bootstrap CSS-->
    <link src="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css">
    <!-- BOOTSTRAP STYLES-->
    <link href="{{Asset('assets/css/bootstrap.css')}}" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="{{Asset('assets/css/font-awesome.css')}}" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="{{Asset('assets/css/basic.css')}}" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="{{Asset('assets/css/admin/custom.css')}}" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{Asset('')}}">SNS</a>
            </div>

            <div class="header-right">

                <a href="{{Asset('auth/logout')}}" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>

            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                            <img src="{{Asset('assets/img/user.jpg')}} " class="img-circle" />

                            <div class="inner-text">
                                Admin
                            </div>
                        </div>

                    </li>


                   
                    <li>
                        <a href="{{Asset('/admin/show-order')}}"><i class="fa fa-flash "></i>Xem đơn hàng </a>
                        
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bicycle "></i>Thành viên <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                           
                             <li>
                                <a href="{{Asset('/admin/add-member')}}"><i class="fa fa-desktop "></i>Thêm thành viên/partner </a>
                            </li>
                             <li>
                                <a href="{{Asset('/admin/show-member')}}"><i class="fa fa-code "></i>Quản lý thành viên</a>
                            </li>
                             
                           
                        </ul>
                    </li>
                     
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                
                @yield('content')

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->


    <div id="footer-sec">
        &copy; 2016 SNS | All Right Reserved
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <!-- DataTables Bootstrap  Js-->
    <script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="{{Asset('assets/js/bootstrap.js')}}"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="{{Asset('assets/js/jquery.metisMenu.js')}}"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="{{Asset('assets/js/custom_2.js')}}"></script>
    


</body>
</html>
