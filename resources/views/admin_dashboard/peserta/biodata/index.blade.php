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
                            <select class="form-control selectpicker" name="provinsi">
                                <option value="Banten">Banten</option>
                                <option value="Jawa Barat">Jawa Barat</option>
                                <option value="Jawa Tengah">Jawa Tengah</option>
                                <option value="Daerah Istimewa Yogyakarta">Daerah Istimewa Yogyakarta</option>
                                <option value="Jawa Timur">Jawa Timur</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="kabupaten/kota">Kabupaten/Kota</label>
                            <select class="form-control selectpicker" name="kabupaten/kota">
                                <option value="Ini selected Kota/Kab dari provinsi yang dipilih">Ini selected Kota/Kab dari provinsi yang dipilih</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="col">
                            <label for="kecamatan">Kecamatan</label>
                            <select class="form-control selectpicker" name="provinsi">
                                <option value="ini selected kecamatan dari kota yang dipilih">ini selected kecamatan dari kota yang dipilih</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="kelurahan/desa">Kelurahan/Desa</label>
                            <select class="form-control selectpicker" name="kelurahan/desa">
                                <option value="Ini selected desa dari kecematan yang dipilih">Ini selected desa dari kecematan yang dipilih</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="col">
                            <label for="RT">RT</label>
                            <input type="text" class="form-control" placeholder="RT">
                        </div>
                        <div class="col">
                            <label for="RW">RW</label>
                            <input type="text" class="form-control" placeholder="RW">
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
    
@endpush

@push('scripts')
    
@endpush