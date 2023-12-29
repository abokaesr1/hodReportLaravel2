<!-- main left menu -->
<div id="left-sidebar" class="sidebar">
    <button type="button" class="btn-toggle-offcanvas"><i class="fa fa-arrow-left"></i></button>
    <div class="sidebar-scroll">
        <div class="user-account">
            <img src="{{ asset('Front_end/assets/images/user.png')}}" class="rounded-circle user-photo" alt="User Profile Picture">
            <div class="dropdown">
                <span>Welcome,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{ auth()->user()->name }}</strong></a>
                <ul class="dropdown-menu dropdown-menu-right account">
                    <li><a href="page-profile2.html"><i class="icon-user"></i>My Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ route('logout') }}"><i class="icon-power"></i>Logout</a></li>
                </ul>
            </div>
            <hr>
            <ul class="row list-unstyled">
                <li class="col-6">
                    <h6>Group Leader</h6>
                    <small>{{ \App\Models\Group::where('id',auth()->user()->group_id)->value('name') }}</small>
                </li>
                <li class="col-6">
                    <h6>Numbers</h6>
                    <small>Added {{ $trackerColumn }} Columns</small>
                </li>
            </ul>
        </div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#menu">Menu</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Chat"><i class="icon-book-open"></i></a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#setting"><i class="icon-settings"></i></a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content padding-0">
            <div class="tab-pane active" id="menu">
                <nav id="left-sidebar-nav" class="sidebar-nav">
                    <ul id="main-menu" class="metismenu li_animation_delay">
                        <li class="{{ request()->route()->getName('dashboard') ? 'active' : '' }}">
                            <a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>

                        </li>
                        <li class="{{ request()->route()->getName('traker.view') ? 'active' : '' }}" >
                            <a href="#App" class="has-arrow"><i class="fa fa-th-large"></i><span>DATA SECTION</span></a>
                            <ul>
                                <li ><a href="{{ route('traker.view') }}">TRAKER TABLE</a></li>
                            </ul>
                        </li>
                        @if (App\Helper\Role::UserRole(auth()->user()->role_id) != 'user')
                        <li>
                            <a href="#App" class="has-arrow"><i class="fa fa-th-large"></i><span>USERS SECTION</span></a>
                            <ul>
                                @if ( App\Helper\Role::UserRole(auth()->user()->role_id) === 'super_viewer' )
                                 <li><a href="{{ route('user.view') }}">VIEW USERS</a></li>
                                @endif
                                @if (App\Helper\Role::UserRole(auth()->user()->role_id) === 'super_admin' ||
                                App\Helper\Role::UserRole(auth()->user()->role_id) === 'group_admin')
                                 <li><a href="{{ route('user.view') }}">VIEW USERS</a></li>
                                <li><a href="{{ route('user.add') }}">ADD USER</a></li>
                                @endif
                                @if (App\Helper\Role::UserRole(auth()->user()->role_id) === 'super_admin')
                                <li><a href="{{ route('user_role.add') }}">ADD ROLE</a></li>
                                <li><a href="{{ route('user_group.add') }}">ADD GROUP</a></li>
                                @endif
                            </ul>
                        </li>
                        @endif
                    </ul>
                </nav>
            </div>
            @auth
            <div class="tab-pane" id="Chat">
               <h4> GROUP'S MEMBERS</h4>
                <ul class="right_chat list-unstyled li_animation_delay">
                    @foreach ($users as $user)
                    <li>
                        <a href="javascript:void(0);" class="media">
                            <img class="media-object" src="{{ asset('Front_end/assets/images/xs/avatar1.jpg') }}" alt="">
                            <div class="media-body">
                                <span class="name d-flex justify-content-between">{{ $user->name }} </span>
                                <span class="message">{{ $user->email }}</span>
                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            @endauth
            <div class="tab-pane" id="setting">
                <h6>Choose Skin</h6>
                <ul class="choose-skin list-unstyled">
                    <li data-theme="purple"><div class="purple"></div></li>
                    <li data-theme="blue"><div class="blue"></div></li>
                    <li data-theme="cyan" class="active"><div class="cyan"></div></li>
                    <li data-theme="green"><div class="green"></div></li>
                    <li data-theme="orange"><div class="orange"></div></li>
                    <li data-theme="blush"><div class="blush"></div></li>
                    <li data-theme="red"><div class="red"></div></li>
                </ul>

                <ul class="list-unstyled font_setting mt-3">
                    <li>
                        <label class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" name="font" value="font-nunito" checked="">
                            <span class="custom-control-label">Nunito Google Font</span>
                        </label>
                    </li>
                    <li>
                        <label class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" name="font" value="font-ubuntu">
                            <span class="custom-control-label">Ubuntu Font</span>
                        </label>
                    </li>
                    <li>
                        <label class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" name="font" value="font-raleway">
                            <span class="custom-control-label">Raleway Google Font</span>
                        </label>
                    </li>
                    <li>
                        <label class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" name="font" value="font-IBMplex">
                            <span class="custom-control-label">IBM Plex Google Font</span>
                        </label>
                    </li>
                </ul>

                <ul class="list-unstyled mt-3">
                    <li class="d-flex align-items-center mb-2">
                        <label class="toggle-switch theme-switch">
                            <input type="checkbox">
                            <span class="toggle-switch-slider"></span>
                        </label>
                        <span class="ml-3">Enable Dark Mode!</span>
                    </li>
                    <li class="d-flex align-items-center mb-2">
                        <label class="toggle-switch theme-high-contrast">
                            <input type="checkbox">
                            <span class="toggle-switch-slider"></span>
                        </label>
                        <span class="ml-3">Enable High Contrast Mode!</span>
                    </li>
                </ul>

                <hr>

            </div>
        </div>
    </div>
</div>
