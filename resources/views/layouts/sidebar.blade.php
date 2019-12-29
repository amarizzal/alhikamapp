<aside class="main-sidebar" id="sidebar-wrapper">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="https://adminlte.io/themes/AdminLTE/dist/img/user1-128x128.jpg" class="img-circle"
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
