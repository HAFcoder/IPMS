@extends('layouts.parentAdmin')

@section('head')

<style>
    th{
        background-color:rgba(0,0,0,.075);
    }
</style>

@endsection



@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Form Feedback</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/sadmin') }}">Home</a></li>
                <li><span>Create</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <div class="row">

        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Form Feedback</h4>
                    <br>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="company-tab" data-toggle="tab" href="#company" role="tab" aria-controls="company" aria-selected="true">Company</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="student-tab" data-toggle="tab" href="#student" role="tab" aria-controls="student" aria-selected="false">Student</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-3" id="myTabContent">

                        <div class="tab-pane fade show active" id="company" role="tabpanel" aria-labelledby="company-tab">
                            <p><center><b>Question for Company</b></center></p>
                            <br>

                        </div>

                        <div class="tab-pane fade" id="student" role="tabpanel" aria-labelledby="student-tab">
                            <p><center><b>Question for Student</b></center></p>
                            <br>
                            

                        </div>

                        
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

    </div>



    
@endsection

@section('scripts')





@endsection
