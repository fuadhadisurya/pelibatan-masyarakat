@extends('admin_dashboard.layouts.main')
@section('title')
    Kelasku | Kegiatan Pelibatan Masyarakat
@endsection

@section('content')
    @include('admin_dashboard.tutor.kelasku.includes.navbar')

    <div class="widget-content widget-content-area">
        <h5>Silabus</h5>
        <div id="toggleAccordion">
            <div class="card">
                <div class="card-header" id="...">
                    <section class="mb-0 mt-0">
                        <div role="menu" class="collapsed" data-toggle="collapse" data-target="#defaultAccordionOne" aria-expanded="true" aria-controls="defaultAccordionOne">
                            Collapsible Group Item #1
                        </div>
                    </section>
                </div>
        
                <div id="defaultAccordionOne" class="collapse" aria-labelledby="..." data-parent="#toggleAccordion">
                    <div class="card-body">
                    
                        .......................
                        .......................
        
                    </div>
                </div>
            </div>
        
            <div class="card">
                <div class="card-header" id="...">
                    <section class="mb-0 mt-0">
                        <div role="menu" class="" data-toggle="collapse" data-target="#defaultAccordionTwo" aria-expanded="false" aria-controls="defaultAccordionTwo">
                            Collapsible Group Item #2
                        </div>
                    </section>
                </div>
                <div id="defaultAccordionTwo" class="collapse show" aria-labelledby="..." data-parent="#toggleAccordion">
                    <div class="card-body">
                    
                        .......................
                        .......................
        
                    </div>
                </div>
            </div>
        
            <div class="card">
                <div class="card-header" id="...">
                    <section class="mb-0 mt-0">
                        <div role="menu" class="collapsed" data-toggle="collapse" data-target="#defaultAccordionThree" aria-expanded="false" aria-controls="defaultAccordionThree">
                        Collapsible Group Item #3
                    </div>
                    </section>
                </div>
                <div id="defaultAccordionThree" class="collapse" aria-labelledby="..." data-parent="#toggleAccordion">
                    <div class="card-body">
        
                        .......................
                        .......................
        
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
    <link href="{{ asset('admin_dashboard/assets/css/components/tabs-accordian/custom-accordions.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .btn-light { border-color: transparent; }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('admin_dashboard/assets/js/components/ui-accordions.js') }}"></script>
@endpush