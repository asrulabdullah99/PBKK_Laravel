
<li class="menu-header"><i class="fas fa-landmark"></i><span> Menu Utama Mahasiswa</span></li>
<li class="nav-item{{ request()->is('view') ? ' active' : '' }}"><a href="{{ url('/mahasiswa/jadwal') }}"><i class="fas fa-user-friends"></i><span> List Jadwal</span></a></li>