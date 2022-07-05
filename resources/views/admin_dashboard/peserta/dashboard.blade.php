@extends('admin_dashboard.layouts.main')
@section('title')
    Dashboard | Kegiatan Pelibatan Masyarakat
@endsection

@section('content')
    <div class="row layout-top-spacing">

        <div class="col-xl-6 col-lg-6 col-md-6 col-6 layout-spacing">
            <div class="widget-content-area br-4">
                <div class="widget-heading">
                    <h5>Kelasku</h5>
                </div>
                <hr>
                <div class="widget-content">
                    <div class="card">
                        <div class="card-body">
                            <table class="table-borderless table-responsive--collapse w-100">
                                <tbody>
                                    @forelse ($kelasku as $kelas)
                                        <tr>
                                            <td class="">
                                                <span class="small">
                                                    <strong>{{ $kelas->kelas->status }}</strong>
                                                </span>
                                                <br>
                                                <p class="mb-0 mt-1">{{ $kelas->kelas->nama_kelas }}</p>
                                            </td>
                                            <td class="text-right">
                                                <a href="{{ route('peserta.kelasku.home.index', [$kelas->kelas->id]) }}" class="btn btn-sm btn-info">
                                                    <div class="d-flex">
                                                        <span class="">Lihat Kelas</span>
                                                    </div>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <p class="text-center">Tidak ada kelas</p>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if(count($kelasku)>5)
                        <div class="d-flex justify-content-end mt-3">
                            <a href="{{ route('peserta.kelasku.index') }}">Selengkapnya</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="col-xl-6 col-lg-6 col-md-6 col-6 layout-spacing">
            <div class="widget-content-area br-4">
                <div class="widget-heading">
                    <h5>Eventku</h5>
                </div>
                <hr>
                <div class="widget-content">
                    <div class="card">
                        <div class="card-body">
                            <table class="table-borderless table-responsive--collapse w-100">
                                <tbody>
                                    @forelse ($eventku as $event)
                                        <tr>
                                            <td class="">
                                                <span class="small">
                                                    <strong>{{ $event->event->status }}</strong>
                                                </span>
                                                <br>
                                                <p class="mb-0 mt-1">{{ $event->event->nama_event }}</p>
                                            </td>
                                            <td class="text-right">
                                                <a href="{{ route('peserta.eventku.deskripsi.index', [$event->event->id]) }}" class="btn btn-sm btn-info">
                                                    <div class="d-flex">
                                                        <span class="">Lihat Event</span>
                                                    </div>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <p class="text-center">Tidak ada event</p>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if(count($eventku)>5)
                        <div class="d-flex justify-content-end mt-3">
                            <a href="{{ route('peserta.eventku.index') }}">Selengkapnya</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/css/elements/alert.css') }}">
    <style>
        .btn-light { border-color: transparent; }
    </style>
@endpush

@push('scripts')
    
@endpush