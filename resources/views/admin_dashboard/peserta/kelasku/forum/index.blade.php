@extends('admin_dashboard.layouts.main')
@section('title')
    Silabus | Kegiatan Pelibatan Masyarakat
@endsection

@section('content')
    @include('admin_dashboard.peserta.kelasku.includes.navbar')

    <div class="widget-content widget-content-area">
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