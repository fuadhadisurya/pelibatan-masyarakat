@extends('admin_dashboard.layouts.main')
@section('title')
    Detail Forum | Kegiatan Pelibatan Masyarakat
@endsection

@section('content')
    @include('admin_dashboard.peserta.kelasku.includes.navbar')

    <div class="widget-content widget-content-area mb-3">
        <div class="widget-header">
            <div class="media">
                <div class="media-body">
                    <h4 class="media-heading">Judul Diskusi</h4>
                    <p class="media-text">Postingan oleh : John Doe, 16 April 2022</p>
                </div>
            </div>
            <hr style="margin-top: 5px; margin-bottom: 10px">
        </div>
        <div class="widget-content">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem nihil possimus pariatur repellendus fugiat consectetur aut distinctio inventore expedita deserunt laborum, id, tempore error reprehenderit quidem quis delectus doloremque iusto perspiciatis optio! Temporibus quibusdam voluptatibus inventore, velit laborum provident dolorem exercitationem quis neque blanditiis non ex, minus perferendis! Molestias, cumque?</p>
            <div class="mt-2">
                <span class="badge badge-secondary">0 Dilihat</span>
                <span class="badge badge-info">0 komentar</span>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center row">
        <div class="col-md-12">
            <div class="d-flex flex-column comment-section">
                <div class="bg-white p-2">
                    <div class="d-flex flex-row user-info">
                        <img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40">
                        <div class="d-flex flex-column justify-content-start ml-2">
                            <span class="d-block font-weight-bold name">Marry Andrews</span>
                            <span class="date text-black-50">Shared publicly - Jan 2020</span>
                        </div>
                    </div>
                    <div class="mt-2">
                        <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
                <div class="bg-light p-2">
                    <div class="d-flex flex-row align-items-start">
                        <img class="rounded-circle" src="{{ Storage::url(Auth::user()->foto) }}" height="40" width="40">
                        <textarea class="form-control ml-1 shadow-none textarea"></textarea>
                    </div>
                    <div class="mt-2 text-right">
                        <button class="btn btn-primary btn-sm shadow-none" type="button">Post comment</button>
                        <a href="{{ route('peserta.kelasku.forum.index', $kelas->id) }}" class="btn btn-sm btn-outline-primary ml-1 shadow-none">Kembali</a>
                        {{-- <button class="btn btn-outline-primary btn-sm ml-1 shadow-none" type="button">Kembali</button> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/css/elements/alert.css') }}">
    <link href="{{ asset('admin_dashboard/assets/css/components/tabs-accordian/custom-tabs.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_dashboard/assets/css/components/cards/card.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_dashboard/assets/css/components/custom-media_object.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_dashboard/assets/css/comment/comment.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_dashboard/plugins/lightbox/photoswipe.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_dashbpard/plugins/lightbox/default-skin/default-skin.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_dashborad/plugins/lightbox/custom-photswipe.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .btn-light { border-color: transparent; }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('admin_dashboard/plugins/lightbox/photoswipe.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard/plugins/lightbox/photoswipe-ui-default.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard/plugins/lightbox/custom-photswipe.js') }}"></script>
@endpush