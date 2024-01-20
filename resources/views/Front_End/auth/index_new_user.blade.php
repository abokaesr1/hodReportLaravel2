@extends('Front_End.layout.main_design')

@section('content')
     <!-- mani page content body part -->
     <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <h2>TABLE USERS</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-dashboard"></i></a></li>
                            <li class="breadcrumb-item">USERS</li>
                            <li class="breadcrumb-item active">VIEW ALL USERS</li>
                        </ul>
                    </div>
                    @if(App\Helper\Role::UserRole(auth()->user()->role_id) === 'super_admin' )
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="d-flex flex-row-reverse">
                            <div class="page_action">

                                <a href="{{ route('user.add') }}"
                                class="btn btn-primary"><i class="fa fa-download"></i> ADD NEW USER</a>
                                <a href="{{ route('user_role.add') }}"
                                class="btn btn-secondary"><i class="fa fa-send"></i> ADD NEW ROLE</a>
                                <a href="{{ route('user_group.add') }}"
                                class="btn btn-secondary"><i class="fa fa-send"></i> ADD NEW GROUP USER</a>
                            </div>
                            <div class="p-2 d-flex">

                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>ALL USERS</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0 c_list">
                                    <thead>
                                        <tr>
                                            <th>
                                                <label class="fancy-checkbox">
                                                    <input class="select-all" type="checkbox" name="checkbox">
                                                    <span></span>
                                                </label>
                                            </th>
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>Group Leader</th>
                                            <th>Name</th>
                                            <th>EMAIL</th>
                                            <th>STATUS</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                            <tr>
                                                <td style="width: 50px;">
                                                    <label class="fancy-checkbox">
                                                        <input class="checkbox-tick" type="checkbox" name="checkbox">
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <img src="{{ asset('Front_end/assets/images/xs/avatar1.jpg') }}"
                                                    class="rounded-circle avatar" alt="">
                                                    <p class="c_name">{{ $user->name }}
                                                        </p>
                                                </td>
                                                <td>
                                                    <span class="phone">
                                                        <i class="zmdi zmdi-phone m-r-10"></i> {{ $user->Role[0]['name'] }}</span>
                                                </td>
                                                <td>
                                                    <span class="phone">
                                                        <i class="zmdi zmdi-phone m-r-10"></i>{{ $user->Group[0]['name'] }}</span>
                                                </td>
                                                <td>
                                                    <span class="phone">
                                                        <i class="zmdi zmdi-phone m-r-10"></i>{{ $user->email }}</span>
                                                </td>
                                                <td>
                                                    @if ($user->status == 1)
                                                    <span class=" badge badge-success"> Active</span>
                                                    @else
                                                    <span class=" badge badge-danger"> Active</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(App\Helper\Role::UserRole(auth()->user()->role_id) === 'super_admin' ||App\Helper\Role::UserRole(auth()->user()->role_id) === 'group_admin' )
                                                    <a href="{{ route('post_user.edit',$user->id) }}" class="btn btn-info" title="Edit"><i class="fa fa-edit"></i></a>
                                                    <a href="{{ route('post_user.delet',$user->id) }}" data-type="confirm" class="btn btn-danger js-sweetalert" title="Delete"><i class="fa fa-trash-o"></i></a>
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
