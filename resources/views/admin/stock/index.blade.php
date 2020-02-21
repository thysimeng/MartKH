@extends('layouts.app', ['title' => __('Stock')])

@section('content')
    @include('layouts.headers.cards')

    @if($sidebar==1)
        <div class="container-fluid bg-dark mt--7" style="min-height:660px;">
            <div class="row">
                <div class="col">
                    <div class="card bg-dark shadow border">
                        <div class="card-header bg-transparent border-0">
                            <div class="row align-items-center">
                                    <div class="col-4">
                                        <h3 class="mb-0 text-white">Main Stock<h3>
                                    </div>
    @else
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                    <div class="col-4">
                                        <h3 class="mb-0">Main Stock<h3>
                                    </div>
    @endif
                                    <form class="col-4 mb-2 mt-2" method="get" id="search-stocks" action="{{ route('admin.search_stock') }}" autocomplete="off">
                                        <div class="input-group input-group-alternative">
                                            {{-- <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                            </div> --}}
                                        <input class="form-control" placeholder="Search" type="text" name="search" id="search" value="" style="border: 1px solid #11cdef">
                                        <span class="form-clear d-none"><i class="fas fa-times-circle">clear</i></span>
                                        <div class="input-group-append">
                                            <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                    {{-- <form class="col-4 mt-2" id="search-stocks" method="get" action="{{ route('admin.search_stock') }}" autocomplete="off">
                                        <div class="form-group mb-2">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </form> --}}
                                    <div class="col-4 text-right">
                                        <a href="{{ route('admin.stock.log') }}" class="btn btn-md btn-primary">{{ __('Log') }}</a>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addStock">{{ __('Add Stock') }}</button>
                                    </div>
                            </div>
                            <!-- Add stocks -->
                            <form class="form-horizontal" action="{{ route('admin.create_stock') }}" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="modal fade" id="addStock" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        @if($sidebar==1)
                                            <div class="modal-content" style="border:1px solid white">
                                            <div class="modal-header bg-dark text-white">
                                                <h5 class="modal-title text-white" id="exampleModalCenterTitle">Add New Stock</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span class="text-white" aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body bg-dark text-white">
                                        @else
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Add New Stock</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                        @endif
                                                    <label for="exampleFormControlSelect1">Select Product</label>
                                                    <input type="hidden" class="form-control" name="product_id" id="" value="">
                                                    <input type="text" class="typeahead form-control" name="product_name" required placeholder="Search Products" autocomplete="off">
                                                </div>
                                            {{-- <div class="modal-body">
                                                <label for="exampleFormControlSelect1">Select Franchies</label>
                                                <input type="hidden" class="form-control" name="franchise_id" id="" value="">
                                                <input type="text" class="typeahead form-control" name="franchise_name" required placeholder="Search Franchise">
                                            </div> --}}
                                            @if($sidebar==1)
                                                <div class="modal-body bg-dark text-white">
                                            @else
                                                <div class="modal-body">
                                            @endif
                                                <input type="text" class="form-control" name="amount" id="" value="" required placeholder="Amount">
                                            </div>
                                            @if($sidebar==1)
                                                <div class="modal-footer bg-dark">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            @else
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            @endif
                                            <input type="hidden" name="enter_by" value="{{auth()->user()->name}}">
                                        </div>
                                    </div>
                                </div>
                            </form>
                    </div>

                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <!-- Users Table -->
                    <div class="tab-content" id="nav-tabContent">
                        <!-- Admin List -->
                        <div class="tab-pane active" id="nav-admin" role="tabpanel1">
                            <div class="table-responsive">
                                @if($sidebar==1)
                                    <table class="table align-items-center table-flush table-hover table-dark">
                                @else
                                    <table class="table align-items-center table-flush table-hover">
                                @endif
                                        <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">{{ __('Stock ID') }}</th>
                                                    <th scope="col">{{ __('Code') }}</th>
                                                    <th scope="col">{{ __('Image') }}</th>
                                                    <th scope="col">{{ __('Product Name') }}</th>
                                                    <th scope="col">{{ __('Amount') }}</th>
                                                    <th scope="col">{{ __('Enter By') }}</th>
                                                    <th scope="col">{{ __('Created Date') }}</th>
                                                    <th scope="col">{{ __('Action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    @foreach($stocks_data as $item)

                                                    <tr>
                                                        <td>{{$item->id}}</td>
                                                        <td>{{$item->product->code}}</td>
                                                        <td><img src="{{asset( 'uploads/product_image/' . $item->product->image )}}" alt="" class="img-thumbnail " style="width:50px;"></td>
                                                        <td>{{$item->product->name}}</td>
                                                        <td>{{$item->amount}}</td>
                                                        <td>{{$item->enter_by}}</td>
                                                        <td>{{$item->created_at}}</td>
                                                        <td class="">
                                                            <div class="dropdown">
                                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="fas fa-ellipsis-v"></i>
                                                                </a>
                                                                <div data-id="{{$item->id}}"  class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                    <a onclick="edit({{$item->id}}, '{{$item->amount}}')" class="dropdown-item" data-toggle="modal" data-target="#editModalCenter" href="">{{ __('Edit') }}</a>

                                                                    {{-- <a class="dropdown-item" href="">{{ __('View') }}</a> --}}
                                                                    {{-- <a onclick="delet({{$item->id}})" class="dropdown-item" data-toggle="modal" data-target="#deleteModalCenter" href="">{{ __('Delete') }}</a> --}}
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    {{-- Delete Form --}}
                                                    <div class="modal fade" id="deleteModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <form action="{{ route('admin.delete_stock') }}" method="post">
                                                                @csrf
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalCenterTitle">Delete Stock</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <input type="hidden" name="delete_stock_id" value="" >
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="submit"  class="btn btn-primary">Yes</button>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    {{-- Update Form --}}
                                                    <div class="modal fade" id="editModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <form action="{{ route('admin.update_stock') }}" method="post">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                @if($sidebar==1)
                                                                <div class="modal-content" style="border:1px solid white !important">
                                                                    <div class="modal-header bg-dark">
                                                                        <h5 class="modal-title text-white" id="exampleModalCenterTitle">Update Stock</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span class="text-white" aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body bg-dark">
                                                                        <label for="exampleFormControlSelect1" class="text-white">Old Stocks</label>
                                                                @else
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Update Stock</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <label for="exampleFormControlSelect1">Old Stocks</label>
                                                                @endif
                                                                            <input type="hidden" name="stock_id" value="" >
                                                                            @csrf
                                                                            <input disabled="false" type="text" class="form-control" name="old-amount" value="" required placeholder="">
                                                                        </div>
                                                                        @if($sidebar==1)
                                                                        <div class="modal-body bg-dark">
                                                                            <label for="exampleFormControlSelect1" class="text-white">New Stocks</label>
                                                                        @else
                                                                        <div class="modal-body">
                                                                            <label for="exampleFormControlSelect1">New Stocks</label>
                                                                        @endif
                                                                            <input type="text" class="form-control" name="new-amount" value="" required placeholder="">
                                                                        </div>
                                                                        @if($sidebar==1)
                                                                        <div class="modal-body bg-dark">
                                                                            <label for="exampleFormControlSelect1" class="text-white">Reason</label>
                                                                        @else
                                                                        <div class="modal-body">
                                                                            <label for="exampleFormControlSelect1">Reason</label>
                                                                        @endif
                                                                            <input type="text" class="form-control" name="reason" value="" required placeholder="Provide reason for editing">
                                                                        </div>
                                                                        @if($sidebar==1)
                                                                            <div class="modal-footer bg-dark">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                <button onclick="saveEdit()"  class="btn btn-primary">Save changes</button>
                                                                            </div>
                                                                        @else
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                <button onclick="saveEdit()"  class="btn btn-primary">Save changes</button>
                                                                            </div>
                                                                        @endif
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    @endforeach
                                            </tbody>
                                </table>
                            </div>
                        </div>
                         <!-- User List -->
                         {{-- <div class="tab-pane" id="nav-user" role="tabpanel1">
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">{{ __('Stock ID') }}</th>
                                                    <th scope="col">{{ __('Franchise Name') }}</th>
                                                    <th scope="col">{{ __('Amount') }}</th>
                                                    <th scope="col">{{ __('Create Date') }}</th>
                                                    <th scope="col">{{ __('Update Date') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    @foreach($stocks_franch_data as $item)

                                                    <tr>
                                                        <td>{{$item->id}}</td>
                                                        <td>{{$item->franchise_name}}</td>
                                                        <td>{{$item->amount}}</td>
                                                        <td>{{$item->created_at}}</td>
                                                        <td>{{$item->updated_at}}</td>
                                                    </tr>
                                                    @endforeach
                                            </tbody>

                                </table>
                            </div>
                        </div> --}}
                            <div class="col-7">
                                <div class="d-flex justify-content-end">
                                    {{$stocks_data->appends($queryParams)->render()}}
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>

    <script type="test/javascript">
        document.getElementById('search-stocks').submit();
    </script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script type="text/javascript">
        var pathstock = "{{ route('admin.stock.autocomplete') }}";
        $stockInput = $('input[name="product_name"]');
        $stockInput.typeahead({
            source:  function (query, process) {
            return $.get(pathstock, { query: query }, function (data) {
                    return process(data);
                });
            }
        });

        $stockInput.change(function() {
            var current = $stockInput.typeahead("getActive");
            if (current) {
                $('input[name="product_id"]').val(current.id);
            }

        });
    </script>

    {{-- <script type="text/javascript">
        var franchise = "{{ route('admin.stock.autocompleteFranchise') }}";
        $franchiseInput = $('input[name="franchise_name"]');
        $franchiseInput.typeahead({

            source:  function (query, process) {
            return $.get(franchise, { query: query }, function ($data_franchise) {
                    return process($data_franchise);
                });
            }
        });

        $franchiseInput.change(function() {
            var currentFranchise = $franchiseInput.typeahead("getActive");
            if (currentFranchise) {
                $('input[name="franchise_id"]').val(currentFranchise.id);
            }

        });
    </script> --}}

    <script>
        var id = null;

        function edit(id,name) {
            document.querySelector('[name="stock_id"]').setAttribute('value', id);
            document.querySelector('[name="old-amount"]').setAttribute('value', name);
        }

    </script>

    <script>
        var id = null;

        function delet(id) {
            document.querySelector('[name="delete_stock_id"]').setAttribute('value', id);
        }

    </script>
@endsection
