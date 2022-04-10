@extends('admin_dashboard.layouts.main')
@section('title')
    Detail Tugas | Kegiatan Pelibatan Masyarakat
@endsection

@section('content')
    <div class="row layout-top-spacing">
        
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">

            @include('admin_dashboard.tutor.kelasku.includes.navbar')
            <div class="widget-content-area br-4 mb-3">
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

                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td style="width: 12%">Nama Tugas</td>
                                <td style="width: 1%">:</td>
                                <td>{{ $tugas->nama_tugas }}</td>
                            </tr>
                            <tr>
                                <td>Deskripsi Tugas</td>
                                <td>:</td>
                                <td>{{ $tugas->deskripsi }}</td>
                            </tr>
                            <tr>
                                <td>Nama Pengirim</td>
                                <td>:</td>
                                <td>{{ $jawabanTugas->users->nama }}</td>
                            </tr>
                            <tr>
                                <td>Batas Waktu</td>
                                <td>:</td>
                                <td>{{ $tugas->batas_waktu }}</td>
                            </tr>
                            <tr>
                                <td>Waktu Kirim</td>
                                <td>:</td>
                                <td>{{ $jawabanTugas->updated_at }}</td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td>:</td>
                                <td><span class="badge badge-success">Tepat Waktu</span></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td><span class="badge badge-warning">Belum Dinilai</span></td>
                            </tr>
                        </tbody>
                    </table>  
                </div>
                <hr>
                <div>
                    <h6><strong>Jawaban :</strong></h6>
                    <p>{{ $jawabanTugas->jawaban }}</p>
                </div>
                <div>
                    @foreach ($jawabanTugas->uploadJawabanTugas as $fileTugas)
                        <a href="{{ route('jawaban.tugas.download', [$kelas->id, $fileTugas->id]) }}"><i class="far fa-save"></i> {{ $fileTugas->jawaban_tugas }}</a><br>
                    @endforeach
                </div>
            </div>

            <div class="widget-content-area br-4">
                <form action="{{ route('tutor.kelasku.periksa-tugas.update', [$kelas->id, $tugas->id]) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="catatan">Catatan</label>
                                <textarea class="form-control" name="catatan" id="catatan" rows="3" placeholder="Catatan untuk peserta (opsional)">{{ $jawabanTugas->nilai }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nilai">Nilai</label>
                                <input id="nilai" type="text" name="nilai" class="form-control" onchange="changeHandler(this)" onkeypress="return isNumber(event)" value="{{ $jawabanTugas->nilai }}" min="0" max="3" required>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('tutor.kelasku.tugas.show', [$kelas->id, $tugas->id]) }}" class="btn btn-secondary">Kembali</a>
                        <button class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/css/elements/alert.css') }}">
@endpush

@push('scripts')
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
        function changeHandler(val){
            if (Number(val.value) > 100){
                val.value = 100
            }
        }
    </script>
@endpush