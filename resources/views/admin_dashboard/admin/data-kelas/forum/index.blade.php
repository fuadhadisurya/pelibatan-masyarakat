@extends('admin_dashboard.layouts.main')
@section('title')
    Forum | Kegiatan Pelibatan Masyarakat
@endsection

@section('content')
    @include('admin_dashboard.peserta.kelasku.includes.navbar')

    <div class="widget-content widget-content-area">
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#buatDiskusi"><i class="far fa-plus-square"></i> Buat Diskusi Baru</button>
        <hr>
        <a href="{{ route('peserta.kelasku.forum.show', [$kelas->id, 1]) }}">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>Judul Diskusi</div>
                        <div>6 April 2022 22:22</div>
                    </div>
                </div>
                <div class="card-body">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad in iure blanditiis consectetur veniam, quam sed cumque at nam, voluptates dolorum, voluptatem inventore sequi odit. Porro inventore possimus culpa, voluptatem officiis iusto eum? Error dicta voluptates in expedita odit et vitae, praesentium, quibusdam tempora doloribus maxime, fugiat iste eveniet accusantium.
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <div>
                            <span class="badge badge-info">0 Dilihat</span>
                            <span class="badge badge-info">0 komentar</span>
                        </div>
                        <span class="badge badge-light">Postingan oleh : John Doe</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
@endsection

@push('modal')
    <div class="modal fade" id="buatDiskusi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buat Diskusi Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group mb-3">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Diskusi">
                        </div>
                        <div class="form-group mb-4">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3"></textarea>
                        </div>
                        <div class="custom-file-container" data-upload-id="mySecondImage">
                            <label>Upload (Allow Multiple) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                            <label class="custom-file-container__custom-file" >
                                <input type="file" class="custom-file-container__custom-file__custom-file-input" multiple>
                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                            </label>
                            <div class="custom-file-container__image-preview"></div>
                        </div>
                    </form>                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary">Publish</button>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/css/elements/alert.css') }}">
    <link href="{{ asset('admin_dashboard/assets/css/components/tabs-accordian/custom-tabs.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_dashboard/assets/css/components/cards/card.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_dashboard/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .btn-light { border-color: transparent; }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('admin_dashboard/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
    <script>
        var secondUpload = new FileUploadWithPreview('mySecondImage');
    </script>
@endpush