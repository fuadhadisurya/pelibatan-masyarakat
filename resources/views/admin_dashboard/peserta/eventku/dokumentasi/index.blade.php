@extends('admin_dashboard.layouts.main')
@section('title')
    Dokumentasi | Kegiatan Pelibatan Masyarakat
@endsection

@section('content')
    @include('admin_dashboard.peserta.eventku.includes.navbar')
    
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            @if(session('status'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        {{ session('status') }}
                    </div>
                </div>
            @endif

            <div class="widget-content widget-content-area br-6">
                <div class="mb-5">
                    <h3>Foto</h3>
                    @if (count($foto)>0)
                        @foreach ($foto as $item)
                            <img class="rounded" src="{{ Storage::url($item->dokumentasi) }}" alt="foto" id="preview" width="240px" height="">
                        @endforeach
                    @else
                        <div class="alert alert-info">
                            Belum ada foto yang diunggah oleh pengelola Event.
                        </div>
                    @endif
                    <h3>Presentasi</h3>
                    @if (count($presentasi)>0 || count($slideshare)>0)
                        @foreach ($slideshare as $ss)
                            {!! $ss->dokumentasi !!}
                        @endforeach
                        @foreach ($presentasi as $present)
                            <a href="{{ route('dokumentasi.download', [$event->id, $present->id]) }}"><i class="far fa-save"></i> {{ $present->nama_file }}</a><br>
                        @endforeach
                    @else
                        <div class="alert alert-info">
                            Belum ada presentasi yang diunggah oleh pengelola Event.
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection

@push('modal')
    
@endpush

@push('styles')
    <link href="{{ asset('admin_dashboard/assets/css/components/tabs-accordian/custom-tabs.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/css/elements/alert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/plugins/table/datatable/dt-global_style.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('admin_dashboard/plugins/table/datatable/datatables.js') }}"></script>
    <script>
        $('#data-peserta').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('peserta.eventku.dokumentasi.index', $event->id) }}",
            columns: [
                {"width": "5%", data: 'DT_RowIndex', name: 'id'},
                {data: 'nama_file', name: 'nama_file'},
                {data: 'tipe', name: 'tipe'},
                {"width": "18%", data: 'aksi', name: 'aksi', className: 'text-center', orderable: false, searchable: false},
            ],
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7 
        });
    </script>
@endpush