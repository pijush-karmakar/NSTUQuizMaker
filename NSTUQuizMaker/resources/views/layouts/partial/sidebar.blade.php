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

{{-- Super Admin Access Menu  --}}

                    @admin('super')

                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-id-badge"></i><span>Role
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="{{ route('admin.roles') }}">Role List</a></li>
                                    <li><a href="{{ route('admin.role.create') }}">Add Role</a></li>
                                </ul>
                            </li>

                            

                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i><span>Admin
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="{{ route('admin.show') }}">All Admin</a></li>
                                    <li><a href="{{ route('admin.register') }}">ADD Admin</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-receipt"></i><span>Faculty
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="{{ route('faculty.index') }}">All Faculty</a></li>
                                    <li><a href="{{ route('faculty.create') }}">ADD Faculty</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-receipt"></i><span>Department
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="{{ route('department.index') }}">All Dept</a></li>
                                    <li><a href="{{ route('department.create') }}">ADD Dept</a></li>
                                </ul>
                            </li>

                        @endadmin

        {{-- Dept Admin Access Menu  --}}
        
        @admin('dept_admin')
                       
                        <li>
                            <a href="{{ route('student.index') }}" aria-expanded="true"><i class="ti-user"></i><span>Students</span></a>
                        </li>

                        <li>
                            <a href="{{ route('teacher.index') }}" aria-expanded="true"><i class="ti-user"></i><span>Teachers</span></a>
                        </li>

                        <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-receipt"></i><span>Degree
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="{{ route('degree.index') }}">All Degree</a></li>
                                    <li><a href="{{ route('degree.create') }}">Add Degree</a></li>
                                </ul>
                        </li>

                        <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-receipt"></i><span>Batch
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="{{ route('batch.index') }}">All Batch</a></li>
                                    <li><a href="{{ route('batch.create') }}">ADD batch</a></li>
                                </ul>
                        </li>

                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-receipt"></i><span>Course
                                </span></a>
                            <ul class="collapse">
                                <li><a href="{{ route('course.index') }}">All Course</a></li>
                                <li><a href="{{ route('course.create') }}">ADD Course</a></li>
                            </ul>
                        </li>



                        

        @endadmin





                            

                        </ul>
                    </nav>
                </div>
            </div>
        </div>