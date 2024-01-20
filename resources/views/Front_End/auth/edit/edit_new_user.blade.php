@extends('Front_End.layout.main_design')

@section('content')
 <!-- mani page content body part -->
 <div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h2>ADD NEW USER</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-dashboard"></i></a></li>
                        <li class="breadcrumb-item">USERS</li>
                        <li class="breadcrumb-item active">ADD NEW USER</li>
                    </ul>
                </div>
                @if(App\Helper\Role::UserRole(auth()->user()->role_id) === 'super_admin' )
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="d-flex flex-row-reverse">
                        <div class="page_action">

                            <a href="{{ route('user.add') }}" class="btn btn-primary">
                                <i class="fa fa-download"></i> ADD NEW USER</a>
                            <a href="{{ route('user_role.add') }}" class="btn btn-secondary">
                                <i class="fa fa-send"></i> ADD NEW ROLE</a>
                            <a href="{{ route('user_group.add') }}" class="btn btn-secondary">
                                <i class="fa fa-send"></i> ADD NEW GROUP USER</a>
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
                        <h2>ADD NEW USER</h2>
                    </div>
                    <div class="body">
                        <form id="basic-form" method="post" novalidate action="{{ route('post_user.update',$user->id) }}">
                            @csrf
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" class="form-control" required name="name" value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" required name="email" value="{{ $user->email }}" disabled>
                            </div>
                            @if (App\Helper\Role::UserRole(auth()->user()->role_id) === 'super_admin')
                            <div class="form-group">
                                <label>User Role</label>
                                <br />
                                @foreach ($roles as $role)
                                <label class="fancy-radio">
                                    <input type="radio" name="role"
                                    @if ($user->role_id === $role->id)  checked @endif value="{{ $role->id }}"
                                    required data-parsley-errors-container="#error-radio">
                                    <span><i></i>{{ $role->position }}</span>
                                </label>
                                @endforeach
                                <p id="error-radio"></p>
                            </div>
                            <div class="form-group">
                                <label for="group_leader">Choose Group Leader</label>
                                <br/>
                                <select id="group_leader" name="group_leader"
                                class="multiselect multiselect-custom form-control w-100"
                                data-parsley-required data-parsley-trigger-after-failure="change"
                                data-parsley-errors-container="#error-multiselect">
                                    @foreach ($groups as $group)
                                    <option  @if ($user->group_id === $group->id) selected @endif
                                        value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach

                                </select>
                                <p id="error-multiselect"></p>
                            </div>
                            <br>
                            @elseif (App\Helper\Role::UserRole(auth()->user()->role_id) === 'group_admin')
                            <div class="form-group">
                                <label>User Role</label>
                                <br />
                                <label class="fancy-radio">
                                    <input type="radio" checked name="role"
                                    value="4" required data-parsley-errors-container="#error-radio" value="{{ $user->role_id }}">
                                    <span><i></i>USER</span>
                                </label>
                                <p id="error-radio"></p>
                            </div>
                            <div class="form-group">
                                <label for="group_leader">Group Leader</label>
                                <br/>
                                <input type="text" name="group_leader" disabled value="{{ auth()->user()->name }}">
                                <input type="hidden" name="group_leader" value="{{ auth()->user()->group_id }}">
                                <p id="error-multiselect"></p>
                            </div>
                            <br>
                            @endif
                            <div class="form-group">
                                <label>User Status</label>
                                <br />
                                <label class="fancy-radio">
                                    <input type="radio"  @if ($user->status === 1) checked @endif name="status" value="1"
                                    required data-parsley-errors-container="#error-radio">
                                    <span><i></i>Active</span>
                                </label>
                                <label class="fancy-radio">
                                    <input type="radio" @if ($user->status === 0) checked @endif  name="status" value="0">
                                    <span><i></i>Deactive</span>
                                </label>
                                <p id="error-radio"></p>
                            </div>
                            <button type="submit" class="btn btn-primary">UPDATE DATA USER</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@section('js')
<script>
    $(function() {
        // validation needs name of the element
        $('#group_leader').multiselect();

        // initialize after multiselect
        $('#basic-form').parsley();
    });
    </script>
@stop
