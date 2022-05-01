<div class="layout-top-spacing">
    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4">
                @if ($kelas->banner != null)            
                    <img src="{{ Storage::url($kelas->banner) }}" height="300px" width="400px" class="" alt="widget-card-2">
                @else
                    <img src="{{ asset('admin_dashboard/assets/img/400x300.jpg') }}" class="img-fluid" alt="widget-card-2">
                @endif
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title">{{ $kelas->nama_kelas }}</h2>
                    <p class="tanggal" style="color: blue; font-weight: bold">{{ $kelas->tanggal_mulai }} - {{ $kelas->tanggal_berakhir }}</p>
                    @php
                        if($kelas->kelasKategori->TK_PAUD == 1){
                            $sasaran[] = "TK/PAUD";
                        }
                        if($kelas->kelasKategori->SD_MI == 1){
                            $sasaran[] = "SD/MI";
                        }
                        if($kelas->kelasKategori->SMP_MTS == 1){
                            $sasaran[] = "SMP/MTS";
                        }
                        if($kelas->kelasKategori->SMA_SMK_MA == 1){
                            $sasaran[] = "SMA/SMK/MA";
                        }
                        if($kelas->kelasKategori->Mahasiswa == 1){
                            $sasaran[] = "Mahasiswa";
                        }
                        if($kelas->kelasKategori->Masyarakat_Umum == 1){
                            $sasaran[] = "Masyarakat Umum";
                        }
                        if($kelas->kelasKategori->ASN_Polri_TNI == 1){
                            $sasaran[] = "ASN/Polri/TNI";
                        }
                    @endphp
                    <p class="card-text"> 
                        <small class="text-muted">
                            Sasaran : 
                            @foreach ($sasaran as $item)
                                @if($loop->last)
                                    {{ $item }}
                                @else
                                    {{ $item }},
                                @endif
                            @endforeach
                        </small>
                    </p>
                    <p class="card-text">Status : <span class="badge badge-warning">Proses Seleksi</span></p>
                    <hr>
                    <div class="alert alert-success mb-4" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                        <strong>Selamat!</strong> anda dinyatakan diterima di kelas {{ $kelas->nama_kelas }}.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="widget-content widget-content-area simple-pills mb-3">
    <ul class="nav nav-pills" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{ Request::segment(4) == 'home' ? 'active' : '' }}" href="{{ route('peserta.kelasku.home.index',[$kelas->id]) }}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::segment(4) == 'silabus' ? 'active' : '' }}" href="{{ route('peserta.kelasku.silabus.index',[$kelas->id]) }}">Silabus</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::segment(4) == 'peserta' ? 'active' : '' }}" href="{{ route('peserta.kelasku.peserta.index',[$kelas->id]) }}">Peserta</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::segment(4) == 'forum' ? 'active' : '' }}" href="{{ route('peserta.kelasku.forum.index',[$kelas->id]) }}">Forum</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::segment(4) == 'materi' ? 'active' : '' }}" href="{{ route('peserta.kelasku.materi.index',[$kelas->id]) }}">Materi</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::segment(4) == 'tugas' ? 'active' : '' }}" href="{{ route('peserta.kelasku.tugas.index',[$kelas->id]) }}">Tugas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::segment(4) == 'presensi' ? 'active' : '' }}" href="{{ route('peserta.kelasku.presensi.index',[$kelas->id]) }}">Presensi</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::segment(4) == 'quiz' ? 'active' : '' }}" href="{{ route('peserta.kelasku.quiz.index',[$kelas->id]) }}">Quiz</a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li> --}}
    </ul>
</div>