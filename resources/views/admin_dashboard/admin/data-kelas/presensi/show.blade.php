@extends('admin_dashboard.layouts.main')
@section('title')
    Detail Tugas | Kegiatan Pelibatan Masyarakat
@endsection

@section('content')
    <div class="row layout-top-spacing">
        
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">

            @include('admin_dashboard.admin.data-kelas.includes.navbar')
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
                <a href="{{ route('data-kelas.tugas.index', [$kelas->id]) }}" class="btn btn-secondary">Kembali</a>
            </div>

            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="card-title">Data Presensi</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Tipe Anggota</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                @foreach ($user as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->nama }}</td>
                                        <td>{{ ucwords(strtolower(\Indonesia::findDistrict($user->kecamatan)->name)) }}</td>
                                        <td>{{ $user->tipe_anggota }}</td>
                                        @if ($user->status)
                                            <td>{{ $user->status }}</td>
                                        @else
                                            <td><span class="badge badge-warning">Belum Mengisi</span></td>
                                        @endif
                                    </tr>
                                @endforeach
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