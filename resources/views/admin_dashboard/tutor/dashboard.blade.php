@extends('admin_dashboard.layouts.main')
@section('title')
    Dashboard | Kegiatan Pelibatan Masyarakat
@endsection

@section('content')
    <div class="row layout-top-spacing">
        
        <div class="col-sm-6 layout-spacing">
            <div class="widget-content-area br-4">
                <div class="widget-heading">
                    <h5>Kelasku</h5>
                </div>
                <hr>
                <div class="widget-content">
                    <div class="card">
                        <div class="card-body">
                            @forelse ($kelasku as $kelas)
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="">
                                        <span class="small">
                                            <strong>{{ $kelas->status }}</strong>
                                        </span>
                                        <br>
                                        <p class="mb-0 mt-1">{{ $kelas->nama_kelas }}</p>
                                    </div>
                                    <div class="">
                                        <a href="{{ route('tutor.kelasku.home.index', [$kelas->id]) }}" class="btn btn-sm btn-info">
                                            <div class="d-flex">
                                                <span class="">Lihat Kelas</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <p class="text-center">Tidak ada kelas</p>
                            @endforelse
                        </div>
                    </div>
                    @if(count($kelasku)>5)
                        <div class="d-flex justify-content-end mt-3">
                            <a href="{{ route('tutor.kelasku.index') }}">Selengkapnya</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/css/elements/alert.css') }}">
    <link href="{{ asset('admin_dashboard/assets/css/components/timeline/custom-timeline.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .btn-light { border-color: transparent; }
    </style>
@endpush

@push('scripts')
    
@endpush