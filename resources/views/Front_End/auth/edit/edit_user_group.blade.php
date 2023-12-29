@extends('Front_End.layout.main_design')

@section('content')
 <!-- mani page content body part -->
 <div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h2>Form ADD NEW GROUP</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-dashboard"></i></a></li>
                        <li class="breadcrumb-item">USERS</li>
                        <li class="breadcrumb-item active">ADD NEW GROUP</li>
                    </ul>
                </div>
                @if(App\Helper\Role::UserRole(auth()->user()->role_id) === 'super_admin' )
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="d-flex flex-row-reverse">
                        <div class="page_action">

                            <a href="{{ route('user.add') }}" class="btn btn-primary"><i class="fa fa-download"></i> ADD NEW USER</a>
                            <a href="{{ route('user_role.add') }}" class="btn btn-secondary"><i class="fa fa-send"></i> ADD NEW ROLE</a>
                            <a href="{{ route('user_group.add') }}" class="btn btn-secondary"><i class="fa fa-send"></i> ADD NEW GROUP USER</a>
                        </div>
                        <div class="p-2 d-flex">

                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>ADD NEW GROUP</h2>
                    </div>
                    <div class="body">
                        <form id="basic-form" method="post" novalidate action="{{ route('post_user_group.add') }}">
                            @csrf
                            <div class="form-group">
                                <label>GROUP NAME</label>
                                <input type="text" class="form-control" required name="name">
                            </div>
                            <div class="form-group">
                                <label>GROUP POSITION</label>
                                <input type="text" class="form-control" required name="position">
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Group Status</label>
                                <br />
                                <label class="fancy-radio">
                                    <input type="radio" name="status" value="1" required data-parsley-errors-container="#error-radio">
                                    <span><i></i>Active</span>
                                </label>
                                <label class="fancy-radio">
                                    <input type="radio" name="status" value="0">
                                    <span><i></i>Deactive</span>
                                </label>
                                <p id="error-radio"></p>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Group</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
