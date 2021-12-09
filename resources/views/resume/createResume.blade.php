@extends('layouts.parentStudent')

@section('meta')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


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

                    <form action="{{ route('student.resume.show') }}" method="post" target="_blank">
                        @csrf

                        <div class="form-group ">
                            <label for="example-text-input" class="col-form-label">Full Name</label>
                            <input class="form-control" type="text" name="name" required value="{{ $stud->student_info->f_name }} {{ $stud->student_info->l_name }}">
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="example-text-input" class="col-form-label">Phone Number</label>
                                <input class="form-control" type="text" name="phone" required value="{{ $stud->student_info->telephone  }}">
                            </div>
    
                            <div class="form-group col-md-6">
                                <label for="example-text-input" class="col-form-label">Email</label>
                                <input class="form-control" type="email" name="email" required value="{{ $stud->email }}">
                            </div>
                        </div>

                        {{-- <div class="row">
                            <div class="form-group col-md-6">
                                <label for="example-text-input" class="col-form-label">City</label>
                                <input class="form-control" type="text" vname="city" required>
                            </div>
    
                            <div class="form-group col-md-6">
                                <label for="example-text-input" class="col-form-label">State</label>
                                <input class="form-control" type="text" name="state" required>
                            </div>
                        </div> --}}

                        <hr>

                        <h2 >Professional Summary</h2>
                        <div class="form-control-feedback">Write 2-4 short & energetic sentences to interest the reader! Mention your role, experience & most importantly - your biggest achievements, best qualities and skills.</div>

                        <div class="form-group"> 
                            <textarea class="form-control" name="description" id="description" rows="3" required></textarea> 
                        </div> 

                        <hr>

                        <h2 >Skills</h2> <br> 

                        <div class="form-group">

                            <h5 class="text-muted mt-10 d-block"><strong>Technical:</strong></h5>
                            <div id="areaskill" class="row pl-3">
                            </div>
                            <div class="form-inline"> 
                                <input class="form-control" type="text" id="valskill" placeholder="Please enter skill here.">
                                <a class="btn btn-outline-primary btn-sm" onclick="addskill()">Add Skill</a>
                            </div> 
                        </div>

                        <div class="form-group">

                            <h5 class="text-muted mt-10 d-block">
                                <strong>Language:</strong>
                            </h5>
                            <span class="text-muted"><i>Enter verbal language that you know.</i></span>
                            
                            <div id="arealanguage" class="row pl-3">
                            </div>
                            <div class="form-inline"> 
                                <input class="form-control" type="text" id="vallanguage" placeholder="Please enter language here.">
                                <a class="btn btn-outline-primary btn-sm" onclick="addlanguage()">Add Language</a>
                            </div>                          
                        </div>

                        <hr>

                        <h2 >Working Experiences</h2> <br> 

                        <div class="form-group">
                            <div class="expForm_area"></div>
                            <button type="button" class="btn btn-outline-primary mb-3 btn-lg add_exp_form"><span class="ti-plus"></span> Add information</button>
                        </div>

                        <hr>

                        <h2 >Educations</h2> <br> 

                        <div class="form-group">
                            <div class="eduForm_area"></div>
                            <button type="button" class="btn btn-outline-primary mb-3 btn-lg add_edu_form"><span class="ti-plus"></span> Add information</button>
                        </div>

                        <hr>

                        <h2 >Achievements</h2> <br> 

                        <div class="form-group">
                            <div class="certForm_area"></div>
                            <button type="button" class="btn btn-outline-primary mb-3 btn-lg add_cert_form"><span class="ti-plus"></span> Add information</button>
                        </div>

                        <hr>

                        <h2 >References</h2> <br> 

                        <div class="form-group">
                            <div class="referForm_area"></div>
                            <button type="button" class="btn btn-outline-primary mb-3 btn-lg add_refer_form"><span class="ti-plus"></span> Add information</button>
                        </div>
                        <hr>

                        <button type="submit" class="btn btn-rounded btn-primary btn-lg btn-block">Next</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('scripts')
    
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {

        
        $('.custom-select').select2();

        var max_fields = 10;

        //experience form part
        var experience = $(".expForm_area");
        var btn_experience = $(".add_exp_form");

        var x = 1;
        $(btn_experience).click(function(e) {
            e.preventDefault();
            if (x < max_fields) {

                $(experience).append( 
                    '<div>                                                                                                             '+ 
                    '    <div class="row">                                                                                             '+                         
                    '        <div class="form-group col-md-6">                                                                         '+                             
                    '                <label for="example-text-input" class="col-form-label">Job Title</label>                          '+ 
                    '                <input class="form-control" type="text" name="experience_title[]" required>                       '+                                 
                    '        </div>                                                                                                    '+             
                    '        <div class="form-group col-md-6">                                                                         '+
                    '                <label for="example-text-input" class="col-form-label">Company</label>                            '+     
                    '                <input class="form-control" type="text" name="experience_company[]" required>                     '+                     
                    '        </div>                                                                                                    '+                     
                    '    </div>                                                                                                        '+             
                    '    <div class="row">                                                                                             '+             
                    '        <div class="form-group col-md-6">                                                                         '+
                    '                <label for="example-text-input" class="col-form-label">Start Date</label>                         '+         
                    '                <input class="form-control" type="month" name="experience_start[]" required>                      '+                                             
                    '        </div>                                                                                                    '+                 
                    '        <div class="form-group col-md-6">                                                                         '+
                    '                <label for="example-text-input" class="col-form-label">End Date</label>                           '+                 
                    '                <input class="form-control" type="month" name="experience_end[]" required>                        '+                                         
                    '        </div>                                                                                                    '+                                     
                    '    </div>                                                                                                        '+                         
                    '    <div class="form-group">                                                                                      '+
                    '            <label for="example-text-input" class="col-form-label">Description</label>                            '+                             
                    '            <textarea class="form-control" name="experience_desc[]" rows="3" required></textarea>                 '+                                     
                    '    </div>                                                                                                        '+                     
                    '<a href="#" class="delete btn btn-flat btn-outline-danger mb-3"><span class="ti-trash"></span></a>                '+                     
                    '<hr>                                                                                                              '+                         
                    '</div>                                                                                                            '                     
                );
                x++;

            } else {
                alert('You Reached the limits')
            }
        });

        $(experience).on("click", ".delete", function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })


        // education form part
        var education = $(".eduForm_area");
        var btn_education = $(".add_edu_form");

        var y = 1;
        $(btn_education).click(function(e) {
            e.preventDefault();
            if (y < max_fields) {

                $(education).append( 
                    '<div>                                                                                                             '+ 
                    '    <div class="row">                                                                                             '+                         
                    '        <div class="form-group col-md-6">                                                                         '+                             
                    '                <label for="example-text-input" class="col-form-label">Course Name</label>                        '+ 
                    '                <input class="form-control" type="text" name="education_course[]" required>                       '+                                 
                    '        </div>                                                                                                    '+             
                    '        <div class="form-group col-md-6">                                                                         '+
                    '                <label for="example-text-input" class="col-form-label">University Name</label>                    '+     
                    '                <input class="form-control" type="text" name="education_uni[]" required>                          '+                     
                    '        </div>                                                                                                    '+                     
                    '    </div>                                                                                                        '+             
                    '    <div class="row">                                                                                             '+             
                    '        <div class="form-group col-md-6">                                                                         '+
                    '                <label for="example-text-input" class="col-form-label">Start Date</label>                         '+         
                    '                <input class="form-control" type="month" name="education_start[]" required>                       '+                                             
                    '        </div>                                                                                                    '+                 
                    '        <div class="form-group col-md-6">                                                                         '+
                    '                <label for="example-text-input" class="col-form-label">End Date</label>                           '+                 
                    '                <input class="form-control" type="month" name="education_end[]" required>                         '+                                         
                    '        </div>                                                                                                    '+                                     
                    '    </div>                                                                                                        '+                                                                                                           
                    '<a href="#" class="delete btn btn-flat btn-outline-danger mb-3"><span class="ti-trash"></span></a>                '+                     
                    '<hr>                                                                                                              '+                         
                    '</div>                                                                                                            '                     
                );

                y++;

            } else {
                alert('You Reached the limits')
            }
        });

        $(education).on("click", ".delete", function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            y--;
        })


        //certificate form part
        var certificate = $(".certForm_area");
        var btn_certificate = $(".add_cert_form");

        var z = 1;
        $(btn_certificate).click(function(e) {
            e.preventDefault();
            if (z < max_fields) {

                $(certificate).append( 
                    '<div>                                                                                                             '+ 
                    '    <div class="row">                                                                                             '+                         
                    '        <div class="form-group col-md-6">                                                                         '+                             
                    '                <label for="example-text-input" class="col-form-label">Achievement Title</label>                  '+ 
                    '                <input class="form-control" type="text" name="certificate_title[]" required>                      '+                                 
                    '        </div>                                                                                                    '+                
                    '        <div class="form-group col-md-6">                                                                         '+
                    '                <label for="example-text-input" class="col-form-label">Achieve Date</label>                   '+         
                    '                <input class="form-control" type="month" name="certificate_date[]" required>                      '+                                             
                    '        </div>                                                                                                    '+                   
                    '    </div>                                                                                                        '+                           
                    '    <div class="form-group">                                                                                      '+
                    '            <label for="example-text-input" class="col-form-label">Description</label>                            '+                             
                    '            <textarea class="form-control" name="certificate_desc[]" rows="3" required></textarea>                '+                                     
                    '    </div>                                                                                                        '+                     
                    '<a href="#" class="delete btn btn-flat btn-outline-danger mb-3"><span class="ti-trash"></span></a>                '+                     
                    '<hr>                                                                                                              '+                         
                    '</div>                                                                                                            '                     
                );
                z++;

            } else {
                alert('You Reached the limits')
            }
        });

        $(certificate).on("click", ".delete", function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            z--;
        })


        //reference form part
        var reference = $(".referForm_area");
        var btn_reference = $(".add_refer_form");

        var a = 1;
        $(btn_reference).click(function(e) {
            e.preventDefault();
            if (a < max_fields) {

                $(reference).append( 
                    '<h5 class="text-muted mt-10 d-block"><strong>Reference '+a+':</strong></h5>            '+                            
                    '<div class="form-group ">                                                              '+     
                    '    <label for="example-text-input" class="col-form-label">Full Name</label>           '+                 
                    '    <input class="form-control" type="text" name="reference_name[]" required>          '+                         
                    '</div>                                                                                 '+                                 
                    '<div class="row">                                                                      '+                                 
                    '    <div class="form-group col-md-6">                                                  '+                                     
                    '        <label for="example-text-input" class="col-form-label">Company Name</label>    '+                                             
                    '        <input class="form-control" type="text" name="reference_company[]" required>   '+                             
                    '    </div>                                                                             '+                                     
                    '    <div class="form-group col-md-6">                                                  '+                                         
                    '        <label for="example-text-input" class="col-form-label">Position</label>        '+                                 
                    '        <input class="form-control" type="text" name="reference_position[]" required>  '+                                     
                    '    </div>                                                                             '+                                     
                    '</div>                                                                                 '+                                     
                    '<div class="row">                                                                      '+                                             
                    '    <div class="form-group col-md-6">                                                  '+                                     
                    '        <label for="example-text-input" class="col-form-label">Email</label>           '+                         
                    '        <input class="form-control" type="email" name="reference_email[]" required>    '+                     
                    '    </div>                                                                             '+                 
                    '    <div class="form-group col-md-6">                                                  '+                         
                    '        <label for="example-text-input" class="col-form-label">Phone Number</label>    '+                         
                    '        <input class="form-control" type="text" vname="reference_phone[]" required>    '+                 
                    '    </div>                                                                             '+                    
                    '</div>                                                                                 '+                 
                    '<hr />                                                                                 '                 
                );
                a++;

            } else {
                alert('You Reached the limits')
            }
        });

        $(reference).on("click", ".delete", function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            a--;
        })



    });

    


