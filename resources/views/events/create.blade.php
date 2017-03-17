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
        <form method="POST" action="/event/store" autocomplete="off">

            <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="title">title:</label>
                        <input type="text" id="title" name="title" class="form-control" value="aaa">
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                        <label for="description">description:</label>
                        <input type="text" id="description" name="description" class="form-control" value="aaa">
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('start_date') ? 'has-error' : '' }}">
                        <label for="start_date">start date:</label>
                        <input type="text" id="start_date" name="start_date" class="form-control" value="2017-03-01">
                        <span class="text-danger">{{ $errors->first('start_date') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('end_date') ? 'has-error' : '' }}">
                        <label for="end_date">end date:</label>
                        <input type="text" id="end_date" name="end_date" class="form-control"  value="2017-03-02">
                        <span class="text-danger">{{ $errors->first('end_date') }}</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('start_time') ? 'has-error' : '' }}">
                        <label for="start_time">start time:</label>
                        <input type="text" id="start_time" name="start_time" class="form-control" value="09:00:00">
                        <span class="text-danger">{{ $errors->first('start_time') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('end_time') ? 'has-error' : '' }}">
                        <label for="end_time">end time:</label>
                        <input type="text" id="end_time" name="end_time" class="form-control" value="19:00:00">
                        <span class="text-danger">{{ $errors->first('end_time') }}</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('image_url') ? 'has-error' : '' }}">
                        <label for="image_url">img:</label>
                        <input type="text"  name="image_url" id="details" class="form-control"  value="img">
                        <span class="text-danger">{{ $errors->first('image_url') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('event_type') ? 'has-error' : '' }}">
                        <label for="event_type">event type:</label>
                        <input type="text"  name="event_type" id="details" class="form-control" value="SALE">
                        <span class="text-danger">{{ $errors->first('event_type') }}</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('published') ? 'has-error' : '' }}">
                        <label for="published">published:</label>
                        <input type="text"  name="published" id="details" class="form-control" value="1">
                        <span class="text-danger">{{ $errors->first('published') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('pinned') ? 'has-error' : '' }}">
                        <label for="pinned">pinned:</label>
                        <input type="text"  name="pinned" id="details" class="form-control" value="1">
                        <span class="text-danger">{{ $errors->first('pinned') }}</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('added_by') ? 'has-error' : '' }}">
                        <label for="added_by">added by:</label>
                        <input type="text"  name="added_by" id="details" class="form-control" value="1">
                        <span class="text-danger">{{ $errors->first('added_by') }}</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('place_id') ? 'has-error' : '' }}">
                        <label for="place_id">place id:</label>
                        <input type="text"  name="place_id" id="details" class="form-control" value="1">
                        <span class="text-danger">{{ $errors->first('place_id') }}</span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button class="btn btn-success">Submit</button>
            </div>

        </form>
    </div>
@endsection


