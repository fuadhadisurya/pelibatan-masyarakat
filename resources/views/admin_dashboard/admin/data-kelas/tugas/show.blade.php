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
                                <td style="width: 15%">Tanggal</td>
                                <td style="width: 1%">:</td>
                                <td>{{ $tugas->created_at }}</td>
                            </tr>
                            @if ($tugas->created_at != $tugas->updated_at)
                                <tr>
                                    <td>Tanggal Diperbarui</td>
                                    <td>:</td>
                                    <td>{{ $tugas->updated_at }}</td>
                                </tr>
                            @endif
                            <tr>
                                <td>Batas Waktu</td>
                                <td>:</td>
                                <td><span class="badge badge-info">{{ $tugas->batas_waktu }}</span></td>
                            </tr>
                            <tr>
                                <td>Nama Tugas</td>
                                <td>:</td>
                                <td>{{ $tugas->nama_tugas }}</td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td>:</td>
                                <td>{{ $tugas->deskripsi }}</td>
                            </tr>
                        </tbody>
                    </table>  
                </div>
                <div>
                    @foreach ($tugas->uploadTugas as $fileTugas)
                        <a href="{{ route('tugas.download', [$kelas->id, $fileTugas->id]) }}"><i class="far fa-save"></i> {{ $fileTugas->tugas }}</a><br>
                    @endforeach
                </div>
                <hr>
                <a href="{{ route('data-kelas.tugas.index', [$kelas->id]) }}" class="btn btn-secondary">Kembali</a>
            </div>

            <div class="widget-content-area br-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h5 class="card-title">Belum Mengumpulkan</h5>
                            </div>
                            <div class="card-body">
                                <div class="card-text">
                                    @if(count($tugasBelum) > 0)
                                        @foreach ($tugasBelum as $tugasBelum)
                                            <div class="row">
                                                @if ($tugasBelum->foto != null)
                                                    <img class="rounded ml-3" src="{{ Storage::url($tugasBelum->foto) }}" width="50px" height="50px" alt="pic1">
                                                @else
                                                    <img class="rounded ml-3" src="{{ asset('admin_dashboard/assets/img/90x90.jpg') }}" width="50px" height="50px" alt="pic1">
                                                @endif
                                                <div class="col">
                                                    <h6 class=""><strong>{{ $tugasBelum->nama }}</strong></h6>
                                                    <p class=""><span class="badge badge-danger">Nilai : Belum Mengumpulkan</span></p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <span class="d-flex justify-content-center">Yeay, Semuanya sudah mengumpulkan tugas</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h5 class="card-title">Sudah Mengumpulkan</h5>
                            </div>
                            <div class="card-body">
                                <div class="card-text">
                                    @if(count($jawabanTugas) > 0)
                                        @foreach ($jawabanTugas as $index=>$jawabanTugas)
                                        <div class="row">
                                            @if ($jawabanTugas->users->foto != null)
                                                <img class="rounded ml-3" src="{{ Storage::url($jawabanTugas->users->foto) }}" width="50px" height="50px" alt="pic1">
                                            @else
                                                <img class="rounded ml-3" src="{{ asset('admin_dashboard/assets/img/90x90.jpg') }}" width="50px" height="50px" alt="pic1">
                                            @endif
                                            <div class="col">
                                                <h6 class=""><strong>{{ $jawabanTugas->users->nama }}</strong></h6>
                                                @if ($jawabanTugas->nilai != null)
                                                    <p class=""><span class="badge badge-success">Nilai : {{ $jawabanTugas->nilai }}</span></p>                                            
                                                @else
                                                    <p class=""><span class="badge badge-warning">Nilai : Belum Dinilai</span></p>
                                                @endif
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="col">
                                                    <a href="{{ route('data-kelas.tugas.periksa-tugas.show', [$kelas->id, $tugas->id, $jawabanTugas->id]) }}" class="btn btn-primary btn-round btn-sm"><i class="far fa-check-square"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    @else
                                        <span class="d-flex justify-content-center">Yah, semua peserta belum mengumpulkan tugas</span>
                                    @endif
                                </div>
                            </div>
                        </div>
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