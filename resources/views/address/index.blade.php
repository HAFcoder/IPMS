@extends('layouts.parentAdmin')

@section('head')
    

@endsection

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Address</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/admin') }}">Home</a></li>
                <li><span>Address</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <div class="row">
        
        <!-- table start -->
        <div class="col-10 mt-5 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">List of Address</h4>
                    
                    <div class="table-responsive">
                        <table id="dataTableArea" class="table text-center">
                            <thead class="text-capitalize bg-primary text-white table-bordered">
                                <tr>
                                    <th>Address</th>
                                    <th>Postcode</th>
                                    <th>City</th>
                                    <th>State</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($address as $add)
                                <tr>
                                    <td>

                                        <a href="{{ route('address.edit',$add->id) }}" class="text-underline-hover">
                                            {{ $add->address }}
                                        </a>

                                    </td>
                                    <td>{{ $add->postcode }}</td>
                                    <td>{{ $add->city }}</td>
                                    <td>{{ $add->state }}</td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                        
                        <!-- Button trigger modal -->
                        <button hidden id="btnLoad" type="button" class="btn btn-primary btn-flat btn-lg mt-3" data-toggle="modal" data-target="#loadingModal">loading modal</button>
                        <!-- Modal -->
                        <div class="modal fade" id="loadingModal">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body text-center">
                                        <i class="fa fa-spinner fa-spin"></i> Please wait updating table...
                                    </div>
                                    <button hidden id="btnCloseLoad" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- table end -->

    </div>
    
@endsection

@section('scripts')

<script>
    $(document).ready(function() {
    });

</script>


@endsection