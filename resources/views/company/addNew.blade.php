@extends('layouts.parentLecturer')

@section('head')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Company</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/admin') }}">Home</a></li>
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
                    <form method="post" action='{{ route("company.storeLecturer") }}'>
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
                            <label for="example-text-input" class="col-form-label">Name</label>
                            <input class="form-control" type="text" name="name" placeholder="Enter company name" required value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <label for="example-search-input" class="col-form-label">Address</label>
                            <textarea name="address" rows="5" placeholder="Enter company address" class="form-control" required>{{ old('address') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Postal Code</label>
                            <div id="postal_area">
                                <select id="postalcode" onchange="getcity()" class="custom-select" name="postal_code">
                                    <option selected="selected">Select Postal Code</option>
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
                                <option selected="selected">Select State</option>
                                @foreach($state as $key => $st)
                                    <option value="{{ $st->state }}">{{ $st->state }}</option>
                                @endforeach

                            </select>
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
                    </form>
                </div>
            </div>
        </div>

    </div>
    
@endsection



@section('scripts')


    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>

    $(document).ready(function() {
        //alert('oii');
        $('.custom-select').select2();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
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

    </script>


@endsection
