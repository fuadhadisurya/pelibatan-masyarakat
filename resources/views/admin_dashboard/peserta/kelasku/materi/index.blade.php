@extends('admin_dashboard.layouts.main')
@section('title')
    Materi | Kegiatan Pelibatan Masyarakat
@endsection

@section('content')
    @include('admin_dashboard.peserta.kelasku.includes.navbar')
    
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
                <div class="table-responsive">
                    <table id="data-peserta" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('modal')
    @foreach ($materi as $materi)
        <div class="modal fade" id="lihat{{ $materi->id }}" tabindex="-1" aria-labelledby="data_peserta" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="data_peserta">{{ $materi->nama_materi }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td style="width: 15%">Tanggal</td>
                                        <td style="width: 1%">:</td>
                                        <td>{{ \Carbon\Carbon::parse($materi->created_at)->format('j F Y H:i') }}</td>
                                    </tr>
                                    @if ($materi->created_at != $materi->updated_at)
                                        <tr>
                                            <td>Tanggal Diperbarui</td>
                                            <td>:</td>
                                            <td>{{ \Carbon\Carbon::parse($materi->updated_at)->format('j F Y H:i') }}</td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td>Nama Materi</td>
                                        <td>:</td>
                                        <td>{{ $materi->nama_materi }}</td>
                                    </tr>
                                    <tr>
                                        <td>Deskripsi</td>
                                        <td>:</td>
                                        <td>{{ $materi->deskripsi }}</td>
                                    </tr>
                                </tbody>
                            </table>  
                        </div>
                        <div>
                            @foreach ($materi->uploadMateri as $fileMateri)
                                <a href="{{ route('materi.download', [$kelas->id, $fileMateri->id]) }}"><i class="far fa-save"></i> {{ $fileMateri->materi }}</a><br>
                            @endforeach
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endpush

@push('styles')
    <link href="{{ asset('admin_dashboard/assets/css/components/tabs-accordian/custom-tabs.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/css/elements/alert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/plugins/table/datatable/dt-global_style.css') }}">
    <link href="{{ asset('admin_dashboard/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_dashboard/assets/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
    <script src="{{ asset('admin_dashboard/plugins/table/datatable/datatables.js') }}"></script>
    <script>
        $('#data-peserta').DataTable({
            processing: true,
            serverSide: true,
            order: [[0, 'desc']],
            ajax: "{{ route('peserta.kelasku.materi.index', $kelas_id) }}",
            columns: [
                {"width": "5%", data: 'DT_RowIndex', name: 'id'},
                {data: 'nama_materi', name: 'nama_materi'},
                {data: 'deskripsi', name: 'deskripsi'},
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