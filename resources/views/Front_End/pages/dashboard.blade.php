  <!-- mani page content body part -->
  @section('style')
<link rel="stylesheet" href="{{ asset('Front_end/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('Front_end/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('Front_end/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('Front_end/assets/vendor/sweetalert/sweetalert.css') }}"/>
@stop
@extends('Front_End.layout.main_design')
@section('content')
<div id="main-content">
  <div class="container-fluid">
      <div class="block-header">
          <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12">
                  <h2>Analytical</h2>
                  <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-dashboard"></i></a></li>
                      <li class="breadcrumb-item">Dashboard</li>
                      <li class="breadcrumb-item active">Analytical</li>
                  </ul>
              </div>
              @if(App\Helper\Role::UserRole(auth()->user()->role_id) === 'super_admin' )
              <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="d-flex flex-row-reverse">
                      <div class="page_action">
                          <a href="{{ route('traker.add') }}" class="btn btn-primary"><i class="fa fa-download"></i>ADD NEW TRACKER </a>
                          <a href="{{ route('traker.view') }}" class="btn btn-secondary"><i class="fa fa-send"></i> VIEW ALL TRACKERS</a>
                        </div>
                      <div class="p-2 d-flex">
                      </div>
                  </div>
              </div>
              @endif
          </div>
      </div>
      @include('Front_End.pages.data.top-cards-data')
      @if ( App\Helper\Role::UserRole(auth()->user()->role_id) !== 'user' )
      @include('Front_End.pages.data.tables-card-data')
      @endif

  </div>
</div>
@endsection
@section('js')
<script src="{{ asset('Front_end/assets/bundles/datatablescripts.bundle.js') }}"></script>
<script src="{{ asset('Front_end/assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('Front_end/assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('Front_end/assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('Front_end/assets/vendor/jquery-datatable/buttons/buttons.html5.min.js') }}"></script>
<script src="{{ asset('Front_end/assets/vendor/jquery-datatable/buttons/buttons.print.min.js') }}"></script>
<script src="{{ asset('Front_end/assets/vendor/sweetalert/sweetalert.min.js') }}"></script> <!-- SweetAlert Plugin Js -->
<script src="{{ asset('Front_end/assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('Front_end/js/pages/tables/jquery-datatable.js') }}"></script>

<script>
    $(document).ready(function () {
        $('#days_revenue').change(function () {
            var selectedOption = $(this).val();
            var columnName = 'revenue';

            // Get the CSRF token value
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Perform AJAX request to update total revenue
            $.ajax({
                url: '/post/databyday',
                type: 'POST',
                data: {
                    selectedOption: selectedOption,
                    columnName:columnName,
                    _token: csrfToken // Include CSRF token in the request
                },
                success: function (response) {
                    // Update the total revenue on success
                    $('#totalRevenue').text(response.totalRevenue);
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#days_expected_revenue').change(function () {
            var selectedOption = $(this).val();
            var columnName = 'expected_revenue';
            // Get the CSRF token value
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Perform AJAX request to update total revenue
            $.ajax({
                url: '/post/databyday',
                type: 'POST',
                data: {
                    selectedOption: selectedOption,
                    columnName:columnName,
                    _token: csrfToken // Include CSRF token in the request
                },
                success: function (response) {
                    // Update the total revenue on success
                    $('#expected_revenue').text(response.totalRevenue);
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        });
    });
</script>

@stop
