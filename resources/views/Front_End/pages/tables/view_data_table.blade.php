@extends('Front_End.layout.main_design')

@section('style')
<link rel="stylesheet" href="{{ asset('Front_end/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('Front_end/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('Front_end/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('Front_end/assets/vendor/sweetalert/sweetalert.css') }}" />
@stop

@section('content')
<!-- mani page content body part -->
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h2>TRAKER Datatable</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                    class="fa fa-dashboard"></i></a></li>
                        <li class="breadcrumb-item">TRAKER</li>
                        <li class="breadcrumb-item active">TRAKER Datatable</li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="d-flex flex-row-reverse">
                        <div class="page_action">
                            <a href="{{ route('traker.add') }}" class="btn btn-primary"><i class="fa fa-plus"></i> ADD
                                TRAKERS</a>
                        </div>
                        <div class="p-2 d-flex">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>USER</th>
                                        <th>GROUP</th>
                                        <th>Company Name </th>
                                        <th>Account Owner </th>
                                        <th>Parent Account </th>
                                        <th>Child Account </th>
                                        <th>Parent Company </th>
                                        <th>Line Manage </th>
                                        <th>Contact Name</th>
                                        <th>Position</th>
                                        <th>Website </th>
                                        <th>Stage </th>
                                        <th>Probability</th>
                                        <th>Revenue</th>
                                        <th>Expected Revenue </th>
                                        <th>Type</th>
                                        <th>Quote Created</th>
                                        <th>Customer Type</th>
                                        <th>Product Name </th>
                                        <th>Comments</th>
                                        <th>Action to Take</th>
                                        <th>Last Contact Date </th>
                                        <th>Next Contact Date </th>
                                        <th>Expected Close Date</th>
                                        <th>Email </th>
                                        <th>Phone </th>
                                        <th>Address </th>
                                        <th>Country </th>
                                        <th>City </th>
                                        <th>Zip </th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trakerdata as $data)
                                    <tr>
                                        <td>
                                            {{ \App\Models\User::where('id',$data->user_id)->value('name'); }}
                                        </td>
                                        <td>{{ \App\Models\Group::where('id',$data->group_id)->value('name') }} </td>
                                        <td>{{ $data->company_name }} </td>
                                        <td>{{$data->account_owner }} </td>
                                        <td>@if($data->parent_account == 1 )
                                            <span class=" badge badge-success"> YES</span> @else
                                            <span class=" badge badge-danger"> NO</span> @endif</td>
                                        <td>@if($data->chil_account == 1 )
                                            <span class=" badge badge-success"> YES</span> @else
                                            <span class=" badge badge-danger"> NO</span> @endif</td>
                                        <td>@if($data->chil_account !== 'null' )
                                            <span class=" badge badge-success"> {{ $data->parent_company }}</span>
                                            @endif</td>
                                        <td>{{ $data->line_manage }} </td>
                                        <td>{{ $data->contact_name }} </td>
                                        <td>{{ $data->position }} </td>
                                        <td>{{ $data->website }} </td>
                                        <td>{{ $data->stage }} </td>
                                        <td>{{ $data->probability }} </td>
                                        <td>{{ $data->revenue }} </td>
                                        <td>{{ $data->expected_revenue }} </td>
                                        <td>{{ $data->type }} </td>
                                        <td>{{ $data->quote_created }} </td>
                                        <td>{{ $data->customer_type }} </td>
                                        <td>{{ $data->product_name }} </td>
                                        <td>{{ $data->comments }} </td>
                                        <td>{{ $data->action_to_take }} </td>
                                        <td>{{ $data->last_contact_date }} </td>
                                        <td>{{ $data->next_contact_date }} </td>
                                        <td>{{ $data->expected_close_date }} </td>
                                        <td>{{ $data->email }} </td>
                                        <td>{{ $data->phone }} </td>
                                        <td>{{ $data->address }} </td>
                                        <td>{{ $data->country }} </td>
                                        <td>{{ $data->city }} </td>
                                        <td>{{ $data->zip }} </td>
                                        <td>
                                            @if(App\Helper\Role::UserRole(auth()->user()->role_id) === 'super_admin'
                                            ||App\Helper\Role::UserRole(auth()->user()->role_id) === 'group_admin' )
                                            <a href="{{ route('tracker_data.edit',$data->id) }}" class="btn btn-info"
                                                title="Edit"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('tracker_data.delet',$data->id) }}" data-type="confirm"
                                                class="btn btn-danger js-sweetalert" title="Delete"><i
                                                    class="fa fa-trash-o"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
<script src="{{ asset('Front_end/assets/vendor/sweetalert/sweetalert.min.js') }}"></script>
<!-- SweetAlert Plugin Js -->
<script src="{{ asset('Front_end/assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('Front_end/js/pages/tables/jquery-datatable.js') }}"></script>
@stop
