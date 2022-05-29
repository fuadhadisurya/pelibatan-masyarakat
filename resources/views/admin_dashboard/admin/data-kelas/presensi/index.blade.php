@extends('admin_dashboard.layouts.main')
@section('title')
    Presensi | Kegiatan Pelibatan Masyarakat
@endsection

@section('content')
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

            @include('admin_dashboard.admin.data-kelas.includes.navbar')

            <div class="widget-content widget-content-area br-6">
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#buatPresensi">
                    <i class="far fa-plus-square"></i> Buat Presensi
                </button>
                <div class="table-responsive">
                    <table id="data-peserta" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Presensi Buka</th>
                                <th>Presensi Tutup</th>
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
    <div class="modal fade" id="buatPresensi" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('data-kelas.presensi.store',[$kelas->id]) }}" method="POST"  >
                @csrf
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buat Presensi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input id="dateTimeFlatpickr" name="tanggal" class="form-control flatpickr flatpickr-input active dateTimeFlatpickr" type="text" placeholder="Pilih Tanggal">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @foreach ($presensi as $presensi)
        <div class="modal fade" id="editPresensi{{ $presensi->id }}" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('data-kelas.presensi.update',[$kelas->id, $presensi->id]) }}" method="POST"  >
                    @csrf
                    @method('put')
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Presensi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input id="dateTimeFlatpickr" name="tanggal" value="{{ $presensi->tanggal_mulai .' to '. $presensi->tanggal_berakhir }}" class="form-control flatpickr flatpickr-input active dateTimeFlatpickr" type="text" placeholder="Pilih Tanggal">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endpush

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/plugins/table/datatable/dt-global_style.css') }}">
    <link href="{{ asset('admin_dashboard/plugins/sweetalerts/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_dashboard/plugins/sweetalerts/sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_dashboard/assets/css/components/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_dashboard/plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin_dashboard/plugins/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('admin_dashboard/plugins/sweetalerts/promise-polyfill.js') }}"></script>
    <link href="{{ asset('admin_dashboard/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_dashboard/assets/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
    <script src="{{ asset('admin_dashboard/plugins/table/datatable/datatables.js') }}"></script>
    <script src="{{ asset('admin_dashboard/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard/plugins/sweetalerts/custom-sweetalert.js') }}"></script>
    <script src="{{ asset('admin_dashboard/plugins/flatpickr/flatpickr.js') }}"></script>
    <script>
        $('#data-peserta').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('data-kelas.presensi.index', $kelas_id) }}",
            columns: [
                {"width": "5%", data: 'DT_RowIndex', name: 'id'},
                {data: 'nama', name: 'nama'},
                {data: 'tanggal_mulai', name: 'tanggal_mulai'},
                {data: 'tanggal_berakhir', name: 'tanggal_berakhir'},
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
    <script>
        function confirmDelete(e) {  
            let id = e.getAttribute('data-id');
            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Anda tidak bisa mengembalikan ini!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Iya, hapus',
                cancelButtonText: 'Batalkan'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type:'DELETE',
                        url:'{{url("/admin/data-kelas/$kelas_id/presensi")}}/' +id,
                        data:{
                            "_token": "{{ csrf_token() }}",
                        },
                        success:function(data) {
                            if (data.success){
                                Swal.fire(
                                    'Berhasil dihapus',
                                    'Data berhasil dihapus.',
                                    "success"
                                );
                                $("#konfirmasiHapus"+id+"").parents('tr').remove()
                            }
                        }
                    });
                }
            }) 
        }
    </script>
    <script>
        var f2 = flatpickr(document.getElementsByClassName('dateTimeFlatpickr'), {
            mode: "range",
            minDate: "today",
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            time_24hr: true
        });
    </script>
@endpush