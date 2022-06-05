@extends('admin_dashboard.layouts.main')
@section('title')
    Edit Dokumentasi | Kegiatan Pelibatan Masyarakat
@endsection

@section('content')
    @include('admin_dashboard.admin.data-event.includes.navbar')
        
    <div class="row layout-top-spacing">
        
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">

            <div class="widget-content-area br-4">
                <form action="{{ route('data-event.dokumentasi.update', [$event->id, $dokumentasi->id]) }}" method="post" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        @if ($dokumentasi->tipe == 'jpg' || $dokumentasi->tipe == 'jpeg' || $dokumentasi->tipe == 'png')            
                            <figure>
                                <img src="{{ Storage::url($dokumentasi->dokumentasi) }}" height="300px" width="400px" class="" alt="widget-card-2">
                                <figcaption>
                                    <a href="{{ route('dokumentasi.download', [$event->id, $dokumentasi->id]) }}"><i class="far fa-save"></i> {{ $dokumentasi->nama_file }}</a><br>
                                </figcaption>
                            </figure>    
                        @else
                            <a href="{{ route('dokumentasi.download', [$event->id, $dokumentasi->id]) }}"><i class="far fa-save"></i> {{ $dokumentasi->nama_file }}</a><br>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="custom-file-container" data-upload-id="mySecondImage">
                            <label>Upload File Dokumentasi <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                            <label class="custom-file-container__custom-file" >
                                <input type="file" name="dokumentasi" class="custom-file-container__custom-file__custom-file-input">
                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                            </label>
                            <small id="uploadHelp" class="form-text text-muted">Jika anda mengupload file baru maka akan menghapus data yang sebelumnya yang sudah di upload</small>
                            <div class="custom-file-container__image-preview"></div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('data-event.dokumentasi.index', [$event->id]) }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

@push('styles')
    <link href="{{ asset('admin_dashboard/assets/css/components/tabs-accordian/custom-tabs.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/css/elements/alert.css') }}">
    <link href="{{ asset('admin_dashboard/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .btn-light { border-color: transparent; }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('admin_dashboard/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
    <script>
        var secondUpload = new FileUploadWithPreview('mySecondImage')
    </script>
@endpush