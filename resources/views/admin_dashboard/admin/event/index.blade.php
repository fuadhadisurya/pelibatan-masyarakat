@extends('admin_dashboard.layouts.main')
@section('title')
    Event | Kegiatan Pelibatan Masyarakat
@endsection

@section('content')
        
    <div class="row layout-top-spacing" id="cancel-row">
    
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            @if ($errors->any())
                <div class="alert alert-warning" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="far fa-times-circle"></i></button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session('status'))
                <div class="alert alert-success mb-4" role="alert"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                    <strong>{{ session('status') }} </strong>
                </div>
            @endif
            <div class="widget-content widget-content-area br-6">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahKelas">Tambah Event</button>
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#status" id="ubah_status" disabled>Ubah Status</button>
                <div class="table-responsive mb-4 mt-2">
                    <table id="tab_kelas" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="head-cb"></th>
                                <th class="text-center">No</th>
                                <th>Nama</th>
                                <th class="text-center">Periode Event</th>
                                <th class="text-center">Batas Waktu Pendaftaran</th>
                                <th class="text-center">Kuota</th>
                                <th class="text-center">Status</th>
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
    <!-- Modal -->
    <div class="modal fade" id="tambahKelas" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="far fa-times-circle"></i>
                    </button>
                </div>
                <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="banner">Banner</label><br>
                            <div class="custom-file mb-4">
                                <input type="file" class="custom-file-input" id="banner" name="banner" accept="image/*" required>
                                <label class="custom-file-label" for="banner">Pilih Gambar</label>
                            </div>
                            <div class="d-flex justify-content-center">
                                <img class="rounded img-fluid" src="{{ asset('admin_dashboard/assets/img/400x300.jpg') }}" alt="foto" id="preview" width="400px" height="300px">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama_event">Nama Event</label>
                            <input type="text" name="nama_event" class="form-control" id="nama_event" value="{{ old('nama_event') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori Event</label>
                            <select class="form-control selectpicker" name="kategori" required>
                                <option value="Diskusi Online" {{  old('kategori') ==  "Diskusi Online" ? "selected" : ""  }}>Diskusi Online</option>
                                <option value="Seminar" {{  old('kategori') ==  "Seminar" ? "selected" : ""  }}>Seminar</option>
                                <option value="Workshop" {{  old('kategori') ==  "Workshop" ? "selected" : ""  }}>Workshop</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pembuat_event">Nama Pembuat Event</label>
                            <input type="text" name="pembuat_event" class="form-control" id="pembuat_event" value="{{ old('pembuat_event') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="periode_event">Periode Event</label>
                            <input id="periode_event" name="periode_event" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Pilih Periode Event.." value="{{ old('periode_event') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" class="textarea tinymce" id="editor1" rows="10" required>
                                {!! old('deskripsi') !!}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="lokasi">Lokasi</label>
                            <input id="lokasi" name="lokasi" class="form-control" type="text" placeholder="Lokasi Kegiatan" value="{{ old('lokasi') }}" required>
                            <small>Jika kegiatan dilaksakan online. formatnya adalah : "Online + link "</small>
                        </div>
                        <div class="form-group">
                            <label for="deadline_pendaftaran">Batas Waktu Pendaftaran</label>
                            <input id="deadline_pendaftaran" name="deadline_pendaftaran" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Pilih Periode Event.." value="{{ old('deadline_pendaftaran') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="kuota">Kuota Peserta</label>
                            <input id="kuota" type="text" name="kuota" class="form-control" onkeypress="return isNumber(event)" value="{{ old('kuota') }}" required>
                        </div>
                        <input type="hidden" name="status" value="Persiapan">
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batalkan</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="status" tabindex="-1" aria-labelledby="status" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="status">Ubah Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="ganti_status" action="{{ route('kelas.update.status') }}" method="post">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control selectpicker" id="opsi_status" name="status" required>
                                <option value="Persiapan">Persiapan</option>
                                <option value="Pendaftaran">Pendaftaran</option>
                                <option value="Kegiatan Berlangsung">Kegiatan Berlangsung</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batalkan</button>
                        <button type="button" onclick="gantiStatus()" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endpush

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/plugins/table/datatable/dt-global_style.css') }}">
    <link href="{{ asset('admin_dashboard/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_dashboard/assets/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_dashboard/plugins/sweetalerts/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_dashboard/plugins/sweetalerts/sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_dashboard/assets/css/components/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('admin_dashboard/plugins/sweetalerts/promise-polyfill.js') }}"></script>
    <link href="{{ asset('admin_dashboard/plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin_dashboard/plugins/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/plugins/bootstrap-select/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/css/forms/theme-checkbox-radio.css') }}">
    <link href="{{ asset('admin_dashboard/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/plugins/prismjs/prism.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('admin_dashboard/plugins/table/datatable/datatables.js') }}"></script>
    <script src="{{ asset('admin_dashboard/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard/plugins/sweetalerts/custom-sweetalert.js') }}"></script>
    <script src="{{ asset('admin_dashboard/plugins/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('admin_dashboard/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard/plugins/editors/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard/plugins/prismjs/prism.js') }}"></script>
    <script>
        $('#tab_kelas').DataTable({
            processing: true,
            serverSide: true,
            order: [[1]],
            ajax: "{{ route('event.index') }}",
            columns: [
                {data: 'checkbox', name: 'checkbox', searchable:false, orderable:false, sortable:false},
                {"width": "5%", data: 'DT_RowIndex', name: 'id'},
                {data: 'nama_event', name: 'nama_event'},
                {data: 'periode_event', name: 'periode_event', className: 'text-center'},
                {data: 'deadline_pendaftaran', name: 'deadline_pendaftaran', className: 'text-center'},
                {data: 'kuota', name: 'kuota', className: 'text-center'},
                {data: 'status', name: 'status', className: 'text-center'},
                {"width": "12%", data: 'aksi', name: 'aksi', orderable: false, searchable: false},
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
                        url:'{{url("/admin/event")}}/' +id,
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
        var f3 = flatpickr(document.getElementById('periode_event'), {
            mode: "range",
            minDate: "today",
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            time_24hr: true,
        });
    </script>
    <script>
        var f3 = flatpickr(document.getElementById('deadline_pendaftaran'), {
            minDate: "today",
        });
    </script>
    <script type='text/javascript'> 
        tinymce.init({
            selector: 'textarea.tinymce',
            // height: 500,
            plugins: 'fullscreen lists link image media codesample table wordcount autoresize',
            menubar: false,
            toolbar: 'fullscreen bold italic underline strikethrough subscript superscript | fontsize color | blocks alignment numlist bullist outdent indent blockquote | link image media codesample table | removeformat | undo redo',
            setup: (editor) => {
                editor.ui.registry.addGroupToolbarButton('alignment', {
                    icon: 'align-left',
                    tooltip: 'Alignment',
                    items: 'alignleft aligncenter alignright alignjustify'
                });
                editor.ui.registry.addGroupToolbarButton('color', {
                    icon: 'color-levels',
                    tooltip: 'Color',
                    items: 'forecolor backcolor'
                });
            },
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
        });
    </script>
    <script>
        $('#banner').on('change',function(e){
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName);
        })
        banner.onchange = evt => {
            const [file] = banner.files
            if (file) {
                preview.src = URL.createObjectURL(file)
            }
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
    <script>
        $(".selectpicker").selectpicker({
            "title": "Pilih Status..."        
        }).selectpicker("render");
    </script>
    <script>
        let yangDicheck = 0;
        $("#head-cb").on('click',function(){
            var isChecked = $('#head-cb').prop('checked');
            $(".cb-child").prop('checked', isChecked);
            $('#ubah_status').prop('disabled',!isChecked);
        })

        $("#tab_kelas tbody").on('click','.cb-child', function(){
            if($(this).prop('checked')!=true){
                $("#head-cb").prop('checked', false);
            }
            
            let semuaCheckbox = $("#tab_kelas tbody .cb-child:checked")
            let childChecked = (semuaCheckbox.length>0)
            $('#ubah_status').prop('disabled',!childChecked);
        });

        function gantiStatus(){
            let status = $("#opsi_status :selected").text();
            let checkbox_dipilih = $("#tab_kelas tbody .cb-child:checked");
            let semua_id = [];
            $.each(checkbox_dipilih, function (index,elm){
                semua_id.push(elm.value);
            })
            $.ajax({
                "_token": "{{ csrf_token() }}",
                url:"{{ route('event.update.status') }}",
                method: 'put',
                data:{"_token": "{{ csrf_token() }}", ids: semua_id, status:status},
                success:function(res){
                    window.location.reload();
                }
            })
            console.log(semua_id);
        };
    </script>
@endpush