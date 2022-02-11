@extends('layouts.parentStudent')
{{-- register student session in studnet page --}}

@section('head')
    
    <style>
        tr.heading-background td{
            background-color: rgb(225, 159, 245);
        }
    </style>

@endsection

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Dashboard</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a >Session</a></li>
                <li><span>View Status</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <div class="row mt-5 mb-5">
        <div class="col-10 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-center">
                        <h4 class="header-title mb-0">Session Registration Status</h4>
                    </div>
                    <div class="market-status-table mt-4">
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead class="text-uppercase">
                                    <tr style="background-color: rgb(225, 159, 245)" class="heading-td">
                                        <th>Date</th>
                                        <th>Session ID</th>
                                        <th>Programmme</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if($sessions->isEmpty())
                                        <tr>
                                            <td colspan="10" class="bg-light">There is no data.</td>
                                        </tr>
                                    @endif

                                    @foreach ($sessions as $sess)
                                    <tr>
                                        <td>{{ $sess->created_at->format('d M Y') }}</td>
                                        <td>{{ $sess->session->session_code}}</td>
                                        <td>{{ $sess->programme->code}} - {{ $sess->programme->name}}</td>
                                        <td>
                                            @php
                                                if ($sess->status == 'reject') {
                                                    $style = 'badge-danger';
                                                    $status = 'Rejected';
                                                } elseif ($sess->status == 'approve') {
                                                    $style = 'badge-success';
                                                    $status = 'Approved';
                                                } else {
                                                    $style = 'badge-warning';
                                                    $status = 'Pending';
                                                }
                                            @endphp
                                            <p class="h5"><span
                                                    class="badge badge-pill {{ $style }}">{{ $status }}</span>
                                            </p>
                                        </td>
                                        <td>
                                            @if($sess->status == 'approve')
                                            <a href="{{url('/internfile')}}" class="btn btn-primary btn-sm">View Document</a>
                                            @endif
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
    </div>
    
@endsection

@section('scripts')


    
@endsection

