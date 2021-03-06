@extends('layouts.parentLecturer')

@section('head')

<link rel="stylesheet" href="{{ asset('assets/dw/select2.min.css') }}">

@endsection

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Company</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/admin') }}">Home</a></li>
                <li><span>Edit Company</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <div class="row">

        <div class="col-8 mt-5 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Edit Company</h4>
                    <form method="post" action="{{ route('company.update',$company->id) }}">
                        @method('PUT') 
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
                            <input class="form-control" type="text" name="name" placeholder="Enter company name" required value="{{ $company->name }}">
                        </div>
                        
                        <div class="form-group">
                            <label class="col-form-label">Contact Number</label>
                            <input class="form-control" type="text" name="phoneNumber" placeholder="Enter company contact number." required value="{{ $company->phoneNumber }}">
                        </div>
                        
                        <div class="form-group">
                            <label class="col-form-label">Company Email</label>
                            <input class="form-control" type="text" name="email" placeholder="Enter company email." required value="{{ $company->email }}">
                        </div>

                        <div class="form-group">
                            <label for="example-search-input" class="col-form-label">Address</label>
                            <textarea name="address" rows="5" placeholder="Enter company address" class="form-control" required>{{ $company->address }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Postal Code</label>
                            <div id="postal_area">
                                <select id="postalcode" onchange="getcity()" class="custom-select" name="postal_code">
                                    <option disabled selected value>Select Postal Code</option>
                                    @foreach($postcode as $key => $ps)
                                        <option @if($ps->postcode==$company->postal_code) selected  @endif value="{{ $ps->postcode }}">{{ $ps->postcode }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-form-label">City</label>

                            <div id="city_area">
                                <select id="city" class="custom-select" name="city">
                                    <option disabled selected value>Select City</option>
                                    @foreach($city as $key => $ct)
                                        <option @if($ct->city==$company->city) selected  @endif value="{{ $ct->city }}">{{ $ct->city }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">State</label>

                            <select id="state" class="custom-select" name="state">
                                <option disabled selected value>Select State</option>
                                @foreach($state as $key => $st)
                                    <option @if($st->state==$company->state) selected  @endif value="{{ $st->state }}">{{ $st->state }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Website Company <i>(Optional)</i></label>
                            <input class="form-control" type="text" name="webURL" placeholder="Enter company website." required value="{{ $company->webURL }}">
                        </div>

                        
                        <div class="form-group">
                            <label class="col-form-label">Status</label>

                            <select class="custom-select form-control" name="status">
                                <option @if($company->status=="") selected @endif value="">Select status</option>
                                <option @if($company->status=="approved") selected @endif value="approved">Approved</option>
                                <option @if($company->status=="pending") selected @endif value="pending">Pending</option>
                            </select>
                        </div>

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

    });

    function getpostal(){

        var city = $('#city').val();
        $('#btnLoad').click();

        $.ajax({
            url:'{{ route("getpostal") }}',
            type: 'GET',
            data: {
                city : city
            },
            success: function (data){
            
                //console.log(data);
                $('#btnCloseLoad').click();

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
        $('#btnLoad').click();
        $( "#city_area" ).load(window.location.href + " #city_area" );
        console.log("postalcode "+postalcode);

        $.ajax({
            url:'{{ route("getcity") }}',
            type: 'GET',
            data: {
                postalcode : postalcode
            },
            success: function (data){
            
                $('#btnCloseLoad').click();
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
                alert(x+e);
            }
        
        
        });


    }

    </script>


@endsection