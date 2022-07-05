@extends('admin_dashboard.layouts.main')
@section('title')
    Kelas | Kegiatan Pelibatan Masyarakat
@endsection

@section('content')
    <div class="row layout-top-spacing">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 mb-3">
                    <div class="card sticky-top" style="top: 100px;">
                        <div class="card-body">
                            <form action="{{ route('peserta.kelas.index') }}" method="GET" autocomplete="off">
                                <h4 class="mb-3">Filter</h4>
                                <div class="input-group input-group-sm mb-4">
                                    <input type="text" class="form-control" name="search" placeholder="Pencarian" value="{{ $search }}" aria-label="Pencarian">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></button>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h5 class="mb-2">Urutkan</h5>
                                    @if ($sort != null)
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="sort" value="Terbaru" name="sort" class="custom-control-input" onchange="this.form.submit();" {{ $sort == "Terbaru" ? "checked" : "" }}>
                                            <label class="custom-control-label" for="sort">Terbaru</label>
                                        </div>
                                    @else
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="sort" value="Terbaru" name="sort" class="custom-control-input" onchange="this.form.submit();" checked>
                                            <label class="custom-control-label" for="sort">Terbaru</label>
                                        </div>
                                    @endif
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="sort2" value="Terlama" name="sort" class="custom-control-input" onchange="this.form.submit();" {{ $sort == "Terlama" ? "checked" : "" }}>
                                        <label class="custom-control-label" for="sort2">Terlama</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h5 class="mb-2">Tipe Peserta</h5>
                                    <div class="n-chk">
                                        <label class="new-control new-checkbox checkbox-primary">
                                            <input type="checkbox" name='category[]' id="category" class="new-control-input" value="TK/PAUD">
                                            <span class="new-control-indicator"></span>TK/PAUD
                                        </label>
                                    </div>
                                    <div class="n-chk">
                                        <label class="new-control new-checkbox checkbox-primary">
                                            <input type="checkbox" name='category[]' id="category" class="new-control-input" value="SD/MI">
                                            <span class="new-control-indicator"></span>SD/MI
                                        </label>
                                    </div>
                                    <div class="n-chk">
                                        <label class="new-control new-checkbox checkbox-primary">
                                            <input type="checkbox" name='category[]' id="category" class="new-control-input" value="SMP/MTS">
                                            <span class="new-control-indicator"></span>SMP/MTS
                                        </label>
                                    </div>
                                    <div class="n-chk">
                                        <label class="new-control new-checkbox checkbox-primary">
                                            <input type="checkbox" name='category[]' id="category" class="new-control-input" value="SMA/SMK/MA">
                                            <span class="new-control-indicator"></span>SMA/SMK/MA
                                        </label>
                                    </div>
                                    <div class="n-chk">
                                        <label class="new-control new-checkbox checkbox-primary">
                                            <input type="checkbox" name='category[]' id="category" class="new-control-input" value="Mahasiswa">
                                            <span class="new-control-indicator"></span>Mahasiswa
                                        </label>
                                    </div>
                                    <div class="n-chk">
                                        <label class="new-control new-checkbox checkbox-primary">
                                            <input type="checkbox" name='category[]' id="category" class="new-control-input" value="Masyarakat Umum">
                                            <span class="new-control-indicator"></span>Masyarakat Umum
                                        </label>
                                    </div>
                                    <div class="n-chk">
                                        <label class="new-control new-checkbox checkbox-primary">
                                            <input type="checkbox" name='category[]' id="category" class="new-control-input" value="ASN/Polri/TNI">
                                            <span class="new-control-indicator"></span>ASN/Polri/TNI
                                        </label>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="row">
                        @if ($class->count())     
                            @foreach ($class as $key=>$kelas)
                                <div class="col-sm-6 mb-3">
                                    <a href="{{ url('peserta/kelas/'.$kelas->id) }}">
                                        <div class="card h-100">
                                            @if($kelas->banner != null)
                                                <img src="{{ Storage::url($kelas->banner) }}" class="card-img-top" alt="widget-card-2">
                                            @else
                                                <img src="{{ asset('admin_dashboard/assets/img/400x300.jpg') }}" class="card-img-top" alt="widget-card-2">
                                            @endif
                                            <div class="card-body">
                                                <p class="meta-date text-primary"><strong>{{ \Carbon\Carbon::parse($kelas->tanggal_mulai)->format('j F Y') }} - {{ \Carbon\Carbon::parse($kelas->tanggal_berakhir)->format('j F Y') }}</strong></p>
                                                <h5 class="card-title"><strong>{{ $kelas->nama_kelas }}</strong></h5>
                                                <p class="card-text">{!! Str::limit($kelas->deskripsi, 150, $end='...') !!}</p>
                                                @php
                                                    if($kelas->kelasKategori->TK_PAUD == 1){
                                                        $sasaran[$key][] = "TK/PAUD";
                                                    }
                                                    if($kelas->kelasKategori->SD_MI == 1){
                                                        $sasaran[$key][] = "SD/MI";
                                                    }
                                                    if($kelas->kelasKategori->SMP_MTS == 1){
                                                        $sasaran[$key][] = "SMP/MTS";
                                                    }
                                                    if($kelas->kelasKategori->SMA_SMK_MA == 1){
                                                        $sasaran[$key][] = "SMA/SMK/MA";
                                                    }
                                                    if($kelas->kelasKategori->Mahasiswa == 1){
                                                        $sasaran[$key][] = "Mahasiswa";
                                                    }
                                                    if($kelas->kelasKategori->Masyarakat_Umum == 1){
                                                        $sasaran[$key][] = "Masyarakat Umum";
                                                    }
                                                    if($kelas->kelasKategori->ASN_Polri_TNI == 1){
                                                        $sasaran[$key][] = "ASN/Polri/TNI";
                                                    }
                                                @endphp
                                                <p> 
                                                    Sasaran : 
                                                    @foreach ($sasaran[$key] as $item)
                                                        @if($loop->last)
                                                            {{ $item }}
                                                        @else
                                                            {{ $item }},
                                                        @endif
                                                    @endforeach
                                                </p>
                                            </div>
                                            <div class="card-footer">
                                                <div class="row d-flex justify-content-start align-items-center">
                                                    <div class="ml-3 mr-1">
                                                        @if ($kelas->tutor->foto != null)
                                                            <span class="avatar-title rounded-circle"><img alt="avatar" src="{{ Storage::url($kelas->tutor->foto) }}" width="30" height="30" class="rounded-circle" /></span>
                                                        @else
                                                            <span class="avatar-title rounded-circle"><img alt="avatar" src="{{ asset('admin_dashboard/assets/img/90x90.jpg') }}" width="30" height="30" class="rounded-circle" /></span>
                                                        @endif
                                                    </div>
                                                    <div class="">{{ $kelas->tutor->nama }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <p class="text-center"><b>Kelas Tidak Ditemukan</b></p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    {{ $class->links() }}
                </div>
            </div>
        </div>

    </div>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_dashboard/plugins/font-icons/fontawesome/css/fontawesome.css') }}">
    <link href="{{asset('admin_dashboard/assets/css/components/cards/card.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_dashboard/assets/css/elements/avatar.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/css/elements/alert.css') }}">
@endpush

@push('scripts')

@endpush