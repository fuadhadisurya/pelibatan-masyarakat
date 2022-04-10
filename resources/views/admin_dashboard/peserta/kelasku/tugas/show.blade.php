@extends('admin_dashboard.layouts.main')
@section('title')
    Detail Tugas | Kegiatan Pelibatan Masyarakat
@endsection

@section('content')
    <div class="row layout-top-spacing">
        
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">

            @include('admin_dashboard.peserta.kelasku.includes.navbar')
            <div class="row">
                <div class="col-sm-8">
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
                        <a href="{{ route('peserta.kelasku.tugas.index', [$kelas->id]) }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
                @if ($jawabanTugas != null)
                    <div class="col-sm-4">
                        <div class="widget-content-area br-4">
                            <div class="widget-heading">
                                <h5>Tugas Saya</h5>
                            </div>
                            <hr>
                            <div class="widget-content">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <th style="width: 5%">Status</th>
                                                <td style="width: 1%">:</td>
                                                <td><span class="badge badge-success">{{ $jawabanTugas->status }}</span></td>
                                            </tr>
                                            <tr>
                                                <th>Nilai</th>
                                                <td>:</td>
                                                @if ($jawabanTugas->nilai != null)
                                                    <td>{{ $jawabanTugas->nilai }}</td>
                                                @else
                                                    <td>Belum Dinilai</td>
                                                @endif
                                            </tr>
                                        </tbody>
                                    </table>  
                                    <div>
                                        <h6><strong>Catatan :</strong></h6>
                                        @if ($jawabanTugas->catatan != null)
                                            <p>{{ $jawabanTugas->catatan }}</p>
                                        @else
                                            <p>Tidak Ada</p>
                                        @endif
                                    </div>
                                </div>
                                @if ($jawabanTugas->status == "Terkirim")
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#lihatTugas">
                                                Lihat
                                            </button>
                                        </div>
                                        <div class="col-sm-6">
                                            <button type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target="#editTugas">
                                                Edit
                                            </button>
                                        </div>
                                    </div>                                    
                                @else
                                    <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#lihatTugas">
                                        Lihat
                                    </button>
                                @endif

                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-sm-4">
                        <div class="widget-content-area br-4">
                            <div class="widget-heading">
                                <h5>Tugas Saya</h5>
                            </div>
                            <hr>
                            <div class="widget-content">
                                <p>Tugas belum dikerjakan. Segera dikerjakan sebelum <span class="badge badge-info">{{ $tugas->batas_waktu }}</span></p>
                                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#submission">
                                    Kirim Jawaban
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </div>
@endsection

@push('modal')
    <div class="modal fade" id="editTugas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('peserta.kelasku.tugas.update', [$kelas->id, $tugas->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Tugas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="jawaban">Jawaban</label>
                            <textarea class="form-control" id="jawaban" name="jawaban" rows="10">{{ $jawabanTugas->jawaban }}</textarea>
                        </div>
                        <div class="form-group">
                            <h6 for="file_jawaban">File Jawaban</h6>
                            @foreach ($jawabanTugas->uploadJawabanTugas as $fileTugas)
                                <a href="{{ route('jawaban.tugas.download', [$kelas->id, $fileTugas->id]) }}"><i class="far fa-save"></i> {{ $fileTugas->jawaban_tugas }}</a><br>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <div class="custom-file-container" data-upload-id="mySecondImage">
                                <label>Upload File Tugas <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                <label class="custom-file-container__custom-file" >
                                    <input type="file" name="jawaban_tugas[]" class="custom-file-container__custom-file__custom-file-input" multiple>
                                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                </label>
                                <small id="uploadHelp" class="form-text text-muted">Jika anda mengupload file baru maka akan menghapus data yang sebelumnya yang sudah di upload</small>
                                <div class="custom-file-container__image-preview"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="lihatTugas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Lihat Tugas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="jawaban">Jawaban</label>
                        <textarea class="form-control" id="jawaban" name="jawaban" rows="10" readonly>{{ $jawabanTugas->jawaban }}</textarea>
                    </div>
                    <div class="form-group">
                        <h6 for="file_jawaban">File Jawaban</h6>
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
    <link href="{{ asset('admin_dashboard/assets/css/components/custom-media_object.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
    <script src="{{ asset('admin_dashboard/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
    <script>
        var secondUpload = new FileUploadWithPreview('mySecondImage')
    </script>
@endpush