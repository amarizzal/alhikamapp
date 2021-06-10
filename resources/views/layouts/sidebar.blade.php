<aside class="main-sidebar" id="sidebar-wrapper">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="https://res.cloudinary.com/dklmpixki/image/upload/c_mpad,h_1457,w_1457/v1623169542/Logo_OSPAM_Muara_Cita_1_tcylmb.png" class="img-circle"
                     alt="User Image"/>
            </div>
            <div class="pull-left info">
                @if (auth()->guard('admins')->check())
                    <p>{{ Auth::guard('admins')->user()->username}}</p>
                @endif
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            @include('layouts.menu')
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
