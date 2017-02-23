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

@section('content')
@component('components.navbar')
@endcomponent
<div class="container">
    <div class="row">
        <div class="col-sm-12">

            <modal content="Please fill the form" title="form" id="msgModal"></modal>
            <loginmodal id="loginModal" class="show-backdrop"></loginmodal>

            <div class="card" style="margin: 30px 0px;">                
                <div class="card-block">
                                        
                    <h2 class="card-title">Color</h2> <br>
                    <div style="display:flex;justify-content:center; align-items: center;flex-wrap: wrap;">
                        <div style="width:100px;height:100px;background-color: #96969d;border-radius:100%; position:relative; margin:5px;"><span style="position:absolute;top:40px;left:18px;">#96969d</span></div>
                        <div style="width:100px;height:100px;background-color: #4d4d56;border-radius:100%;position:relative; margin:5px;"><span style="position:absolute;top:40px;left:18px; color: white;">#4d4d56</span></div>
                        <div style="width:100px;height:100px;background-color: #414142;border-radius:100%;position:relative; margin:5px;"><span style="position:absolute;top:40px;left:18px; color: white;">#414142</span></div>
                        <div style="width:100px;height:100px;background-color: #eff4f7;border-radius:100%;position:relative; margin:5px;"><span style="position:absolute;top:40px;left:18px;">#eff4f7</span></div>
                        <div style="width:100px;height:100px;background-color: #96aac0;border-radius:100%;position:relative; margin:5px;"><span style="position:absolute;top:40px;left:18px;">#96aac0</span></div>
                    </div> 

                    <br><br><br>
                    <h2 class="card-title">Button</h2> <br>
                    
                    <code>&lt;button class="btn btn-primary"&gt;next &lt;i class="icon-next space-left"&gt;&lt;/i&gt;&lt;/button&gt;</code> <br><br>
                    <button class="btn btn-primary">NEXT<i class="icon-next space-left"></i></button> <br><br>
                    <code>&lt;button class="btn btn-secondary"&gt;&lt;i class="icon-next space-left"&gt;&lt;/i&gt; back&lt;/button&gt;</code> <br><br>
                    <button class="btn btn-secondary"> <i class="icon-back space-right"></i>Back</button> <br><br>
                    <code>&lt;button class="btn btn-circle"&gt;&lt;i class="icon-loved"&gt;&lt;/i&gt;&lt;/button&gt;</code> <br><br>
                    <button class="btn btn-circle"><i class="icon-loved"></i></button> <br><br>
                    <code>&lt;button class="btn btn-circle active"&gt;&lt;i class="icon-loved"&gt;&lt;/i&gt;&lt;/button&gt;</code> <br><br>
                    <button class="btn btn-circle active"><i class="icon-loved"></i></button> <br><br>

                    <code>&lt;button class="btn btn-primary btn-sm"&gt;follow&lt;/button&gt;</code> <br><br>
                    <button class="btn btn-primary btn-sm">follow</button> <br><br>
                    
                    <code>&lt;button class="btn btn-primary btn-sm btn-reply"&gt;&lt;i class="icon-reply"&gt;&lt;/i&gt;&lt;/reply&gt;</code> <br><br>
                    <button class="btn btn-primary btn-sm reply"><i class="icon-reply"></i>reply</button><br><br>
                    <code>&lt;button class="btn btn-primary btn-sm btn-reply active"&gt;&lt;i class="icon-reply"&gt;&lt;/i&gt;&lt;/reply&gt;</code> <br><br>
                    <button class="btn btn-primary btn-sm btn-reply active"><i class="icon-reply"></i>reply</button>

                    <br><br><br>
                    <h2 class="card-title">Issue / Tab Display</h2> <br>
                    <code>&lt;span class="issue"&gt;Issue&lt;/span&gt;</code> <br><br>
                    <span class="issue">Issue</span> <br>

                    <br><br><br>
                    <h2 class="card-title">Issue Select</h2> <br>
                    <code>&lt;input class="issue-select" type="checkbox" id="makeup" name=""/&gt;</code> <br>
                    <code>&lt;label for="makeup"&gt;Issue&lt;i class="icon-correct"&gt;&lt;/i&gt;&lt;/label&gt;</code> <br><br>
                    <input class="issue-select" type="checkbox" id="makeup" name="">
                    <label for="makeup">Issue<i class="icon-correct"></i></label>

                    <br><br><br>
                    <h2 class="card-title">Checkbox</h2> <br>
                    <code>&lt;input class="custom-checkbox" type="checkbox" id="checkbox" name=""/&gt;</code> <br>
                    <code>&lt;label for="checkbox"&gt;&lt;span&gt;&lt;/span&gt;Label&lt;/label&gt;</code> <br><br>
                    <input class="custom-checkbox" type="checkbox" id="checkbox" name="">
                    <label for="checkbox"><span></span>Label</label>

                    <br><br><br>
                    <h2 class="card-title">Radio</h2> <br>
                    <code>&lt;input class="custom-radio" type="radio" id="radio" name=""/&gt;</code> <br>
                    <code>&lt;label for="radio"&gt;&lt;span&gt;&lt;/span&gt;Label&lt;/label&gt;</code> <br><br>
                    <input class="custom-radio" type="radio" id="radio" name="">
                    <label for="radio"><span></span>Label 1</label>

                    <br><br><br>
                    <h2 class="card-title">Link</h2> <br>
                    <code>&lt;a href="#"/&gt;</code> <br><br>
                    <a href="#">Go to www.jeban.com</a>

                    <br><br><br>
                    <h2 class="card-title">select (not finish)</h2> <br>

                      {{-- <select class="turnintodropdown">
                            <option>Please select a country:</option>
                                <option>England</option>
                                <option>Northern Ireland</option>
                                <option>Scotland</option>
                                <option>Wales</option>
                        </select> --}}
                    <div class="cs-select cs-skin-rotate">
                        <span class="cs-placeholder">Choose your option</span>
                        <div class="cs-options">
                            <ul>
                                <li data-option data-value="1" class="cs-selected"><span>Option 1</span></li>
                                <li data-option data-value="2"><span>Option 2</span></li>
                                <li data-option data-value="3"><span>Option 3</span></li>
                            </ul>
                        </div>
                        <select class="cs-select cs-skin-rotate">
                            <option value="" disabled selected>Choose your option</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                    </div>


                    <br><br><br>
                    <h2 class="card-title">Form</h2> <br>
                    <code>&lt;textarea class="form-control row="3"&gt;</code><br><br>
                    <textarea class="form-control" rows="3"></textarea><br><br>

                    <code>&lt;input type="text" class="form-control" placeholder="Text here..."&gt;</code><br><br>
                    <input type="text" class="form-control" placeholder="Text here ..."><br><br>

                    <code>&lt;label class="custom-file"/&gt;</code> <br>
                    <code style="margin-left: 20px">&lt;input type="file" id="file" class="custom-file-input" (multiple)&gt;</code> <br>
                    <code style="margin-left: 20px">&lt;span class="custom-file-control"&gt;&lt;/span&gt;</code> <br>
                    <code>&lt;/label&gt;</code><br><br>
                    <label class="custom-file">
                        <input type="file" id="file" class="custom-file-input" multiple>
                        <span class="custom-file-control"></span>
                    </label>
                    <br><br>

                    <code>&lt;div class="input-group"&gt;</code> <br>
                    <code style="margin-left: 20px">&lt;input type="text" clas="form-control" placeholder="Search"/&gt;</code> <br>
                    <code style="margin-left: 20px">&lt;span class="input-group-btn"&gt;</code> <br>
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
                        <input type="text" class="form-control" placeholder="Password">
                    </div>

                    <br><br><br>
                    <h2 class="card-title">Modal</h2> <br>
                    <span style="margin-top: 10px;">If you want to show fade background use class <code>show-fade-backdrop</code></span> <br><br>
                    <code>&lt;modal content="Please fill the form" id="msgModal"&gt;&lt;/modal&gt;</code> <br>
                    <code>&lt;button class="btn btn-primary" data-toggle="modal" data-target="#msgModal"&gt;&lt;/button&gt;</code> <br>
                    <span style="margin-top: 10px;">Add component <code>&lt;modal&gt;</code> and set ID same as button data-target</span> <br><br>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#msgModal" style="display: inline-block">Alert</button> 
                    <br><br>

                    <code>&lt;loginmodal id="loginModal" class="show-fade-backdrop"&gt;&lt;/loginmodal&gt;</code> <br>
                    <code>&lt;button class="btn btn-primary" data-toggle="modal" data-target="#loginModal"&gt;&lt;/button&gt;</code> <br>
                    <span style="margin-top: 10px;">create LoginModal.vue + add component <code>&lt;loginmodal&gt;</code></span> <br><br>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#loginModal" style="display: inline-block">Form modal</button>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
