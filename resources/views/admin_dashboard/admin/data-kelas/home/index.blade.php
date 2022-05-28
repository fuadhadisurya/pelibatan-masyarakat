@extends('admin_dashboard.layouts.main')
@section('title')
    Kelasku | Kegiatan Pelibatan Masyarakat
@endsection

@section('content')
    @include('admin_dashboard.admin.data-kelas.includes.navbar')
    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4">
                @if ($kelas->banner != null)            
                    <img src="{{ Storage::url($kelas->banner) }}" height="300px" width="400px" class="" alt="widget-card-2">
                @else
                    <img src="{{ asset('admin_dashboard/assets/img/400x300.jpg') }}" class="img-fluid" alt="widget-card-2">
                @endif
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title">{{ $kelas->nama_kelas }}</h2>
                    <p class="tanggal" style="color: blue; font-weight: bold">{{ $kelas->tanggal_mulai }} - {{ $kelas->tanggal_berakhir }}</p>
                    @php
                        if($kelas->kelasKategori->TK_PAUD == 1){
                            $sasaran[] = "TK/PAUD";
                        }
                        if($kelas->kelasKategori->SD_MI == 1){
                            $sasaran[] = "SD/MI";
                        }
                        if($kelas->kelasKategori->SMP_MTS == 1){
                            $sasaran[] = "SMP/MTS";
                        }
                        if($kelas->kelasKategori->SMA_SMK_MA == 1){
                            $sasaran[] = "SMA/SMK/MA";
                        }
                        if($kelas->kelasKategori->Mahasiswa == 1){
                            $sasaran[] = "Mahasiswa";
                        }
                        if($kelas->kelasKategori->Masyarakat_Umum == 1){
                            $sasaran[] = "Masyarakat Umum";
                        }
                        if($kelas->kelasKategori->ASN_Polri_TNI == 1){
                            $sasaran[] = "ASN/Polri/TNI";
                        }
                    @endphp
                    <p class="card-text"> 
                        <small class="text-muted">
                            Sasaran : 
                            @foreach ($sasaran as $item)
                                @if($loop->last)
                                    {{ $item }}
                                @else
                                    {{ $item }},
                                @endif
                            @endforeach
                        </small>
                    </p>
                    @if($kelas->status == 'Persiapan')
                        <p class="card-text">Status : <span class="badge badge-warning">{{ $kelas->status }}</span></p>
                    @elseif($kelas->status == 'Pendaftaran')
                        <p class="card-text">Status : <span class="badge badge-success">{{ $kelas->status }}</span></p>
                    @elseif($kelas->status == 'Proses Seleksi')
                        <p class="card-text">Status : <span class="badge badge-info">{{ $kelas->status }}</span></p>
                    @elseif($kelas->status == 'Kegiatan Berlangsung')
                        <p class="card-text">Status : <span class="badge badge-primary">{{ $kelas->status }}</span></p>
                    @else
                        <p class="card-text">Status : <span class="badge badge-dark">{{ $kelas->status }}</span></p>                        
                    @endif
                    <hr>
                </div>
            </div>
        </div>
    </div>
    <div class="widget-content widget-content-area">
        <h3>Persyaratan</h3>
        {!! $kelas->persyaratan !!}
        <br>
        <h3>Deskripsi</h3>
        {!! $kelas->deskripsi !!}   
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