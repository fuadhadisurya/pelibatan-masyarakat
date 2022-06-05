@extends('admin_dashboard.layouts.main')
@section('title')
    Info Event | Kegiatan Pelibatan Masyarakat
@endsection

@section('content')
    @include('admin_dashboard.admin.data-event.includes.navbar')
    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4">
                @if ($event->banner != null)            
                    <img src="{{ Storage::url($event->banner) }}" height="300px" width="400px" class="" alt="widget-card-2">
                @else
                    <img src="{{ asset('admin_dashboard/assets/img/400x300.jpg') }}" class="img-fluid" alt="widget-card-2">
                @endif
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <div>
                        <span class="badge badge-secondary mb-3">{{ $event->kategori }}</span>
                    </div>
                    <h5 class="card-title">{{ $event->nama_event }}</h5>
                    <div class="mb-2">
                        <span>Oleh: 
                            <span class="text-muted">{{ $event->pembuat_event }}</span>
                        </span>
                    </div>
                    <div class="mb-2">
                        <div class="text-for-element">Jadwal Pelaksanaan</div>
                        <div class="row">
                            <div class="col-sm-3">Mulai</div>
                            <div class="col-sm-9">: 
                                <b>{{ \Carbon\Carbon::parse($event->tanggal_mulai)->format('d M Y')}}</b> 
                                {{ \Carbon\Carbon::parse($event->tanggal_mulai)->format('H:i')}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">Selesai</div>
                            <div class="col-sm-9">: 
                                <b>{{ \Carbon\Carbon::parse($event->tanggal_berakhir)->format('d M Y')}}</b> 
                                {{ \Carbon\Carbon::parse($event->tanggal_berakhir)->format('H:i')}}
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span>Lokasi:
                            <span class="text-muted">{{ $event->lokasi }}</span>
                        </span>
                    </div>
                    <div class="mb-2">
                        @if($event->status == 'Selesai')
                            <p class="card-text"><span class="badge badge-dark">Event Telah Berakhir</span></p>
                        @else
                            <div class="row">
                                <div class="col-sm-3">Batas Pendaftaran</div>
                                <div class="col-sm-9">: 
                                    <b>{{ \Carbon\Carbon::parse($event->deadline_pendaftaran)->format('d M Y')}}</b> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">Kuota</div>
                                <div class="col-sm-9">: 
                                    <strong>{{ $event->kuota }}</strong>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="widget-content widget-content-area">
        <h3>Deskripsi</h3>
        {!! $event->deskripsi !!}   
    </div>
@endsection

@push('styles')
    <link href="{{ asset('admin_dashboard/assets/css/components/tabs-accordian/custom-tabs.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/css/elements/alert.css') }}">
    <link href="{{ asset('admin_dashboard/assets/css/components/cards/card.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
    
@endpush