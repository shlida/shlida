@extends('layouts.layout')

@section('og-url', 'wwww.jeban.com')
@section('og-title', 'styling')
@section('og-description', 'document style')
@section('og-image', 'wwww.jeban.com')

@section('title', 'Jeban Document Style')

@section('style')
    <link href="{{ mix('/css/navbar.css') }}" rel="stylesheet">
    <link href="{{ mix('/css/board.css') }}" rel="stylesheet">
@endsection

@section('script')
    <script src="{{ mix('/js/navbar.js') }}" type="text/javascript"></script>
@endsection

@section('content')
    @component('components.navbar')
    @endcomponent
    <div class="container-fluid">
        <div id="header-wrapper" class="col-12">
            <div class="board-path"><small>Home > Webboard</small></div>
            <div class="board-label text-center">
                <i class="icon-community"></i><h5 style="display: inline;">WEBBOARD</h5>
            </div>
        </div>
        <div id="slide-wrapper">
            <highlight></highlight>
        </div>
        <div id="issue-wrapper">
            <div class="col-12">
                <p><b>ประเด็นสุดฮิตของสาวๆ</p></b>
                <div class="all-issue">
                    <span class="issue">Issue</span> 
                </div>
            </div>
        </div>
        <div id="topic-wrapper">
            <div class="col-12">
                <p class="text-center"><b>เลือกดูประเภทกระทู้</p></b>
            </div>

            <div class="col-12">
                @include('nav-topic-type')
            </div>
        </div>
        <div id="board-wrapper">
            <div class="col-12">
                <div class="line-dot"></div>
                <p><b>กระทู้ทั้งหมด</b></p>
            </div>
            @if (collect($topics)->count() > 0)
                <topic-list :data="{{ $topics }}" type="{{ $type }}" date="{{ $date }}"></topic-list>
            @else 
                no data
            @endif
        </div>
        <div id="ads-wrapper">
            <div class="ads">ads</div>
        </div>
    </div>
@endsection


