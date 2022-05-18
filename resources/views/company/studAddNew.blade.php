@extends('layouts.parentStudent')

@section('meta')
    <meta name="csrf-token" content="content">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('head')

<script type="text/javascript" src="{{ asset('assets/dw/jquery-1.9.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/dw/inputmask.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/dw/inputmask.extensions.min.js') }}"></script>
<script type="text/javascript">
    $(function () {
        var inputmask = new Inputmask("######-##-####");
        inputmask.mask($('[id*=no_ic]'));
    });
</script>

@endsection

@section('breadcrumbs')
    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Company</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/company-all') }}">Company</a></li>
                <li><span>Add New</span></li>
            </ul>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">

        <div class="col-8 mt-5 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-0">Register New Company</h4>
                    <small class="text-muted font-12">If you have registered a company but it did not appear in the list, please contact your coordinator.</small>

                    <form method="POST" action="{{ route('company.create.student') }}" class="mt-3">
                        @csrf

                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Company Name</label>
                            <input class="form-control" type="text" name="name" placeholder="Enter company name" required value="{{ old('name') }}">
                        </div>
                        
                        <div class="form-group">
                            <label class="col-form-label">Contact Number</label>
                            <input class="form-control" type="text" name="phoneNumber" placeholder="Enter company contact number." required value="{{ old('phoneNumber') }}">
                        </div>
                        
                        <div class="form-group">
                            <label class="col-form-label">Company Email</label>
                            <input class="form-control" type="text" name="email" placeholder="Enter company email." required value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <label for="example-search-input" class="col-form-label">Address</label>
                            <textarea name="address" rows="5" placeholder="Enter company address" class="form-control" required>{{ old('address') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Postcode</label>
                            <input  class="form-control" type="text" id="postalcode" pattern="\d{5}" name="postal_code" value="{{ old('postcode') }}"
                                onkeypress="validate(event)" required autocomplete="postcode" maxlength="5">
                            <div class="text-danger"></div>
                        </div>

                        <div class="form-group">
                            <label for="state">State</label>
                            <select id="state" class="custom-select " name="state" required>
                                <option disabled selected value>Select State</option>
                                @foreach ($state as $data)
                                    <option value="{{ $data->state }}">{{ $data->state }}</option>
                                @endforeach
                            </select>
                        </div>
        
                        <div class="form-group">
                            <label for="city">City</label>
                            <select id="city" class="custom-select " name="city" disabled required>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-form-label">Website Company <i>(Optional)</i></label>
                            <input class="form-control" type="text" name="webURL" placeholder="Enter company website." value="{{ old('webURL') }}">
                        </div>

                        <input name="status" id="status" value="pending" class="d-none">

                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- loader -->
        <button hidden id="btnLoad" type="button" class="btn btn-primary btn-flat btn-lg mt-3"
        data-toggle="modal" data-target="#loadingModal">loading modal</button>
        <div class="modal fade" id="loadingModal" data-backdrop="static" data-keyboard="false" >
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content text-center">
                    <div class="modal-body">
                        <img src="{{ asset('assets/images/media/loader5.gif') }}" >
                        <h1><small class="text-muted ">Loading ...</small></h1>
                        <button hidden id="btnCloseLoad" type="button" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- loader -->

    </div>
    
@endsection



@section('scripts')

<script>
    $(document).ready(function() {
        $('#state').on('change', function() {
            var state = this.value;
            $("#city").html('');

            $('#btnLoad').click();

            $.ajax({
                url: "{{ url('api/fetch-cities/form') }}",
                type: "POST",
                data: {
                    state: state,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(res) {
                    $('#btnCloseLoad').click();
                    $('#city').prop('disabled', false);
                    $('#city').html('<option value="">Select City</option>');
                    $.each(res.city, function(key, value) {
                        $("#city").append('<option value="' + value
                            .city + '">' + value.city + '</option>');
                    });
                }
            });
        });
    });
</script>

@endsection
