<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Grafik</title>
    <link href="{{ public_path().'/admin_dashboard/bootstrap/css/bootstrap.min.css' }}" rel="stylesheet" type="text/css" />
    <link href="{{ public_path().'/admin_dashboard/plugins/apex/apexcharts.css' }}" rel="stylesheet" type="text/css">
    <style>
        .apexcharts-canvas {
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <table class="table table-borderless bg-primary text-white">
        <tbody>
            <tr>
                <td>
                    <strong>Nama Kelas:</strong><br>
                    @if ($cariKelas != null)
                        {{ $cariKelas->nama_kelas }}
                    @else
                        Semua
                    @endif
                </td>
                <td>
                    <strong>Periode:</strong><br>
                    @if ($cariKelas != null)
                        {{ \Carbon\Carbon::parse($cariKelas->created_at)->format('Y') }}
                    @else
                        {{ \Carbon\Carbon::now()->format('Y') }}
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Total Peserta Pendaftar Kelas:</strong><br>
                    {{ count($peserta) }}
                </td>
                <td>
                    <strong>Total Peserta Diterima:</strong><br>
                    {{ count($peserta->where('status', 'Diterima')) }}
                </td>
            </tr>
        </tbody>
    </table>
    <hr>
    <h6>Usia Peserta</h6>
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

    @php
        $anak_anak = 0;
        $remaja = 0;
        $dewasa = 0;
        $manula = 0;

        $hari_ini = \Carbon\Carbon::now();
        foreach($peserta as $registrasiPeserta){
            if ($registrasiPeserta->user) {
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
        }

        $tk_paud = 0;
        $sd_mi = 0;
        $smp_mts = 0;
        $sma_smk_ma = 0;
        $mahasiswa = 0;
        $masyarakat_umum = 0;
        $asn_polri_tni = 0;
        foreach($peserta as $registrasiPeserta){
            if ($registrasiPeserta->user) {
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
        }

        $laki_laki = 0;
        $perempuan = 0;
        foreach($peserta as $registrasiPeserta){
            if ($registrasiPeserta->user) {
                if($registrasiPeserta->user->jenis_kelamin == 'Laki-laki'){
                    $laki_laki+=1;
                } elseif($registrasiPeserta->user->jenis_kelamin == 'Perempuan'){
                    $perempuan+=1;
                }
            }
        }
    @endphp

<script type="text/javascript" src="{{ public_path().'/admin_dashboard/assets/js/libs/jquery-3.1.1.js' }}"></script>
<script type="text/javascript" src="{{ public_path().'/admin_dashboard/bootstrap/js/popper.min.js' }}"></script>
<script type="text/javascript" src="{{ public_path().'/admin_dashboard/bootstrap/js/bootstrap.min.js' }}"></script>
<script type="text/javascript">
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
</body>
</html>