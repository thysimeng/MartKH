@extends('layouts.app', ['title' => __('Ads Management')])

@section('content')
    @include('layouts.headers.cards')

    {{-- <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Roles</h3>
                            </div>
                            <div class="col-4 text-right">
                                    <a href="https://argon-dashboard-pro-laravel.creative-tim.com/role/create" class="btn btn-sm btn-primary">Add role</a>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                            <table class="table table-flush dataTable no-footer" id="datatable-basic" role="grid" aria-describedby="datatable-basic_info">
                                <thead class="thead-light">
                                    <tr role="row">
                                        <th scope="col" class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 578px;">Name</th>
                                        <th scope="col" class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Description: activate to sort column ascending" style="width: 644px;">Description</th>
                                        <th scope="col" class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Creation date: activate to sort column ascending" style="width: 196px;">Creation date</th>
                                        <th scope="col" class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="width: 87px;">Action</th>
                                    </tr>
                            </thead>
                            <tbody>
                                <tr role="row" class="odd">
                                    <td class="sorting_1">3.50KB(GET)</td>
                                    <td>some random description. haha</td>
                                    <td>05/07/2019 09:26</td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="https://argon-dashboard-pro-laravel.creative-tim.com/role/1042/edit">Edit</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5"><div class="dataTables_info" id="datatable-basic_info" role="status" aria-live="polite">Showing 1 to 10 of 153 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="datatable-basic_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="datatable-basic_previous"><a href="#" aria-controls="datatable-basic" data-dt-idx="0" tabindex="0" class="page-link"><i class="fas fa-angle-left"></i></a></li><li class="paginate_button page-item active"><a href="#" aria-controls="datatable-basic" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable-basic" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable-basic" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable-basic" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable-basic" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item disabled" id="datatable-basic_ellipsis"><a href="#" aria-controls="datatable-basic" data-dt-idx="6" tabindex="0" class="page-link">…</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable-basic" data-dt-idx="7" tabindex="0" class="page-link">16</a></li><li class="paginate_button page-item next" id="datatable-basic_next"><a href="#" aria-controls="datatable-basic" data-dt-idx="8" tabindex="0" class="page-link"><i class="fas fa-angle-right"></i></a></li></ul></div></div></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    @if($sidebar==1)
        <div class="container-fluid bg-dark mt--7">
    @else
        <div class="container-fluid mt--7">
    @endif
        <div class="row">
            <div class="col">
                {{-- template 1 --}}
                @if($sidebar==1)
                <div class="card bg-dark border shadow">
                    <div class="card-header bg-transparent border-0">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <h3 class="mb-0 text-white">Animated Ads Template 1</h3>
                            </div>
                            {{-- <div class="col-8 text-right">
                                    <a href="ads/create" class="btn btn-sm btn-primary">{{ __('Add Ads') }}</a>
                            </div> --}}
                        </div>
                        <div class="card-body p-0 pt-3">
                @else
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <h3 class="mb-0">Animated Ads Template 1</h3>
                            </div>
                            {{-- <div class="col-8 text-right">
                                    <a href="ads/create" class="btn btn-sm btn-primary">{{ __('Add Ads') }}</a>
                            </div> --}}
                        </div>
                        <div class="card-body p-0 pt-3">
                @endif
                            <div class="row align-items-center">
                                @if($gradientColor===NULL)
                                <div class="col-3 border-right-0" style="border:2px solid {{$basicColor}}; border-radius:5px;position:relative;">
                                @else
                                <div class="col-3 border-right-0" style="border:2px solid;border-image-source: {{$gradientColor}};border-image-slice: 1; border-radius:5px;position:relative;">
                                @endif
                                    <form action="{{ route('adsLeft1.upload') }}" method="post" enctype="multipart/form-data" id="submitFormLeft1">
                                        @csrf
                                        <input type="file" id="adsLeft1" style="display: none;" name="adsLeft1[]" multiple/>
                                        @if($sidebar==1)
                                            <button class="btn shadow-none--hover shadow-none text-white" id="adsLeftButton1" style="width:100%;background:transparent;"><i class="fas fa-plus-circle text-success"></i>Add Left</button>
                                        @else
                                            <button class="btn shadow-none--hover shadow-none" id="adsLeftButton1" style="width:100%;background:transparent;"><i class="fas fa-plus-circle text-success"></i>Add Left</button>
                                        @endif
                                        <input type="submit" id="submitLeft1" class="btn btn-success" style="width:100%;" name='submitImage' value="Upload Image"/>
                                    </form>
                                    <div style="max-height:750px;overflow:auto;">
                                        <div class="ads-container mt-1" style="overflow-y:scroll;height:635px;">
                                            <div id="imageLeftPreview1"></div>
                                            @foreach ($adsLeft1 as $adLeft1)
                                                <div class="image-area">
                                                    <img src="{{asset('uploads/ads_image/template1/adsLeft/' . $adLeft1->image)}}" alt="">
                                                    <button class="btn remove-image" style="display: inline;" onclick="deleteAds('<?php echo $adLeft1->id; ?>')">&#215;</button>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-6" style="border:2px solid #f7931e;border-radius:5px;position:relative;"> --}}
                                @if($gradientColor===NULL)
                                <div class="col-6" style="border:2px solid {{$basicColor}};border-radius:5px;position:relative;">
                                @else
                                <div class="col-6" style="border:2px solid;border-radius:5px;border-image-source: {{$gradientColor}};border-image-slice: 1;position:relative;">
                                @endif
                                    <form action="{{ route('adsMiddle1.upload') }}" method="post" enctype="multipart/form-data" id="submitFormMiddle1">
                                        @csrf
                                        <input type="file" id="adsMiddle1" style="display: none;" name="adsMiddle1[]" multiple/>
                                        @if($sidebar==1)
                                            <button class="btn shadow-none--hover shadow-none text-white" id="adsMiddleButton1" style="width:100%;background:transparent;"><i class="fas fa-plus-circle text-success"></i>Add Middle</button>
                                        @else
                                            <button class="btn shadow-none--hover shadow-none" id="adsMiddleButton1" style="width:100%;background:transparent;"><i class="fas fa-plus-circle text-success"></i>Add Middle</button>
                                        @endif
                                        <input type="submit" id="submitMiddle1" class="btn btn-success" style="width:100%;" name='submitImage' value="Upload Image"/>
                                    </form>
                                    <div style="max-height:750px;overflow:auto;">
                                        <div class="ads-container mt-1" style="overflow-y:scroll;height:635px;">
                                            <div id="imageMiddlePreview1"></div>
                                            @foreach ($adsMiddle1 as $adMiddle1)
                                                <div class="image-area">
                                                    <img src="{{asset('uploads/ads_image/template1/adsMiddle/' . $adMiddle1->image)}}" alt="">
                                                    <button class="btn remove-image" style="display: inline;" onclick="deleteAds('<?php echo $adMiddle1->id; ?>')">&#215;</button>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @if($gradientColor===NULL)
                                <div class="col-3 border-left-0" style="height:730px;border:2px solid {{$basicColor}};border-radius:5px;position:relative;">
                                @else
                                <div class="col-3 border-left-0" style="height:730px;border:2px solid;border-radius:5px;border-image-source: {{$gradientColor}};border-image-slice: 1;position:relative;">
                                @endif
                                    <div class="row">
                                        <div class="col-12">
                                            <form action="{{ route('adsTopRight1.upload') }}" method="post" enctype="multipart/form-data" id="submitFormTopRight1">
                                                @csrf
                                                <input type="file" id="adsTopRight1" style="display: none;" name="adsTopRight1[]" multiple/>
                                                @if($sidebar==1)
                                                    <button class="btn shadow-none--hover shadow-none text-white" id="adsTopRightButton1" style="width:100%;background:transparent;"><i class="fas fa-plus-circle text-success"></i>Add Top Right</button>
                                                @else
                                                    <button class="btn shadow-none--hover shadow-none" id="adsTopRightButton1" style="width:100%;background:transparent;"><i class="fas fa-plus-circle text-success"></i>Add Top Right</button>
                                                @endif
                                                <input type="submit" id="submitTopRight1" class="btn btn-success" style="width:100%;" name='submitImage' value="Upload Image"/>
                                            </form>
                                            @if($gradientColor===NULL)
                                            <div style="overflow:auto;max-height:350px;border-bottom:2px solid {{$basicColor}};">
                                            @else
                                            <div style="overflow:auto;max-height:350px;border-bottom:2px solid;border-image-source: {{$gradientColor}};border-image-slice: 1;">
                                            @endif
                                                <div class="ads-container mt-1" style="overflow-y:scroll;height:250px;">
                                                    <div id="imageTopRightPreview1"></div>
                                                    @foreach ($adsTopRight1 as $adTopRight1)
                                                        <div class="image-area">
                                                            <img src="{{asset('uploads/ads_image/template1/adsTopRight/' . $adTopRight1->image)}}" alt="">
                                                            <button class="btn remove-image" style="display: inline;" onclick="deleteAds('<?php echo $adTopRight1->id; ?>')">&#215;</button>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <form action="{{ route('adsBottomRight1.upload') }}" method="post" enctype="multipart/form-data" id="submitFormBottomRight1">
                                                @csrf
                                                <input type="file" id="adsBottomRight1" style="display: none;" name="adsBottomRight1[]" multiple/>
                                                @if($sidebar==1)
                                                    <button class="btn shadow-none--hover shadow-none text-white" id="adsBottomRightButton1" style="width:100%;background:transparent;"><i class="fas fa-plus-circle text-success"></i>Add BottomRight</button>
                                                @else
                                                    <button class="btn shadow-none--hover shadow-none" id="adsBottomRightButton1" style="width:100%;background:transparent;"><i class="fas fa-plus-circle text-success"></i>Add BottomRight</button>
                                                @endif
                                                <input type="submit" id="submitBottomRight1" class="btn btn-success" style="width:100%;" name='submitImage' value="Upload Image"/>
                                            </form>
                                            @if($gradientColor===NULL)
                                            <div style="overflow:auto;max-height:350px;border-bottom:2px solid {{$basicColor}};">
                                            @else
                                            <div style="overflow:auto;max-height:350px;border-bottom:2px solid;border-image-source: {{$gradientColor}};border-image-slice: 1;">
                                            @endif
                                                <div class="ads-container mt-1" style="overflow-y:scroll;height:250px;">
                                                    <div id="imageBottomRightPreview1"></div>
                                                    @foreach ($adsBottomRight1 as $adBottomRight1)
                                                        <div class="image-area">
                                                            <img src="{{asset('uploads/ads_image/template1/adsBottomRight/' . $adBottomRight1->image)}}" alt="">
                                                            <button class="btn remove-image" style="display: inline;" onclick="deleteAds('<?php echo $adBottomRight1->id; ?>')">&#215;</button>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($sidebar==1)
                        <div class="card-footer bg-dark text-center">
                    @else
                        <div class="card-footer text-center">
                    @endif
                        <form action="{{route('ads.id')}}" method="GET">
                            <input type="hidden" name="template_id" value="1">
                            <input type="submit" class="align-items-center btn btn-success apply-template" value="Apply">
                        </form>
                    </div>
                </div>
                {{-- template 2 --}}
                @if($sidebar==1)
                <div class="card shadow mt-4 bg-dark border">
                    <div class="card-header border-0 bg-transparent">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <h3 class="mb-0 text-white">Animated Ads Template 2</h3>
                            </div>
                        </div>
                @else
                <div class="card shadow mt-4">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <h3 class="mb-0">Animated Ads Template 2</h3>
                            </div>
                        </div>
                @endif
                        <div class="card-body p-0 pt-3">
                            <div class="row align-items-center">
                                @if($gradientColor===NULL)
                                <div class="col-8" style="border:2px solid {{$basicColor}};border-radius:5px;">
                                @else
                                <div class="col-8" style="border:2px solid;border-radius:5px;border-image-source: {{$gradientColor}};border-image-slice: 1;">
                                @endif
                                    <form action="{{ route('adsLeft2.upload') }}" method="post" enctype="multipart/form-data" id="submitFormLeft2">
                                        @csrf
                                        <input type="file" id="adsLeft2" style="display: none;" name="adsLeft2[]" multiple/>
                                        @if($sidebar==1)
                                            <button class="btn shadow-none--hover shadow-none text-white" id="adsLeftButton2" style="width:100%;background:transparent;"><i class="fas fa-plus-circle text-success"></i>Add Left</button>
                                        @else
                                            <button class="btn shadow-none--hover shadow-none" id="adsLeftButton2" style="width:100%;background:transparent;"><i class="fas fa-plus-circle text-success"></i>Add Left</button>
                                        @endif
                                        <input type="submit" id="submitLeft2" class="btn btn-success" style="width:100%;" name='submitImage' value="Upload Image"/>
                                    </form>
                                    <div style="max-height:960px;overflow:auto;">
                                        <div class="ads-container mt-1" style="overflow-y:scroll;height:845px;">
                                            <div id="imageLeftPreview2"></div>
                                            @foreach ($adsLeft2 as $adLeft2)
                                                <div class="image-area">
                                                    <img src="{{asset('uploads/ads_image/template2/adsLeft/' . $adLeft2->image)}}" alt="">
                                                    <button class="btn remove-image" style="display: inline;" onclick="deleteAds('<?php echo $adLeft2->id; ?>')">&#215;</button>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @if($gradientColor===NULL)
                                <div class="col-4 border-left-0" style="height:940px;border:2px solid {{$basicColor}};border-radius:5px;position:relative;">
                                @else
                                <div class="col-4 border-left-0" style="height:940px;border:2px solid;border-image-source: {{$gradientColor}};border-image-slice: 1;border-radius:5px;position:relative;">
                                @endif
                                    <div class="row">
                                        <div class="col-12">
                                            <form action="{{ route('adsTopRight2.upload') }}" method="post" enctype="multipart/form-data" id="submitFormTopRight2">
                                                @csrf
                                                <input type="file" id="adsTopRight2" style="display: none;" name="adsTopRight2[]" multiple/>
                                                @if($sidebar==1)
                                                    <button class="btn shadow-none--hover shadow-none text-white" id="adsTopRightButton2" style="width:100%;background:transparent;"><i class="fas fa-plus-circle text-success"></i>Add Top Right</button>
                                                @else
                                                    <button class="btn shadow-none--hover shadow-none" id="adsTopRightButton2" style="width:100%;background:transparent;"><i class="fas fa-plus-circle text-success"></i>Add Top Right</button>
                                                @endif
                                                <input type="submit" id="submitTopRight2" class="btn btn-success" style="width:100%;" name='submitImage' value="Upload Image"/>
                                            </form>
                                            @if($gradientColor===NULL)
                                            <div style="max-height:360px;overflow:auto;border-bottom:2px solid {{$basicColor}}">
                                            @else
                                            <div style="max-height:360px;overflow:auto;border-bottom:2px solid;border-image-source: {{$gradientColor}};border-image-slice: 1;">
                                            @endif
                                                <div class="ads-container mt-1" style="overflow-y:scroll;height:715px;">
                                                    <div id="imageTopRightPreview2"></div>
                                                    @foreach ($adsTopRight2 as $adTopRight2)
                                                        <div class="image-area">
                                                            <img src="{{asset('uploads/ads_image/template2/adsTopRight/' . $adTopRight2->image)}}" alt="">
                                                            <button class="btn remove-image" style="display: inline;" onclick="deleteAds('<?php echo $adTopRight2->id; ?>')">&#215;</button>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12" >
                                            <form action="{{ route('adsBottomRight2.upload') }}" method="post" enctype="multipart/form-data" id="submitFormBottomRight2">
                                                @csrf
                                                <input type="file" id="adsBottomRight2" style="display: none;" name="adsBottomRight2[]" multiple/>
                                                @if($sidebar==1)
                                                    <button class="btn shadow-none--hover shadow-none text-white" id="adsBottomRightButton2" style="width:100%;background:transparent;"><i class="fas fa-plus-circle text-success"></i>Add BottomRight</button>
                                                @else
                                                    <button class="btn shadow-none--hover shadow-none" id="adsBottomRightButton2" style="width:100%;background:transparent;"><i class="fas fa-plus-circle text-success"></i>Add BottomRight</button>
                                                @endif
                                                <input type="submit" id="submitBottomRight" class="btn btn-success" style="width:100%;" name='submitImage' value="Upload Image"/>
                                            </form>
                                            @if($gradientColor===NULL)
                                            <div style="max-height:360px;overflow:auto;border-bottom:2px solid {{$basicColor}}">
                                            @else
                                            <div style="max-height:360px;overflow:auto;border-bottom:2px solid;border-image-source: {{$gradientColor}};border-image-slice: 1;">
                                            @endif
                                                <div class="ads-container mt-1" style="overflow-y:scroll;height:715px;">
                                                    <div id="imageBottomRightPreview2"></div>
                                                    @foreach ($adsBottomRight2 as $adBottomRight2)
                                                        <div class="image-area">
                                                            <img src="{{asset('uploads/ads_image/template2/adsBottomRight/' . $adBottomRight2->image)}}" alt="">
                                                            <button class="btn remove-image" style="display: inline;" onclick="deleteAds('<?php echo $adBottomRight2->id; ?>')">&#215;</button>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($sidebar==1)
                        <div class="card-footer text-center bg-dark">
                    @else
                        <div class="card-footer text-center">
                    @endif
                        {{-- <button class="align-items-center btn btn-success">Apply</button> --}}
                        <form action="{{route('ads.id')}}" method="GET">
                            <input type="hidden" name="template_id" value="2">
                            <input type="submit" class="align-items-center btn btn-success apply-template" value="Apply">
                        </form>
                    </div>
                </div>
                {{-- template 3 --}}
                @if($sidebar==1)
                <div class="card shadow mt-4">
                    <div class="card-header border-0 bg-dark border">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <h3 class="mb-0 text-white">Animated Ads Template 3</h3>
                            </div>
                        </div>
                @else
                <div class="card shadow mt-4">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <h3 class="mb-0">Animated Ads Template 3</h3>
                            </div>
                        </div>
                @endif
                        <div class="card-body p-0 pt-3">
                            <div class="row align-items-center">
                                @if($gradientColor===NULL)
                                <div class="col-12" style="border:2px solid {{$basicColor}};border-radius:5px;position:relative;">
                                @else
                                <div class="col-12" style="border:2px solid;border-radius:5px;border-image-source: {{$gradientColor}};border-image-slice: 1;position:relative;">
                                @endif
                                    <form action="{{ route('adsMiddle3.upload') }}" method="post" enctype="multipart/form-data" id="submitFormMiddle3" class="form-inline justify-content-center">
                                        @csrf
                                        <input type="file" id="adsMiddle3" style="display: none;" name="adsMiddle3[]" multiple/>
                                        @if($sidebar==1)
                                            <button class="btn shadow-none--hover shadow-none text-white" id="adsMiddleButton3" style="width:100%;background:transparent;border:transparent;"><i class="fas fa-plus-circle text-success"></i>Add Middle</button>
                                        @else
                                            <button class="btn shadow-none--hover shadow-none" id="adsMiddleButton3" style="width:100%;background:transparent;border:transparent;"><i class="fas fa-plus-circle text-success"></i>Add Middle</button>
                                        @endif
                                        <input type="submit" id="submitMiddle3" class="btn btn-success mt-2" style="width:100%;" name='submitImage' value="Upload Image"/>
                                    </form>
                                    <div style="max-height:1080x;overflow:auto;">
                                        <div class="ads-container mt-1" style="overflow-y:scroll;height:635px;">
                                            <div id="imageMiddlePreview3"></div>
                                            @foreach ($adsMiddle3 as $adMiddle3)
                                                <div class="image-area">
                                                    <img src="{{asset('uploads/ads_image/template3/adsMiddle/' . $adMiddle3->image)}}" alt="">
                                                    <button class="btn remove-image" style="display: inline;" onclick="deleteAds('<?php echo $adMiddle3->id; ?>')">&#215;</button>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($sidebar==1)
                        <div class="card-footer text-center bg-dark">
                    @else
                        <div class="card-footer text-center">
                    @endif
                        {{-- <button class="align-items-center btn btn-success">Apply</button> --}}
                        <form action="{{route('ads.id')}}" method="GET">
                            <input type="hidden" name="template_id" value="3">
                            <input type="submit" class="align-items-center btn btn-success apply-template" value="Apply">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
        <script>
            $('.apply-template').click(function(e){
                e.preventDefault();
                Swal.fire({
                    title: 'Warning',
                    text: "Are you sure you want to apply this template?",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#2dce89',
                    cancelButtonColor: '#f5365c',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.value) {
                    this.parentElement.submit();
                }
                })
            });
            // $(document).on('click', '.remove-div', function(){
            //         $(this).parents('.image-area').remove();
            // });

            $(document).ready(function(){
                // click hidden upload button
                $("#adsLeftButton1").click(function(e){
                    e.preventDefault();
                    $("#adsLeft1").click();
                });
                $("#adsMiddleButton1").click(function(e){
                    e.preventDefault();
                    $("#adsMiddle1").click();
                });
                $("#adsTopRightButton1").click(function(e){
                    e.preventDefault();
                    $("#adsTopRight1").click();
                });
                $("#adsBottomRightButton1").click(function(e){
                    e.preventDefault();
                    $("#adsBottomRight1").click();
                });
                $("#adsLeftButton2").click(function(e){
                    e.preventDefault();
                    $("#adsLeft2").click();
                });
                $("#adsTopRightButton2").click(function(e){
                    e.preventDefault();
                    $("#adsTopRight2").click();
                });
                $("#adsBottomRightButton2").click(function(e){
                    e.preventDefault();
                    $("#adsBottomRight2").click();
                });
                $("#adsMiddleButton3").click(function(e){
                    e.preventDefault();
                    $("#adsMiddle3").click();
                });
                //image preview
                $("#adsLeft1").change(function(){
                    $('#imageLeftPreview1').html("");
                    var total_file=document.getElementById("adsLeft1").files.length;
                    for(var i=0;i<total_file;i++)
                    {
                        $('#imageLeftPreview1').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");
                    }
                    // $("#submitForm").submit();
                    // $('#imageLeftPreview1').empty();
                });
                $("#adsMiddle1").on('change',function(e){
                    $('#imageMiddlePreview1').html("");
                    var total_file=document.getElementById("adsMiddle1").files.length;
                    var file = e.target.files;
                    for(var i=0;i<total_file;i++)
                    {
                        var fileURL = URL.createObjectURL(e.target.files[i]);
                        $('#imageMiddlePreview1').append("<div class='image-area'><img src='"+fileURL+"'><button class='btn remove-image remove-div' style='display: inline;' onclick=myFunction(\'"+fileURL+"\')>&#215;</button></div>");

                    }
                });
                $("#adsTopRight1").change(function(){
                    $('#imageTopRightPreview1').html("");
                    var total_file=document.getElementById("adsTopRight1").files.length;
                    for(var i=0;i<total_file;i++)
                    {
                        $('#imageTopRightPreview1').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");
                    }
                });
                $("#adsBottomRight1").change(function(){
                    $('#imageBottomRightPreview1').html("");
                    var total_file=document.getElementById("adsBottomRight1").files.length;
                    for(var i=0;i<total_file;i++)
                    {
                        $('#imageBottomRightPreview1').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");
                    }
                });
                $("#adsLeft2").change(function(){
                    $('#imageLeftPreview2').html("");
                    var total_file=document.getElementById("adsLeft2").files.length;
                    for(var i=0;i<total_file;i++)
                    {
                        $('#imageLeftPreview2').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");
                    }
                });
                $("#adsTopRight2").change(function(){
                    $('#imageTopRightPreview2').html("");
                    var total_file=document.getElementById("adsTopRight2").files.length;
                    for(var i=0;i<total_file;i++)
                    {
                        $('#imageTopRightPreview2').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");
                    }
                });
                $("#adsBottomRight2").change(function(){
                    $('#imageBottomRightPreview2').html("");
                    var total_file=document.getElementById("adsBottomRight2").files.length;
                    for(var i=0;i<total_file;i++)
                    {
                        $('#imageBottomRightPreview2').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");
                    }
                });
                $("#adsMiddle3").change(function(){
                    $('#imageMiddlePreview3').html("");
                    var total_file=document.getElementById("adsMiddle3").files.length;
                    for(var i=0;i<total_file;i++)
                    {
                        $('#imageMiddlePreview3').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");
                    }
                });
                //clear form after upload
                // $("#submitLeft").click(function(){
                $("#submitFormLeft1").on('submit',function(){
                    // $('#image_preview').html("");
                    // var total_file=document.getElementById("adsLeft1").files.length;
                    // for(var i=0;i<total_file;i++)
                    // {
                    //     $('#image_preview').empty();
                    // }
                    // e.preventDefault();
                    $('#imageLeftPreview1').empty("");
                    // $.ajax({
                    //     type: "POST",
                    //     url: 'admin/ads/adsLeft1',
                    //     data: $('#submitForm').serialize(),
                    //     success: function(response){
                    //         console.log(response)
                    //     }
                    // });
                });
                $("#submitFormMiddle1").on('submit',function(){
                    $('#imageMiddlePreview1').empty("");
                });
                $("#submitFormTopRight1").on('submit',function(){
                    $('#imageTopRightPreview1').empty("");
                });
                $("#submitFormBottomRight1").on('submit',function(){
                    $('#imageBottomRightPreview1').empty("");
                });
                $("#submitFormLeft2").on('submit',function(){
                    $('#imageLeftPreview2').empty("");
                });
                $("#submitFormTopRight2").on('submit',function(){
                    $('#imageTopRightPreview2').empty("");
                });
                $("#submitFormBottomRight2").on('submit',function(){
                    $('#imageBottomRightPreview2').empty("");
                });
                $("#submitFormMiddle3").on('submit',function(){
                    $('#imageMiddlePreview3').empty("");
                });
                // if upload success
                $('form').ajaxForm(function()
                {
                    // alert("Uploaded SuccessFully");
                    $('#submitFormLeft1').resetForm();
                    $('#submitFormMiddle1').resetForm();
                    $('#submitFormTopRight1').resetForm();
                    $('#submitFormBottomRight1').resetForm();
                    $('#submitFormLeft2').resetForm();
                    $('#submitFormTopRight2').resetForm();
                    $('#submitFormBottomRight2').resetForm();
                    $('#submitFormMiddle3').resetForm();
                    window.location.href = "{{ URL::route('ads.index') }}"
                });

            });
            function myFunction(file){
                console.log(file);
                window.URL.revokeObjectURL(file);
                var total = document.getElementById("adsMiddle1").files;
                array = Array.from(total);
                array.splice(1,1);
                // var arr = Array()
                // total_file.pop();
                console.log(array);
            }
            function deleteAds(id){
                Swal.fire({
                    position: 'center',
                    title: 'Warning',
                    text: "Are you sure you want to remove this ads?",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#2dce89',
                    cancelButtonColor: '#f5365c',
                    confirmButtonText: 'Yes',
                    // showLoaderOnConfirm: true,
                    // preF
                }).then((result) => {
                    if (result.value) {
                        let URL = '<?php echo URL::to('/') ?>';
                        console.log(URL);
                        let token = '<?php echo csrf_token() ?>';
                        // console.log(token);
                        $.ajax({
                            type:'DELETE',
                            url:`${URL}/admin/ads/${id}` ,
                            // data: { _token: token, product_id: id },
                            data: { _token: token },
                            success:function(data) {
                                window.location.href = `${URL}/admin/ads`;
                            },
                            error: function(error){
                                console.log("Error",error);
                            }
                        });

                    }
                })
            }

        </script>
@endsection


