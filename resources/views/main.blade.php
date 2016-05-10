<html>
<head>
	<title>SNS | @yield('title')</title>
	<!-- Jquery -->
	<script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
    <!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <!-- DataTables Bootstrap  Js-->
    <script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
    <!-- DataTables Bootstrap CSS-->
    <link src="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css">
   
    <!-- THEME COLOUR STYLE -->
    <link id="mainCSS" href="{{Asset('assets/css/themes/green.css')}}" rel="stylesheet" />
	<!-- Jquery Validation -->
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	<!-- Custom style -->
	<link rel="stylesheet" href="{{Asset('assets/css/style.css')}}">

	<!-- FONT-AWESOME CORE STYLE  -->
    <link href="{{Asset('assets/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- CORE CUSTOM STYLE  -->
    <link href="{{Asset('assets/css/custom.css')}}" rel="stylesheet" />
    
    <!-- GOOGLE FONTS -->
    <link href='https://fonts.googleapis.com/css?family=Lobster&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Noto+Sans&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
    

</head>
<body>

    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{Asset('')}}">SNS</a>
            </div>
            <div class="navbar-collapse collapse move-me">
                <ul class="nav navbar-nav navbar-right">
                @if(Auth::check() && Auth::user()->role == 2)
                	<li><a><?php echo Auth::user()->realName;?></a></li>
                	<li><a href="{{Asset('orders')}}">ĐẶT ĐƠN</a></li>                      
                    <li><a href="{{Asset('history')}}">LỊCH SỬ GIAO DỊCH</a></li>                      
                    <li><a href="{{Asset('auth/logout')}}">LOG OUT</a></li>
                @endif
                @if(Auth::check() && Auth::user()->role == 1)
                <li><a><?php echo Auth::user()->realName;?></a></li>
                    <li><a href="{{Asset('partner')}}">PARTNER PORTAL</a></li>                      
                    <li><a href="{{Asset('history')}}">LỊCH SỬ GIAO DỊCH</a></li>                      
                    <li><a href="{{Asset('auth/logout')}}">LOG OUT</a></li>
                @endif
                 @if(Auth::check() && Auth::user()->role == 0)
                <li><a><?php echo Auth::user()->realName;?></a></li>
                    <li><a href="{{Asset('admin')}}">ADMIN PORTAL</a></li>                                        
                    <li><a href="{{Asset('auth/logout')}}">LOG OUT</a></li>
                @endif
                @if(Auth::guest())
                	<li><a href="#home-sec">HOME</a></li>
                    <li><a href="#contact-sec">LIÊN HỆ</a></li>
                    <li><a href="{{Asset('orders')}}">ĐẶT ĐƠN</a></li> 
                    <li><a href="{{Asset('register')}}">ĐĂNG KÝ</a></li>
                    <li><a href="{{Asset('auth/login')}}">ĐĂNG NHẬP</a></li>

                @endif
                </ul>s
            </div>

        </div>
    </div>

    <br>
    <br>
    <br>
	<div class="container">
		@yield('content')
	</div>
	<div>
	@yield('contact')
	</div>
	 <div id="footer">
        &copy 2016 SNS | All Rights Reserved.

    </div>
    <!-- /FOOTER SECTION END  -->
    <div class="move-me toup-div">
        <a href="#home-sec">
            <i class="fa fa-arrow-up "></i>
        </a>

    </div>
	
    <!-- SROLLING SCRIPTS   -->
    <script src="{{Asset('assets/js/jquery.easing.min.js')}}"></script>
     <!-- ON SCROLL SCRIPTS   -->
    <script src="{{Asset('assets/js/scrollReveal.js')}}"></script>
    <!-- CUSTOM SCRIPTS   -->
    <script src="{{Asset('assets/js/custom.js')}}"></script>

     @stack('scripts')
</body>
</html>