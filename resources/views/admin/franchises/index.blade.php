@extends('layouts.app', ['title' => __('Franchise Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                                    <div class="col-4">
                                        <h3 class="mb-0">Franchise</h3>
                                    </div>
                                    <form class="col-4" id="search-franchises" method="get" action="{{ route('franchises.search') }}">
                                            <div class="form-group mb-2 mt-2">
                                                <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                                    </div>
                                                    <input class="form-control" placeholder="Search" type="search" name="search">
                                                </div>
                                            </div>
                                    </form>
                                    <div class="col-4 text-right">
                                            <a href="{{ route('franchises.create') }}" class="btn btn-sm btn-primary">{{ __('Add Franchise') }}</a>
                                    </div>

                        </div>
                    </div>

                    <!-- Success Message -->
                    <!-- <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div> -->

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Franchise ID') }}</th>
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Address') }}</th>
                                    <th scope="col">{{ __('Linked Account') }}</th>
                                    <th scope="col">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($franchises as $franchise)
                                    <tr>
                                        <td>{{ $franchise->id }}</td>
                                        <td>{{ $franchise->franchise_name }}</td>
                                        <td>{{ $franchise->address }}</td>
                                        <!-- <td>{{ Carbon\Carbon::parse($franchise->created_at)->format('d/m/Y H:i') }}</td> -->
                                        <td>
                                        @foreach ($linkUsers as $linkUser )
                                            @if($franchise->id == $linkUser->franchise_id)
                                                {{ $linkUser->email }}
                                            @endif
                                        @endforeach
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    {{-- delete fucntion --}}
                                                        @if(isset($franchise->id))
                                                        <form method="post" action="{{ route('franchises.destroy', $franchise->id) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <a class="dropdown-item" href="{{ route('franchises.edit', $franchise->id) }}">{{ __('Edit') }}</a>
                                                            <!-- <a class="dropdown-item" href="">{{ __('Edit') }}</a> -->
                                                            <button type="button" class="dropdown-item delete-btn">
                                                                {{ __('Delete') }}
                                                            </button>
                                                            <button type="button" class="dropdown-item" data-toggle="modal" data-target="#linkAccount" id="linkAccountBtn" data-id="{{ $franchise->id }}">{{ __('Link Account') }}</button>
                                                        </form>
                                                        @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                <!-- <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td colspan="5">{{$franchises->links()}}</td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $franchises->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>

    <script type="test/javascript">
        document.getElementById('search-franchises').submit();
    </script>
    <script type="text/javascript">
        $('.delete-btn').click(function(e){
            e.preventDefault();
            Swal.fire({
                title: 'Warning',
                text: "Are you sure you want to delete this franchise?",
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
            $(function() {
                $('#linkAccount').on("show.bs.modal", function (e) {
                    $("#franchiseID").html($(e.relatedTarget).data('id'));
                    var $data = document.getElementById('franchiseID').textContent;
                    $('#franchiseID').attr('value',$data);
                });
            });
        });
    </script>

    <form class="form-horizontal" action="{{ route('franchises.linkAccount') }}" method="POST">
        @csrf
        <div class="modal fade" id="linkAccount" tabindex="-1" role="dialog" aria-labelledby="linkAccount" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="linkAccount">Link Franchise Account with this Franchise</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" value="" name="franchise_id" id="franchiseID">
                    <select class="form-control" name="user_id" id="">
                        @foreach ($users as $row)
                            @if ($row->role == 'franchise')
                                <option value="{{ $row->id }}">{{ __($row->name) }} | {{ __($row->email) }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Link</button>
                </div>
                </div>
            </div>
        </div>
    </form>

@endsection