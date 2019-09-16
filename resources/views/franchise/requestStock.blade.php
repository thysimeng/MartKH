@extends('layouts.app', ['title' => __('Request Stock')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
    <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Request Stock') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('franchise.stock') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('franchise.requestStock') }}" autocomplete="off">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">{{ __('Request Form') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('product_name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input_product_name">{{ __('Product Name') }}</label>
                                    <input type="text" class="typeahead form-control form-control-alternative{{ $errors->has('product_name') ? ' is-invalid' : '' }}" name="product_name" id="input_product_name" placeholder="{{ __('Search Products') }}" value="{{ old('product_name') }}" required autocomplete="off">
                                    @if ($errors->has('product_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('product_name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('amount') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-amount">{{ __('Amount') }}</label>
                                    <input type="number" name="amount" id="input-amount" class="form-control form-control-alternative{{ $errors->has('amount') ? ' is-invalid' : '' }}" placeholder="{{ __('Amount') }}" value="{{ old('amount') }}" required>

                                    @if ($errors->has('amount'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('amount') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <input type="hidden" name="franchise_id" value="{{$current_franchise->id}}">

                                <!-- <div class="form-group{{ $errors->has('amount') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-amount">{{ __('Amount') }}</label>
                                    <input type="text" name="amount" id="input-amount" class="form-control form-control-alternative{{ $errors->has('amount') ? ' is-invalid' : '' }}" placeholder="{{ __('Amount') }}" value="{{ old('amount') }}" required>

                                    @if ($errors->has('amount'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('amount') }}</strong>
                                        </span>
                                    @endif
                                </div> -->

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Send') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>  
    <script type="text/javascript">
        var pathstock = "{{ route('franchise.stock.autocomplete') }}";
        $stockInput = $('input[name="product_name"]');
        $stockInput.typeahead({
            source:  function (query, process) {
            return $.get(pathstock, { query: query }, function (data) {
                    return process(data);
                });
            }
        });
        
        // $stockInput.change(function() {
        //     var current = $stockInput.typeahead("getActive");
        //     if (current) {
        //         $('input[name="product_id"]').val(current.id);
        //     }
        
        // });
    </script>

@endsection