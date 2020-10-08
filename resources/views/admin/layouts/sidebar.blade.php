<div class="page-wrap">
    <div class="app-sidebar colored">
        <div class="sidebar-header">
            <a class="header-brand" href="{{ url('/dashboard') }}">
                <div class="logo-img">

                </div>
                <span class="text">Hospital</span>
            </a>
            <button type="button" class="nav-toggle"><i data-toggle="expanded"
                    class="ik ik-toggle-right toggle-icon"></i></button>
            <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
        </div>

        <div class="sidebar-content">
            <div class="nav-container">
                <nav id="main-menu-navigation" class="navigation-main">

                    <div class="nav-item active">
                        <a href="{{ url('dashboard') }}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                    </div>


                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Department</span> <span
                                class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a class="menu-item">Create</a>
                            <a class="menu-item">View</a>

                        </div>
                    </div>



                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-file-text"></i><span>Doctor</span> <span
                                class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a href="{{ route('doctor.create') }}" class="menu-item">Create</a>
                            <a href="{{ route('doctor.index') }}" class="menu-item">View</a>

                        </div>
                    </div>


                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-list"></i><span>Appointment Time</span> <span
                                class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a class="menu-item">Create</a>
                            <a class="menu-item">Check</a>

                        </div>
                    </div>



                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-heart"></i><span>Patients</span> <span
                                class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a class="menu-item">Patients(today)</a>
                            <a class="menu-item">All
                                patients(prescription)</a>

                        </div>
                    </div>





                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-monitor"></i><span>Patient Appointment</span> <span
                                class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a class="menu-item">Today Appointment</a>
                            <a class="menu-item">All Time Appointment</a>

                        </div>
                    </div>



                    <div class="nav-item active">
                        <a onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();"
                            href="{{ route('logout') }}"><i
                                class="ik ik-power dropdown-icon"></i><span>Logout</span></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>
