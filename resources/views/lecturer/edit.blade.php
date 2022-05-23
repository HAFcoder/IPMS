@extends('layouts.parentLecturer')

@section('head')

<link rel="stylesheet" href="{{ asset('assets/dw/select2.min.css') }}">

@endsection

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Lecturers</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/admin') }}">Home</a></li>
                <li><span>Edit Lecturer</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <div class="row">

        <div class="col-8 mt-5 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Edit Lecturer</h4>
                    <form method="post" action="{{ route('lecturers.update',$lect_info->lect_id) }}">
                        @method('PUT') 
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
                        
                        @if (session()->has('success'))
                        <div class="form-group">
                            <div class="alert alert-success">
                                <ul>
                                    <li>{{ session()->get('success') }}</li>
                                </ul>
                            </div>
                        </div>
                        @endif

                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">First Name</label>
                            <input class="form-control" type="text" name="f_name" placeholder="Enter first name" required value="{{ $lect_info->f_name }}">
                        </div>

                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Last Name</label>
                            <input class="form-control" type="text" name="l_name" placeholder="Enter last name" required value="{{ $lect_info->l_name }}">
                        </div>

                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Lecturer ID</label>
                            <input class="form-control" type="text" name="lecturerID" placeholder="Enter lecturer ID" required value="{{ strtoupper($lect_info->lecturerID) }}">
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Email</label>
                            <input class="form-control" type="email" name="email" placeholder="Enter email." required value="{{ $lect_info->lecturer->email }}">
                        </div>
                        
                        <div class="form-group">
                            <label class="col-form-label">Contact Number</label>
                            <input class="form-control" type="text" name="telephone" placeholder="Enter contact number." required value="{{ $lect_info->telephone }}">
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Faculty</label>
                            <select name="faculty_id" id="faculty_id" class="custom-select" required>
                                <option disabled selected value>Select one</option>
                                @foreach ($faculties as $faculty)
                                    <option @if($lect_info->faculty_id == $faculty->id) selected  @endif value="{{ $faculty->id }}" name="faculty_id">{{ $faculty->faculty_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Position</label>
                            <input class="form-control" type="text" name="position" placeholder="Enter position." required value="{{ $lect_info->position }}">
                        </div>

                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    
@endsection

@section('scripts')

    <script src="{{ asset('assets/dw/select2.min.js') }}"></script>

@endsection