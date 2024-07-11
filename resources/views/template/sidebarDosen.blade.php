
<li class="menu-header"><i class="fas fa-landmark"></i><span> Menu Utama Dosen</span></li>
<li class="nav-item{{ request()->is('view') ? ' active' : '' }}"><a href="{{ url('/dosen/jadwal') }}"><i class="fas fa-user-friends"></i><span> Jadwal</span></a></li>