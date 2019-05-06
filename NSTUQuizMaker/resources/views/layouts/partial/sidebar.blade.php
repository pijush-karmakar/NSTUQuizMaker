<div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="{{ route('admin.home') }}"><img src="{{ asset('assets/images/icon/logo.png') }}" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="{{ route('admin.home') }}" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                            </li>

{{-- Super Admin Accesse Menu  --}}

                    @admin('super')

                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Role
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="{{ route('admin.roles') }}">Role List</a></li>
                                    <li><a href="{{ route('admin.role.create') }}">Add Role</a></li>
                                </ul>
                            </li>

                            

                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Admin
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="{{ route('admin.show') }}">All Admin</a></li>
                                    <li><a href="{{ route('admin.register') }}">ADD Admin</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Faculty
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="{{ route('faculty.index') }}">All Faculty</a></li>
                                    <li><a href="{{ route('faculty.create') }}">ADD Faculty</a></li>
                                </ul>
                            </li>

                        @endadmin

        {{-- Dept Admin Accesse Menu  --}}
        
        @admin('dept_admin')

                        <li>
                            <a href="{{ route('student.index') }}" aria-expanded="true"><i class="ti-dashboard"></i><span>Students</span></a>
                        </li>

        @endadmin





                            

                        </ul>
                    </nav>
                </div>
            </div>
        </div>