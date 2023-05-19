@extends(view_path('layouts.base'))

@section('main_before')
@stop

@section('main')
<section class="py-5" id="about">
    <div class="container px-5 pb-1">
        <div class="row gx-5 align-items-center">
            <div class="col-xxl-10">
                <!-- Header text content-->
                <div class="text-xxl-start">
                    <div class="badge bg-gradient-primary-to-secondary text-white mb-4 px-3 py-2"><div class="text-uppercase">About</div></div>
                    <div class="fs-4 fw-light text-muted">Build a Laravel web page integrated with AJAX functionality that can consume a data provider module and display the received image response.</div>
                </div>
            </div>
        </div>
    </div>
</section>

@include(view_path('page.providers'))

@include(view_path('page.developer'))

@stop

@section('main_after')
@stop

@section('includes.head.close.css')
    @parent
@stop
