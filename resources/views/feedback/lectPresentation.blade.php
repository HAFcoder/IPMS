@extends('layouts.parentPublic')

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Presentation</h4>
            <ul class="breadcrumbs pull-left">

                @if(Auth::guard('lecturer')->user()->role == "coordinator")
                <li><a href="{{ url('/coordinator') }}">Home</a></li>
                @else
                <li><a href="{{ url('/lecturer') }}">Home</a></li>
                @endif
                <li><a >Feedback & Evaluation</a></li>
                <li><span>Presentation</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

<div class="row ">

    <div class="col-10 mt-5 mx-auto">
        <div class="card">
            <div class="card-body">

                <div class="text-center mb-5 mt-4">
                    <a href="#"><img style="height: 80px" src="{{ asset('assets/images/icon/kuptm_logo.png') }}" alt="logo"></a>
                    <h4>PRESENTATION EVALUATION REPORT</h4>
                </div>

                <div class="mb-5">
                    <p class="mb-0 pb-0"><strong>STUDENT DETAILS</strong></p>
                    <p class="mb-0 pb-0"><b>Name:</b> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;{{ $internship->studentInfo->f_name }} {{ $internship->studentInfo->l_name }}</p>
                    <p class="mb-0 pb-0"><b>Student ID:</b> &emsp;&emsp;&emsp;&emsp;{{ strtoupper($internship->studentInfo->studentID) }}</p>

                    @php
                        $prog = $programme->find($internship->studentInfo->programme_id)->first();
                    @endphp
                    
                    <p class="mb-0 pb-0"><b>Programme Code:</b> &emsp;{{ $prog->code }} - {{ $prog->name }}</p>
                    <p class="mb-0 pb-0"><b>NRIC:</b> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;{{ $internship->studentInfo->no_ic }}</p>
                </div>

                <div class="mb-5">
                    <p class="mb-0 pb-0"><strong>INTERNSHIP DETAILS</strong></p>
                    <p class="mb-0 pb-0"><b>Name:</b> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;{{ $internship->company->name }}</p>
                    <p class="mb-0 pb-0"><b>Address:</b> &emsp;&emsp;&emsp;&emsp;&emsp;{{ $internship->company->address }}, {{ $internship->company->postal_code }}, {{ $internship->company->city }}, {{ $internship->company->state }}</p>
                    <p class="mb-0 pb-0"><b>Internship date:</b> &emsp;&ensp;&nbsp;{{ $internship->start_date }} until {{ $internship->end_date }}</p>
                </div>

                <p><strong>INSTRUCTION</strong></p>
                <p>1.	This form is to be completed by Academic Supervisor.</p>
                <p>2.	Each presentation should last 10 to 15 minutes (inclusive of Question & Answer session).</p>
                <p>3.	Refer to Table 1 and Table 2 for marks distribution and marking criteria.</p>
                <p>4.	This report contributes 20% of the total marks.</p>  

                <p class="mt-4"><strong>Description of Marks Classification</strong></p>
                <img class="card-img-top img-fluid mx-auto" src="{{ asset('assets/images/media/table1.png') }}" alt="image">

                <div class="col-8 mt-3 mx-auto">
                    <div class="card">

                        <form action="{{ route('lecturer.presentation.update',$id) }}" method="post">
                            @method('POST') 
                            @csrf
                            <div class="card-body">

                                <h4 class="mb-2">Please fill in the forms</h4>

                                <div class="row">
                                    <input name="presentId" id="presentId" 
                                    @if ($yesno == 'yes')
                                        value="{{$presentMark->id}}"
                                    @else
                                        value="0"
                                    @endif
                                    style="display: none">
                                    <input name="internship_id" id="internship_id" value="{{$id}}" style="display: none">

                                    <div class="form-group col-6">
                                        <label for="example-number-input" class="col-form-label">Knowledge of the subject</label>
                                        <input required class="form-control" type="number" max="40" id="q1" name="q1"
                                        @if ($yesno == 'yes')
                                            value="{{$markArr[0]}}"
                                        @endif
                                        > /40
                                    </div>
                                    
                                    <div class="form-group col-6">
                                        <label for="example-number-input" class="col-form-label">Organisation, language and delivery</label>
                                        <input required class="form-control" type="number" max="20" id="q2" name="q2"
                                        @if ($yesno == 'yes')
                                            value="{{$markArr[1]}}"
                                        @endif
                                        > /20
                                    </div>

                                </div>
                                
                                <div class="row">

                                    <div class="form-group col-6">
                                        <label for="example-number-input" class="col-form-label">Critical/ Analytical / Creative skills</label>
                                        <input required class="form-control" type="number" max="20" id="q3" name="q3"
                                        @if ($yesno == 'yes')
                                            value="{{$markArr[2]}}"
                                        @endif
                                        > /20
                                    </div>
    
                                    <div class="form-group col-6">
                                        <label for="example-number-input" class="col-form-label">Question handling</label>
                                        <input required class="form-control" type="number" max="20" id="q4" name="q4"
                                        @if ($yesno == 'yes')
                                            value="{{$markArr[3]}}"
                                        @endif
                                        > /20
                                    </div>

                                </div>

                                <div class="form-group "> 
                                    <label for="example-text-input" class="col-form-label">Comments / Suggestions:</label> 
                                    <textarea class="form-control" name="comment" id="comment" rows="3">
                                        @if ($yesno == 'yes')
                                        {{ $presentMark->comment }}
                                        @endif
                                    </textarea> 
                                </div> 

                                <button type="submit" class="btn btn-rounded btn-primary btn-lg btn-block mt-5">Submit</button>
                                
                            </div>

                        </form>
                        
                    </div>
                </div>
                    
                </form>
            </div>
        </div>
    </div>

</div>

@endsection
