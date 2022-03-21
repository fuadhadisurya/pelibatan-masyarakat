<div class="sidebar-wrapper sidebar-theme">
            
    <nav id="sidebar">
        <div class="profile-info">
            <figure class="user-cover-image"></figure>
            <div class="user-info">
                <img src="{{ asset('admin_dashboard/assets/img/90x90.jpg') }}" alt="avatar">
                <h6>{{ Auth::user()->nama }}</h6>
                <p>{{ Auth::user()->level }}</p>
            </div>
        </div>
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
            @if (Auth::user()->level == 'admin')
                <li class="menu {{ Request::segment(2) == 'dashboard' ? 'active' : '' }}">
                    <a href="{{ url('/admin/dashboard') }}" aria-expanded="{{ Request::segment(2) == 'dashboard' ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            <span> Dashboard</span>
                        </div>
                    </a>
                </li>
                <li class="menu {{ Request::segment(2) == 'tutor' ? 'active' : '' }}">
                    <a href="{{ route('tutor.index') }}" aria-expanded="{{ Request::segment(2) == 'tutor' ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            <span> Tutor</span>
                        </div>
                    </a>
                </li>
                <li class="menu">
                    <a href="#kelas" data-toggle="collapse" aria-expanded="{{ Request::segment(2) == 'kelas' ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg>
                            <span> Kelas</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                    </a>
                    <ul class="{{ Request::segment(2) == 'kelas' ? 'toggle' : 'collapse' }} submenu list-unstyled" id="kelas" data-parent="#accordionExample">
                        <li class="{{ Request::segment(2) == 'kelas' ? 'active' : '' }}">
                            <a href="{{ route('kelas.index') }}"> Kelola Kelas </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"> Data Calon Peserta </a>
                        </li>                           
                    </ul>
                </li>
                <li class="menu">
                    <a href="{{ url('/admin/notifikasi') }}" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                            <span> Notifikasi</span>
                        </div>
                    </a>
                </li>
                <li class="menu">
                    <a href="#laporan" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                            <span> Laporan</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="laporan" data-parent="#accordionExample">
                        <li>
                            <a href="javascript:void(0);"> Daftar Hadir Peserta </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"> Daftar Hadir Tutor </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"> Silabus Tutor </a>
                        </li>                           
                    </ul>
                </li>

                <li class="menu">
                    <a href="#grafik" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path></svg>
                            <span> Grafik</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="grafik" data-parent="#accordionExample">
                        <li>
                            <a href="javascript:void(0);"> Usia </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"> Jenis Kelamin </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"> Pendidikan </a>
                        </li>                           
                        <li>
                            <a href="javascript:void(0);"> Kelas </a>
                        </li>                           
                    </ul>
                </li>

                <li class="menu">
                    <a href="javascript:void(0);" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                            <span> Alaret</span>
                        </div>
                    </a>
                </li>

                <li class="menu">
                    <a href="#hasilNilai" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                            <span> Hasil Nilai</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="hasilNilai" data-parent="#accordionExample">
                        <li>
                            <a href="javascript:void(0);"> Pra Test </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"> Post Test </a>
                        </li>                      
                    </ul>
                </li>
            @elseif(Auth::user()->level == 'tutor')
                <li class="menu {{ Request::segment(2) == 'dashboard' ? 'active' : '' }}">
                    <a href="{{ url('/admin/dashboard') }}" aria-expanded="{{ Request::segment(2) == 'dashboard' ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            <span> Dashboard</span>
                        </div>
                    </a>
                </li>
                <li class="menu">
                    <a href="#hasilNilai" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                            <span> Hasil Nilai</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="hasilNilai" data-parent="#accordionExample">
                        <li>
                            <a href="javascript:void(0);"> Pra Test </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"> Post Test </a>
                        </li>                      
                    </ul>
                </li>
            @else
                <li class="menu {{ Request::segment(2) == 'dashboard' ? 'active' : '' }}">
                    <a href="{{ url('/peserta/dashboard') }}" aria-expanded="{{ Request::segment(2) == 'dashboard' ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            <span> Dashboard</span>
                        </div>
                    </a>
                </li>
                <li class="menu {{ Request::segment(2) == 'biodata' ? 'active' : '' }}">
                    <a href="{{ url('/peserta/biodata') }}" aria-expanded="{{ Request::segment(2) == 'biodata' ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                            <span> Biodata</span>
                        </div>
                    </a>
                </li>
                <li class="menu">
                    <a href="#pengaturan" data-toggle="collapse" aria-expanded="{{ Request::segment(2) == 'pengaturan' ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                            <span> Pengaturan</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                    </a>
                    <ul class="{{ Request::segment(2) == 'pengaturan' ? 'toggle' : 'collapse' }} submenu list-unstyled" id="pengaturan" data-parent="#accordionExample">
                        <li class="{{ Request::segment(2) == 'pengaturan' ? 'active' : '' }}">
                            <a href="{{ route('peserta.kelas.index') }}"> Profil </a>
                        </li>                          
                        <li>
                            <a href="{{ url('peserta/akun') }}"> Akun </a>
                        </li>                           
                    </ul>
                </li>
                <li class="menu">
                    <a href="#kelas" data-toggle="collapse" aria-expanded="{{ Request::segment(2) == 'kelas' ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg>
                            <span> Kelas</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                    </a>
                    <ul class="{{ Request::segment(2) == 'kelas' ? 'toggle' : 'collapse' }} submenu list-unstyled" id="kelas" data-parent="#accordionExample">
                        <li class="{{ Request::segment(2) == 'kelas' ? 'active' : '' }}">
                            <a href="{{ route('peserta.kelas.index') }}"> Pilih Kelas </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"> Kelasku </a>
                        </li>                           
                    </ul>
                </li>
            @endif
        </ul>
        
    </nav>

</div>