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

@component('components.navbar')
@endcomponent

@section('content')
@include('nav-topic-type')
@if (collect($topics)->count() > 0)
    <list-box :data="{{ $topics }}" type="{{ $type }}"></list-box>
@else 
    no data
@endif

@endsection


