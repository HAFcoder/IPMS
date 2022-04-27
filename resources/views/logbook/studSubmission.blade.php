@extends('layouts.parentStudent')

@section('head')

<link rel="stylesheet" href="{{ asset('assets/dw/select2.min.css') }}">

<style>
    th {
        background-color: rgba(0, 0, 0, .075);
    }
</style>

@endsection



@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Submission</h4>
        </div>
    </div>

@endsection

<!-- access model class inside blade -->
@inject('programme', 'App\Models\Programme')

@section('content')

    <div class="row">

        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Submission Details</h4>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="log-tab" data-toggle="tab" href="#log" role="tab" aria-controls="log" aria-selected="true">Logbook</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="report-tab" data-toggle="tab" href="#report" role="tab" aria-controls="report" aria-selected="false">Report</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-3" id="myTabContent">

                        <div class="tab-pane fade show active" id="log" role="tabpanel" aria-labelledby="log-tab">
                            <p><b>Internship Logbook</b></p>
                            <p class="mt-3">
                                <a href="{{url('/logbook')}}" class="btn btn-info btn-sm">View My Logbook</a>
                            </p>

                        </div>

                        <div class="tab-pane fade" id="report" role="tabpanel" aria-labelledby="report-tab">
                            <p><b>Internship Report</b></p>

                            <form method="post" action="{{ route('internship.update.reportlink',$internship->id) }}" enctype="multipart/form-data">
                                @method('PUT') 
                                @csrf
                                
                                <div class="form-group">
                                    <label for="example-date-input" class="col-form-label">Enter document link</label>
                                    <input class="form-control" type="text" name="report" placeholder="Enter report link." 
                                    @if(!empty($internship->report_link)) value="{{$internship->report_link}}" @endif required>
                                </div>
                                
                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Update</button>


                            </form>

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

    <script src="{{ asset('assets/dw/select2.min.js') }}"></script>
    
    <script>
        $(document).ready(function() {
            //alert('oii');
            $('.custom-select').select2();
    
        });
    </script>





@endsection
