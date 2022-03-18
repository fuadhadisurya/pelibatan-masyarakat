@extends('admin_dashboard.layouts.main')
@section('title')
    Kelas | Kegiatan Pelibatan Masyarakat
@endsection

@section('content')
    <div class="row layout-top-spacing">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 mb-3">
                    <div class="card sticky-top" style="top: 100px;">
                        <div class="card-body">
                            <h4 class="mb-3">Filter</h4>
                            <div class="input-group input-group-sm mb-4">
                                <input type="text" class="form-control" placeholder="Pencarian" aria-label="Pencarian">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></button>
                                </div>
                            </div>
                            <div class="mb-3">
                                <h5 class="mb-2">Urutkan</h5>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio1">Terbaru</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio2">Terpopuler</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <h5 class="mb-2">Tipe Peserta</h5>
                                <div class="n-chk">
                                    <label class="new-control new-checkbox checkbox-primary">
                                        <input type="checkbox" name="TK_PAUD" class="new-control-input" value="1">
                                        <span class="new-control-indicator"></span>TK/PAUD
                                    </label>
                                </div>
                                <div class="n-chk">
                                    <label class="new-control new-checkbox checkbox-primary">
                                        <input type="checkbox" name="SD_MI" class="new-control-input" value="1">
                                        <span class="new-control-indicator"></span>SD/MI
                                    </label>
                                </div>
                                <div class="n-chk">
                                    <label class="new-control new-checkbox checkbox-primary">
                                        <input type="checkbox" name="SMP_MTS" class="new-control-input" value="1">
                                        <span class="new-control-indicator"></span>SMP/MTS
                                    </label>
                                </div>
                                <div class="n-chk">
                                    <label class="new-control new-checkbox checkbox-primary">
                                        <input type="checkbox" name="SMA_SMK_MA" class="new-control-input" value="1">
                                        <span class="new-control-indicator"></span>SMA/SMK/MA
                                    </label>
                                </div>
                                <div class="n-chk">
                                    <label class="new-control new-checkbox checkbox-primary">
                                        <input type="checkbox" name="Mahasiswa" class="new-control-input" value="1">
                                        <span class="new-control-indicator"></span>Mahasiswa
                                    </label>
                                </div>
                                <div class="n-chk">
                                    <label class="new-control new-checkbox checkbox-primary">
                                        <input type="checkbox" name="Masyarakat_Umum" class="new-control-input" value="1">
                                        <span class="new-control-indicator"></span>Masyarakat Umum
                                    </label>
                                </div>
                                <div class="n-chk">
                                    <label class="new-control new-checkbox checkbox-primary">
                                        <input type="checkbox" name="ASN_Polri_TNI" class="new-control-input" value="1">
                                        <span class="new-control-indicator"></span>ASN/Polri/TNI
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="{{ url('peserta/kelas/1') }}">
                                <div class="card component-card_9 mb-3">
                                    <img src="{{ asset('admin_dashboard/assets/img/400x300.jpg') }}" class="card-img-top" alt="widget-card-2">
                                    <div class="card-body">
                                        <p class="meta-date">25 Jan 2020</p>
                                        <h5 class="card-title">How to Start a Blog in 5 Easy Steps.</h5>
                                        <p class="card-text">Vestibulum vestibulum tortor ut eros tincidunt, ut rutrum elit volutpat.</p>
                                        <div class="meta-info">
                                            <div class="meta-user">
                                                <div class="avatar avatar-sm">
                                                    <span class="avatar-title rounded-circle">AG</span>
                                                </div>
                                                <div class="user-name">Luke Ivory</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ url('peserta/kelas/1') }}">
                                <div class="card component-card_9 mb-3">
                                    <img src="{{ asset('admin_dashboard/assets/img/400x300.jpg') }}" class="card-img-top" alt="widget-card-2">
                                    <div class="card-body">
                                        <p class="meta-date">25 Jan 2020</p>
                                        <h5 class="card-title">How to Start a Blog in 5 Easy Steps.</h5>
                                        <p class="card-text">Vestibulum vestibulum tortor ut eros tincidunt, ut rutrum elit volutpat.</p>
                                        <div class="meta-info">
                                            <div class="meta-user">
                                                <div class="avatar avatar-sm">
                                                    <span class="avatar-title rounded-circle">AG</span>
                                                </div>
                                                <div class="user-name">Luke Ivory</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ url('peserta/kelas/1') }}">
                                <div class="card component-card_9 mb-3">
                                    <img src="{{ asset('admin_dashboard/assets/img/400x300.jpg') }}" class="card-img-top" alt="widget-card-2">
                                    <div class="card-body">
                                        <p class="meta-date">25 Jan 2020</p>
                                        <h5 class="card-title">How to Start a Blog in 5 Easy Steps.</h5>
                                        <p class="card-text">Vestibulum vestibulum tortor ut eros tincidunt, ut rutrum elit volutpat.</p>
                                        <div class="meta-info">
                                            <div class="meta-user">
                                                <div class="avatar avatar-sm">
                                                    <span class="avatar-title rounded-circle">AG</span>
                                                </div>
                                                <div class="user-name">Luke Ivory</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ url('peserta/kelas/1') }}">
                                <div class="card component-card_9 mb-3">
                                    <img src="{{ asset('admin_dashboard/assets/img/400x300.jpg') }}" class="card-img-top" alt="widget-card-2">
                                    <div class="card-body">
                                        <p class="meta-date">25 Jan 2020</p>
                                        <h5 class="card-title">How to Start a Blog in 5 Easy Steps.</h5>
                                        <p class="card-text">Vestibulum vestibulum tortor ut eros tincidunt, ut rutrum elit volutpat.</p>
                                        <div class="meta-info">
                                            <div class="meta-user">
                                                <div class="avatar avatar-sm">
                                                    <span class="avatar-title rounded-circle">AG</span>
                                                </div>
                                                <div class="user-name">Luke Ivory</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_dashboard/plugins/font-icons/fontawesome/css/fontawesome.css') }}">
@endpush

@push('scripts')

@endpush