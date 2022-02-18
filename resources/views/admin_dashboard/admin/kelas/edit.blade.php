@extends('admin_dashboard.layouts.main')
@section('title')
    Edit Kelas | Kegiatan Pelibatan Masyarakat
@endsection

@section('content')
    <div class="row layout-top-spacing">
            
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="widget-content-area br-4">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('kelas.update', $kelas->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama kegiatan</label>
                            <input type="text" name="nama_kegiatan" class="form-control" id="nama_kegiatan" value="{{ $kelas->nama_kegiatan }}" required>
                        </div>
                        <div class="form-group">
                            <label for="periode_kegiatan">Periode Kegiatan</label>
                            <input id="periode_kegiatan" name="periode_kegiatan" class="form-control flatpickr flatpickr-input active" type="text" value="{{ $kelas->tanggal_mulai }} to {{ $kelas->tanggal_berakhir }}" placeholder="Pilih Periode Kegiatan..">
                        </div>
                        <div class="form-group">
                            <label for="tutor">Tutor</label>
                            <select class="placeholder form-control" name="tutor_id">
                                <option value="">Pilih Tutor...</option>
                                @foreach ($tutor as $tutor)
                                    <option value="{{ $tutor->id }}" {{ ($tutor->id == $kelas->tutor_id) ? 'selected': '' }}>{{ $tutor->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control selectpicker" name="status">
                                <option value="Aktif" {{ ($kelas->status == 'Aktif') ? 'selected': '' }}>Aktif</option>
                                <option value="Tidak Aktif" {{ ($kelas->status == 'Tidak Aktif') ? 'selected': '' }}>Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('kelas.index') }}" class="btn">Batal</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

@push('styles')
    <link href="{{ asset('admin_dashboard/plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin_dashboard/plugins/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/plugins/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/plugins/bootstrap-select/bootstrap-select.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('admin_dashboard/plugins/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('admin_dashboard/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script>
        var f3 = flatpickr(document.getElementById('periode_kegiatan'), {
            mode: "range",
            // minDate: "today"
        });
    </script>
    <script>
        $(".placeholder").select2({
            placeholder: "Pilih Tutor...",
        });
    </script>
    <script>
        $(".selectpicker").selectpicker({
            "title": "Select Options"        
        }).selectpicker("render");
    </script>
@endpush