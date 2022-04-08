@extends('admin_dashboard.layouts.main')
@section('title')
    Edit Materi | Kegiatan Pelibatan Masyarakat
@endsection

@section('content')
    <div class="row layout-top-spacing">
        
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">

            @include('admin_dashboard.tutor.kelasku.includes.navbar')

            <div class="widget-content-area br-4">
                <form action="{{ route('tutor.kelasku.materi.update', [$kelas->id, $materi->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="nama_materi">Nama Materi</label>
                        <input type="text" class="form-control" id="nama_materi" name="nama_materi" placeholder="Nama Materi" value="{{ $materi->nama_materi }}" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5">{{ $materi->deskripsi }}</textarea>
                    </div>
                    <div class="form-group">
                        @foreach ($materi->uploadMateri as $fileMateri)
                            <a href="{{ route('materi.download', [$kelas->id, $fileMateri->id]) }}"><i class="far fa-save"></i> {{ $fileMateri->materi }}</a><br>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <div class="custom-file-container" data-upload-id="mySecondImage">
                            <label>Upload File Materi <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                            <label class="custom-file-container__custom-file" >
                                <input type="file" name="materi[]" class="custom-file-container__custom-file__custom-file-input" multiple>
                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                            </label>
                            <small id="uploadHelp" class="form-text text-muted">Jika anda mengupload file baru maka akan menghapus data yang sebelumnya yang sudah di upload</small>
                            <div class="custom-file-container__image-preview"></div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('tutor.kelasku.materi.index', [$kelas->id]) }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

@push('styles')
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