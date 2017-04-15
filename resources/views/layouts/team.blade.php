<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
	<link rel="stylesheet" type="text/css" href="{{ url('/css/bootstrap.min.css') }}"/>
	<link href="{{ url('/css/style.css') }}" rel="stylesheet">
    <link href="{{ url('/css/chosen.css') }}" rel="stylesheet" type="text/css"/>	
	 <link href="{{ url('/css/responsive.css') }}" rel="stylesheet" type="text/css"/>	
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/daterangepicker.css') }}">
    <!-- Scripts -->
	<script type="text/javascript" src="{{ url('/js/jquery.min.js') }}"></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default" id="myNavbar">
            <div class="container">
                <div class="navbar-header">
					<button data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle" type="button">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="index.php" class="navbar-brand">Imenso</a>
					
				</div>        
                    

                    <!-- Right Side Of Navbar -->
                    <ul class="nav">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
							
                            <li class="dropdown pull-right">
								<a href="#" data-toggle="dropdown" class="dropdown-toggle"><img src="images/avtar.jpg" class="img-circle" width="40"></a>
								<ul class="dropdown-menu">
									<li><a href="#">Settings</a></li>
									<li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
								</ul>
							</li>
							<li class="dropdown pull-right">
								<a href="#" data-toggle="dropdown" class="dropdown-toggle"><span class="notifics"><i class="fa fa-bell"></i></span></a>
								<ul class="dropdown-menu">
									<li><a href="#" class="sml">Leave application by John Doe<br>On 12 Dec 2016</a></li>
									<li><a href="#" class="sml">John Doe complete 1 task in <strong>Some Awesome Project</strong><br>On 12 Dec 2016</a></li>
									<li><a href="#" class="sml">Its John Doe birthday today<br>On 12 Dec 2016</a></li>								   
									<li><a href="#" class="sml"><strong>View All</strong></a></li>
								</ul>
							</li>
                        @endif
                    </ul>
                
            </div>
        </nav>

        @yield('content')
    </div>

    <footer class="tmarg">
        <p class="text-center text-muted">Made with <i class="fa fa-heart"></i> by Imenso</p>
        <div class="tmarg"></div>
    </footer>

    <!-- Scripts -->
    <script src="{{ url('/js/app.js') }}"></script>
    <script type="text/javascript" src="{{ url('/js/chosen.jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('/js/prism.js') }}"></script>
    <script type="text/javascript" src="{{ url('/js/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('/js/daterangepicker.js') }}"></script>
    <script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
    $(".chosen-select").chosen({ width:"100%" });
    </script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
</body>
</html>