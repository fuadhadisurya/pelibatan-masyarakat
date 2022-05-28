@extends('admin_dashboard.layouts.main')
@section('title')
    Tambah Silabus | Kegiatan Pelibatan Masyarakat
@endsection

@section('content')
    <div class="row layout-top-spacing">
        
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">

            @include('admin_dashboard.admin.data-kelas.includes.navbar')
            <div class="widget-content-area br-4">
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
                <form id="form" action="{{ route('data-kelas.silabus.store', [$kelas->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h3>Silabus</h3>
                    <section>
                        <div id="listSoal">
                            <div class="control-group card mb-3">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nama_bab[]">Nama Bab</label>
                                        <input class="form-control" id="nama_bab[]" name="nama_bab[]" autocomplete="off" required>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-success add-more" type="button">
                                            Tambah
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('data-kelas.silabus.index', [$kelas->id]) }}" class="btn btn-sm btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <div class="d-none">
        <div class="copy">
            <div class="control-group card mb-3">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_bab[]">Nama Bab</label>
                        <input class="form-control" id="nama_bab[]" name="nama_bab[]" autocomplete="off" required>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-danger remove" type="button">
                            Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/css/elements/alert.css') }}">
    <style>
        .btn-light { border-color: transparent; }
    </style>
@endpush

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $(".add-more").click(function(){ 
                var html = $(".copy").html();
                $("#listSoal").append(html);
            });
        
            // saat tombol remove dklik control group akan dihapus 
            $("body").on("click",".remove",function(){ 
                $(this).parents(".control-group").remove();
            });
        });
    </script>
@endpush