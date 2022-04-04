@extends('admin_dashboard.layouts.main')
@section('title')
    Dashboard | Kegiatan Pelibatan Masyarakat
@endsection

@section('content')
    {{-- <div class="row layout-top-spacing">
        
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">

            <div class="widget-content-area br-4">
                <div class="widget-one">
                    <ul class="nav nav-pills mb-3 mt-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Profile <svg> ... </svg></a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" id="pills-profile-tab" data-toggle="tab" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Action</a>
                                <a class="dropdown-item"  id="pills-profile-tab2" data-toggle="tab" href="#pills-profile2" role="tab" aria-controls="pills-profile2" aria-selected="false">Another action</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>

                    <h6>Blank Page - Kick Start you new project with ease!</h6>

                    <p class="">With CORK starter kit, you can begin your work without any hassle. The starter page is highly optimized which gives you freedom to start with minimal code and add only the desired components and plugins required for your project.</p>

                </div>
            </div>
        </div>

    </div> --}}

    <div class="row layout-top-spacing">
        <div id="tabsSimple" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Simple Tabs</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area simple-tab">
                    <ul class="nav nav-tabs mb-3 mt-3" id="simpletab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="silabus-tab" data-toggle="tab" href="#silabus" role="tab" aria-controls="silabus" aria-selected="false">Silabus</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="peserta-tab" data-toggle="tab" href="#peserta" role="tab" aria-controls="peserta" aria-selected="false">Peserta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="forum-tab" data-toggle="tab" href="#forum" role="tab" aria-controls="forum" aria-selected="false">Forum</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Test <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Pra Test</a>
                                <a class="dropdown-item"  id="profile-tab2" data-toggle="tab" href="#profile2" role="tab" aria-controls="profile2" aria-selected="false">Post Test</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tugas-tab" data-toggle="tab" href="#tugas" role="tab" aria-controls="tugas" aria-selected="false">Tugas</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li> --}}
                    </ul>
                    <div class="tab-content" id="simpletabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3>Persyaratan</h3>
                            {!! $kelas->persyaratan !!}
                            <br>
                            <h3>Deskripsi</h3>
                            {!! $kelas->deskripsi !!}   
                        </div>
                        <div class="tab-pane fade" id="silabus" role="tabpanel" aria-labelledby="silabus-tab">
                            <div class="media">
                                <div class="media-body">
                                    <ol>
                                        <li>Lorem, ipsum dolor.
                                            <ul>
                                                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                                <li>Nulla bibendum risus a quam tincidunt, a convallis mi convallis.</li>
                                            </ul>
                                        </li>
                                        <li>Lorem, ipsum dolor.
                                            <ul>
                                                <li>Integer bibendum arcu at ipsum interdum, vel consectetur augue porttitor.</li>
                                                <li>Quisque molestie erat sit amet turpis tristique, id rhoncus dui sollicitudin.</li>
                                                <li>Integer rutrum nulla et convallis pharetra.</li>
                                            </ul>
                                        </li>
                                        <li>Lorem, ipsum dolor.
                                            <ul>
                                                <li>Fusce non turpis eget odio sodales rhoncus a sit amet magna.</li>
                                                <li>Ut ut nunc viverra, tempus libero quis, viverra tellus.</li>
                                                <li>Donec elementum enim ut nibh consequat fringilla.</li>
                                                <li>Aliquam viverra sapien ac hendrerit commodo.</li>
                                                <li>Maecenas sit amet nunc porta metus accumsan tempor.</li>
                                                <li>Cras accumsan nibh non quam condimentum elementum.</li>
                                            </ul>
                                        </li>
                                        <li>Lorem, ipsum dolor.
                                            <ul>
                                                <li>Aliquam ornare leo consequat ex bibendum tristique.</li>
                                                <li>In cursus orci et est viverra bibendum.</li>
                                                <li>Integer bibendum elit at magna auctor convallis.</li>
                                                <li>Curabitur luctus risus nec convallis suscipit.</li>
                                                <li>Donec rutrum ligula non elit pulvinar mattis.</li>
                                            </ul>
                                        </li>
                                        <li>Lorem, ipsum dolor.
                                            <ul>
                                                <li>Curabitur dictum purus ac dolor dapibus, ultrices cursus eros feugiat.</li>
                                                <li>Nam id felis sit amet urna porta venenatis viverra a enim.</li>
                                                <li>Morbi tempor neque sed elit pellentesque facilisis.</li>
                                                <li>Donec eget dolor quis arcu egestas gravida vel in metus.</li>
                                                <li>Praesent viverra ipsum iaculis quam interdum euismod.</li>
                                            </ul>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="peserta" role="tabpanel" aria-labelledby="peserta-tab">
                            <div class="media">
                                <div class="media-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <th>No.</th>
                                                <th>Nama</th>
                                                <th>Username</th>
                                                <th>Alamat</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1.</td>
                                                    <td>Fuad Hadisurya</td>
                                                    <td>fuadhadisurya</td>
                                                    <td>Indramayu</td>
                                                </tr>
                                                <tr>
                                                    <td>2.</td>
                                                    <td>Sugeng</td>
                                                    <td>sugeng.wanantara</td>
                                                    <td>Indramayu</td>
                                                </tr>
                                                <tr>
                                                    <td>3.</td>
                                                    <td>Indra Nasuka</td>
                                                    <td>indranasuka</td>
                                                    <td>Indramayu</td>
                                                </tr>
                                                <tr>
                                                    <td>4.</td>
                                                    <td>Rifki Ardiansyah</td>
                                                    <td>rifki</td>
                                                    <td>Tukdana</td>
                                                </tr>
                                            </tbody>
                                        </table>  
                                    </div>    
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tugas" role="tabpanel" aria-labelledby="tugas-tab">
                            <div class="media">
                                <div class="media-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <th>Status</th>
                                                <th>Nama Tugas</th>
                                                <th>Tanggal Kirim</th>
                                                <th>Aksi</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><span class="badge badge-success">Disetujui</span></td>
                                                    <td>HTML</td>
                                                    <td>4 April 2020</td>
                                                    <td><button class="btn btn-primary">lihat</button></td>
                                                </tr>
                                                <tr>
                                                    <td><span class="badge badge-warning">Dalam Proses</span></td>
                                                    <td>CSS</td>
                                                    <td>4 April 2020</td>
                                                    <td><button class="btn btn-primary">lihat</button></td>
                                                </tr>
                                                <tr>
                                                    <td><span class="badge badge-danger">Perbaikan</span></td>
                                                    <td>Bootstrap</td>
                                                    <td>4 April 2020</td>
                                                    <td><button class="btn btn-primary">lihat</button></td>
                                                </tr>
                                            </tbody>
                                        </table> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <p class="">
                                Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                        </div>
                        <div class="tab-pane fade" id="profile2" role="tabpanel" aria-labelledby="profile-tab2">
                            <p class="">
                                Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                        </div>
                        <div class="tab-pane fade" id="forum" role="tabpanel" aria-labelledby="forum-tab">
                            <p class="">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/css/elements/alert.css') }}">
    <link href="{{ asset('admin_dashboard/assets/css/components/tabs-accordian/custom-tabs.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .btn-light { border-color: transparent; }
    </style>
@endpush

@push('scripts')
    
@endpush