@extends('layouts.parentStudent')

@section('head')

<link rel="stylesheet" href="{{ asset('assets/dw/select2.min.css') }}">

@endsection

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Company</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/company-all') }}">Company</a></li>
                <li><a href="{{ url('/apply-list') }}">List</a></li>
                <li><span>Accept Form</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <div class="row">

        <div class="col-8 mt-5 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Internship Information Form</h4>
                    <hr/>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Company Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="orf-tab" data-toggle="tab" href="#orf" role="tab" aria-controls="orf" aria-selected="false">Organisation Reply Form (ORF)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="rdn-tab" data-toggle="tab" href="#rdn" role="tab" aria-controls="rdn" aria-selected="false">Report Duty Notification (RDN)</a>
                        </li>
                    </ul>
                    
                    <div class="tab-content mt-3" id="myTabContent">
                        
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <p><b>Company Details</b></p>

                            <div class="col-12">
                                <label class="col-form-label"><b>Name :</b> </label>
                                <label class="col-form-label">{{ $internship->company->name }}</label>
                            </div>
    
                            <div class="col-12">
                                <label class="col-form-label"><b>Contact Number :</b> </label>
                                <label class="col-form-label">{{ $internship->company->phoneNumber }}</label>
                            </div>
    
                            <div class="col-12">
                                <label class="col-form-label"><b>Company Email :</b> </label>
                                <label class="col-form-label">{{ $internship->company->email }}</label>
                            </div>
    
                            <div class="col-12">
                                <label class="col-form-label"><b>Address :</b> </label>
                                <label class="col-form-label">
                                    {{ $internship->company->address }}, {{ $internship->company->postal_code }}, {{ $internship->company->city }}, {{ $internship->company->state }}
                                </label>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="orf" role="tabpanel" aria-labelledby="orf-tab">
                            <p><b>ORF Details Form</b></p>
                            
                            <form method="post" action="{{ route('internship.update.orf',$internship->id) }}" enctype="multipart/form-data">
                                @method('PUT') 
                                @csrf
                                
                                <input class="d-display-none" hidden name='orf_id'
                                @if (!empty($internship->orfForm))
                                value='{{ $internship->orfForm->id }}'
                                @else
                                value='0'
                                @endif
                                >
                                
                                <div class="form-group">
                                    <label for="example-date-input" class="col-form-label">Start Training Date</label>
                                    <input class="form-control" type="date" name="start_training" placeholder="Select start training date." required 
                                    @if(!empty($internship->orfForm)) value="{{ $internship->orfForm->start_training }}" @endif>
                                </div>
                                
                                <div class="form-group">
                                    <label for="example-date-input" class="col-form-label">End Training Date</label>
                                    <input class="form-control" type="date" name="end_training" placeholder="Select end training date." required 
                                    @if(!empty($internship->orfForm)) value="{{ $internship->orfForm->end_training }}" @endif>
                                </div>

                                <div class="form-group">
                                    <label for="example-date-input" class="col-form-label">Name of Department</label>
                                    <input class="form-control" type="text" name="department" placeholder="Enter department." required 
                                    @if(!empty($internship->orfForm)) value="{{ $internship->orfForm->department }}" @endif>
                                </div>
                                
                                <div class="form-group">
                                    <label for="example-date-input" class="col-form-label">Availability of Allowance / Amount (RM)</label>
                                    <input class="form-control" type="text" name="allowance" placeholder="Enter amount of allowance." required value="{{ $internship->allowance }}">
                                </div>

                                <div class="form-group">
                                    <label for="example-date-input" class="col-form-label">Name of Organisation Representative</label>
                                    <input class="form-control" type="text" name="represent_name" placeholder="Enter name." required 
                                    @if(!empty($internship->orfForm)) value="{{ $internship->orfForm->represent_name }}" @endif>
                                </div>

                                <div class="form-group">
                                    <label for="example-date-input" class="col-form-label">Position of Organisation Representative</label>
                                    <input class="form-control" type="text" name="represent_position" placeholder="Enter position." required 
                                    @if(!empty($internship->orfForm)) value="{{ $internship->orfForm->represent_position }}" @endif>
                                </div>

                                <div class="form-group">
                                    <label for="example-date-input" class="col-form-label">Telephone No.</label>
                                    <input class="form-control" type="text" name="contact" placeholder="Enter phone number." required 
                                    @if(!empty($internship->orfForm)) value="{{ $internship->orfForm->contact }}" @endif>
                                </div>

                                <div class="form-group">
                                    <label for="example-date-input" class="col-form-label">Email Address</label>
                                    <input class="form-control" type="text" name="email" placeholder="Enter email." required 
                                    @if(!empty($internship->orfForm)) value="{{ $internship->orfForm->email }}" @endif>
                                </div>

                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">Document Upload</label>
                                    <input class="form-control" type="file" name="filename" placeholder="Select ORF file" 
                                    @if(empty($internship->orfForm)) required @endif>
                                    
                                    @if( !empty($orf_doc) || $orf_doc != null)
                                    
                                    <br/>
                                    <a class="col-form-label" target="_blank" href="{{ url($orf_doc) }}">Download Uploaded Document</a>
        
                                    @endif
        
                                </div>
                                <input class="d-display-none" hidden name='status' value='accepted'>
                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit ORF</button>


                            </form>
                            
                        </div>

                        <div class="tab-pane fade" id="rdn" role="tabpanel" aria-labelledby="rdn-tab">
                            <p><b>RDN Details Form</b></p>
                            
                            <form method="post" action="{{ route('internship.update.rdn',$internship->id) }}" enctype="multipart/form-data">
                                @method('PUT') 
                                @csrf
                                
                                <input class="d-display-none" hidden  name='rdn_id'
                                @if (!empty($internship->rdnForm))
                                value='{{ $internship->rdnForm->id }}'
                                @else
                                value='0'
                                @endif
                                >

                                <div class="form-group">
                                    <label for="example-date-input" class="col-form-label">Report Duty Date</label>
                                    <input class="form-control" type="date" name="report_duty" placeholder="Select date." required 
                                    @if(!empty($internship->rdnForm)) value="{{ $internship->rdnForm->report_duty }}" @endif>
                                </div>

                                <div class="form-group">
                                    <label for="example-date-input" class="col-form-label">Name of Department</label>
                                    <input class="form-control" type="text" name="department" placeholder="Enter department." required 
                                    @if(!empty($internship->rdnForm)) value="{{ $internship->rdnForm->department }}" @endif>
                                </div>
                                
                                <div class="form-group">
                                    <label for="example-date-input" class="col-form-label">Job Scope / Position Offered</label>
                                    <input class="form-control" type="text" name="job_scope" placeholder="Enter job scope" required
                                    @if(!empty($internship->rdnForm)) value="{{ $internship->rdnForm->job_scope }}" @endif>
                                </div>

                                <input class="d-display-none" hidden  name='supervisor_id'
                                @if (!empty($internship->supervisor))
                                value='{{ $internship->supervisor->id }}'
                                @else
                                value='0'
                                @endif
                                >
        
                                <div class="form-group">
                                    <label for="example-date-input" class="col-form-label">Full Name</label>
                                    <input class="form-control" type="text" name="sv_name" placeholder="Enter supervisor name." 
                                    @if (!empty($internship->supervisor))
                                    value='{{ $internship->supervisor->name }}'
                                    @endif
                                    required>
                                </div>
        
                                <div class="form-group">
                                    <label for="example-date-input" class="col-form-label">Position</label>
                                    <input class="form-control" type="text" name="sv_position" placeholder="Enter supervisor position in company." 
                                    @if (!empty($internship->supervisor))
                                    value='{{ $internship->supervisor->position }}'
                                    @endif
                                    required>
                                </div>
        
                                <div class="form-group">
                                    <label for="example-date-input" class="col-form-label">Contact Number</label>
                                    <input class="form-control" type="text" name="sv_telephone" placeholder="Enter supervisor contact number."
                                    @if (!empty($internship->supervisor))
                                    value='{{ $internship->supervisor->contact }}'
                                    @endif
                                     required>
                                </div>
        
                                <div class="form-group">
                                    <label for="example-date-input" class="col-form-label">Email</label>
                                    <input class="form-control" type="text" name="sv_email" placeholder="Enter supervisor email."
                                    @if (!empty($internship->supervisor))
                                    value='{{ $internship->supervisor->email }}'
                                    @endif
                                     required>
                                </div>

                                <div class="form-group">
                                    <label for="example-date-input" class="col-form-label">Name of Organisation Representative</label>
                                    <input class="form-control" type="text" name="represent_name" placeholder="Enter name." required 
                                    @if(!empty($internship->rdnForm)) value="{{ $internship->rdnForm->represent_name }}" @endif>
                                </div>

                                <div class="form-group">
                                    <label for="example-date-input" class="col-form-label">Position of Organisation Representative</label>
                                    <input class="form-control" type="text" name="represent_position" placeholder="Enter position." required 
                                    @if(!empty($internship->rdnForm)) value="{{ $internship->rdnForm->represent_position }}" @endif>
                                </div>

                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">Report Duty Notification (RDN)</label>
                                    <input class="form-control" type="file" name="filename" placeholder="Select RDN file"
                                    @if(empty($internship->rdnForm)) required @endif>
        
                                    @if( !empty($rdn_doc) || $rdn_doc != null)
                                    
                                    <br/>
                                    <a class="col-form-label" target="_blank" href="{{ url($rdn_doc) }}">Download Uploaded Document</a>
        
                                    @endif
        
                                </div>
                                <input class="d-display-none" hidden name='status' value='accepted'>
                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit RDN</button>

                            </form>

                        </div>

                    </div>

                    {{-- <form method="post" action="{{ route('company.internship.update',$internship->id) }}" enctype="multipart/form-data">
                        @method('PUT') 
                        @csrf

                        <input class="d-display-none" hidden name='company_id' value='{{ $internship->company->id }}'>

                        <hr/>
                        
                        <h4 class="header-title text-muted">Internship Details</h4>
                        
                        <div class="form-group">
                            <label for="example-date-input" class="col-form-label">Job Scope / Position Offered</label>
                            <input class="form-control" type="text" name="job_scope" placeholder="Enter job scope" required value="{{ $internship->job_scope }}">
                        </div>

                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Duration (Month)</label>
                            <input class="form-control" type="number" name="duration" placeholder="Enter total month" required value="{{ $internship->duration }}">
                        </div>

                        <div class="form-group">
                            <label for="example-date-input" class="col-form-label">Start Date</label>
                            <input class="form-control" type="date" name="start_date" placeholder="Enter start date" required value="{{ $internship->start_date }}">
                        </div>

                        <div class="form-group">
                            <label for="example-date-input" class="col-form-label">End Date</label>
                            <input class="form-control" type="date" name="end_date" placeholder="Enter end date" required value="{{ $internship->end_date }}">
                        </div>

                        <div class="form-group">
                            <label for="example-date-input" class="col-form-label">Availability of Allowance / Amount (RM)</label>
                            <input class="form-control" type="text" name="allowance" placeholder="Enter amount of allowance." required value="{{ $internship->allowance }}">
                        </div>

                        <hr/>
                        
                        <h4 class="header-title text-muted">Industry Supervisor Details</h4>

                        <input class="d-display-none" hidden  name='supervisor_id'
                        @if (!empty($internship->supervisor))
                        value='{{ $internship->supervisor->id }}'
                        @else
                        value='0'
                        @endif
                        >

                        <div class="form-group">
                            <label for="example-date-input" class="col-form-label">Full Name</label>
                            <input class="form-control" type="text" name="sv_name" placeholder="Enter supervisor name." 
                            @if (!empty($internship->supervisor))
                            value='{{ $internship->supervisor->name }}'
                            @endif
                            required>
                        </div>

                        <div class="form-group">
                            <label for="example-date-input" class="col-form-label">Position</label>
                            <input class="form-control" type="text" name="sv_position" placeholder="Enter supervisor position in company." 
                            @if (!empty($internship->supervisor))
                            value='{{ $internship->supervisor->position }}'
                            @endif
                            required>
                        </div>

                        <div class="form-group">
                            <label for="example-date-input" class="col-form-label">Contact Number</label>
                            <input class="form-control" type="text" name="sv_telephone" placeholder="Enter supervisor contact number."
                            @if (!empty($internship->supervisor))
                            value='{{ $internship->supervisor->contact }}'
                            @endif
                             required>
                        </div>

                        <div class="form-group">
                            <label for="example-date-input" class="col-form-label">Email</label>
                            <input class="form-control" type="text" name="sv_email" placeholder="Enter supervisor email."
                            @if (!empty($internship->supervisor))
                            value='{{ $internship->supervisor->email }}'
                            @endif
                             required>
                        </div>

                        <hr/>
                        
                        <h4 class="header-title text-muted">Upload Document</h4>

                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Organization Reply Form (ORF)</label>
                            <input class="form-control" type="file" name="orf_file" placeholder="Select ORF file" required>
                            @if( !empty($orf_doc) || $orf_doc != null)
                            
                            <br/>
                            <a class="col-form-label" target="_blank" href="{{ url($orf_doc) }}">Download Uploaded Document</a>

                            @endif

                        </div>

                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Report Duty Notification (RDN)</label>
                            <input class="form-control" type="file" name="rdn_file" placeholder="Select RDN file" @if( empty($rdn_doc) || $rdn_doc == null) required @endif>

                            @if( !empty($rdn_doc) || $rdn_doc != null)
                            
                            <br/>
                            <a class="col-form-label" target="_blank" href="{{ url($rdn_doc) }}">Download Uploaded Document</a>

                            @endif

                        </div>

                        <input class="d-display-none" hidden name='status' value='accepted'>

                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>

                    </form> --}}
                </div>
            </div>
        </div>

    </div>
    
@endsection




@section('scripts')

    <script src="{{ asset('assets/dw/select2.min.js') }}"></script>
    <script>

    </script>


@endsection