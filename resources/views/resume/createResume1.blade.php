@extends('layouts.parentStudent')

@section('meta')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@endsection

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Resume</h4>
            <ul class="breadcrumbs pull-left">
                <li><a ref="{{ url('/') }}">Resume</a></li>
                <li><span>Resume Builder</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <div class="row">

        <div class="col-10 mt-5 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h2>Personal Details</h2>

                    <form action="/create-resume1" method="post">
                        @csrf

                        <div class="form-group ">
                            <label for="example-text-input" class="col-form-label">Full Name</label>
                            <input class="form-control" type="text" name="name" required>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="example-text-input" class="col-form-label">Phone Number</label>
                                <input class="form-control" type="text" name="phone" required>
                            </div>
    
                            <div class="form-group col-md-6">
                                <label for="example-text-input" class="col-form-label">Email</label>
                                <input class="form-control" type="email" name="email" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="example-text-input" class="col-form-label">City</label>
                                <input class="form-control" type="text" vname="city" required>
                            </div>
    
                            <div class="form-group col-md-6">
                                <label for="example-text-input" class="col-form-label">State</label>
                                <input class="form-control" type="text" name="state" required>
                            </div>
                        </div>

                        <hr>

                        <h2 >Professional Summary</h2>
                        <div class="form-control-feedback">Write 2-4 short & energetic sentences to interest the reader! Mention your role, experience & most importantly - your biggest achievements, best qualities and skills.</div>


                        <div class="form-group"> 
                            {{-- <label for="example-text-input" class="col-form-label">Description</label>  --}}
                            <textarea class="form-control" name="description" id="description" rows="3" required></textarea> 
                        </div> 

                        <hr>

                        <h2 >Skills</h2> <br> 

                        <div class="form-group">

                            <b class="text-muted mb-3 mt-10 d-block">Technical:</b>
                            {{-- <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" checked class="custom-control-input" id="html">
                                <label class="custom-control-label" for="html">HTML</label>
                            </div>

                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="php">
                                <label class="custom-control-label" for="php">PHP</label>
                            </div>

                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" checked class="custom-control-input" id="java">
                                <label class="custom-control-label" for="java">Java</label>
                            </div>

                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="js">
                                <label class="custom-control-label" for="js">JavaScript</label>
                            </div>

                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" checked class="custom-control-input" id="c">
                                <label class="custom-control-label" for="c">C</label>
                            </div>

                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="c++">
                                <label class="custom-control-label" for="c++">C++</label>
                            </div> --}}

                            <div class="insert1"></div>
                            <button type="button" class="btn btn-outline-primary mb-3 btn-lg add_form_field"><span class="ti-plus"></span> Add information</button>
                        </div>

                        <div class="form-group">

                            <b class="text-muted mb-3 mt-10 d-block">Language:</b>
                            <div class="insert1"></div>
                            <button type="button" class="btn btn-outline-primary mb-3 btn-lg add_form_field"><span class="ti-plus"></span> Add information</button>
                        </div>

                        <hr>

                        <h2 >Experiences</h2> <br> 

                        <div class="form-group">
                            <div class="insert1"></div>
                            <button type="button" class="btn btn-outline-primary mb-3 btn-lg add_form_field"><span class="ti-plus"></span> Add information</button>
                        </div>

                        <hr>

                        <h2 >Enter your Educations</h2> <br> 

                        <div class="form-group">
                            <div class="insert1"></div>
                            <button type="button" class="btn btn-outline-primary mb-3 btn-lg add_form_field"><span class="ti-plus"></span> Add information</button>
                        </div>

                        <hr>

                        <h2 >Achievements</h2> <br> 

                        <div class="form-group">
                            <div class="insert1"></div>
                            <button type="button" class="btn btn-outline-primary mb-3 btn-lg add_form_field"><span class="ti-plus"></span> Add information</button>
                        </div>

                        <hr>

                        <h2 >Curricular Activities</h2> <br> 

                        <div class="form-group">
                            <div class="insert1"></div>
                            <button type="button" class="btn btn-outline-primary mb-3 btn-lg add_form_field"><span class="ti-plus"></span> Add information</button>
                        </div>

                        <hr>

                        <h2 >References</h2> <br> 

                        <div class="form-group">
                            <div class="insert1"></div>
                            <button type="button" class="btn btn-outline-primary mb-3 btn-lg add_form_field"><span class="ti-plus"></span> Add information</button>
                        </div>

                        <button type="submit" class="btn btn-rounded btn-primary btn-lg btn-block">Next</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('scripts')
    
<script>
    $(document).ready(function() {
        var max_fields = 4;
        var wrapper = $(".insert1");
        var add_button = $(".add_form_field");

        var x = 1;
        $(add_button).click(function(e) {
            e.preventDefault();
            if (x < max_fields) {
                x++;

                $(wrapper).append(' \
                    <div> \
                        <div class="row"> \
                            <div class="form-group col-md-6"> \
                                    <label for="example-text-input" class="col-form-label">Job Title</label> \
                                    <input class="form-control" type="text" name="jobTitle_[]" id="jobTitle" required> \
                            </div> \
                            <div class="form-group col-md-6"> \
                                    <label for="example-text-input" class="col-form-label">Company</label> \
                                    <input class="form-control" type="text" name="jobTitle_[]" id="jobTitle" required> \
                            </div> \
                        </div> \
                        <div class="row"> \
                            <div class="form-group col-md-6"> \
                                    <label for="example-text-input" class="col-form-label">Start Date</label> \
                                    <input class="form-control" type="month" name="jobTitle_[]" id="jobTitle" required> \
                            </div> \
                            <div class="form-group col-md-6"> \
                                    <label for="example-text-input" class="col-form-label">End Date</label> \
                                    <input class="form-control" type="month" name="jobTitle_[]" id="jobTitle" required> \
                            </div> \
                        </div> \
                        <div class="form-group"> \
                                <label for="example-text-input" class="col-form-label">Description</label> \
                                <textarea class="form-control" name="description" id="description" rows="3" required></textarea> \
                        </div> \
                    <a href="#" class="delete btn btn-flat btn-outline-danger mb-3"><span class="ti-trash"></span></a> \
                    <hr> \
                    </div> \
                ');
            } else {
                alert('You Reached the limits')
            }
        });

        $(wrapper).on("click", ".delete", function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })
});

</script>



@endsection

