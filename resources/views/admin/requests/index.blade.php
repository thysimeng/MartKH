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
                                <h3 class="mb-0">Ads</h3>
                            </div>
                            <form class="col-4">
                                    <div class="form-group mb-2 mt-2">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Search" type="text">
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
                                    <th scope="col">{{ __('Status') }}</th>
                                    <th scope="col">{{ __('Created Date') }}</th>
                                    <th scope="col">{{ __('Updated Date') }}</th>
                                    <th scope="col">{{ __('Action') }}</th>
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
                                        <td>
                                            <button class="btn @if($notifications->status) btn-success @else btn-danger @endif btn-sm" style="border-radius: 50%; width: 20px; height: 20px;"></button>
                                        </td>
                                        <td>{{ $notifications->created_at }}</td>
                                        <td>{{ $notifications->updated_at }}</td>
                                        <td>
                                                <div data-id="{{$notifications->id}}">
                                                    @if($notifications->status) 
                                                        <button onclick="deny_status({{$notifications->id}})" class="btn btn-danger btn-sm">{{__('Deny')}}</button>
                                                    @else
                                                        <button onclick="aprove_status({{$notifications->id}})" class="btn btn-success btn-sm">{{__('Aprove')}}</button>
                                                    @endif
                                                </div>
                                            {{-- <input type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled"> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
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

    </script>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script>
        $(function() {
          $('#toggle-two').bootstrapToggle({
            on: 'Enabled',
            off: 'Disabled'
          });
        })
    </script>
@endsection


