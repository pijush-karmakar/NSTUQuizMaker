<div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="{{ route('teacher.dashboard') }}"><img src="{{ asset('assets/images/icon/logo.png') }}" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="{{ route('teacher.dashboard') }}" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                            </li>

                            

                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Test Topic
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="{{ route('topic.index') }}">All Topic</a></li>
                                    <li><a href="{{ route('topic.create') }}">ADD Topic</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Question Type
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="{{ route('type.index') }}">All Type</a></li>
                                    <li><a href="{{ route('type.create') }}">ADD Type</a></li>
                                </ul>
                            </li>

                            

                        </ul>
                    </nav>
                </div>
            </div>
        </div>