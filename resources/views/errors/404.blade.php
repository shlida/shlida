@extends('layouts.layout')

@section('title', 'Jeban.com | Page not found.')

@section('style')
    <link href="{{ mix('/css/navbar.css') }}" rel="stylesheet">
@endsection

@section('script')
    <script src="{{ mix('/js/navbar.js') }}" type="text/javascript"></script>
@endsection

@component('components.navbar')
@endcomponent

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card" style="margin: 30px 0px;">
                <div class="card-block text-center">

                    <p style="font-size: 6em;" class="text-danger">404</p>
                    <h1 class="text-muted">Page Not Found.</h1>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
