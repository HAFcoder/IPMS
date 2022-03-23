@extends('layouts.parentLecturer')

@section('head')
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dw/jquery.dataTables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dw/dataTables.bootstrap4.min.css') }}">
@endsection

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Supervisee</h4>
            <ul class="breadcrumbs pull-left">

                @if (Auth::guard('lecturer')->user()->role == 'coordinator')
                    <li><a href="{{ url('/coordinator') }}">Home</a></li>
                @else
                    <li><a href="{{ url('/lecturer') }}">Home</a></li>
                @endif
                {{-- <li><a >Feedback & Evaluation</a></li> --}}
                <li><span>Supervisee</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <div class="row">

        {{-- <div class="col-8 mt-5 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">List of Student</h4>
                    <div class="data-tables datatable-primary">
                        <table id="dataTable2" class="text-center">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>Student ID</th>
                                    <th>Name</th>
                                    <th>Programme</th>
                                    <th>Academic Supervisor</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if($internship->isEmpty())
                                   <tr>
                                       <td colspan="10" class="bg-light">There is no data.</td>
                                   </tr>
                               @endif

                               @foreach ($internship as $intern)
                                    <tr>
                                        <td>{{ $intern->session->session_code }}</td>
                                        <td>{{ $intern->studentInfo->studentID }}</td>
                                        <td>{{ $intern->studentInfo->f_name }} {{ $intern->studentInfo->l_name }} </td>
                                        <td>
                                            @php
                                                $prog = $programme->find($intern->studSession->programme_id)->first();
                                            @endphp
                                            {{ $prog->code }} - {{ $prog->name }}  
                                        </td>
                                        <td>
                                            <form action="{{ route('attach.supervisee') }}" method="POST">
                                                @csrf

                                                <input type="hidden" id="id" name="id" value="{{ $intern->id }}">

                                                <select id="lecturer_id" class="custom-select" name="lecturer_id" required onchange=" this.form.submit()">>
                                                    @foreach ($lect as $data)
                                                        
                                                        <option value="{{ $data->id }}" @if( $intern->lecturer_id == $data->id) selected @endif>{{ $data->lecturerInfo->f_name }} {{ $data->lecturerInfo->f_name }}</option>
                                                       
                                                    @endforeach
                                                </select>

                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="col-12 mt-5 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Assign Supervisee</h4>

                    <form action="{{ route('attach.supervisee') }}" method="POST">
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

                        <div class="form-group"><label for="example-text-input" class="col-form-label">Lecturer Name</label>
                            <select id="lecturer_id" class="custom-select" name="lecturer_id" required>
                                <option value="">Select one</option>
                                @foreach ($lect as $data)
                                    <option value="{{ $data->id }}">{{ $data->lecturerInfo->f_name }} {{ $data->lecturerInfo->f_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Session Code</label>
                            <select id="session_id" class="custom-select" name="session_id" id="session_id" required>
                                <option value="">Select one</option>
                                @foreach ($session as $sess)
                                    <option value="{{ $sess->id }}">{{ $sess->session_code }} : {{ $sess->start_date }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="data-tables datatable-primary pt-3" id="tableData">
                            <table id="dataTable2" class="text-center">
                                <thead class="text-capitalize">
                                    <tr>
                                        <th class="noExport"><i class="fa fa-check" aria-hidden="true"></i></th>
                                        <th>Student ID</th>
                                        <th>Name</th>
                                        <th>Programme</th>
                                        <th>Company Name</th>
                                        <th>Status</th>
                                        <th>Academic Supervisor</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if($internship->isEmpty())
                                        <tr>
                                            <td colspan="10" class="bg-light">There is no data.</td>
                                        </tr>
                                    @endif

                                    @foreach ($internship as $intern)
                                        <tr>
                                            <td>
                                                <input name="intern_id" type="checkbox" class="form-control" value="{{ $intern->id }}" > 
                                            </td>
                                            <td>{{ $intern->studentInfo->studentID }}</td>
                                            <td>{{ $intern->studentInfo->f_name }} {{ $intern->studentInfo->l_name }} </td>
                                            <td>
                                                @php
                                                    $prog = $programme->find($intern->studSession->programme_id)->first();
                                                @endphp
                                                {{ $prog->code }} - {{ $prog->name }}  
                                            </td>
                                            <td>{{ $intern->company->name }}</td>
                                            <td>
                                                @php
                                                    if ($intern->status == 'accepted') {
                                                        $style = 'badge-success';
                                                        $status = 'Accepted';
                                                    } elseif ($intern->status == 'rejected') {
                                                        $style = 'badge-danger';
                                                        $status = 'Rejected';
                                                    } else {
                                                        $style = 'badge-warning';
                                                        $status = 'Pending';
                                                    }
                                                @endphp
                                                <p class="h5">
                                                    <span class="badge badge-pill {{ $style }}">{{ $status }}</span>
                                                </p>
                                            </td>
                                            <td>
                                                @if($intern->lecturer_id != null)
                                                    {{ $intern->lecturerInfo->f_name}} {{ $intern->lecturerInfo->l_name}}
                                                @else
                                                    <p class="h5"><span class="badge badge-pill badge-danger">None</span></p>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                        <button type="submit" class="btn btn-success mt-4 pr-4 pl-4">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection


@section('scripts')
    <!-- Start datatable js -->
    <script src="{{ asset('assets/dw/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/dw/jquery.dataTables.min.js') }}"></script>>
    <script src="{{ asset('assets/dw/dataTables.bootstrap4.min.js') }}"></script>

@endsection
