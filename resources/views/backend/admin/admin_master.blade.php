<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    <link href="{{ asset("backend/lib/highlightjs/github.css") }}" rel="stylesheet">
    <link href="{{ asset("backend/lib/datatables/jquery.dataTables.css") }}" rel="stylesheet">
    <link href="{{ asset("backend/lib/select2/css/select2.min.css") }}" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset("backend/css/starlight.css") }}">
	  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />
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

    <script src="{{ asset("backend/lib/highlightjs/highlight.pack.js")}}"></script>
    <script src="{{ asset("backend/lib/datatables/jquery.dataTables.js")}}"></script>
    <script src="{{ asset("backend/lib/datatables-responsive/dataTables.responsive.js")}}"></script>
    <script src="{{asset("backend/lib/select2/js/select2.min.js")}}"></script>

    <script type="text/javascript">
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
    <script type="text/javascript">
          $(document).ready(function() {
              toastr.options.timeOut = 5000;
              @if (Session::has('error'))
                  toastr.error('{{ Session::get('error') }}');
              @elseif(Session::has('success'))
                  toastr.success('{{ Session::get('success') }}');
              @endif
          });
    </script>
    <script src="{{ asset("backend/js/starlight.js")}}"></script>
    <script src="{{ asset("backend/js/ResizeSensor.js")}}"></script>
    <script src="{{ asset("backend/js/dashboard.js")}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
          $(document).on("click", "#deleteData", function (e) {
              e.preventDefault();
              var link = $(this).attr("href");
              // sweet alert
              Swal.fire({
                  title: "Are you sure?",
                  text: "You won't be able to revert this!",
                  icon: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#3085d6",
                  cancelButtonColor: "#d33",
                  confirmButtonText: "Yes, delete it!",
              }).then((result) => {
                  if (result.isConfirmed) {
                      window.location.href = link;
                      Swal.fire("Deleted!", "Your file has been deleted.", "success");
                  }
              });
          });
    </script>

  </body>
</html>
