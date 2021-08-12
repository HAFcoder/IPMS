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
                        <table class="table table-bordered">
                            <thead class="text-uppercase bg-primary text-white">
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