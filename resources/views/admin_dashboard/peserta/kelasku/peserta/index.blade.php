@extends('admin_dashboard.layouts.main')
@section('title')
    Peserta | Kegiatan Pelibatan Masyarakat
@endsection

@section('content')
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            @if(session('status'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        {{ session('status') }}
                    </div>
                </div>
            @endif

            @include('admin_dashboard.peserta.kelasku.includes.navbar')

            <div class="widget-content widget-content-area br-6">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Alamat</th>
                        </thead>
                        <tbody>
                            @foreach ($peserta as $peserta)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $peserta->user->nama }}</td>
                                    <td>{{ $peserta->user->username }}</td>
                                    <td>{{ ucwords(strtolower(\Indonesia::findDistrict($peserta->user->kecamatan)->name)) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>  
                </div> 
            </div>
        </div>

    </div>
@endsection

@push('modal')
    
@endpush

@push('styles')
    
@endpush

@push('scripts')
    
@endpush