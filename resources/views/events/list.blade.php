@extends('layouts.layout')

@section('og-url', 'wwww.jeban.com')
@section('og-title', 'styling')
@section('og-description', 'document style')
@section('og-image', 'wwww.jeban.com')

@section('title', 'Jeban Document Style')

@section('style')
    <link href="{{ mix('/css/navbar.css') }}" rel="stylesheet">
    <link href="{{ mix('/css/event.css') }}" rel="stylesheet">
@endsection

@section('script')
    <script src="{{ mix('/js/navbar.js') }}" type="text/javascript"></script>
@endsection

@section('content')
    @component('components.navbar')
    @endcomponent
    <div class="container-fluid">
        <div id="header-wrapper" class="col-12">
            <div class="board-path"><small>Home > Event</small></div>
            <div class="board-label text-center">
                <i class="icon-event"></i><h5 style="display: inline;">EVENT</h5>
            </div>
        </div>
        <div id="event-wrapper">
            @if (collect($events)->count() > 0)
                <event-list :data="{{ $events }}" type="{{ $type }}" sort="{{ $sort }}"></event-list>
            @else 
                no data
            @endif
        </div>
    </div>
@endsection


