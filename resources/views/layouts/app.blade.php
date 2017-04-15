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
    <link href="{{ url('/css/app.css') }}" rel="stylesheet">
    <link href="{{ url('/css/style.css') }}" rel="stylesheet">
    <link href="{{ url('/css/chosen.css') }}" rel="stylesheet" type="text/css"/>  
    <link href="{{ url('/css/responsive.css') }}" rel="stylesheet" type="text/css"/>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">      

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
