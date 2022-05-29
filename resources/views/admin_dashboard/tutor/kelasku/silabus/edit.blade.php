@extends('admin_dashboard.layouts.main')
@section('title')
    Edit Silabus | Kegiatan Pelibatan Masyarakat
@endsection

@section('content')
    @include('admin_dashboard.tutor.kelasku.includes.navbar')
    
    <div class="row layout-top-spacing">
        
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">

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
                <form id="form" action="{{ route('tutor.kelasku.silabus.update', [$kelas->id, $silabus->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama_bab">Nama Bab</label>
                        <input class="form-control" id="nama_bab" name="nama_bab" value="{{ $silabus->nama_bab }}" autocomplete="off" required>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('tutor.kelasku.silabus.index', [$kelas->id]) }}" class="btn btn-sm btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

@push('styles')
    <link href="{{ asset('admin_dashboard/assets/css/components/tabs-accordian/custom-tabs.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/css/elements/alert.css') }}">
@endpush

@push('scripts')

@endpush