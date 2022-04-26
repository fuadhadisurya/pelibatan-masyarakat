@extends('admin_dashboard.layouts.main')
@section('title')
    Forum | Kegiatan Pelibatan Masyarakat
@endsection

@section('content')
    @include('admin_dashboard.tutor.kelasku.includes.navbar')

    <div class="widget-content widget-content-area">
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#buatDiskusi"><i class="far fa-plus-square"></i> Buat Diskusi Baru</button>
        <hr>
        @forelse ($post as $post)
            <a href="{{ route('tutor.kelasku.forum.show', [$kelas->id, $post->id]) }}">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>{{ $post->judul }}</div>
                            <div>{{ $post->created_at }}</div>
                        </div>
                    </div>
                    <div class="card-body">
                        @php
                            $praIsi = $post->isi;
                            $postIsi = strip_tags($praIsi, ['p', 'a', 'pre', 'code']);
                        @endphp
                        {!! Str::words($postIsi,99, '...') !!}
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <div>
                                <span class="badge badge-secondary">0 Dilihat</span>
                                <span class="badge badge-info">0 komentar</span>
                            </div>
                            <span class="badge badge-light">Postingan oleh : {{ $post->user->nama }}</span>
                        </div>
                    </div>
                </div>
            </a>
        @empty
            <div class="card mb-3">
                <div class="card-body text-center">
                    Forum diskusi masih kosong silahkan membuat baru
                </div>
            </div>
        @endforelse
    </div>
@endsection

@push('modal')
    <div class="modal fade" id="buatDiskusi" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buat Diskusi Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('tutor.kelasku.forum.store', $kelas->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Diskusi">
                        </div>
                        <div class="form-group mb-4">
                            <label for="isi">Isi Pertanyaan</label>
                            <textarea class="form-control" name="isi" id="isi" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Publish</button>
                    </div>
                </form>                    
            </div>
        </div>
    </div>
@endpush

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/css/elements/alert.css') }}">
    <link href="{{ asset('admin_dashboard/assets/css/components/tabs-accordian/custom-tabs.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_dashboard/assets/css/components/cards/card.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/plugins/prismjs/prism.css') }}">
    <style>
        .btn-light { border-color: transparent; }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('admin_dashboard/plugins/editors/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard/plugins/prismjs/prism.js') }}"></script>
    <script>
        var secondUpload = new FileUploadWithPreview('mySecondImage');
    </script>
    <script>
        $(document).on('focusin', function(e) {
            if ($(e.target).closest(".tox-dialog").length) {
                e.stopImmediatePropagation();
            }
        });
    </script>
    <script type='text/javascript'>
        tinymce.init({
            selector: 'textarea',
            // height: 500,
            plugins: 'fullscreen lists link image media codesample table wordcount autoresize',
            menubar: false,
            toolbar: 'fullscreen bold italic underline strikethrough subscript superscript | fontsize color | blocks alignment numlist bullist outdent indent blockquote | link image media codesample table | removeformat | undo redo',
            setup: (editor) => {
                editor.ui.registry.addGroupToolbarButton('alignment', {
                    icon: 'align-left',
                    tooltip: 'Alignment',
                    items: 'alignleft aligncenter alignright alignjustify'
                });
                editor.ui.registry.addGroupToolbarButton('color', {
                    icon: 'color-levels',
                    tooltip: 'Color',
                    items: 'forecolor backcolor'
                });
            },
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
        });
    </script>
@endpush