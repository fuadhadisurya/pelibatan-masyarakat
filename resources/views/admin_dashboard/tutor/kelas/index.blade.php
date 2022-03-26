@extends('admin_dashboard.layouts.main')
@section('title')
    Kelas | Kegiatan Pelibatan Masyarakat
@endsection

@section('content')
    <div class="row layout-top-spacing">
        
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="table-responsive mb-4 mt-4">
                    <table id="zero-config" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Periode Kelas</th>
                                <th>Tutor</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td>Pemrograman Web</td>
                                <td>2022-03-12 s.d. 2022-03-12</td>
                                <td>Fuad</td>
                                <td class="text-center">
                                    <a href="#" class="d-flex justify-content-center">
                                        <span class="badge badge-success">Pendaftaran</span>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('tutor/kelas/1/data-peserta') }}" class="btn btn-sm btn-info" title="Edit"><i class="far fa-eye"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Pemrograman Mobile</td>
                                <td>2022-03-12 s.d. 2022-03-12</td>
                                <td>Hadi</td>
                                <td class="text-center">
                                    <a href="#" class="d-flex justify-content-center">
                                        <span class="badge badge-danger">Kegiatan Berlangsung</span>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('tutor/kelas/1/data-peserta') }}" class="btn btn-sm btn-info" title="Edit"><i class="far fa-eye"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>Desain Grafis</td>
                                <td>2022-03-12 s.d. 2022-03-12</td>
                                <td>Surya</td>
                                <td class="text-center">
                                    <a href="#" class="d-flex justify-content-center">
                                        <span class="badge badge-dark">Selesai</span>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('tutor/kelas/1/data-peserta') }}" class="btn btn-sm btn-info" title="Edit"><i class="far fa-eye"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td>IoT</td>
                                <td>2022-03-12 s.d. 2022-03-12</td>
                                <td>Krisna</td>
                                <td class="text-center">
                                    <a href="#" class="d-flex justify-content-center">
                                        <span class="badge badge-warning">Proses Seleksi</span>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('tutor/kelas/1/data-peserta') }}" class="btn btn-sm btn-info" title="Edit"><i class="far fa-eye"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/plugins/table/datatable/dt-global_style.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('admin_dashboard/plugins/table/datatable/datatables.js') }}"></script>
    <script>
        $('#zero-config').DataTable({
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