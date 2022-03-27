@extends('admin_dashboard.layouts.main')
@section('title')
    Akun | Kegiatan Pelibatan Masyarakat
@endsection

@section('content')
    <div class="row d-flex justify-content-center layout-top-spacing">

        <div class="col-lg-7 layout-spacing">
            <div class="card">
                <div class="card-body shadow-sm rounded-lg">
                    <h5 class="card-title">Ganti Email</h5>
                    <hr>
                    <form method="post">
                        <div class="form-group">
                            <label for="email">Email Baru</label>
                            <input id="email" type="email" name="email" placeholder="email@domain.com" class="form-control" required>
                            <small id="emailHelp" class="form-text text-muted">Email anda akan berubah ketika menekan tombol simpan email.</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Email</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-7 layout-spacing">
            <div class="card">
                <div class="card-body shadow-sm rounded-lg">
                    <h5 class="card-title">Ganti Password</h5>
                    <hr>
                    <form method="post">
                        <div class="form-group">
                            <label for="password_lama">Password Lama</label>
                            <input id="password_lama" type="password" name="password_lama" placeholder="Password Lama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password_baru">Password Baru <span class="text-danger">*</span></label>
                            <input id="password_baru" type="password" name="password_baru" placeholder="Password Baru" class="form-control" required>
                            <small id="passwordHelp" class="form-text text-muted">Gunakan minimal 6 karakter.</small>
                        </div>
                        <div class="form-group">
                            <label for="konfirmasi_password">Konfirmasi Password <span class="text-danger">*</span></label>
                            <input id="konfirmasi_password" type="password" name="konfirmasi_password" placeholder="Konfirmasi Password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Password</button>
                    </form>
                </div>
            </div>          
        </div>
    </div>
@endsection

@push('styles')
    
@endpush

@push('scripts')
    
@endpush