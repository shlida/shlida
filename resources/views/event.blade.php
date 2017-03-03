@extends('layouts.layout')

@section('og-url', 'wwww.jeban.com')
@section('og-title', 'styling')
@section('og-description', 'document style')
@section('og-image', 'wwww.jeban.com')

@section('title', 'Jeban Document Style')

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
        <div class="col-sm-12">
            @if ($events)
                @foreach ($events as $event)
                <p><div class="card">
                    <img class="card-img-top" src="" alt="Card image cap">
                    <div class="card-block">
                        <p class="card-text"> <h3>{{ $event->title }}</h3> </p>
                    </div>
                    <div class="card-block">
                        <p class="card-text"> {{ $event->date }}
                        @if (count($event->places)>0)
                            | {{ $event->places->first()->title }}
                        @endif
                        </p>
                    </div>
                </div></p>
                @endforeach
            @else
                topic not found
            @endif
        </div>
    </div>
</div>
@endsection


