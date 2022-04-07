<div class="layout-top-spacing">
    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="{{ asset('admin_dashboard/assets/img/400x300.jpg') }}" class="img-fluid" alt="widget-card-2">
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
                </div>
            </div>
        </div>
    </div>
</div>

<div class="widget-content widget-content-area simple-pills mb-3">
    <ul class="nav nav-pills" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{ Request::segment(4) == 'home' ? 'active' : '' }}" href="{{ route('tutor.kelasku.home.index',[$kelas->id]) }}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="silabus-tab" data-toggle="tab" href="#silabus" role="tab" aria-controls="silabus" aria-selected="false">Silabus</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::segment(4) == 'data-peserta' ? 'active' : '' }}" href="{{ route('tutor.kelasku.data-peserta.index',[$kelas->id]) }}">Peserta</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="forum-tab" data-toggle="tab" href="#forum" role="tab" aria-controls="forum" aria-selected="false">Forum</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::segment(4) == 'materi' ? 'active' : '' }}" href="{{ route('tutor.kelasku.materi.index',[$kelas->id]) }}">Materi</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tugas-tab" data-toggle="tab" href="#tugas" role="tab" aria-controls="tugas" aria-selected="false">Tugas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="presensi-tab" data-toggle="tab" href="#presensi" role="tab" aria-controls="presensi" aria-selected="false">Presensi</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="test-tab" data-toggle="tab" href="#test" role="tab" aria-controls="test" aria-selected="false">Test</a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li> --}}
    </ul>
</div>