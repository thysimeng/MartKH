@extends('layouts.app', ['title' => __('Stock Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <h3 class="mb-0">Stock Requests</h3>
                            </div>
                            <form class="col-4" action="{{route('admin.request_stock.search')}}" method="get" role="search">
                                    {{ csrf_field() }}
                                    <div class="form-group mb-2 mt-2">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Search" type="text" name="search">
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('ID') }}</th>
                                    <th scope="col">{{ __('Franchise Name') }}</th>
                                    <th scope="col">{{ __('Product Name') }}</th>
                                    <th scope="col">{{ __('Product Image') }}</th>
                                    <th scope="col">{{ __('Amount') }}</th>
                                    
                                    <th scope="col">{{ __('Request Date') }}</th>
                                    <th scope="col">{{ __('Status') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notifications_data as $notifications)
                                    <tr>
                                        <td>{{ $notifications->id }}</td>
                                        <td>{{ $notifications ->franchise->franchise_name}}</td>
                                        <td>{{ $notifications->product->name }}</td>
                                        <td><img src="{{asset( 'uploads/product_image/' .$notifications->product->image  )}}" alt="" class="img-thumbnail " style="width:50px"></td>
                                        <td>{{ $notifications->amount }}</td>
                                        <td>{{ $notifications->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            <input class="checkToggle" data-id="{{$notifications->id}}" {{$notifications->status?"checked":""}} type="checkbox" data-onstyle="success" data-offstyle="danger" data-width="100" data-height="30">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-7">
                        <div class="d-flex justify-content-end">
                            {{$notifications_data->appends($queryParams)->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
    <script>
        $(function() {
        function update_status(id, status) {
            $.ajax(
                {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: "POST",
                    url: "/admin/edit_notification",
                    data: { 'id': id, 'status': status },
                   
                }
            )
        }

        function aprove_status(id) {
            update_status(id, 1)
        } 
        function deny_status(id) {
            update_status(id, 0);
        }

    
        
        $(document).ready(function(){
            $('.checkToggle').bootstrapToggle({
                on: 'Aproved',
                off: 'New!'
            });
            
            $('.checkToggle').change(function() {
                var id = $(this).data('id');
                var status = $(this).prop('checked')?1:0;
                update_status(id, status);
            })
        });
            
        
        })
    </script>
@endsection


