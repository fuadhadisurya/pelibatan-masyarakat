@extends('admin_dashboard.layouts.main')
@section('title')
    Kelasku | Kegiatan Pelibatan Masyarakat
@endsection

@section('content')
    @include('admin_dashboard.tutor.kelasku.includes.navbar')

    <div class="widget-content widget-content-area">
        <h3>Persyaratan</h3>
        {!! $kelas->persyaratan !!}
        <br>
        <h3>Deskripsi</h3>
        {!! $kelas->deskripsi !!}   
    </div>

    {{-- <div class="row layout-top-spacing">
        <div id="tabsSimple" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area simple-pills">
                    <div class="tab-content" id="simpletabContent">
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
                        <div class="tab-pane fade" id="tugas" role="tabpanel" aria-labelledby="tugas-tab">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <th>Nama Tugas</th>
                                        <th>Batas Waktu</th>
                                        <th>Tanggal Kirim</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>HTML</td>
                                            <td>5 April 2020</td>
                                            <td>4 April 2020</td>
                                            <td><span class="badge badge-success">Disetujui</span></td>
                                            <td><button class="btn btn-primary">lihat</button></td>
                                        </tr>
                                        <tr>
                                            <td>CSS</td>
                                            <td>5 April 2020</td>
                                            <td>4 April 2020</td>
                                            <td><span class="badge badge-warning">Dalam Proses Penilaian</span></td>
                                            <td><button class="btn btn-primary">lihat</button></td>
                                        </tr>
                                        <tr>
                                            <td>Bootstrap</td>
                                            <td>5 April 2020</td>
                                            <td>4 April 2020</td>
                                            <td><span class="badge badge-danger">Belum Dikirim</span></td>
                                            <td><button class="btn btn-primary">lihat</button></td>
                                        </tr>
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                        <div class="tab-pane fade" id="test" role="tabpanel" aria-labelledby="test-tab">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Persentase</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Pra Test</td>
                                            <td>4 April 2020</td>
                                            <td>80%</td>
                                            <td><span class="badge badge-success">Baik</span></td>
                                            <td><button class="btn btn-primary">lihat</button></td>
                                        </tr>
                                        <tr>
                                            <td>Post Test</td>
                                            <td>4 April 2020</td>
                                            <td>60%</td>
                                            <td><span class="badge badge-warning">Cukup</span></td>
                                            <td><button class="btn btn-primary">lihat</button></td>
                                        </tr>
                                        <tr>
                                            <td>Quiz</td>
                                            <td>4 April 2020</td>
                                            <td>40%</td>
                                            <td><span class="badge badge-danger">Kurang</span></td>
                                            <td><button class="btn btn-primary">lihat</button></td>
                                        </tr>
                                        <tr>
                                            <td>Quiz</td>
                                            <td>4 April 2020</td>
                                            <td></td>
                                            <td><span class="badge badge-info">Belum Mengisi</span></td>
                                            <td><button class="btn btn-primary">lihat</button></td>
                                        </tr>
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pra-test" role="tabpanel" aria-labelledby="pra-test-tab">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <th>Tanggal</th>
                                        <th>Persentase</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>4 April 2020</td>
                                            <td>80%</td>
                                            <td><span class="badge badge-success">Baik</span></td>
                                            <td><button class="btn btn-primary">lihat</button></td>
                                        </tr>
                                        <tr>
                                            <td>4 April 2020</td>
                                            <td>60%</td>
                                            <td><span class="badge badge-warning">Cukup</span></td>
                                            <td><button class="btn btn-primary">lihat</button></td>
                                        </tr>
                                        <tr>
                                            <td>4 April 2020</td>
                                            <td>40%</td>
                                            <td><span class="badge badge-danger">Kurang</span></td>
                                            <td><button class="btn btn-primary">lihat</button></td>
                                        </tr>
                                        <tr>
                                            <td>4 April 2020</td>
                                            <td></td>
                                            <td><span class="badge badge-info">Belum Mengisi</span></td>
                                            <td><button class="btn btn-primary">lihat</button></td>
                                        </tr>
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                        <div class="tab-pane fade" id="post-test" role="tabpanel" aria-labelledby="post-test-tab">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <th>Tanggal</th>
                                        <th>Persentase</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>4 April 2020</td>
                                            <td>80%</td>
                                            <td><span class="badge badge-success">Baik</span></td>
                                            <td><button class="btn btn-primary">lihat</button></td>
                                        </tr>
                                        <tr>
                                            <td>4 April 2020</td>
                                            <td>60%</td>
                                            <td><span class="badge badge-warning">Cukup</span></td>
                                            <td><button class="btn btn-primary">lihat</button></td>
                                        </tr>
                                        <tr>
                                            <td>4 April 2020</td>
                                            <td>40%</td>
                                            <td><span class="badge badge-danger">Kurang</span></td>
                                            <td><button class="btn btn-primary">lihat</button></td>
                                        </tr>
                                        <tr>
                                            <td>4 April 2020</td>
                                            <td></td>
                                            <td><span class="badge badge-info">Belum Mengisi</span></td>
                                            <td><button class="btn btn-primary">lihat</button></td>
                                        </tr>
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                        <div class="tab-pane fade" id="forum" role="tabpanel" aria-labelledby="forum-tab">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between">
                                        <div>Judul Diskusi</div>
                                        <div>6 April 2022 22:22</div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad in iure blanditiis consectetur veniam, quam sed cumque at nam, voluptates dolorum, voluptatem inventore sequi odit. Porro inventore possimus culpa, voluptatem officiis iusto eum? Error dicta voluptates in expedita odit et vitae, praesentium, quibusdam tempora doloribus maxime, fugiat iste eveniet accusantium.
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <span class="badge badge-info">0 Dilihat</span>
                                            <span class="badge badge-info">0 komentar</span>
                                        </div>
                                        <span class="badge badge-light">Postingan oleh : John Doe</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="presensi" role="tabpanel" aria-labelledby="presensi-tab">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>4 April 2020</td>
                                            <td><span class="badge badge-success">Hadir</span></td>
                                            <td><button class="btn btn-primary">lihat</button></td>
                                        </tr>
                                        <tr>
                                            <td>4 April 2020</td>
                                            <td><span class="badge badge-warning">Belum Mengisi</span></td>
                                            <td><button class="btn btn-primary">lihat</button></td>
                                        </tr>
                                        <tr>
                                            <td>4 April 2020</td>
                                            <td><span class="badge badge-danger">Tidak Hadir</span></td>
                                            <td><button class="btn btn-primary">lihat</button></td>
                                        </tr>
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                        <div class="tab-pane fade" id="materi" role="tabpanel" aria-labelledby="materi-tab">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <th>Nama</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Modul HTML</td>
                                            <td><button class="btn btn-primary">lihat</button></td>
                                        </tr>
                                        <tr>
                                            <td>Modul CSS</td>
                                            <td><button class="btn btn-primary">lihat</button></td>
                                        </tr>
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/css/elements/alert.css') }}">
    <link href="{{ asset('admin_dashboard/assets/css/components/tabs-accordian/custom-tabs.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_dashboard/assets/css/components/cards/card.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .btn-light { border-color: transparent; }
    </style>
@endpush

@push('scripts')
    
@endpush