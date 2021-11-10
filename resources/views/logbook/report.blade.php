@extends('layouts.parentStudent')

@section('head')
    

@endsection

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Internship</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><span>Report</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

<div class="row">

    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">INDUSTRIAL TRAINING REPORT - {{ strtoupper(Auth::user()->student_info->f_name) }} {{ strtoupper(Auth::user()->student_info->l_name) }}</h4>
                <div id="accordion5" class="according accordion-s2 gradiant-bg">

                    <div class="card">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#accordion1">Company Profile</a>
                        </div>
                        <div id="accordion1" class="collapse show" data-parent="#accordion5">
                            <div class="card-body">
                                
                                <div class="col-lg-12 mt-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="true">Company Profile</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="pills-vision-tab" data-toggle="pill" href="#pills-vision" role="tab" aria-controls="pills-vision" aria-selected="false">Company's Vision</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="pills-core-tab" data-toggle="pill" href="#pills-core" role="tab" aria-controls="pills-core" aria-selected="false">Company's Core Business & Subsidiaries</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="pills-chart-tab" data-toggle="pill" href="#pills-chart" role="tab" aria-controls="pills-chart" aria-selected="false">Organization's Chart</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                    {{-- if else database empty --}}
                                                    <div class="text-center">
                                                        <p>There is no data.</p>
                                                        <a href="#" type="button" class="btn btn-success btn-md mb-3 mt-3"><span class="ti-plus"></span> Add Details</a>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="pills-vision" role="tabpanel" aria-labelledby="pills-vision-tab">
                                                    {{-- if else database empty --}}
                                                    <div class="text-center">
                                                        <p>There is no data.</p>
                                                        <a href="#" type="button" class="btn btn-success btn-md mb-3 mt-3"><span class="ti-plus"></span> Add Details</a>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="pills-core" role="tabpanel" aria-labelledby="pills-core-tab">
                                                    {{-- if else database empty --}}
                                                    <div class="text-center">
                                                        <p>There is no data.</p>
                                                        <a href="#" type="button" class="btn btn-success btn-md mb-3 mt-3"><span class="ti-plus"></span> Add Details</a>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="pills-chart" role="tabpanel" aria-labelledby="pills-chart-tab">
                                                    {{-- if else database empty --}}
                                                    <div class="text-center">
                                                        <p>There is no data.</p>
                                                        <a href="#" type="button" class="btn btn-success btn-md mb-3 mt-3"><span class="ti-plus"></span> Add Details</a>
                                                    </div>                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href="#accordion2">List of Assignments</a>
                        </div>
                        <div id="accordion2" class="collapse" data-parent="#accordion5">
                            <div class="card-body">
                                {{-- if else database empty --}}
                                <div class="text-center">
                                    <p>There is no data.</p>
                                    <a href="#" type="button" class="btn btn-success btn-md mb-3 mt-3"><span class="ti-plus"></span> Add Details</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href="#accordion3">Work Experience & Challenge Faced</a>
                        </div>
                        <div id="accordion3" class="collapse" data-parent="#accordion5">
                            <div class="card-body">
                                {{-- if else database empty --}}
                                <div class="text-center">
                                    <p>There is no data.</p>
                                    <a href="#" type="button" class="btn btn-success btn-md mb-3 mt-3"><span class="ti-plus"></span> Add Details</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href="#accordion4">Conclusion & Recommendation</a>
                        </div>
                        <div id="accordion4" class="collapse" data-parent="#accordion5">
                            <div class="card-body">
                                {{-- if else database empty --}}
                                <div class="text-center">
                                    <p>There is no data.</p>
                                    <a href="#" type="button" class="btn btn-success btn-md mb-3 mt-3"><span class="ti-plus"></span> Add Details</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href="#accordion55">Appendices</a>
                        </div>
                        <div id="accordion55" class="collapse" data-parent="#accordion5">
                            <div class="card-body">
                                {{-- if else database empty --}}
                                <div class="text-center">
                                    <p>There is no data.</p>
                                    <a href="#" type="button" class="btn btn-success btn-md mb-3 mt-3"><span class="ti-plus"></span> Add Details</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
</div>

@endsection

@section('scripts')

    
@endsection