</script>

<script>


    function addskill(){
    
        var val = $('#valskill').val();
        
        if(val != ""){
        
            //$('#areaskill').append(
            //    '<div class="alert alert-warning alert-dismissible fade show col ml-2" role="alert">'+
            //        '<strong name="skillval[]">'+val+'</strong>'+
            //        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
            //          '<span aria-hidden="true">&times;</span>'+
            //        '</button>'+
            //    '</div>'
            //);
            
            $('#areaskill').append(
                '<div class="alert alert-warning alert-dismissible fade show col ml-2" role="alert">'+
                    '<input class="border-0 text-center" type="text" readonly name="skill[]" value="'+val+'">'+
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                      '<span aria-hidden="true">&times;</span>'+
                    '</button>'+
                '</div>'
            );
                    
        }

        console.log(val);

        $('#valskill').val("");
    
    }
    
    
    function addlanguage(){
    
        var val = $('#vallanguage').val();
        
        if(val != ""){

            $('#arealanguage').append(
                '<div class="alert alert-warning alert-dismissible fade show col ml-2" role="alert">'+
                    '<input class="border-0 text-center" readonly type="text" name="language[]" value="'+val+'">'+
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                      '<span aria-hidden="true">&times;</span>'+
                    '</button>'+
                '</div>'
            );
                    
        }

        console.log(val);

        $('#vallanguage').val("");
    
    }


</script>



@endsection

