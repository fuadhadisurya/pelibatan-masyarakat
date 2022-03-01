@extends('admin_dashboard.layouts.main')
@section('title')
    Biodata | Kegiatan Pelibatan Masyarakat
@endsection

@section('content')
    <div class="row layout-top-spacing">
        
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="widget-content-area br-4">
                <form>
                    <div class="form-row mb-4">
                        <div class="col">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Nama Lengkap">
                        </div>
                        <div class="col">
                            <label for="umur">Umur</label>
                            <input type="text" class="form-control" placeholder="Umur">
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="col">
                            <label for="kontak">No. HP</label>
                            <input type="text" class="form-control" placeholder="No. HP">
                        </div>
                        <div class="col">
                            <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                            <select class="form-control selectpicker" name="pendidikan_terakhir">
                                <option value="PAUD/TK">PAUD/TK</option>
                                <option value="SD/MI">SD/MI</option>
                                <option value="SMP/MTS">SMP/MTS</option>
                                <option value="SMA/SMK/MA">SMA/SMK/MA</option>
                                <option value="Mahasiswa">Mahasiswa</option>
                                <option value="Masyarakat Umum">Masyarakat Umum</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="col">
                            <label for="provinsi">Provinsi</label>
                            <select class="form-control selectpicker" name="provinsi" id="provinsi">
                                <option value="Pilih Kabupaten/Kota" selected hidden>Pilih Provinsi</option>
                                @foreach ($provinsi['provinsi'] as $provinsi)
                                    <option value="{{ $provinsi['id'] }}">{{ $provinsi['nama'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="kabupaten_kota">Kabupaten/Kota</label>
                            <select class="form-control selectpicker" name="kabupaten_kota" id="kabupaten_kota">
                                <option value="Pilih Kabupaten/Kota" hidden>Pilih Kabupaten/Kota</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="col">
                            <label for="kecamatan">Kecamatan</label>
                            <select class="form-control selectpicker" name="kecamatan" id="kecamatan">
                                <option value="Pilih Kecamatan" hidden>Pilih Kecamatan</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="desa_kelurahan">Desa/Kelurahan</label>
                            <select class="form-control selectpicker" name="desa_kelurahan" id="desa_kelurahan">
                                <option value="Pilih Desa/Kelurahan">Pilih Desa/Kelurahan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                    </div>
                    <input type="submit" name="time" class="mb-4 btn btn-primary">
                </form>
            </div>
        </div>

    </div>
@endsection

@push('styles')
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/plugins/bootstrap-select/bootstrap-select.min.css') }}"> --}}
@endpush

@push('scripts')
{{-- <script src="{{ asset('admin_dashboard/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script> --}}
<script>
    // $(".selectpicker").selectpicker({
    //     "title": "Pilih Menu"        
    // }).selectpicker("render");
</script>
<script>
    $(document).ready(function() {
        $('#provinsi').on('change', function() {
            var provinsiID = $(this).val();
            if(provinsiID) {
                $.ajax({
                    url: 'https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi='+provinsiID,
                    type: "GET",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success:function(data)
                    {
                        if(data){
                            $('#kabupaten_kota').empty();
                            $('#kabupaten_kota').append('<option hidden>Pilih Kabupaten/Kota</option>'); 
                            $.each(data.kota_kabupaten, function(key, item){
                                $('select[name="kabupaten_kota"]').append('<option value="'+ item.id +'">' + item.nama + '</option>');
                            });
                            // $('.selectpicker').selectpicker('refresh');
                        }else{
                            $('#kabupaten_kota').empty();
                            // $('.selectpicker').selectpicker('refresh');
                        }
                    }
                });
            }else{
                $('#kabupaten_kota').empty();
            }
        });
        $('#kabupaten_kota').on('change', function() {
            var kabupatenKotaID = $(this).val();
            if(kabupatenKotaID) {
                $.ajax({
                    url: 'https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota='+kabupatenKotaID,
                    type: "GET",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success:function(data)
                    {
                        if(data){
                            $('#kecamatan').empty();
                            $('#kecamatan').append('<option hidden>Pilih Kecamatan</option>'); 
                            $.each(data.kecamatan, function(key, item){
                                $('select[name="kecamatan"]').append('<option value="'+ item.id +'">' + item.nama + '</option>');
                            });
                            // $('.selectpicker').selectpicker('refresh');
                        }else{
                            $('#kecamatan').empty();
                            // $('.selectpicker').selectpicker('refresh');
                        }
                    }
                });
            }else{
                $('#kecamatan').empty();
            }
        });
        $('#kecamatan').on('change', function() {
            var kecamatanID = $(this).val();
            if(kecamatanID) {
                $.ajax({
                    url: 'https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan='+kecamatanID,
                    type: "GET",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success:function(data)
                    {
                        if(data){
                            $('#desa_kelurahan').empty();
                            $('#desa_kelurahan').append('<option hidden>Pilih Desa/Kelurahan</option>'); 
                            $.each(data.kelurahan, function(key, item){
                                $('select[name="desa_kelurahan"]').append('<option value="'+ item.id +'">' + item.nama + '</option>');
                            });
                            // $('.selectpicker').selectpicker('refresh');
                        }else{
                            $('#desa_kelurahan').empty();
                            // $('.selectpicker').selectpicker('refresh');
                        }
                    }
                });
            }else{
                $('#desa_kelurahan').empty();
            }
        });
    });
</script>
@endpush