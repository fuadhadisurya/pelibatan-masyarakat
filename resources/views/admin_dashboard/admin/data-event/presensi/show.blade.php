@extends('admin_dashboard.layouts.main')
@section('title')
    Detail Presensi | Kegiatan Pelibatan Masyarakat
@endsection

@section('content')
    @include('admin_dashboard.admin.data-kelas.includes.navbar')

    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="widget-content-area br-4 mb-3">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="far fa-times-circle"></i></button>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td style="width: 15%">Kegiatan</td>
                                <td style="width: 1%">:</td>
                                <td>{{ $presensi->kelas->nama_kelas }}</td>
                            </tr>
                            <tr>
                                <td>Tutor</td>
                                <td>:</td>
                                <td>{{ $presensi->kelas->tutor->nama }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal</td>
                                <td>:</td>
                                <td>{{ \Carbon\Carbon::parse($presensi->tanggal_mulai)->format('d M Y') }}</td>
                            </tr>
                            <tr>
                                <td>Waktu Pengisian</td>
                                <td>:</td>
                                <td><span class="badge badge-warning">{{ \Carbon\Carbon::parse($presensi->tanggal_mulai)->format('H:i') .' sampai '. \Carbon\Carbon::parse($presensi->tanggal_berakhir)->format('H:i') }}</span></td>
                            </tr>
                        </tbody>
                    </table>  
                </div>
                <hr>
                <a href="{{ route('data-kelas.presensi.index', [$kelas->id]) }}" class="btn btn-secondary">Kembali</a>
            </div>

            <div class="card shadow-sm mb-3">
                <div class="card-header">
                    <h5 class="card-title">Data Presensi Tutor</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Tipe Anggota</th>
                                <th>Waktu Mengisi</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                @if ($tutor != null)
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $tutor->nama }}</td>
                                        <td>Tutor</td>
                                        <td></td>
                                        @if ($tutor->status != null )
                                            <td><span class="badge badge-info">{{ $tutor->status }}</span></td>
                                        @else
                                            <td><span class="badge badge-warning">Belum Mengisi</span></td>
                                        @endif
                                    </tr>
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">Data tidak ditemukan</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>  
                    </div> 
                </div>
            </div>

            <div class="card shadow-sm mb-3">
                <div class="card-header">
                    <h5 class="card-title">Data Presensi Peserta</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Tipe Anggota</th>
                                <th>Waktu Mengisi</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                @if (count($dataPresensi) > 0)
                                    @foreach ($dataPresensi as $dataPresensi)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $dataPresensi->user->nama }}</td>
                                            <td>{{ $dataPresensi->user->tipe_anggota }}</td>
                                            <td>{{ $dataPresensi->created_at }}</td>
                                            @if ($dataPresensi->status)
                                                <td><span class="badge badge-info">{{ $dataPresensi->status }}</span></td>
                                            @else
                                                <td><span class="badge badge-warning">Belum Mengisi</span></td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">Data tidak ditemukan</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>  
                    </div> 
                </div>
            </div>
        </div>
    </div>
@endsection

@push('modal')
    
@endpush

@push('styles')
    <link href="{{ asset('admin_dashboard/assets/css/components/tabs-accordian/custom-tabs.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/css/elements/alert.css') }}">
    <link href="{{ asset('admin_dashboard/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_dashboard/plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin_dashboard/plugins/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin_dashboard/assets/css/components/custom-media_object.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
    <script src="{{ asset('admin_dashboard/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard/plugins/flatpickr/flatpickr.js') }}"></script>
    <script>
        var secondUpload = new FileUploadWithPreview('mySecondImage')
    </script>
    <script>
        var f2 = flatpickr(document.getElementById('dateTimeFlatpickr'), {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            time_24hr: true
        });
    </script>
@endpush