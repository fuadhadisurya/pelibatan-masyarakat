@extends('admin_dashboard.layouts.main')
@section('title')
    Detail Kelas | Kegiatan Pelibatan Masyarakat
@endsection

@section('content')
    <div class="row layout-top-spacing">
        
        <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

            <div class="user-profile layout-spacing sticky-top" style="top: 105px;">
                <div class="card component-card_9">
                    <img src="{{ asset('admin_dashboard/assets/img/400x300.jpg') }}" class="card-img-top" alt="widget-card-2">
                    <div class="card-body">
                        <p class="meta-date">25 Jan 2020 - 25 Februari 2020</p>
                        <h5 class="nama-kelas">Nama Kelas</h5>
                        <hr>
                        <div class="row">
                            <div class="col-2 mr-2">
                                <img alt="avatar" src="{{ asset('admin_dashboard/assets/img/90x90.jpg') }}" width="56" height="56" class="rounded-circle" />
                            </div>
                            <div class="col-9 mt-1">
                                <h5 class="card-user_name">Luke Ivory</h5>
                                <p class="card-user_occupation">Web Programmer</p>
                            </div>
                        </div>
                        <hr>
                        <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModal">
                            Daftar Sekarang
                        </button>
                        {{-- <button type="button" class="btn btn-primary btn-lg btn-block">Daftar Sekarang</button> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">
            <div class="layout-spacing ">
                <div class="widget-content widget-content-area">
                    <h3 class="">Persyaratan</h3>
                    <ul>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit.</li>
                        <li>Lorem ipsum dolor sit amet consectetur.</li>
                    </ul>
                </div>
            </div>
            <div class="layout-spacing ">
                <div class="widget-content widget-content-area">
                    <h3 class="">Deskripsi</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsa dolores fugiat repellendus veniam rerum hic beatae quaerat eveniet et ex architecto magni delectus commodi voluptatibus ad, aut numquam minima maiores!</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium quaerat mollitia nisi, pariatur minus et, provident itaque blanditiis officia perferendis, sint magni eaque dolores optio consequuntur ab magnam saepe ea.</p>
                    <div class="bio-skill-box">
                        <div class="row">
                            <div class="col-12 col-xl-6 col-lg-12 mb-xl-5 mb-5 ">
                                <div class="d-flex b-skills">
                                    <div>
                                    </div>
                                    <div class="">
                                        <h5>Sass Applications</h5>
                                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse eu fugiat nulla pariatur.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-6 col-lg-12 mb-xl-5 mb-5 ">
                                <div class="d-flex b-skills">
                                    <div>
                                    </div>
                                    <div class="">
                                        <h5>Github Countributer</h5>
                                        <p>Ut enim ad minim veniam, quis nostrud exercitation aliquip ex ea commodo consequat.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-6 col-lg-12 mb-xl-0 mb-5 ">
                                <div class="d-flex b-skills">
                                    <div>
                                    </div>
                                    <div class="">
                                        <h5>Photograhpy</h5>
                                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia anim id est laborum.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-6 col-lg-12 mb-xl-0 mb-0 ">
                                <div class="d-flex b-skills">
                                    <div>
                                    </div>
                                    <div class="">
                                        <h5>Mobile Apps</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do et dolore magna aliqua.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                                
            </div>
        </div>

    </div>

@endsection

@push('modal')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Daftar Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-info" role="alert">
                        {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> --}}
                        Silahkan Isi Motivasi berikut, apa alasan anda ingin mengikuti Kelas nama kelas? 
                        <strong>Isilah motivasi anda minimal 30 kata</strong>
                    </div>
                    <form>
                        <div class="form-group mb-4">
                            <label for="motivasi">Motivasi</label>
                            <textarea class="form-control" id="motivasi" name="motivasi" rows="5"></textarea>
                        </div>
                        <div id="result"><b style="font-size:16px;font-family:Arial">Jumlah Kata</b> : <b style="font-size:16px;font-family:Arial;color:#2980b9">0</b></div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batalkan</button>
                    <button type="button" class="btn btn-primary">Daftar</button>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_dashboard/plugins/font-icons/fontawesome/css/fontawesome.css') }}">
    <link href="{{ asset('admin_dashboard/assets/css/users/user-profile.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin_dashboard/assets/css/components/cards/card.css')}}" rel="stylesheet" type="text/css" />
    <link href="assets/css/elements/avatar.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/css/elements/alert.css') }}">
    <style>
        .nama-kelas {
            font-size: 20px;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 15px; }
        
        .card-user_name {
            font-size: 15px;
            letter-spacing: 1px;
            font-weight: 600;
            margin-bottom: 3px;}

        .card-user_occupation {
            font-size: 14px;
            letter-spacing: 1px;
            margin-bottom: 0; }
    </style>
@endpush

@push('scripts')
    <script>
        function wordCount(val) {
            var wom = val.match(/\S+/g);
            return {
                charactersNoSpaces: val.replace(/\s+/g, '').length,
                characters: val.length,
                words: wom ? wom.length : 0,
                lines: val.split(/\r*\n/).length
            };
        }


        var textarea = document.getElementById('motivasi');
        var result = document.getElementById('result');

        textarea.addEventListener('input', function() {
            var wc = wordCount(this.value);
            result.innerHTML = (`
            <b style="font-size:16px;font-family:Arial">Jumlah Kata</b> : <b style="font-size:16px;font-family:Arial;color:#2980b9">${wc.words}</b>
            `);
        });
    </script>
@endpush