@extends('admin_dashboard.layouts.main')
@section('title')
    Kelas | Kegiatan Pelibatan Masyarakat
@endsection

@section('content')
    <div class="row layout-top-spacing">
        
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="table-responsive mb-4 mt-4">
                    <table id="data-peserta" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>TTL</th>
                                <th>Tipe Anggota</th>
                                <th>Nomor Telepon</th>
                                <th>Alamat</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- <tr>
                                <td>1.</td>
                                <td>Fuad </td>
                                <td>Indramayu, 19 Maret 2001</td>
                                <td>Mahasiswa</td>
                                <td>087727989512</td>
                                <td>Griya Asri 1</td>
                                <td class="text-center">
                                    <span class="badge badge-success">Diterima</span>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#lihat" title="Lihat">
                                        <i class="far fa-file-alt"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Hadi</td>
                                <td>Indramayu, 19 Maret 2001</td>
                                <td>SMA/SMK/MA</td>
                                <td>087727989512</td>
                                <td>Griya Asri 1</td>
                                <td class="text-center">
                                    <span class="badge badge-danger">Ditolak</span>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#lihat" title="Lihat">
                                        <i class="far fa-file-alt"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>Surya</td>
                                <td>Indramayu, 19 Maret 2001</td>
                                <td>Masysarakat Umum</td>
                                <td>087727989512</td>
                                <td>Griya Asri 1</td>
                                <td class="text-center">
                                    <span class="badge badge-warning">Belum Dikonfirmasi</span>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#lihat" title="Lihat">
                                        <i class="far fa-file-alt"></i>
                                    </button>
                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('modal')
    @foreach ($dataPeserta as $dataPeserta)
    <div class="modal fade" id="lihat{{ $dataPeserta->id }}" tabindex="-1" aria-labelledby="data_peserta" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="data_peserta">Data Peserta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td style="width: 22%">Tanggal Mendaftar</td>
                                    <td style="width: 1%">:</td>
                                    <td>{{ $dataPeserta->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>{{ $dataPeserta->user->nama }}</td>
                                </tr>
                                <tr>
                                    <td>Tempat Lahir</td>
                                    <td>:</td>
                                    <td>{{ $dataPeserta->user->tempat_lahir }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>:</td>
                                    <td>{{ $dataPeserta->user->tanggal_lahir }}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>:</td>
                                    <td>{{ $dataPeserta->user->jenis_kelamin }}</td>
                                </tr>
                                <tr>
                                    <td>Tipe Anggota</td>
                                    <td>:</td>
                                    <td>{{ $dataPeserta->user->tipe_anggota }}</td>
                                </tr>
                                <tr>
                                    <td>Nomor Telepon</td>
                                    <td>:</td>
                                    <td>{{ $dataPeserta->user->nomor_telepon }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td>{{ $dataPeserta->user->alamat.', '.$dataPeserta->user->desa_kelurahan.', '.$dataPeserta->user->kecamatan.', '.$dataPeserta->user->kabupaten_kota.', '.$dataPeserta->user->provinsi }}</td>
                                </tr>
                                <tr>
                                    <td>Motivasi</td>
                                    <td>:</td>
                                    <td>{{ $dataPeserta->motivasi }}</td>
                                </tr>
                            </tbody>
                        </table>  
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control selectpicker" name="status">
                                <option value="Diterima">Diterima</option>
                                <option value="Ditolak">Ditolak</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="komentar">Komentar</label>
                            <textarea class="form-control" id="komentar" name="komentar" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endpush

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/plugins/bootstrap-select/bootstrap-select.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('admin_dashboard/plugins/table/datatable/datatables.js') }}"></script>
    <script src="{{ asset('admin_dashboard/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script>
        $('#data-peserta').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('tutor.kelas.data-peserta.index', $kelas) }}",
            columns: [
                {"width": "5%", data: 'DT_RowIndex', name: 'id'},
                {data: 'user.nama', name: 'user.nama'},
                {data: 'user.ttl', name: 'user.ttl'},
                {data: 'user.tipe_anggota', name: 'user.tipe_anggota'},
                {data: 'user.nomor_telepon', name: 'user.nomor_telepon'},
                {data: 'user.alamat', name: 'user.alamat'},
                {data: 'status', name: 'status', className: 'text-center'},
                {"width": "12%", data: 'aksi', name: 'aksi', className: 'text-center', orderable: false, searchable: false},
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
        $(".selectpicker").selectpicker({
            "title": "Pilih Status..."        
        }).selectpicker("render");
    </script>
@endpush