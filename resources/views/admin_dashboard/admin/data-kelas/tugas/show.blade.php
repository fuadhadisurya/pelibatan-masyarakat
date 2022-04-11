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
                                    @foreach ($tugasBelum as $tugasBelum)
                                        <div class="row">
                                            <img class="rounded ml-3" src="{{ asset('admin_dashboard/assets/img/90x90.jpg') }}" width="50px" height="50px" alt="pic1">
                                            <div class="col">
                                                <h6 class=""><strong>{{ $tugasBelum->nama }}</strong></h6>
                                                <p class=""><span class="badge badge-danger">Nilai : Belum Mengumpulkan</span></p>
                                            </div>
                                        </div>
                                    @endforeach
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
                                    @foreach ($jawabanTugas as $jawabanTugas)
                                    <div class="row">
                                        <img class="rounded ml-3" src="{{ asset('admin_dashboard/assets/img/90x90.jpg') }}" width="50px" height="50px" alt="pic1">
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
                                                {{-- <a href="#" class="btn btn-primary btn-round btn-sm"><i class="far fa-check-square"></i></a> --}}
                                                <button type="button" class="btn btn-primary btn-round btn-sm" data-toggle="modal" data-target="#jawabanTugas{{ $jawabanTugas->id }}">
                                                    <i class="far fa-check-square"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
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
    <div class="modal fade" id="jawabanTugas{{ $jawabanTugas->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td style="width: 12%">Nama Tugas</td>
                                    <td style="width: 1%">:</td>
                                    <td>{{ $tugas->nama_tugas }}</td>
                                </tr>
                                <tr>
                                    <td>Deskripsi Tugas</td>
                                    <td>:</td>
                                    <td>{{ $tugas->deskripsi }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Pengirim</td>
                                    <td>:</td>
                                    <td>{{ $jawabanTugas->users->nama }}</td>
                                </tr>
                                <tr>
                                    <td>Batas Waktu</td>
                                    <td>:</td>
                                    <td>{{ $tugas->batas_waktu }}</td>
                                </tr>
                                <tr>
                                    <td>Waktu Kirim</td>
                                    <td>:</td>
                                    <td>{{ $jawabanTugas->updated_at }}</td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td>:</td>
                                    <td><span class="badge badge-success">Tepat Waktu</span></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <td><span class="badge badge-warning">Belum Dinilai</span></td>
                                </tr>
                                <tr>
                                    <td>Nilai</td>
                                    <td>:</td>
                                    <td>{{ $jawabanTugas->nilai }}</td>
                                </tr>
                                <tr>
                                    <td>Catatan</td>
                                    <td>:</td>
                                    @if ($jawabanTugas->catatan != null)
                                        <td>{{ $jawabanTugas->catatan }}</td>
                                    @else
                                        <td>Tidak ada catatan</td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>  
                    </div>
                    <hr>
                    <div>
                        <h6><strong>Jawaban :</strong></h6>
                        <p>{{ $jawabanTugas->jawaban }}</p>
                    </div>
                    <div>
                        @foreach ($jawabanTugas->uploadJawabanTugas as $fileTugas)
                            <a href="{{ route('jawaban.tugas.download', [$kelas->id, $fileTugas->id]) }}"><i class="far fa-save"></i> {{ $fileTugas->jawaban_tugas }}</a><br>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>  
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