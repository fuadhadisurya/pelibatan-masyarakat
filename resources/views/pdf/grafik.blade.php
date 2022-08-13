<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Grafik</title>
    <link href="{{ public_path().'/admin_dashboard/bootstrap/css/bootstrap.min.css' }}" rel="stylesheet" type="text/css" />
</head>
<body>
    <table class="table table-borderless bg-primary text-white">
        <tbody>
            <tr>
                <td>
                    <strong>Nama Kelas:</strong><br>
                    @if ($kelas != null)
                        {{ $kelas }}
                    @else
                        Semua
                    @endif
                </td>
                <td>
                    <strong>Periode:</strong><br>
                    @if ($kelas != null)
                        {{ $tahun }}
                    @else
                        {{ \Carbon\Carbon::now()->format('Y') }}
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Total Peserta Pendaftar Kelas:</strong><br>
                    {{ $pendaftar }}
                </td>
                <td>
                    <strong>Total Peserta Diterima:</strong><br>
                    {{ $pendaftar_diterima }}
                </td>
            </tr>
        </tbody>
    </table>
    <hr>
    <div class="card mb-3">
        <div class="card-header">Usia Peserta</div>
        <div class="card-body text-center d-flex justify-content-center">
            <img src="{{ $usia }}" style="width: 85%" alt="">
        </div>
    </div>
    {{-- <div style="page-break-before: always;"></div> --}}
    <div class="card mb-3">
        <div class="card-header">Tipe Anggota Peserta</div>
        <div class="card-body text-center d-flex justify-content-center">
            <img src="{{ $tipe_anggota }}" style="width: 85%" alt="">
        </div>
    </div>
    <div class="card">
        <div class="card-header">Jenis Kelamin Peserta</div>
        <div class="card-body text-center d-flex justify-content-center">
            <img src="{{ $jenis_kelamin }}" style="width: 85%" alt="">
        </div>
    </div>

<script type="text/javascript" src="{{ public_path().'/admin_dashboard/assets/js/libs/jquery-3.1.1.js' }}"></script>
<script type="text/javascript" src="{{ public_path().'/admin_dashboard/bootstrap/js/popper.min.js' }}"></script>
<script type="text/javascript" src="{{ public_path().'/admin_dashboard/bootstrap/js/bootstrap.min.js' }}"></script>
</body>
</html>