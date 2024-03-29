@extends('layouts.parentLecturer')

@section('head')

<link rel="stylesheet" href="{{ asset('assets/dw/select2.min.css') }}">

@endsection

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Company</h4>
            <ul class="breadcrumbs pull-left">

                @if (Auth::guard('lecturer')->user()->role == 'coordinator')
                    <li><a href="{{ url('/coordinator') }}">Home</a></li>
                @else
                    <li><a href="{{ url('/lecturer') }}">Home</a></li>
                @endif
                <li><span>Add New Company</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <div class="row">

        <div class="col-8 mt-5 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Register New Company</h4>
                    <form method="POST" action="{{ url('/coordinator/company/add') }}">
                        @csrf
                        
                        @if ($errors->any())
                        <div class="form-group">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                        
                        @if (session()->has('success'))
                        <div class="form-group">
                            <div class="alert alert-success">
                                <ul>
                                    <li>{{ session()->get('success') }}</li>
                                </ul>
                            </div>
                        </div>
                        @endif

                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Company Name</label>
                            <input id="companyName" class="form-control" type="text" name="name" placeholder="Enter company name" required value="{{ old('name') }}">
                            <a onclick="checkCompanyName()" class="btn-dark btn btn-sm text-white">Check Company</a>
                            <div id="resultCheckCompanyName"></div>
                        </div>
                        
                        <div id="companyDetailForm">
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
                                <label class="col-form-label">Postal Code</label>
                                <div id="postal_area">
                                    <select id="postalcode" onchange="getcity()" class="custom-select" name="postal_code">
                                        <option disabled selected value>Select Postal Code</option>
                                        @foreach($postcode as $key => $ps)
                                            <option value="{{ $ps->postcode }}">{{ $ps->postcode }}</option>
                                        @endforeach

                                    </select>
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-form-label">City</label>

                                <div id="city_area">
                                    <select id="city" class="custom-select" name="city">
                                        <option selected="selected">Select City</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">State</label>

                                <select id="state" class="custom-select" name="state">
                                    <option disabled selected value>Select State</option>
                                    @foreach($state as $key => $st)
                                        <option value="{{ $st->state }}">{{ $st->state }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Website Company <i>(Optional)</i></label>
                                <input class="form-control" type="text" name="webURL" placeholder="Enter company website." value="{{ old('webURL') }}">
                            </div>


                            <div class="form-group">
                                <label class="col-form-label">Status</label>

                                <select class="custom-select form-control" name="status">
                                    <option value="">Select status</option>
                                    <option value="approved">Approved</option>
                                    <option selected value="pending">Pending</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    
@endsection



@section('scripts')

    <script src="{{ asset('assets/dw/select2.min.js') }}"></script>

    <script>

    $(document).ready(function() {
        //alert('oii');
        $('.custom-select').select2();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });      

        $('#companyDetailForm').hide();

        $('#companyName').on('change', function() {
            checkCompanyName();
        });


    });

    function getpostal(){

        var city = $('#city').val();

        $.ajax({
            url:'{{ route("getpostal") }}',
            type: 'GET',
            data: {
                city : city
            },
            success: function (data){
            
                //console.log(data);

                var slc = '<select id="postalcode" class="custom-select" name="postal_code">';
                slc += '<option selected="selected">Select Postal Code</option>';

                $.each( data, function( key, value ) {
                    console.log( value.postcode );
                    slc += '<option value="'+value.postcode+'">'+value.postcode+'</option>';
                });

                slc += '</select>';
                $('#postal_area').html(slc);

                $('#state').val(data[0].state).change();
            
            },
            error: function(x,e){
                alert(x+e);
            }
        
        
        });

    }

    
    function getcity(){

        var postalcode = $('#postalcode').val();
        $( "#city_area" ).load(window.location.href + " #city_area" );
        console.log("postalcode "+postalcode);

        $.ajax({
            url:'{{ route("getcity") }}',
            type: 'GET',
            data: {
                postalcode : postalcode
            },
            success: function (data){
            
                console.log(data);

                var slc = '<select id="city" class="custom-select" name="city">';
                slc += '<option selected="selected">Select City</option>';

                $.each( data, function( key, value ) {
                    console.log( value.city );
                    slc += '<option value="'+value.city+'">'+value.city+'</option>';
                });

                slc += '</select>';
                $('#city_area').html(slc);

                $('#state').val(data[0].state).change();
            
            },
            error: function(x,e){
                alert(x.responseText);
            }
        
        
        });


    }
    
    function checkCompanyName(){

        var companyName = $('#companyName').val();
        console.log(companyName);
        $('#companyDetailForm').hide();
        $('#btnLoad').click();
        if(companyName){
            console.log("ada");
        
            $.ajax({
                url: "{{ route('company.checkName') }}",
                type: "POST",
                data: {
                    companyName: companyName,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(res) {
                    $('#btnCloseLoad').click();
                    console.log(res.company.length);
                    compExist = res.company.length;
                
                    if(compExist > 0){
                        console.log("company exist");
                        $('#resultCheckCompanyName').html('<span class="alert alert-danger">Company data already exist. Please refer list of company.</span>');
                    }else{
                        console.log("no company data yet");
                        $('#companyDetailForm').show();
                        $('#resultCheckCompanyName').html('<span class="alert alert-success">Company data does not exist. Fill in the details to proceed with the request.</span>');
                    }
                
                }
            });
        
        }

    }


    </script>


@endsection
