@extends('admin_dashboard.layouts.main')
@section('title')
    Quiz | Kegiatan Pelibatan Masyarakat
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

            @include('admin_dashboard.tutor.kelasku.includes.navbar')

            <div class="widget-content widget-content-area br-6">
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
                    <i class="far fa-plus-square"></i> Tambah Soal
                </button>
                <a href="{{ route('tutor.kelasku.quiz.soal.create', [$kelas->id, $quiz_id]) }}" class="btn btn-primary mb-3">
                    <i class="far fa-plus-square"></i> Tambah Soal
                </a>
                <div class="table-responsive">
                    <table id="data-peserta" class="table table-hover table-bordered alignment_top" style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Soal</th>
                                <th class="text-center">Aktif</th>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('tutor.kelasku.quiz.store', $kelas->id) }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="soal[]">Soal</label>
                        <textarea class="form-control" id="soal[]" name="soal[]" rows="2" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="file[]">File (Audio, Gambar, Video)</label>
                        <input type="file" name="file[]" id="file[]" accept="image/*, video/*, audio/*" multiple>
                    </div>
                    <div class="form-group row">
                        <label for="a[]" class="col-sm-1 col-form-label text-right">A.</label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control" id="a[]" name="a[]" placeholder="Isi Jawaban A.">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="b[]" class="col-sm-1 col-form-label text-right">B.</label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control" id="b[]" name="b[]" placeholder="Isi Jawaban B.">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="c[]" class="col-sm-1 col-form-label text-right">C.</label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control" id="c[]" name="c[]" placeholder="Isi Jawaban C.">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="d[]" class="col-sm-1 col-form-label text-right">D.</label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control" id="d[]" name="d[]" placeholder="Isi Jawaban D.">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kunci_jawaban[]">Kunci Jawaban</label>
                        <select class="form-control" name="kunci_jawaban[]">
                            <option value="" hidden selected>Pilih Kunci Jawaban</option>
                            <option value="A">A.</option>
                            <option value="B">B.</option>
                            <option value="C">C.</option>
                            <option value="D">D.</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pembahasan[]">Pembahasan (Opsional)</label>
                        <textarea class="form-control" id="pembahasan[]" name="pembahasan[]" rows="2" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batalkan</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endpush

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/plugins/table/datatable/dt-global_style.css') }}">
    <link href="{{ asset('admin_dashboard/plugins/sweetalerts/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_dashboard/plugins/sweetalerts/sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_dashboard/assets/css/components/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('admin_dashboard/plugins/sweetalerts/promise-polyfill.js') }}"></script>
    <link href="{{ asset('admin_dashboard/assets/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_dashboard/plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin_dashboard/plugins/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/css/forms/theme-checkbox-radio.css') }}">
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
            ajax: "{{ route('tutor.kelasku.quiz.soal.index', [$kelas_id, $quiz_id]) }}",
            columns: [
                {"width": "5%", data: 'DT_RowIndex', name: 'id'},
                {data: 'soal', name: 'soal'},
                {data: 'aktif', name: 'aktif', className: 'text-center', orderable: false, searchable: false},
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
        var f1 = flatpickr(document.getElementById('basicFlatpickr'),{
            minDate: "today",
            dateFormat: "j F Y",
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
                        url:'{{url("/tutor/kelasku/$kelas->id/quiz/$quiz_id/soal")}}/' +id,
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
        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
    </script>
@endpush