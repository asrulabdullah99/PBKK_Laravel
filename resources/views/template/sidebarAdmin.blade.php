
<li class="menu-header"><i class="fas fa-landmark"></i><span> Menu Utama</span></li>
<li class="nav-item{{ request()->is('pengguna') ? ' active' : '' }}"><a href="{{ url('/admin/pengguna') }}"><i class="fas fa-user-friends"></i><span> Pengguna</span></a></li>
<li class="nav-item{{ request()->is('kelas') ? ' active' : '' }}"><a href="{{ url('/admin/kelas') }}"><i class="fas fa-chalkboard-teacher"></i><span>Kelas</span></a></li>
<li class="nav-item{{ request()->is('matakuliah') ? ' active' : '' }}"><a href="{{ url('/admin/matakuliah') }}"><i class="fas fa-book-open"></i><span>Mata Kuliah</span></a></li>
<li class="nav-item{{ request()->is('dosen') ? ' active' : '' }}"><a href="{{ url('/admin/dosen') }}"><i class="fas fa-users"></i><span>Dosen</span></a></li>
<li class="nav-item{{ request()->is('mahasiswa') ? ' active' : '' }}"><a href="{{ url('/admin/mahasiswa') }}"><i class="fas fa-user-graduate"></i><span>Mahasiswa</span></a></li>
<li class="nav-item{{ request()->is('jadwal') ? ' active' : '' }}"><a href="{{ url('/admin/jadwal') }}"><i class="far fa-bell"></i><span>Jadwal</span></a></li>