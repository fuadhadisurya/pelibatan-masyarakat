@extends('admin_dashboard.layouts.main')
@section('title')
    Dashboard | Sibakat
@endsection

@section('content')
    <div class="row layout-top-spacing">
        
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="widget-content-area br-4">
                <div class="widget-one">
                    <h6>Dashboard</h6>
                    <form action="{{ url('admin/dashboard') }}" method="GET" autocomplete="off">
                        {{-- <div class="input-group input-group-sm my-2"> --}}
                            <div class="row">
                                <div class="col-sm-4">
                                    <select class="form-control select2" id="sk" name="kelas" required>
                                        <option value="">Pilih Kelas</option>
                                        @if ($namaKelas != null)
                                            @foreach ($namaKelas as $class)
                                                @if ($cariKelas!=null)
                                                    <option value="{{ $class }}" {{ ($class == preg_replace('~\\s+\\S+$~', "", $cariKelas->nama_kelas)) ? 'selected': '' }}>{{ $class }}</option>
                                                @else
                                                    <option value="{{ $class }}">{{ $class }}</option>                                           
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <select class="form-control select2" id="st" name="tahun" required>
                                        <option value="">Pilih Tahun</option>
                                        @if ($pilihTahun != null)
                                            @foreach ($pilihTahun as $tahun)
                                                @if ($cariKelas!=null)
                                                    <option value="{{ $tahun }}" {{ ($tahun == \Carbon\Carbon::parse($cariKelas->tanggal_mulai)->format('Y')) ? 'selected': '' }}>{{ $tahun }}</option>                                           
                                                @else
                                                    <option value="{{ $tahun }}">{{ $tahun }}</option>                                           
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-sm-2 input-group-append">
                                    <button class="btn btn-primary btn-block" type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                        Cari
                                    </button>
                                </div>
                                <div class="col-sm-2 input-group-append">
                                    <a href="{{ url('/admin/dashboard') }}" class="btn btn-warning btn-block d-flex align-items-center justify-content-center">
                                        Reset
                                    </a>
                                </div>
                            </div>
                        {{-- </div> --}}
                    </form>
                </div>
            </div>
        </div> 
        <div class="col-xl-4">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-content-area br-4">
                        <div class="widget-one">
                            <h6>Nama Kelas</h6>
                            @if ($cariKelas != null)
                                <p class="stats">{{ $cariKelas->nama_kelas }}</p>
                            @else
                                <p class="stats">Semua</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div> 
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-content-area br-4">
                        <div class="widget-one">
                            <h6>Periode</h6>
                            @if ($cariKelas != null)
                                <p class="stats">{{ \Carbon\Carbon::parse($cariKelas->created_at)->format('Y') }}</p>
                            @else
                                <p class="stats">{{ \Carbon\Carbon::now()->format('Y') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-content-area br-4">
                        <div class="widget-one">
                            <h6>Total Peserta Pendaftar Kelas</h6>
                            <p class="stats">{{ count($peserta) }}</p>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-content-area br-4">
                        <div class="widget-one">
                            <h6>Total Peserta Diterima</h6>
                            <p class="stats">{{ count($peserta->where('status', 'Diterima')) }}</p>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
        
        <div id="chartBar" class="col-xl-8 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">                                
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Usia Peserta</h4> 
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div id="usiaChart" class=""></div>
                </div>
            </div>
        </div>
        
        <div id="chartBar" class="col-xl-7 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">                                
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Tipe Anggota Peserta</h4> 
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div id="tipePesertaChart" class=""></div>
                </div>
            </div>
        </div>
        
        <div id="chartDonut" class="col-xl-5 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">                                
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Jenis Kelamin Peserta</h4> 
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div id="jenisKelaminChart" class=""></div>
                </div>
            </div>
        </div>

    </div>
    @php
        $anak_anak = 0;
        $remaja = 0;
        $dewasa = 0;
        $manula = 0;

        $hari_ini = \Carbon\Carbon::now();
        foreach($peserta as $registrasiPeserta){
            $tanggal_lahir = \Carbon\Carbon::parse($registrasiPeserta->user->tanggal_lahir);
            $umur = $tanggal_lahir->diffInYears($hari_ini); 

            if($umur>=5 && $umur<=11){
                $anak_anak+=1;
            } elseif($umur>=12 && $umur<=19){
                $remaja+=1;
            } elseif($umur>=20 && $umur<=49){
                $dewasa+=1;
            } elseif($umur>=50){
                $manula+=1;
            }
        }

        $tk_paud = 0;
        $sd_mi = 0;
        $smp_mts = 0;
        $sma_smk_ma = 0;
        $mahasiswa = 0;
        $masyarakat_umum = 0;
        $asn_polri_tni = 0;
        foreach($peserta as $registrasiPeserta){
            if($registrasiPeserta->user->tipe_anggota == 'TK/PAUD'){
                $tk_paud+=1;
            } elseif($registrasiPeserta->user->tipe_anggota == 'SD/MI'){
                $sd_mi+=1;
            } elseif($registrasiPeserta->user->tipe_anggota == 'SMP/MTS'){
                $smp_mts+=1;
            } elseif($registrasiPeserta->user->tipe_anggota == 'SMA/SMK/MA'){
                $sma_smk_ma+=1;
            } elseif($registrasiPeserta->user->tipe_anggota == 'Mahasiswa'){
                $mahasiswa+=1;
            } elseif($registrasiPeserta->user->tipe_anggota == 'Masyarakat Umum'){
                $masyarakat_umum+=1;
            } elseif($registrasiPeserta->user->tipe_anggota == 'ASN/Polri/TNI'){
                $asn_polri_tni+=1;
            }
        }

        $laki_laki = 0;
        $perempuan = 0;
        foreach($peserta as $registrasiPeserta){
            if($registrasiPeserta->user->jenis_kelamin == 'Laki-laki'){
                $laki_laki+=1;
            } elseif($registrasiPeserta->user->jenis_kelamin == 'Perempuan'){
                $perempuan+=1;
            }
        }
    @endphp
@endsection

@push('styles')
    <link href="{{ asset('admin_dashboard/plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin_dashboard/assets/css/dashboard/dash_2.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/plugins/select2/select2.min.css') }}">
    <style>
        .apexcharts-canvas {
            margin: 0 auto;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('admin_dashboard/plugins/apex/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard/assets/js/dashboard/dash_2.js') }}"></script>
    <script src="{{ asset('admin_dashboard/plugins/select2/select2.min.js') }}"></script>
    <script>
        var donutChart = {
            chart: {
                height: 390,
                type: 'donut',
                toolbar: {
                show: false,
                }
            },
            colors: ['#0000FF', '#FF1493'],
            series: [{{ $laki_laki }}, {{ $perempuan }}],
            labels: ['Laki-laki', 'Perempuan'], 
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        }

        var donut = new ApexCharts(
            document.querySelector("#jenisKelaminChart"),
            donutChart
        );

        donut.render();
    </script>
    <script>
        // Tipe Peserta Bar
        var tipePesertaBar = {
            chart: {
                height: 390,
                type: 'bar',
                toolbar: {
                    show: false,
                }
            },
            // colors: ['#4361ee'],
            plotOptions: {
                bar: {
                    horizontal: true,
                }
            },
            dataLabels: {
                enabled: false
            },
            series: [{
                name: 'Tipe Peserta',
                data: [{{ $tk_paud }}, {{ $sd_mi }}, {{ $smp_mts }}, {{ $sma_smk_ma }}, {{ $mahasiswa }}, {{ $masyarakat_umum }}, {{ $asn_polri_tni }}]
            }],
            xaxis: {
                categories: ['TK/PAUD', 'SD/MI', 'SMP/MTS', 'SMA/SMK/MA', 'Mahasiswa', 'Masyarakat Umum', 'ASN/POLRI/TNI'],
            }
        }

        var tipePesertaChart = new ApexCharts(
            document.querySelector("#tipePesertaChart"),
            tipePesertaBar
        );

        tipePesertaChart.render();
    </script>
    <script>
        // Usia Bar
        var usiaBar = {
            chart: {
                height: 390,
                type: 'bar',
                toolbar: {
                    show: false,
                }
            },
            // colors: ['#4361ee'],
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded' 
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            series: [{
                name: 'Usia',
                data: [{{ $anak_anak }}, {{ $remaja }}, {{ $dewasa }}, {{ $manula }}]
            }],
            xaxis: {
                categories: ['Anak-anak (5 s.d. 11 Tahun)', 'Remaja (12 s.d. 19 Tahun)', 'Dewasa (20 s.d. 49 Tahun)', 'Manula (>50 Tahun)'],
            }
        }

        var usiaChart = new ApexCharts(
            document.querySelector("#usiaChart"),
            usiaBar
        );

        usiaChart.render();
    </script>
    <script>
        var kelas = $("#sk").select2({
            placeholder: "Pilih Kelas",
        });
        var tahun = $("#st").select2({
            placeholder: "Pilih Tahun",
        });
    </script>
@endpush