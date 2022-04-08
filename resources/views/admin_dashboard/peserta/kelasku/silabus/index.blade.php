@extends('admin_dashboard.layouts.main')
@section('title')
    Silabus | Kegiatan Pelibatan Masyarakat
@endsection

@section('content')
    @include('admin_dashboard.peserta.kelasku.includes.navbar')

    <div class="widget-content widget-content-area">
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