@if(auth()->guard('admins')->check() && auth()->guard('admins')->user()->role_id == 1)

    <li class="{{ Request::is('dashboard*') ? 'active' : '' }}">
        <a href="{{ route('dashboard.index') }}"><i class="fa fa-edit"></i><span>Dashboard</span></a>
    </li>

    <li class="{{ Request::is('santris*') ? 'active' : '' }}">
        <a href="{{ route('santris.index') }}"><i class="fa fa-edit"></i><span>Santri</span></a>
    </li>

    <li class="{{ Request::is('users*') ? 'active' : '' }}">
        <a href="{{ route('users.index') }}"><i class="fa fa-edit"></i><span>Users</span></a>
    </li>

    {{--<li class="{{ Request::is('roles*') ? 'active' : '' }}">--}}
    {{--    <a href="{{ route('roles.index') }}"><i class="fa fa-edit"></i><span>Roles</span></a>--}}
    {{--</li>--}}



    <li class="{{ Request::is('kegiatans*') ? 'active' : '' }}">
        <a href="{{ route('kegiatans.index') }}"><i class="fa fa-edit"></i><span>Kegiatan</span></a>
    </li>

    <li class="{{ Request::is('jadwalKegiatans*') ? 'active' : '' }}">
        <a href="{{ route('jadwalKegiatans.index') }}"><i class="fa fa-edit"></i><span>Jadwal Kegiatan</span></a>
    </li>

    <li class="{{ Request::is('presensis*') ? 'active' : '' }}">
        <a href="{{ route('presensis.index') }}"><i class="fa fa-edit"></i><span>Presensi</span></a>
    </li>

    <li class="{{ Request::is('dendas*') ? 'active' : '' }}">
        <a href="{{ route('dendas.index') }}"><i class="fa fa-edit"></i><span>Rekap Denda</span></a>
    </li>

    <li class="{{ Request::is('perizinan') ? 'active' : '' }}">
        <a href="{{ route('perizinan.index') }}"><i class="fa fa-edit"></i><span>Perizinan</span></a>
    </li>

    <li class="{{ Request::is('pengumumen*') ? 'active' : '' }}">
        <a href="{{ route('pengumumen.index') }}"><i class="fa fa-edit"></i><span>Pengumuman</span></a>
    </li>

    <li class="{{ Request::is('komplains*') ? 'active' : '' }}">
        <a href="{{ route('komplains.index') }}"><i class="fa fa-edit"></i><span>Komplain</span></a>
    </li>

    {{--<li class="{{ Request::is('dendaDetails*') ? 'active' : '' }}">--}}
    {{--    <a href="{{ route('dendaDetails.index') }}"><i class="fa fa-edit"></i><span>Denda Details</span></a>--}}
    {{--</li>--}}
@elseif(auth()->guard('admins')->check() && auth()->guard('admins')->user()->role_id == 2)
    <li class="{{ Request::is('userSantri.dashboard') ? 'active' : '' }}">
        <a href="{{ route('userSantri.dashboard') }}"><i class="fa fa-edit"></i><span>Dashboard</span></a>
    </li>

    <li class="{{ Request::is('userSantri.pengumuman') ? 'active' : '' }}">
        <a href="{{ route('userSantri.pengumuman') }}"><i class="fa fa-edit"></i><span>Pengumuman</span></a>
    </li>

    <li class="{{ Request::is('userSantri.komplain') ? 'active' : '' }}">
        <a href="{{ route('userSantri.komplain') }}"><i class="fa fa-edit"></i><span>Komplain</span></a>
    </li>
@endif

