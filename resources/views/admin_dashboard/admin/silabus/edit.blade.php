@extends('admin_dashboard.layouts.main')
@section('title')
    Edit Silabus | Kegiatan Pelibatan Masyarakat
@endsection

@section('content')
    <div class="row layout-top-spacing">
        
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">

            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="widget-content-area br-4">
                <form id="form" action="{{ route('silabus.update', [$silabus->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama_silabus">Nama Silabus</label>
                        <input class="form-control" id="nama_silabus" name="nama_silabus" value="{{ $silabus->nama_silabus }}" autocomplete="off" required>
                    </div>
                    <select class="form-control select2" name="user_id" required>
                        <option value="">Pilih Menu</option>
                        @foreach ($tutor as $tutors)
                            <option value="{{ $tutors->id }}" {{ $tutors->id == $silabus->user_id ? 'selected' : ''}}>{{ $tutors->nama }}</option>
                        @endforeach
                    </select>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('silabus.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
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
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/plugins/select2/select2.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('admin_dashboard/plugins/select2/select2.min.js') }}"></script>
    <script>
        var ss = $(".select2").select2({
            placeholder: "Pilih Tutor",
        });
    </script>
@endpush