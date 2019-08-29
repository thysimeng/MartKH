@extends('layouts.app', ['title' => __('Stock')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <!-- Tabs -->
                        <ul class="nav nav-tabs card-header-tabs" id="bologna-list" role="tablist">
                                    <li class="nav-item col-2">
                                      <a class="nav-link active" id="nav-admin-tab" href="#nav-admin" data-toggle="tab" role="tab" aria-controls="admin" aria-selected="true">{{ __('All Stock') }}</a>
                                    </li>
                                    {{-- <li class="nav-item col-2">
                                      <a class="nav-link"  href="#nav-user" data-toggle="tab" role="tab" aria-controls="user" aria-selected="false">{{ __('Franch Stocks') }}</a>
                                    </li> --}}
                                    
                                    <!-- Search -->
                                    <div class="col-6 text-right">
                                        <form class="col-8" id="search-stocks" method="get" action="{{ route('admin.search_stock') }}" autocomplete="off">
                                                <div class="form-group mb-4">
                                                    <div class="input-group input-group-alternative">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                                                        </div>
                                                        <input class="form-control" placeholder="Search" type="search" name="search">
                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                        
                                    <!-- Add stocks -->
                                    <div class="col-4 text-right">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addStock">{{ __('Add Stock') }}</button>
                                    </div>
                                    <form class="form-horizontal" action="{{ route('admin.create_stock') }}" enctype="multipart/form-data" method="post">
                                        @csrf
                                        <div class="modal fade" id="addStock" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Add New Stock</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                            <label for="exampleFormControlSelect1">Select Product</label>
                                                            <input type="hidden" class="form-control" name="product_id" id="" value="">
                                                            <input type="text" class="typeahead form-control" name="product_name" required placeholder="Search Products" autocomplete="off">
                                                      </div>
                                                    {{-- <div class="modal-body">
                                                        <label for="exampleFormControlSelect1">Select Franchies</label>
                                                        <input type="hidden" class="form-control" name="franchise_id" id="" value="">
                                                        <input type="text" class="typeahead form-control" name="franchise_name" required placeholder="Search Franchise"> 
                                                    </div> --}}
                                                    <div class="modal-body">
                                                        <input type="text" class="form-control" name="amount" id="" value="" required placeholder="Amount">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                        </ul>
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
                                <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">{{ __('Stock ID') }}</th>
                                                    <th scope="col">{{ __('Product Name') }}</th>
                                                    <th scope="col">{{ __('Amount') }}</th>
                                                    <th scope="col">{{ __('Create Date') }}</th>
                                                    <th scope="col">{{ __('Update Date') }}</th>
                                                    <th scope="col">{{ __('Action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    @foreach($stocks_data as $item)
                                                    
                                                    <tr>
                                                        <td>{{$item->id}}</td>
                                                        <td>{{$item->product->name}}</td>
                                                        <td>{{$item->amount}}</td>
                                                        <td>{{$item->created_at}}</td>
                                                        <td>{{$item->updated_at}}</td>
                                                        <td class="">
                                                            <div class="dropdown">
                                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="fas fa-ellipsis-v"></i>
                                                                </a>
                                                                <div data-id="{{$item->id}}"  class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                    <a onclick="edit({{$item->id}}, '{{$item->amount}}')" class="dropdown-item" data-toggle="modal" data-target="#editModalCenter" href="">{{ __('Edit') }}</a>
                                                            
                                                                    {{-- <a class="dropdown-item" href="">{{ __('View') }}</a> --}}
                                                                    <a onclick="delet({{$item->id}})" class="dropdown-item" data-toggle="modal" data-target="#deleteModalCenter" href="">{{ __('Delete') }}</a>
                                                                    {{-- <a class="dropdown-item" href="/admin/delete_stock/{{ $item->id }}">{{ __('Delete') }}</a> --}}
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
                                                                <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalCenterTitle">Update Stock</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <label for="exampleFormControlSelect1">Old Stocks</label>
                                                                            <input type="hidden" name="stock_id" value="" >
                                                                            @csrf
                                                                            <input disabled="false" type="text" class="form-control" name="old-amount" value="" required placeholder="">
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <label for="exampleFormControlSelect1">New Stocks</label>
                                                                            <input type="text" class="form-control" name="new-amount" value="" required placeholder="">
                                                                        </div>
                                                                        <div  class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button onclick="saveEdit()"  class="btn btn-primary">Save changes</button>
                                                                        </div>
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
                            <div class="text-center">
                                <div class="wrapper-pagination">
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