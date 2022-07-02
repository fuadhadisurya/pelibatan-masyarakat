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
                                                    <strong>{{ $kelas->status }}</strong>
                                                </span>
                                                <br>
                                                <p class="mb-0 mt-1">{{ $kelas->nama_kelas }}</p>
                                            </td>
                                            <td class="text-right">
                                                <a href="{{ route('tutor.kelasku.home.index', [$kelas->id]) }}" class="btn btn-sm btn-info">
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