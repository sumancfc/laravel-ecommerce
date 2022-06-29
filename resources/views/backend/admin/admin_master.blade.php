<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">
    <title>Admin Dashboard</title>
    <link href="{{ asset("backend/lib/font-awesome/css/font-awesome.css") }}" rel="stylesheet">
    <link href="{{ asset("backend/lib/Ionicons/css/ionicons.css") }}" rel="stylesheet">
    <link href="{{ asset("backend/lib/perfect-scrollbar/css/perfect-scrollbar.css") }}" rel="stylesheet">
    <link href="{{ asset("backend/lib/rickshaw/rickshaw.min.css") }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("backend/css/starlight.css") }}">
  </head>

  <body>

       @include("backend.admin.layouts.sidebar")
       @include("backend.admin.layouts.header")

    <div class="sl-mainpanel">
       @yield('admin_content')
      @include("backend.admin.layouts.footer")
    </div><!-- sl-mainpanel -->


    <script src="{{ asset("backend/lib/jquery/jquery.js")}}"></script>
    <script src="{{ asset("backend/lib/popper.js/popper.js")}}"></script>
    <script src="{{ asset("backend/lib/bootstrap/bootstrap.js")}}"></script>
    <script src="{{ asset("backend/lib/jquery-ui/jquery-ui.js")}}"></script>
    <script src="{{ asset("backend/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js")}}"></script>
    <script src="{{ asset("backend/lib/jquery.sparkline.bower/jquery.sparkline.min.js")}}"></script>
    <script src="{{ asset("backend/lib/d3/d3.js")}}"></script>
    <script src="{{ asset("backend/lib/rickshaw/rickshaw.min.js")}}"></script>
    <script src="{{ asset("backend/lib/chart.js/Chart.js")}}"></script>
    <script src="{{ asset("backend/lib/Flot/jquery.flot.js")}}"></script>
    <script src="{{ asset("backend/lib/Flot/jquery.flot.pie.js")}}"></script>
    <script src="{{ asset("backend/lib/Flot/jquery.flot.resize.js")}}"></script>
    <script src="{{ asset("backend/lib/flot-spline/jquery.flot.spline.js")}}"></script>

    <script src="{{ asset("backend/js/starlight.js")}}"></script>
    <script src="{{ asset("backend/js/ResizeSensor.js")}}"></script>
    <script src="{{ asset("backend/js/dashboard.js")}}"></script>
  </body>
</html>
