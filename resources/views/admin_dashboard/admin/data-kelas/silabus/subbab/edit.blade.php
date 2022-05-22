@extends('admin_dashboard.layouts.main')
@section('title')
    Edit Silabus Subbab | Kegiatan Pelibatan Masyarakat
@endsection

@section('content')
    <div class="row layout-top-spacing">
        
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">

            @include('admin_dashboard.tutor.kelasku.includes.navbar')
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
                <form id="form" action="{{ route('data-kelas.silabus.detail.update', [$kelas->id, $silabus->id, $silabusSubbab->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama_subbab">Nama Subbab</label>
                        <input class="form-control" id="nama_subbab" name="nama_subbab" value="{{ $silabusSubbab->nama_subbab }}" autocomplete="off" required>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('data-kelas.silabus.detail.index', [$kelas->id, $silabus->id]) }}" class="btn btn-sm btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </div>
                </form>
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

@endpush