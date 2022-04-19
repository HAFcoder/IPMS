@extends('layouts.parentLecturer')

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
            <h4 class="page-title pull-left">Internship</h4>
            <ul class="breadcrumbs pull-left">
                @if (Auth::guard('lecturer')->user()->role == 'coordinator')
                    <li><a href="{{ url('/coordinator') }}">Home</a></li>
                @else
                    <li><a href="{{ url('/lecturer') }}">Home</a></li>
                @endif
                <li><a href="{{ route('internship.status-all') }}">Internship</a></li>
                <li><span>View Details</span></li>
            </ul>
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
                    <h4 class="header-title">Internship Details</h4>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Academic Supervisor</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="document-tab" data-toggle="tab" href="#document" role="tab" aria-controls="document" aria-selected="false">Related Document</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-3" id="myTabContent">

                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <p><b>Details of Internship</b></p>
                            
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Session Code</th>
                                            <td>{{ $internship->session->session_code }}</td>
                                        </tr>
                                        <tr>
                                            <th>Student ID</th>
                                            <td>{{ $internship->studentInfo->studentID }}</td>
                                        </tr>
                                        <tr>
                                            <th>Student Name</th>
                                            <td>{{ $internship->studentInfo->f_name }} {{ $internship->studentInfo->l_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Student Programme</th>
                                            <td>
                                                @php
                                                    $prog = $programme->find($internship->studSession->programme_id)->first();
                                                @endphp
                                                {{ $prog->code }} - {{ $prog->name }} 
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Duration</th>
                                            <td>{{ date('d/m/Y', strtotime($internship->start_date)) }} - {{ date('d/m/Y', strtotime($internship->end_date)) }}</td>
                                        </tr>
                                        <tr>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <p><b>Assign Academic Supervisor</b></p>

                            <form method="post" action="{{ route('internship.assign-lecturer',$internship->id) }}">
                                @method('PUT') 
                                @csrf
                            
                                <div class="form-group">
                                    <label class="col-form-label">Available Lecturer</label>

                                    @php
                                        
                                        if(!empty($internship->lecturer) || $internship->lecturer != null){
                                            $lectid = $internship->lecturer->id;
                                        }else{
                                            $lectid = 0;
                                        }


                                    @endphp

                                    <select style="width: 50%" id="lecturer" class="form-control custom-select" name="lecturer">
                                        <option selected="selected">Select One</option>
                                        @foreach($lecturers as $key => $lect)
                                            <option @if($lectid == $lect->id) selected @endif value="{{ $lect->id }}">{{ $lect->lecturerInfo->lecturerID }} - {{ $lect->lecturerInfo->f_name }} {{ $lect->lecturerInfo->l_name }}</option>
                                        @endforeach
                                    
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Update Supervisor</button>
                            </form>

                        </div>

                        <div class="tab-pane fade" id="document" role="tabpanel" aria-labelledby="document-tab">
                            <p><b>List of Related Document</b></p>
                            
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Document Name</th>
                                            <th>View Document</th>
                                        </tr>
                                        <tr>
                                            <td>Organisation Reply Form (ORF)</td>
                                            <td>
                                                @if(empty($orf_doc) || $orf_doc == null)

                                                <span class="badge badge-pill badge-secondary">Not upload yet.</span>

                                                @else

                                                <a target="_blank" href="{{ url($orf_doc) }}">Download Document</a>

                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Report Duty Notification (RDN)</td>
                                            <td>
                                                @if(empty($rdn_doc) || $rdn_doc == null)

                                                <span class="badge badge-pill badge-secondary">Not upload yet.</span>

                                                @else

                                                <a target="_blank" href="{{ url($rdn_doc) }}">Download Document</a>

                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

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
