@extends('layouts.app', ['title' => __('Settings')])

@section('content')
    @include('layouts.headers.cards')

        @if($sidebar==1)
            <div class="container-fluid bg-dark mt--6" style="min-height:630px;">
        @else
            <div class="container-fluid mt--6">
        @endif
            <div class="row">
                <div class="col-lg-4">
                    <!-- Image-Text card -->
                    <div class="card">
                        <!-- Card image -->
                        {{-- <img class="card-img-top" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/img-1-1000x900.jpg" alt="Image placeholder"> --}}
                        <!-- Card body -->
                        @if($sidebar==1)
                            <div class="card-header bg-dark">
                                <h2 class="text-white">Dark Mode</h2>
                            </div>
                            <div class="card-body bg-dark align-items-center text-center border-top" style="border-radius:7px !important;">
                                <div class="row">
                                    <div class="col-md-5">
                                        <span class="text-white">Go Dark</span>
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-5">
                        @else
                            <div class="card-header">
                                <h2>Dark Mode</h2>
                            </div>
                            <div class="card-body align-items-center text-center">
                                <div class="row">
                                    <div class="col-md-5">
                                        <span>Go Dark</span>
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-5">
                        @endif
                                    <label class="switch text-right">
                                        {{-- <input type='checkbox' onclick='godark(0)'> --}}
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <!-- Card image -->
                        {{-- <img class="card-img-top" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/img-1-1000x900.jpg" alt="Image placeholder"> --}}
                        <!-- Card body -->
                        @if($sidebar==1)
                        <div class="card-header bg-dark">
                            <h2 class="text-white">Website Logo</h2>
                        </div>
                            <div class="card-body bg-dark align-items-center text-center border-top" style="border-radius:7px !important;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form action="{{route('settings.logo')}}" method="POST" enctype="multipart/form-data" id="logoForm">
                                            @csrf
                                            <input type="file" id="logo" style="display: none;" name="logo" />
                                            <button class="btn shadow-none--hover shadow-none text-white" id="logobutton" style="width:100%;background:transparent;"><i class="fas fa-plus-circle text-success"></i> Choose logo</button>
                                            <div style="border:2px solid white;width:100%;min-height:100px;">
                                                <img src="{{asset('uploads')}}//logo/{{$logo}}" class="img-fluid" alt="" id="logoPreview">
                                            </div>
                                            <input type="submit" id="logoSubmit" class="btn btn-success mt-2" style="width:100%;" name='submitImage' value="Upload Image"/>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @else
                        <div class="card-header">
                                <h2>Website Logo</h2>
                        </div>
                            <div class="card-body align-items-center text-center border-top" style="border-radius:7px !important;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form action="{{route('settings.logo')}}" method="POST" enctype="multipart/form-data" id="logoForm">
                                            @csrf
                                            <input type="file" id="logo" style="display: none;" name="logo" />
                                            <button class="btn shadow-none--hover shadow-none" id="logobutton" style="width:100%;background:transparent;"><i class="fas fa-plus-circle text-success"></i> Choose logo</button>
                                            <div style="border:2px solid white;width:100%;min-height:100px;">
                                                <img src="{{asset('uploads')}}//logo/{{$logo}}" class="img-fluid" alt="" id="logoPreview">
                                            </div>
                                            <input type="submit" id="logoSubmit" class="btn btn-success mt-2" style="width:100%;" name='submitImage' value="Upload Image"/>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <!-- Card image -->
                        {{-- <img class="card-img-top" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/img-1-1000x900.jpg" alt="Image placeholder"> --}}
                        <!-- Card body -->
                        @if($sidebar==1)
                            <div class="card-header bg-dark">
                                <h2 class="text-white">Basic Color Theme</h2>
                            </div>
                            <form method="post" action="{{ route('settings.basicColor') }}" autocomplete="off">
                                @csrf
                                <div class="card-body bg-dark align-items-center text-center border-top" style="border-radius:7px !important;">
                                    <div class="row">
                                        <div class="col-md-2 mt-2">
                                            <span class="text-white">Hex</span>
                                        </div>
                                        {{-- <div class="col-md-2"></div> --}}
                                        <div class="col-md-5">
                                            <input type="text" class="form-control form-control-alternative{{ $errors->has('basicColor') ? ' is-invalid' : '' }}" placeholder="Hex Code" id="basicColorValue" value="{{$res = preg_replace("/#/", "", $basicColor)}}" name="basicColor">
                                            @if ($errors->has('basicColor'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('basicColor') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-5">
                                            <input type="button" id="previewBasicColorButton" value="Color Palette" class="btn bg-gradient-red shadow-none--hover shadow-none text-white">
                                        </div>
                                    </div>
                                    <div class="row mt-3 ml-4 mr-3">
                                        <div class="col-md-12" id="basicColor" style="border:2px solid white;width:100%;min-height:100px;background:{{$basicColor}}">
                                        </div>
                                    </div>
                                    <div class="row mt-3 ml-4 mr-3">
                                        <input type="submit" value="Apply" class="btn btn-info shadow-none--hover shadow-none" style="width:100%;">
                                    </div>
                                </div>
                            </form>
                        @else
                            <div class="card-header">
                                <h2>Basic Color Theme</h2>
                            </div>
                            <form method="post" action="{{ route('settings.basicColor') }}" autocomplete="off">
                                @csrf
                                <div class="card-body align-items-center text-center" style="border-radius:7px !important;">
                                    <div class="row">
                                        <div class="col-md-2 mt-2">
                                            <span>Hex</span>
                                        </div>
                                        {{-- <div class="col-md-2"></div> --}}
                                        <div class="col-md-5">
                                            <input type="text" class="form-control form-control-alternative{{ $errors->has('basicColor') ? ' is-invalid' : '' }}" placeholder="Hex Code" id="basicColorValue" value="{{$res = preg_replace("/#/", "", $basicColor)}}" name="basicColor">
                                            @if ($errors->has('basicColor'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('basicColor') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-5">
                                            <input type="button" id="previewBasicColorButton" value="Color Palette" class="btn bg-gradient-red shadow-none--hover shadow-none text-white">
                                        </div>
                                    </div>
                                    <div class="row mt-3 ml-4 mr-3">
                                        <div class="col-md-12" id="basicColor" style="border:2px solid rgba(0, 0, 0, .05);width:100%;min-height:100px;background:{{$basicColor}}">
                                        </div>
                                    </div>
                                    <div class="row mt-3 ml-4 mr-3">
                                        <input type="submit" value="Apply" class="btn btn-info shadow-none--hover shadow-none" style="width:100%;">
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                    <!-- Calendar widget -->
                    <!--* Card header *-->
                    <!--* Card body *-->
                    <!--* Card init *-->
                    {{-- <div class="card widget-calendar">
                        <!-- Card header -->
                        <div class="card-header">
                            <div class="h5 text-muted mb-1 widget-calendar-year">2019</div>
                            <div class="h3 mb-0 widget-calendar-day">Friday, Sep 20</div>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <div data-toggle="widget-calendar" class="fc fc-unthemed fc-ltr"><div class="fc-toolbar fc-header-toolbar"><div class="fc-left"><button type="button" class="fc-prev-button fc-button fc-state-default fc-corner-left fc-corner-right" aria-label="prev"><span class="fc-icon fc-icon- ni ni-bold-left"></span></button></div><div class="fc-right"><button type="button" class="fc-next-button fc-button fc-state-default fc-corner-left fc-corner-right" aria-label="next"><span class="fc-icon fc-icon- ni ni-bold-right"></span></button></div><div class="fc-center"><h2>December 2018</h2></div><div class="fc-clear"></div></div><div class="fc-view-container" style=""><div class="fc-view fc-month-view fc-basic-view" style=""><table class=""><thead class="fc-head"><tr><td class="fc-head-container fc-widget-header"><div class="fc-row fc-widget-header"><table class=""><thead><tr><th class="fc-day-header fc-widget-header fc-sun"><span>Sun</span></th><th class="fc-day-header fc-widget-header fc-mon"><span>Mon</span></th><th class="fc-day-header fc-widget-header fc-tue"><span>Tue</span></th><th class="fc-day-header fc-widget-header fc-wed"><span>Wed</span></th><th class="fc-day-header fc-widget-header fc-thu"><span>Thu</span></th><th class="fc-day-header fc-widget-header fc-fri"><span>Fri</span></th><th class="fc-day-header fc-widget-header fc-sat"><span>Sat</span></th></tr></thead></table></div></td></tr></thead><tbody class="fc-body"><tr><td class="fc-widget-content"><div class="fc-scroller fc-day-grid-container" style="overflow: hidden auto; height: auto;"><div class="fc-day-grid fc-unselectable"><div class="fc-row fc-week fc-widget-content"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-other-month fc-past" data-date="2018-11-25"></td><td class="fc-day fc-widget-content fc-mon fc-other-month fc-past" data-date="2018-11-26"></td><td class="fc-day fc-widget-content fc-tue fc-other-month fc-past" data-date="2018-11-27"></td><td class="fc-day fc-widget-content fc-wed fc-other-month fc-past" data-date="2018-11-28"></td><td class="fc-day fc-widget-content fc-thu fc-other-month fc-past" data-date="2018-11-29"></td><td class="fc-day fc-widget-content fc-fri fc-other-month fc-past" data-date="2018-11-30"></td><td class="fc-day fc-widget-content fc-sat fc-past" data-date="2018-12-01"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-other-month fc-past" data-date="2018-11-25"><span class="fc-day-number">25</span></td><td class="fc-day-top fc-mon fc-other-month fc-past" data-date="2018-11-26"><span class="fc-day-number">26</span></td><td class="fc-day-top fc-tue fc-other-month fc-past" data-date="2018-11-27"><span class="fc-day-number">27</span></td><td class="fc-day-top fc-wed fc-other-month fc-past" data-date="2018-11-28"><span class="fc-day-number">28</span></td><td class="fc-day-top fc-thu fc-other-month fc-past" data-date="2018-11-29"><span class="fc-day-number">29</span></td><td class="fc-day-top fc-fri fc-other-month fc-past" data-date="2018-11-30"><span class="fc-day-number">30</span></td><td class="fc-day-top fc-sat fc-past" data-date="2018-12-01"><span class="fc-day-number">1</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end bg-green fc-draggable fc-resizable"><div class="fc-content"> <span class="fc-title">All day conference</span></div><div class="fc-resizer fc-end-resizer"></div></a></td><td></td><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end bg-blue fc-draggable fc-resizable"><div class="fc-content"> <span class="fc-title">Meeting with Mary</span></div><div class="fc-resizer fc-end-resizer"></div></a></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-past" data-date="2018-12-02"></td><td class="fc-day fc-widget-content fc-mon fc-past" data-date="2018-12-03"></td><td class="fc-day fc-widget-content fc-tue fc-past" data-date="2018-12-04"></td><td class="fc-day fc-widget-content fc-wed fc-past" data-date="2018-12-05"></td><td class="fc-day fc-widget-content fc-thu fc-past" data-date="2018-12-06"></td><td class="fc-day fc-widget-content fc-fri fc-past" data-date="2018-12-07"></td><td class="fc-day fc-widget-content fc-sat fc-past" data-date="2018-12-08"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-past" data-date="2018-12-02"><span class="fc-day-number">2</span></td><td class="fc-day-top fc-mon fc-past" data-date="2018-12-03"><span class="fc-day-number">3</span></td><td class="fc-day-top fc-tue fc-past" data-date="2018-12-04"><span class="fc-day-number">4</span></td><td class="fc-day-top fc-wed fc-past" data-date="2018-12-05"><span class="fc-day-number">5</span></td><td class="fc-day-top fc-thu fc-past" data-date="2018-12-06"><span class="fc-day-number">6</span></td><td class="fc-day-top fc-fri fc-past" data-date="2018-12-07"><span class="fc-day-number">7</span></td><td class="fc-day-top fc-sat fc-past" data-date="2018-12-08"><span class="fc-day-number">8</span></td></tr></thead><tbody><tr><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end bg-yellow fc-draggable fc-resizable"><div class="fc-content"> <span class="fc-title">Cyber Week</span></div><div class="fc-resizer fc-end-resizer"></div></a></td><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end bg-red fc-draggable fc-resizable"><div class="fc-content"> <span class="fc-title">Winter Hackaton</span></div><div class="fc-resizer fc-end-resizer"></div></a></td><td></td><td></td><td></td><td class="fc-event-container" colspan="2"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end bg-warning fc-draggable fc-resizable"><div class="fc-content"> <span class="fc-title">Digital event</span></div><div class="fc-resizer fc-end-resizer"></div></a></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-past" data-date="2018-12-09"></td><td class="fc-day fc-widget-content fc-mon fc-past" data-date="2018-12-10"></td><td class="fc-day fc-widget-content fc-tue fc-past" data-date="2018-12-11"></td><td class="fc-day fc-widget-content fc-wed fc-past" data-date="2018-12-12"></td><td class="fc-day fc-widget-content fc-thu fc-past" data-date="2018-12-13"></td><td class="fc-day fc-widget-content fc-fri fc-past" data-date="2018-12-14"></td><td class="fc-day fc-widget-content fc-sat fc-past" data-date="2018-12-15"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-past" data-date="2018-12-09"><span class="fc-day-number">9</span></td><td class="fc-day-top fc-mon fc-past" data-date="2018-12-10"><span class="fc-day-number">10</span></td><td class="fc-day-top fc-tue fc-past" data-date="2018-12-11"><span class="fc-day-number">11</span></td><td class="fc-day-top fc-wed fc-past" data-date="2018-12-12"><span class="fc-day-number">12</span></td><td class="fc-day-top fc-thu fc-past" data-date="2018-12-13"><span class="fc-day-number">13</span></td><td class="fc-day-top fc-fri fc-past" data-date="2018-12-14"><span class="fc-day-number">14</span></td><td class="fc-day-top fc-sat fc-past" data-date="2018-12-15"><span class="fc-day-number">15</span></td></tr></thead><tbody><tr><td></td><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end bg-purple fc-draggable fc-resizable"><div class="fc-content"> <span class="fc-title">Marketing event</span></div><div class="fc-resizer fc-end-resizer"></div></a></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-past" data-date="2018-12-16"></td><td class="fc-day fc-widget-content fc-mon fc-past" data-date="2018-12-17"></td><td class="fc-day fc-widget-content fc-tue fc-past" data-date="2018-12-18"></td><td class="fc-day fc-widget-content fc-wed fc-past" data-date="2018-12-19"></td><td class="fc-day fc-widget-content fc-thu fc-past" data-date="2018-12-20"></td><td class="fc-day fc-widget-content fc-fri fc-past" data-date="2018-12-21"></td><td class="fc-day fc-widget-content fc-sat fc-past" data-date="2018-12-22"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-past" data-date="2018-12-16"><span class="fc-day-number">16</span></td><td class="fc-day-top fc-mon fc-past" data-date="2018-12-17"><span class="fc-day-number">17</span></td><td class="fc-day-top fc-tue fc-past" data-date="2018-12-18"><span class="fc-day-number">18</span></td><td class="fc-day-top fc-wed fc-past" data-date="2018-12-19"><span class="fc-day-number">19</span></td><td class="fc-day-top fc-thu fc-past" data-date="2018-12-20"><span class="fc-day-number">20</span></td><td class="fc-day-top fc-fri fc-past" data-date="2018-12-21"><span class="fc-day-number">21</span></td><td class="fc-day-top fc-sat fc-past" data-date="2018-12-22"><span class="fc-day-number">22</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end bg-red fc-draggable fc-resizable"><div class="fc-content"> <span class="fc-title">Dinner with Family</span></div><div class="fc-resizer fc-end-resizer"></div></a></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-past" data-date="2018-12-23"></td><td class="fc-day fc-widget-content fc-mon fc-past" data-date="2018-12-24"></td><td class="fc-day fc-widget-content fc-tue fc-past" data-date="2018-12-25"></td><td class="fc-day fc-widget-content fc-wed fc-past" data-date="2018-12-26"></td><td class="fc-day fc-widget-content fc-thu fc-past" data-date="2018-12-27"></td><td class="fc-day fc-widget-content fc-fri fc-past" data-date="2018-12-28"></td><td class="fc-day fc-widget-content fc-sat fc-past" data-date="2018-12-29"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-past" data-date="2018-12-23"><span class="fc-day-number">23</span></td><td class="fc-day-top fc-mon fc-past" data-date="2018-12-24"><span class="fc-day-number">24</span></td><td class="fc-day-top fc-tue fc-past" data-date="2018-12-25"><span class="fc-day-number">25</span></td><td class="fc-day-top fc-wed fc-past" data-date="2018-12-26"><span class="fc-day-number">26</span></td><td class="fc-day-top fc-thu fc-past" data-date="2018-12-27"><span class="fc-day-number">27</span></td><td class="fc-day-top fc-fri fc-past" data-date="2018-12-28"><span class="fc-day-number">28</span></td><td class="fc-day-top fc-sat fc-past" data-date="2018-12-29"><span class="fc-day-number">29</span></td></tr></thead><tbody><tr><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end bg-blue fc-draggable fc-resizable"><div class="fc-content"> <span class="fc-title">Black Friday</span></div><div class="fc-resizer fc-end-resizer"></div></a></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-past" data-date="2018-12-30"></td><td class="fc-day fc-widget-content fc-mon fc-past" data-date="2018-12-31"></td><td class="fc-day fc-widget-content fc-tue fc-other-month fc-past" data-date="2019-01-01"></td><td class="fc-day fc-widget-content fc-wed fc-other-month fc-past" data-date="2019-01-02"></td><td class="fc-day fc-widget-content fc-thu fc-other-month fc-past" data-date="2019-01-03"></td><td class="fc-day fc-widget-content fc-fri fc-other-month fc-past" data-date="2019-01-04"></td><td class="fc-day fc-widget-content fc-sat fc-other-month fc-past" data-date="2019-01-05"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-past" data-date="2018-12-30"><span class="fc-day-number">30</span></td><td class="fc-day-top fc-mon fc-past" data-date="2018-12-31"><span class="fc-day-number">31</span></td><td class="fc-day-top fc-tue fc-other-month fc-past" data-date="2019-01-01"><span class="fc-day-number">1</span></td><td class="fc-day-top fc-wed fc-other-month fc-past" data-date="2019-01-02"><span class="fc-day-number">2</span></td><td class="fc-day-top fc-thu fc-other-month fc-past" data-date="2019-01-03"><span class="fc-day-number">3</span></td><td class="fc-day-top fc-fri fc-other-month fc-past" data-date="2019-01-04"><span class="fc-day-number">4</span></td><td class="fc-day-top fc-sat fc-other-month fc-past" data-date="2019-01-05"><span class="fc-day-number">5</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div></div></div></td></tr></tbody></table></div></div></div>
                        </div>
                    </div> --}}
                    {{-- <!-- Timeline card -->
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <!-- Title -->
                            <h5 class="h3 mb-0">Latest notifications</h5>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="timeline timeline-one-side" data-timeline-content="axis" data-timeline-axis-style="dashed">
                                <div class="timeline-block">
                                    <span class="timeline-step badge-success">
                                <i class="ni ni-bell-55"></i>
                                </span>
                                    <div class="timeline-content">
                                        <div class="d-flex justify-content-between pt-1">
                                            <div>
                                                <span class="text-muted text-sm font-weight-bold">New message</span>
                                            </div>
                                            <div class="text-right">
                                                <small class="text-muted"><i class="fas fa-clock mr-1"></i>2 hrs ago</small>
                                            </div>
                                        </div>
                                        <h6 class="text-sm mt-1 mb-0">Let's meet at Starbucks at 11:30. Wdyt?</h6>
                                    </div>
                                </div>
                                <div class="timeline-block">
                                    <span class="timeline-step badge-danger">
                                        <i class="ni ni-html5"></i>
                                    </span>
                                    <div class="timeline-content">
                                        <div class="d-flex justify-content-between pt-1">
                                            <div>
                                                <span class="text-muted text-sm font-weight-bold">Product issue</span>
                                            </div>
                                            <div class="text-right">
                                                <small class="text-muted"><i class="fas fa-clock mr-1"></i>3 hrs ago</small>
                                            </div>
                                        </div>
                                        <h6 class="text-sm mt-1 mb-0">A new issue has been reported for Argon.</h6>
                                    </div>
                                </div>
                                <div class="timeline-block">
                                    <span class="timeline-step badge-info">
                                        <i class="ni ni-like-2"></i>
                                    </span>
                                    <div class="timeline-content">
                                        <div class="d-flex justify-content-between pt-1">
                                            <div>
                                                <span class="text-muted text-sm font-weight-bold">New likes</span>
                                            </div>
                                            <div class="text-right">
                                                <small class="text-muted"><i class="fas fa-clock mr-1"></i>5 hrs ago</small>
                                            </div>
                                        </div>
                                        <h6 class="text-sm mt-1 mb-0">Your posts have been liked a lot.</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Progress track -->
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <!-- Title -->
                            <h5 class="h3 mb-0">Progress track</h5>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- List group -->
                            <ul class="list-group list-group-flush list my--3">
                                <li class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <!-- Avatar -->
                                            <a href="#" class="avatar rounded-circle">
                                                <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/bootstrap.jpg">
                                            </a>
                                        </div>
                                        <div class="col">
                                            <h5>Argon Design System</h5>
                                            <div class="progress progress-xs mb-0">
                                                <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <!-- Avatar -->
                                            <a href="#" class="avatar rounded-circle">
                                                <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/angular.jpg">
                                            </a>
                                        </div>
                                        <div class="col">
                                            <h5>Angular Now UI Kit PRO</h5>
                                            <div class="progress progress-xs mb-0">
                                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <!-- Avatar -->
                                            <a href="#" class="avatar rounded-circle">
                                                <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/sketch.jpg">
                                            </a>
                                        </div>
                                        <div class="col">
                                            <h5>Black Dashboard</h5>
                                            <div class="progress progress-xs mb-0">
                                                <div class="progress-bar bg-red" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <!-- Avatar -->
                                            <a href="#" class="avatar rounded-circle">
                                                <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/react.jpg">
                                            </a>
                                        </div>
                                        <div class="col">
                                            <h5>React Material Dashboard</h5>
                                            <div class="progress progress-xs mb-0">
                                                <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <!-- Avatar -->
                                            <a href="#" class="avatar rounded-circle">
                                                <img alt="Image placeholder" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/vue.jpg">
                                            </a>
                                        </div>
                                        <div class="col">
                                            <h5>Vue Paper UI Kit PRO</h5>
                                            <div class="progress progress-xs mb-0">
                                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Paypal card -->
                    <div class="card">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row justify-content-between align-items-center">
                                <div class="col">
                                    <img src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/icons/cards/paypal.png" alt="Image placeholder">
                                </div>
                                <div class="col-auto">
                                    <span class="badge badge-lg badge-success">Active</span>
                                </div>
                            </div>
                            <div class="my-4">
                                <span class="h6 surtitle text-muted">
                                PayPal E-mail
                            </span>
                                <div class="h1">john.snow@gmail.com</div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <span class="h6 surtitle text-muted">Name</span>
                                    <span class="d-block h3">John Snow</span>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <!-- Card image -->
                        {{-- <img class="card-img-top" src="https://argon-dashboard-pro-laravel.creative-tim.com/argon/img/theme/img-1-1000x900.jpg" alt="Image placeholder"> --}}
                        <!-- Card body -->
                        @if($sidebar==1)
                            <div class="card-header bg-dark">
                                <h2 class="text-white">Two Colors Linear Gradient Theme</h2>
                            </div>
                            <form method="post" action="{{route('settings.gradientColor')}}" autocomplete="off">
                                @csrf
                                <div class="card-body bg-dark align-items-center text-center border-top" style="border-radius:7px !important;">
                                    <div class="row">
                                        <div class="col-md-2 mt-2">
                                            <span class="text-white">Hex</span>
                                        </div>
                                        {{-- <div class="col-md-2"></div> --}}
                                        <div class="col-md-5">
                                            <input type="text" class="form-control form-control-alternative{{ $errors->has('gradientColor1') ? ' is-invalid' : '' }}" placeholder="Hex Code" id="gradientColorValue1" value="{{substr($gradientColor, strpos($gradientColor,', #') +3,6) }}" name="gradientColor1">
                                            @if ($errors->has('gradientColor1'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('gradientColor1') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-5">
                                            <input type="button" id="previewGradientColorButton1" value="Color Palette" class="btn bg-gradient-red shadow-none--hover shadow-none text-white">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-5 mt-2">
                                            <span class="text-white">Color Percentage</span>
                                        </div>
                                        {{-- <div class="col-md-2"></div> --}}
                                        <div class="col-md-7">
                                            <input type="text" class="form-control form-control-alternative{{ $errors->has('percent1') ? ' is-invalid' : '' }}" placeholder="Number of Percent" id="percentValue1" value="0" name="percent1">
                                            @if ($errors->has('percent1'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('percent1') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-2 mt-2">
                                            <span class="text-white">Hex</span>
                                        </div>
                                        {{-- <div class="col-md-2"></div> --}}
                                        <div class="col-md-5">
                                            <input type="text" class="form-control form-control-alternative{{ $errors->has('gradientColor2') ? ' is-invalid' : '' }}" placeholder="Hex Code" id="gradientColorValue2" value="{{substr($gradientColor, strpos($gradientColor,',#') +2,6) }}" name="gradientColor2">
                                            @if ($errors->has('gradientColor2'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('gradientColor2') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-5">
                                            <input type="button" id="previewGradientColorButton2" value="Color Palette" class="btn bg-gradient-red shadow-none--hover shadow-none text-white">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-5 mt-2">
                                            <label class="text-white">Color Percentage</label>
                                        </div>
                                        {{-- <div class="col-md-2"></div> --}}
                                        <div class="col-md-7">
                                            <input type="text" class="form-control form-control-alternative{{ $errors->has('percent2') ? ' is-invalid' : '' }}" placeholder="Number of Percent" id="percentValue2" value="100" name="percent2">
                                            @if ($errors->has('percent2'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('percent2') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
                                        <div class="col-md-3 mt-2">
                                            <label class="form-control-label text-white">Direction</label>
                                        </div>
                                        <div class="col-md-9 mt-2">
                                            <select class="form-control">
                                                <option>Mustard</option>
                                                <option>Ketchup</option>
                                                <option>Barbecue</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                    <div class="row mt-3">
                                        <div class="col-md-3 mt-2">
                                            <label class="form-control-label text-white">Direction</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select class="form-control" id="selectGradientDirection" name="direction">
                                                <option value="to top">Top</option>
                                                <option value="to bottom">Bottom</option>
                                                <option value="to left">Left</option>
                                                <option value="to right">Right</option>
                                                <option value="to top left">Top Left</option>
                                                <option value="to top right">Top Right</option>
                                                <option value="to bottom left">Bottom Left</option>
                                                <option value="to bottom right">Bottom Right</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-3 ml-4 mr-3">
                                        <div class="col-md-12" id="gradientColor" style="border:2px solid white;width:100%;min-height:100px;">
                                        </div>
                                    </div>
                                    <div class="row mt-3 ml-4 mr-3">
                                        <input type="submit" value="Apply" class="btn btn-info shadow-none--hover shadow-none" style="width:100%;">
                                    </div>
                                </div>
                            </form>
                        @else
                        <div class="card-header">
                                <h2>Two Colors Linear Gradient Theme</h2>
                            </div>
                            <form method="post" action="{{route('settings.gradientColor')}}" autocomplete="off">
                                @csrf
                                <div class="card-body align-items-center text-center border-top" style="border-radius:7px !important;">
                                    <div class="row">
                                        <div class="col-md-2 mt-2">
                                            <span>Hex</span>
                                        </div>
                                        {{-- <div class="col-md-2"></div> --}}
                                        <div class="col-md-5">
                                            <input type="text" class="form-control form-control-alternative{{ $errors->has('gradientColor1') ? ' is-invalid' : '' }}" placeholder="Hex Code" id="gradientColorValue1" value="{{substr($gradientColor, strpos($gradientColor,', #') +3,6) }}" name="gradientColor1">
                                            @if ($errors->has('gradientColor1'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('gradientColor1') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-5">
                                            <input type="button" id="previewGradientColorButton1" value="Color Palette" class="btn bg-gradient-red shadow-none--hover shadow-none text-white">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-5 mt-2">
                                            <span>Color Percentage</span>
                                        </div>
                                        {{-- <div class="col-md-2"></div> --}}
                                        <div class="col-md-7">
                                            <input type="text" class="form-control form-control-alternative{{ $errors->has('percent1') ? ' is-invalid' : '' }}" placeholder="Number of Percent" id="percentValue1" value="0" name="percent1">
                                            @if ($errors->has('percent1'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('percent1') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-2 mt-2">
                                            <span >Hex</span>
                                        </div>
                                        {{-- <div class="col-md-2"></div> --}}
                                        <div class="col-md-5">
                                            <input type="text" class="form-control form-control-alternative{{ $errors->has('gradientColor2') ? ' is-invalid' : '' }}" placeholder="Hex Code" id="gradientColorValue2" value="{{substr($gradientColor, strpos($gradientColor,',#') +2,6) }}" name="gradientColor2">
                                            @if ($errors->has('gradientColor2'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('gradientColor2') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-5">
                                            <input type="button" id="previewGradientColorButton2" value="Color Palette" class="btn bg-gradient-red shadow-none--hover shadow-none text-white">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-5 mt-2">
                                            <label>Color Percentage</label>
                                        </div>
                                        {{-- <div class="col-md-2"></div> --}}
                                        <div class="col-md-7">
                                            <input type="text" class="form-control form-control-alternative{{ $errors->has('percent2') ? ' is-invalid' : '' }}" placeholder="Number of Percent" id="percentValue2" value="100" name="percent2">
                                            @if ($errors->has('percent2'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('percent2') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-3 mt-2">
                                            <label class="form-control-label text-white">Direction</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select class="form-control" id="selectGradientDirection" name="direction">
                                                <option value="to top">Top</option>
                                                <option value="to bottom">Bottom</option>
                                                <option value="to left">Left</option>
                                                <option value="to right">Right</option>
                                                <option value="to top left">Top Left</option>
                                                <option value="to top right">Top Right</option>
                                                <option value="to bottom left">Bottom Left</option>
                                                <option value="to bottom right">Bottom Right</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-3 ml-4 mr-3">
                                        <div class="col-md-12" id="gradientColor" style="border:2px solid rgba(0, 0, 0, .05);width:100%;min-height:100px;">
                                        </div>
                                    </div>
                                    <div class="row mt-3 ml-4 mr-3">
                                        <input type="submit" value="Apply" class="btn btn-info shadow-none--hover shadow-none" style="width:100%;">
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            <!-- Footer -->
            {{-- <footer class="footer pt-0">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-xl-6">
                        <div class="copyright text-center text-lg-left text-muted">
                            © 2019 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a> &amp; <a href="https://www.updivision.com" class="font-weight-bold ml-1" target="_blank">Updivision</a>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
                            </li>
                            <li class="nav-item">
                                    <a href="https://www.updivision.com" class="nav-link" target="_blank">Updivision</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </footer> --}}
            @include('layouts.footers.auth')

        </div>

    </div>

    <script>
        function godark(val){
            // console.log(val)
            if(val==1){
                Cookies.set('godark',1);
            }
            else if(val==0){
                Cookies.set('godark',0);
            }
            // Cookies.set('godark',0);
            // console.log(Cookies.get('godark'));
            let URL = '<?php echo URL::to('/') ?>';
            let token = '<?php echo csrf_token() ?>';
            $.ajax({
                type: 'GET',
                url: `${URL}/admin/settings/godark`,
                data: { _token: token ,dark:val},
                success:function(data) {
                    // alert();
                    console.log(data);
                    window.location.href = `${URL}/admin/settings`;
                },
                error: function(error){
                    console.log("Error",error);
                }
            });
        }
        $(document).ready(function(){
            // console.log('ready');
            $godarkVal = Cookies.get('godark');
            // console.log(Cookies.get('godark'));
            $setCookiesGoDark = <?php echo $sidebar?>;
            console.log($setCookiesGoDark);
            if(typeof $godarkVal==='undefined'){
                $godarkVal = $setCookiesGoDark;
                // Cookies.set('godark',0);
                // console.log(Cookies.get('godark'));
            }
            if($godarkVal == 1){
                $(".switch").prepend("<input type='checkbox' onclick='godark(0)' checked>");
            }
            else if($godarkVal == 0){
                $(".switch").prepend("<input type='checkbox' onclick='godark(1)'>");
            }
        });
        var bgGradient,bg1,bg2,p1,p2,dir;
        $("#basicColorValue").on("keyup", function(){
            var basicColorVal = $("#basicColorValue").val();
            $("#basicColor").css("background",'#'+basicColorVal);
        });
        $("#gradientColorValue1").on("keyup", function(){
            var gradientColorVal1 = $("#gradientColorValue1").val();
            bg1 = '#'+gradientColorVal1;
            // console.log($('#selectGradientDirection').val());
            // $("#gradientColor1").css("background",'#'+gradientColorVal1);
        });
        $("#gradientColorValue2").on("keyup", function(){
            var gradientColorVal2 = $("#gradientColorValue2").val();
            bg2 = '#'+gradientColorVal2;
            // $("#gradientColor2").css("background",'#'+gradientColorVal1);
        });
        $('#previewBasicColorButton').on("click", function(){
            $('#previewBasicColorButton').ColorPicker({
                onChange: function(hsb, hex, rgb, el) {
                    $("#basicColorValue").val(hex);
                    $("#basicColor").css("background",'#'+hex);
                    $(el).ColorPickerHide();
                },
                onSubmit: function(hsb, hex, rgb, el) {
                    $("#basicColorValue").val(hex);
                    $("#basicColor").css("background",'#'+hex);
                    $(el).ColorPickerHide();
                },
            });
        });

        $(document).ready(function(){
            //default
            dir = $('#selectGradientDirection').val();
            p1 = $('#percentValue1').val();
            p2 = $('#percentValue2').val();
            //selected
            $('#selectGradientDirection').on("click",function(){
                dir = $('#selectGradientDirection').val();
            });
            $('#gradientColorValue1').on("keyup", function(e){
                e.preventDefault();
                bg = 'linear-gradient('+dir+','+bg1+' '+p1+'%,'+bg2+' '+p2+'%'+')';
                // console.log(bg);
                $('#gradientColor').css("background",bg);
            });
            $('#previewGradientColorButton1').on("click", function(){
                $('#previewGradientColorButton1').ColorPicker({
                    onChange: function(hsb, hex, rgb, el) {
                        $("#gradientColorValue1").val(hex);
                        bg1 = '#'+hex;
                        bg = 'linear-gradient('+dir+','+bg1+' '+p1+'%,'+bg2+' '+p2+'%'+')';
                        $('#gradientColor').css("background",bg);
                        // $("#gradientColor1").css("background",'#'+hex);
                        $(el).ColorPickerHide();
                    },
                    onSubmit: function(hsb, hex, rgb, el) {
                        $("#gradientColorValue1").val(hex);
                        bg1 = '#'+hex;
                        bg = 'linear-gradient('+dir+','+bg1+' '+p1+'%,'+bg2+' '+p2+'%'+')';
                        $('#gradientColor').css("background",bg);
                        // $("#gradientColor1").css("background",'#'+hex);
                        $(el).ColorPickerHide();
                    },
                });
            });
            $('#gradientColorValue2').on("keyup", function(e){
                e.preventDefault();
                bg = 'linear-gradient('+dir+','+bg1+' '+p1+'%,'+bg2+' '+p2+'%'+')';
                // console.log(bg);
                $('#gradientColor').css("background",bg);
            });
            $('#previewGradientColorButton2').on("click", function(){
                $('#previewGradientColorButton2').ColorPicker({
                    onChange: function(hsb, hex, rgb, el) {
                        $("#gradientColorValue2").val(hex);
                        bg2 = '#'+hex;
                        bg = 'linear-gradient('+dir+','+bg1+' '+p1+'%,'+bg2+' '+p2+'%'+')';
                        // console.log(bg);
                        $('#gradientColor').css("background",bg);
                        // $("#gradientColor2").css("background",'#'+hex);
                        $(el).ColorPickerHide();
                    },
                    onSubmit: function(hsb, hex, rgb, el) {
                        $("#gradientColorValue2").val(hex);
                        bg2 = '#'+hex;
                        bg = 'linear-gradient('+dir+','+bg1+' '+p1+'%,'+bg2+' '+p2+'%'+')';
                        $('#gradientColor').css("background",bg);
                        // $("#gradientColor2").css("background",'#'+hex);
                        $(el).ColorPickerHide();
                    },
                });
            });
            //change percentage of color 1
            $('#percentValue1').on("keyup",function(e){
                e.preventDefault();
                p1 = $('#percentValue1').val();
                bg = 'linear-gradient('+dir+','+bg1+' '+p1+'%,'+bg2+' '+p2+'%'+')';
                // console.log(bg);
                $('#gradientColor').css("background",bg);
                // console.log(p1);
            });
            //change percentage of color 2
            $('#percentValue2').on("keyup",function(e){
                e.preventDefault();
                p2 = $('#percentValue2').val();
                bg = 'linear-gradient('+dir+','+bg1+' '+p1+'%,'+bg2+' '+p2+'%'+')';
                console.log(bg);
                $('#gradientColor').css("background",bg);
                // console.log(p2);
            });
            //change select option Preview
            $('#selectGradientDirection').on("change",function(e){
                e.preventDefault();
                dir = $('#selectGradientDirection').val();
                bg = 'linear-gradient('+dir+','+bg1+' '+p1+'%,'+bg2+' '+p2+'%'+')';
                // bg = 'linear-gradient('+dir+','+bg1+','+bg2+')';
                $('#gradientColor').css("background",bg);
                // console.log(bg);
            });
        });
        $(document).ready(function(){
                // click hidden upload button
                $("#logobutton").click(function(e){
                    e.preventDefault();
                    $("#logo").click();
                });
                function preview(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#logoPreview').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }
                $("#logo").change(function(){
                    preview(this);
                });
        });
    </script>

@endsection
