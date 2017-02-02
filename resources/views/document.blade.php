@extends('layouts.layout')

@section('og-url', 'wwww.jeban.com')
@section('og-title', 'styling')
@section('og-description', 'document style')
@section('og-image', 'wwww.jeban.com')

@section('title', 'Jeban Document Style')

@section('style')
    <link href="/css/navbar.css" rel="stylesheet">
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
            <div class="card" style="margin: 30px 0px;">                
                <div class="card-block">

                    <h4 class="card-title">Button</h4> <br>
                    
                    <code>&lt;button class="btn btn-primary"/&gt;</code> <br><br>
                    <button class="btn btn-primary">NEXT</button> <br><br>
                    <code>&lt;button class="btn btn-secondary"/&gt;</code> <br><br>
                    <button class="btn btn-secondary">NEXT</button>

                    <br><br><br>
                    <h4 class="card-title">Issue / Tab Display</h4> <br>
                    <code>&lt;span class="issue"&gt;Issue&lt;/span&gt;</code> <br><br>
                    <span class="issue">Issue</span> <br>

                    <br><br><br>
                    <h4 class="card-title">Issue Select</h4> <br>
                    <code>&lt;input class="issue-select" type="checkbox" id="makeup" name=""/&gt;</code> <br>
                    <code>&lt;label for="makeup"&gt;Issue&lt;i class="icon-correct"&gt;&lt;/i&gt;&lt;/label&gt;</code> <br><br>
                    <input class="issue-select" type="checkbox" id="makeup" name="">
                    <label for="makeup">Issue<i class="icon-correct"></i></label>

                    <br><br><br>
                    <h4 class="card-title">Checkbox</h4> <br>
                    <code>&lt;input class="custom-checkbox" type="checkbox" id="checkbox" name=""/&gt;</code> <br>
                    <code>&lt;label for="checkbox"&gt;&lt;span&gt;&lt;/span&gt;Label&lt;/label&gt;</code> <br><br>
                    <input class="custom-checkbox" type="checkbox" id="checkbox" name="">
                    <label for="checkbox"><span></span>Label</label>

                    <br><br><br>
                    <h4 class="card-title">Radio</h4> <br>
                    <code>&lt;input class="custom-radio" type="radio" id="radio" name=""/&gt;</code> <br>
                    <code>&lt;label for="radio"&gt;&lt;span&gt;&lt;/span&gt;Label&lt;/label&gt;</code> <br><br>
                    <input class="custom-radio" type="radio" id="radio" name="">
                    <label for="radio"><span></span>Label 1</label>

                    <br><br><br>
                    <h4 class="card-title">Link</h4> <br>
                    <code>&lt;a href="#"/&gt;</code> <br><br>
                    <a href="#">Go to www.jeban.com</a>

                    <br><br><br>
                    <h4 class="card-title">select (not finish)</h4> <br>

                    {{-- <select class="form-control">
                        <option value="" disabled selected>Select Field</option>
                        <option value="1">Option #1</option>
                        <option value="2">Option #2</option>
                        <option value="3">Option #3</option>
                    </select> --}}
                      <select class="turnintodropdown">
            <option>Please select a country:</option>
                <option>England</option>
                <option>Northern Ireland</option>
                <option>Scotland</option>
                <option>Wales</option>
        </select>



        

                    <br><br><br>
                    <h4 class="card-title">Form</h4> <br>
                    <code>&lt;textarea class="form-control row="3"&gt;</code><br><br>
                    <textarea class="form-control" rows="3"></textarea><br><br>

                    <code>&lt;input type="text" class="form-control" placeholder="Text here..."&gt;</code><br><br>
                    <input type="text" class="form-control" placeholder="Text here ..."><br><br>

                    <code>&lt;label class="custom-file"/&gt;</code> <br>
                    <code style="margin-left: 20px">&lt;input type="file" id="file" class="custom-file-input"&gt;</code> <br>
                    <code style="margin-left: 20px">&lt;span class="custom-file-control"&gt;&lt;/span&gt;</code> <br>
                    <code>&lt;/label&gt;</code><br><br>
                    <label class="custom-file">
                        <input type="file" id="file" class="custom-file-input">
                        <span class="custom-file-control"></span>
                    </label>
                    <br><br>

                    <code>&lt;div class="input-group"&gt;</code> <br>
                    <code style="margin-left: 20px">&lt;input type="text" clas="form-control" placeholder="Search"/&gt;</code> <br>
                    <code style="margin-left: 20px">&lt;span class="input-group=btn"&gt;</code> <br>
                    <code style="margin-left: 40px">&lt;button class="btn btn-icon-only" type="button"&gt;&lt;i class="icon-search"&gt;&lt;/i&gt;&lt;/button&gt;</code> <br>
                    <code style="margin-left: 20px">&lt;/span&gt;</code> <br>
                    <code>&lt;/div&gt;</code><br><br>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-icon-only" type="button"><i class="icon-search"></i></button>
                        </span>
                    </div>
                    <br><br>

                    <code>&lt;div class="input-group"&gt;</code> <br>
                    <code style="margin-left: 20px">&lt;div clas="input-group-addon"&gt;&lt;i class="icon-member"&gt;&lt;/i&gt;&lt;/div&gt;</code> <br>
                    <code style="margin-left: 20px">&lt;input type="text" class="form-control" placeholder="Username or Email"&gt;</code> <br>
                    <code>&lt;/div&gt;</code><br><br>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="icon-member"></i></div>
                        <input type="text" class="form-control" placeholder="Username or Email">
                    </div>
                    <br><br>

                    <code>&lt;div class="input-group"&gt;</code> <br>
                    <code style="margin-left: 20px">&lt;div clas="input-group-addon"&gt;&lt;i class="icon-password"&gt;&lt;/i&gt;&lt;/div&gt;</code> <br>
                    <code style="margin-left: 20px">&lt;input type="text" class="form-control" placeholder="Username"&gt;</code> <br>
                    <code>&lt;/div&gt;</code><br><br>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="icon-password"></i></div>
                        <input type="text" class="form-control" placeholder="Passwprd">
                    </div>
                    <br><br>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
