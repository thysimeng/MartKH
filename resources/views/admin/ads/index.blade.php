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
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <h3 class="mb-0">Ads Animated</h3>
                            </div>
                            {{-- <div class="col-8 text-right">
                                    <a href="ads/create" class="btn btn-sm btn-primary">{{ __('Add Ads') }}</a>
                            </div> --}}
                        </div>
                        <div class="card-body p-0 pt-3">
                            <div class="row align-items-center">
                                <div class="col-3" style="height:700px;border:1px solid black; overflow:hidden;">
                                    <form action="{{ route('adsLeft.upload') }}" method="post" enctype="multipart/form-data" id="submitForm">
                                        @csrf
                                        <input type="file" id="adsLeft1" style="display: none;" name="adsLeft1[]" multiple/>
                                        <button  class="btn" id="adsLeftButton1" style="width:100%;background:transparent;"><i class="fas fa-plus-circle"></i>Add Left</button>
                                        <input type="submit" id="submitLeft" class="btn btn-success" style="width:100%;" name='submitImage' value="Upload Image"/>
                                    </form>
                                    <div class="container mt-2" style="overflow-y:scroll;height:700px;">
                                        <div id="image_preview"></div>
                                        @foreach ($ads as $ad)
                                        {{-- <img src="{{asset('uploads/Test/' . $ad->image)}}" alt=""> --}}
                                            <img src="{{asset('uploads/ads_image/template1/adsLeft/' . $ad->image)}}" alt="">
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-6" style="height:700px;overflow:hidden;border:1px solid black">
                                        <input type="file" id="adsMiddle1" style="display:none;">
                                        <button class="btn" id="adsMiddleButton1" style="width:100%;background:transparent;"><i class="fas fa-plus-circle"></i>Add Middle</button>
                                    {{-- <form action="{{route('adsMiddle.upload')}}" method="post" enctype="multipart/form-data">
                                        <input type="file" name="images[]" id="fileInput" multiple >
                                        <input type="submit" name="submit" value="UPLOAD"/>
                                    </form>
                                    <div class="container mt-2" style="overflow-y:scroll;height:700px;">
                                        <div id="show-image"></div>
                                    </div> --}}
                                </div>
                                <div class="col-3" style="height:700px;overflow:hidden;border:1px solid black">
                                    <div class="row">
                                        <div class="col-12" style="height:350px;overflow:hidden;border:1px solid black">
                                                <input type="file" id="adsTopRight1" style="display:none;">
                                                <button class="btn" id="adsTopRightButton1" style="width:100%;background:transparent;"><i class="fas fa-plus-circle"></i>Add Top Right</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12" style="height:350px;overflow:hidden;border:1px solid black">
                                                <input type="file" id="adsBottomRight1" style="display:none;">
                                                <button class="btn" id="adsBottomRightButton1" style="width:100%;background:transparent;"><i class="fas fa-plus-circle"></i>Add Bottom Right</button>
                                        </div>
                                    </div>
                                </div>
                            </div>        
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
    <script>
        $('.delete-btn').click(function(e){
            e.preventDefault();
            Swal.fire({
                title: 'Warning',
                text: "Are you sure you want to delete this ads?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
            if (result.value) {
                this.parentElement.submit()
            }
            })
        });
        $(document).ready(function(){
            $("#adsLeftButton1").click(function(){
                $("#adsLeft1").click();
            });
            $("#adsMiddleButton1").click(function(){
                $("#adsMiddle1").click();
            });
            $("#adsTopRightButton1").click(function(){
                $("#adsTopRight1").click();
            });
            $("#adsBottomRightButton1").click(function(){
                $("#adsBottomRight1").click();
            });

            $("#adsLeft1").change(function(){
                $('#image_preview').html("");
                var total_file=document.getElementById("adsLeft1").files.length;
                for(var i=0;i<total_file;i++)
                {
                    $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");
                }
                // $("#submitForm").submit();
                // $('#image_preview').empty();
            });
            // $("#submitLeft").click(function(){            
            $("#submitForm").on('submit',function(e){
                // $('#image_preview').html("");
                // var total_file=document.getElementById("adsLeft1").files.length;
                // for(var i=0;i<total_file;i++)
                // {
                //     $('#image_preview').empty();
                // }
                e.preventDefault();
                $('#image_preview').empty("");
                $.ajax({
                    type: "POST",
                    url: 'admin/ads/adsLeft',
                    data: $('#submitForm').serialize(),
                    success: function(response){
                        console.log(response)
                    }
                });
            });
            $('form').ajaxForm(function() 
            {
                alert("Uploaded SuccessFully");
                $('#submitForm').resetForm();
            }); 

           

            
            });
            
    </script>


        @include('layouts.footers.auth')
    </div>
@endsection


