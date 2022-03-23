@extends('layouts.parentStudent')

@section('meta')

<script src="{{ asset('assets/dw/jquery.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('assets/dw/select2.min.css') }}">

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

                        <input name="resumeId" id="resumeId" 
                        @if ($yesno == 'yes')
                            value="{{$resume->id}}"
                        @else
                            value="0"
                        @endif
                        style="display: none">
                        <input name="studentId" id="studentId" value="{{ Auth::user()->id }}" style="display: none">


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

                        <hr>

                        <h2 >Professional Summary</h2>
                        <div class="form-control-feedback">Write 2-4 short & energetic sentences to interest the reader! Mention your role, experience & most importantly - your biggest achievements, best qualities and skills.</div>

                        <div class="form-group"> 
                            <textarea class="form-control" name="description" id="description" rows="3" required>@if ($yesno == 'yes'){{$resume->summary}} @endif</textarea> 
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
 
<script src="{{ asset('assets/dw/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        
        $('.custom-select').select2();

        var max_fields = 3;

        //experience form part
        var experience = $(".expForm_area");
        var btn_experience = $(".add_exp_form");
        // education form part
        var education = $(".eduForm_area");
        var btn_education = $(".add_edu_form");
         //certificate form part
         var certificate = $(".certForm_area");
        var btn_certificate = $(".add_cert_form");
        //reference form part
        var reference = $(".referForm_area");
        var btn_reference = $(".add_refer_form");
        var x = 0;
        var y = 0;
        var z = 0;
        var h = 1;
        var a = 0;
        var max_ref = 3;

        //load data from db
        @php
            if ($yesno == 'yes'){

                $countExp = 0;
                $countEdu = 0;
                $countCert = 0;
                $countRef = 0;

                if($expTitleArr[0] != null){
                    $countExp = count($expTitleArr);
                }
                if($eduCourseArr[0] != null){
                    $countEdu = count($eduCourseArr);
                }
                if($certTitleArr[0] != null){
                    $countCert = count($certTitleArr);
                }
                if($refCompanyArr[0] != null){
                    $countRef = count($refCompanyArr);
                }

                if($countExp > 0){
                    for ($y = 0; $y < $countExp; $y++){
                        @endphp
                        
                            $(experience).append( 
                                '<div>                                                                                                             '+ 
                                '    <div class="row">                                                                                             '+                         
                                '        <div class="form-group col-md-6">                                                                         '+                             
                                '                <label for="example-text-input" class="col-form-label">Job Title</label>                          '+ 
                                '                <input class="form-control" type="text" name="experience_title['+ x +']"                          '+
                                '               id="experience_title['+ x +']" value="'+ @php echo "'".$expTitleArr[$y]."'"; @endphp +'" required> '+                                 
                                '        </div>                                                                                                    '+             
                                '        <div class="form-group col-md-6">                                                                         '+
                                '                <label for="example-text-input" class="col-form-label">Company</label>                            '+     
                                '                <input class="form-control" type="text" name="experience_company['+ x +']"                        '+
                                '               id="experience_company['+ x +']" value="'+ @php echo "'".$expCompanyArr[$y]."'"; @endphp +'" required>'+                     
                                '        </div>                                                                                                    '+                     
                                '    </div>                                                                                                        '+             
                                '    <div class="row">                                                                                             '+             
                                '        <div class="form-group col-md-6">                                                                         '+
                                '                <label for="example-text-input" class="col-form-label">Start Date</label>                         '+         
                                '                <input class="form-control" type="month" name="experience_start['+ x +']"                         '+
                                '               id="experience_start['+ x +']" value="'+ @php echo "'".$expStartArr[$y]."'"; @endphp +'" required> '+
                                '        </div>                                                                                                    '+                 
                                '        <div class="form-group col-md-6">                                                                         '+
                                '                <label for="example-text-input" class="col-form-label">End Date</label>                           '+                 
                                '                <input class="form-control" type="month" name="experience_end['+ x +']"                           '+
                                '               id="experience_end['+ x +']" value="'+ @php echo "'".$expEndArr[$y]."'"; @endphp +'" required>     '+                                         
                                '        </div>                                                                                                    '+                                     
                                '    </div>                                                                                                        '+                         
                                '    <div class="form-group">                                                                                      '+
                                '            <label for="example-text-input" class="col-form-label">Description</label>                            '+                             
                                '            <textarea class="form-control" name="experience_desc['+ x +']" id="experience_desc['+ x +']" '+
                                '           rows="3" required>'+ @php echo "'".$expDescArr[$y]."'"; @endphp +'</textarea>                 '+                                     
                                '    </div>                                                                                                        '+                     
                                '<a href="#" class="delete btn btn-flat btn-outline-danger mb-3"><span class="ti-trash"></span></a>                '+                     
                                '<hr>                                                                                                              '+                         
                                '</div>                                                                                                            '                     
                            );

                            x++;
                            console.log(x);

                        @php
                    } 
                }

                if($countEdu != 0){
                    for ($y = 0; $y < $countEdu; $y++){
                        @endphp
                        
                            $(education).append( 
                            '<div>                                                                                                             '+ 
                            '    <div class="row">                                                                                             '+                         
                            '        <div class="form-group col-md-6">                                                                         '+                             
                            '                <label for="example-text-input" class="col-form-label">Course Name</label>                        '+ 
                            '                <input class="form-control" type="text" name="education_course['+ y +']"                          '+
                            '               id="education_course['+ y +']" value="'+ @php echo "'".$eduCourseArr[$y]."'"; @endphp +'" required>'+                                 
                            '        </div>                                                                                                    '+             
                            '        <div class="form-group col-md-6">                                                                         '+
                            '                <label for="example-text-input" class="col-form-label">University Name</label>                    '+     
                            '                <input class="form-control" type="text" name="education_uni['+ y +']" id="education_uni['+ y +']" '+
                            '               value="'+ @php echo "'".$eduUniArr[$y]."'"; @endphp +'" required>                          '+                     
                            '        </div>                                                                                                    '+                     
                            '    </div>                                                                                                        '+             
                            '    <div class="row">                                                                                             '+             
                            '        <div class="form-group col-md-6">                                                                         '+
                            '                <label for="example-text-input" class="col-form-label">Start Date</label>                         '+         
                            '                <input class="form-control" type="month" name="education_start['+ y +']"                          '+
                            '               id="education_start['+ y +']" value="'+ @php echo "'".$eduStartArr[$y]."'"; @endphp +'" required>                       '+                                             
                            '        </div>                                                                                                    '+                 
                            '        <div class="form-group col-md-6">                                                                         '+
                            '                <label for="example-text-input" class="col-form-label">End Date</label>                           '+                 
                            '                <input class="form-control" type="month" name="education_end['+ y +']" id="education_end['+ y +']" '+
                            '               value="'+ @php echo "'".$eduEndArr[$y]."'"; @endphp +'" required>                         '+                                         
                            '        </div>                                                                                                    '+                                     
                            '    </div>                                                                                                        '+                                                                                                           
                            '<a href="#" class="delete btn btn-flat btn-outline-danger mb-3"><span class="ti-trash"></span></a>                '+                     
                            '<hr>                                                                                                              '+                         
                            '</div>                                                                                                            '                     
                        );

                        y++;
                        console.log(y);

                        @php
                    }
                }

                if($countCert != 0){
                    for ($y = 0; $y < $countCert; $y++){
                        @endphp
                        
                        $(certificate).append( 
                            '<div>                                                                                                             '+ 
                            '    <div class="row">                                                                                             '+                         
                            '        <div class="form-group col-md-6">                                                                         '+                             
                            '                <label for="example-text-input" class="col-form-label">Achievement Title</label>                  '+ 
                            '                <input class="form-control" type="text" name="certificate_title['+ z +']"                         '+
                            '               id="certificate_title['+ z +']" value="'+ @php echo "'".$certTitleArr[$y]."'"; @endphp +'" required>'+                                 
                            '        </div>                                                                                                    '+                
                            '        <div class="form-group col-md-6">                                                                         '+
                            '                <label for="example-text-input" class="col-form-label">Achieve Date</label>                   '+         
                            '                <input class="form-control" type="month" name="certificate_date['+ z +']"                         '+
                            '               id="certificate_date['+ z +']" value="'+ @php echo "'".$certDateArr[$y]."'"; @endphp +'" required>'+                                             
                            '        </div>                                                                                                    '+                   
                            '    </div>                                                                                                        '+                           
                            '    <div class="form-group">                                                                                      '+
                            '            <label for="example-text-input" class="col-form-label">Description</label>                            '+                             
                            '            <textarea class="form-control" name="certificate_desc['+ z +']" id="certificate_desc['+ z +']" rows="3" required>'+
                            '            '+ @php echo "'".$certDescArr[$y]."'"; @endphp +'</textarea>                '+                                     
                            '    </div>                                                                                                        '+                     
                            '<a href="#" class="delete btn btn-flat btn-outline-danger mb-3"><span class="ti-trash"></span></a>                '+                     
                            '<hr>                                                                                                              '+                         
                            '</div>                                                                                                            '                     
                        );
                        z++;
                        console.log(z);

                        @php
                    }
                }

                if($countRef != 0){
                    for ($k = 0; $k < $countRef; $k++){
                        @endphp

                        $(reference).append( 
                            '<h5 class="text-muted mt-10 d-block"><strong>Reference '+ h +':</strong></h5>            '+                            
                            '<div class="form-group ">                                                              '+     
                            '    <label for="example-text-input" class="col-form-label">Full Name</label>           '+                 
                            '    <input class="form-control" type="text" name="reference_name['+ a +']"             '+
                            '    id="reference_name['+ a +']" value="'+ @php echo "'".$refNameArr[$k]."'"; @endphp +'" required>'+                         
                            '</div>                                                                                 '+                                 
                            '<div class="row">                                                                      '+                                 
                            '    <div class="form-group col-md-6">                                                  '+                                     
                            '        <label for="example-text-input" class="col-form-label">Company Name</label>    '+                                             
                            '        <input class="form-control" type="text" name="reference_company['+ a +']"      '+
                            '       id="reference_company['+ a +']" value="'+ @php echo "'".$refCompanyArr[$k]."'"; @endphp +'" required>   '+                             
                            '    </div>                                                                             '+                                     
                            '    <div class="form-group col-md-6">                                                  '+                                         
                            '        <label for="example-text-input" class="col-form-label">Position</label>        '+                                 
                            '        <input class="form-control" type="text" name="reference_position['+ a +']"     '+
                            '       id="reference_position['+ a +']" value="'+ @php echo "'".$refPositionArr[$k]."'"; @endphp +'" required>  '+                                     
                            '    </div>                                                                             '+                                     
                            '</div>                                                                                 '+                                     
                            '<div class="row">                                                                      '+                                             
                            '    <div class="form-group col-md-6">                                                  '+                                     
                            '        <label for="example-text-input" class="col-form-label">Email</label>           '+                         
                            '        <input class="form-control" type="email" name="reference_email['+ a +']"       '+
                            '       id="reference_email['+ a +']" value="'+ @php echo "'".$refEmailArr[$k]."'"; @endphp +'" required>    '+                     
                            '    </div>                                                                             '+                 
                            '    <div class="form-group col-md-6">                                                  '+                         
                            '        <label for="example-text-input" class="col-form-label">Phone Number</label>    '+                         
                            '        <input class="form-control" type="text" name="reference_phone['+ a +']"        '+
                            '       id="reference_phone['+ a +']" value="'+ @php echo "'".$refPhoneArr[$k]."'"; @endphp +'" required>    '+                 
                            '    </div>                                                                             '+                    
                            '</div>                                                                                 '+                 
                            '<hr />                                                                                 '                 
                        );
                        h++;
                        a++;
                        console.log(a);

                        @php
                    }
                }

            }
        @endphp

        console.log("test" + a);
        $(btn_experience).click(function(e) {
            e.preventDefault();
            if (x < max_fields) {
                $(experience).append( 
                    '<div>                                                                                                             '+ 
                    '    <div class="row">                                                                                             '+                         
                    '        <div class="form-group col-md-6">                                                                         '+                             
                    '                <label for="example-text-input" class="col-form-label">Job Title</label>                          '+ 
                    '                <input class="form-control" type="text" name="experience_title['+ x +']" id="experience_title['+ x +']" required>                       '+                                 
                    '        </div>                                                                                                    '+             
                    '        <div class="form-group col-md-6">                                                                         '+
                    '                <label for="example-text-input" class="col-form-label">Company</label>                            '+     
                    '                <input class="form-control" type="text" name="experience_company['+ x +']" id="experience_company['+ x +']" required>                     '+                     
                    '        </div>                                                                                                    '+                     
                    '    </div>                                                                                                        '+             
                    '    <div class="row">                                                                                             '+             
                    '        <div class="form-group col-md-6">                                                                         '+
                    '                <label for="example-text-input" class="col-form-label">Start Date</label>                         '+         
                    '                <input class="form-control" type="month" name="experience_start['+ x +']" id="experience_start['+ x +']" required>                      '+                                             
                    '        </div>                                                                                                    '+                 
                    '        <div class="form-group col-md-6">                                                                         '+
                    '                <label for="example-text-input" class="col-form-label">End Date</label>                           '+                 
                    '                <input class="form-control" type="month" name="experience_end['+ x +']" id="experience_end['+ x +']" required>                        '+                                         
                    '        </div>                                                                                                    '+                                     
                    '    </div>                                                                                                        '+                         
                    '    <div class="form-group">                                                                                      '+
                    '            <label for="example-text-input" class="col-form-label">Description</label>                            '+                             
                    '            <textarea class="form-control" name="experience_desc['+ x +']" id="experience_desc['+ x +']" rows="3" required></textarea>                 '+                                     
                    '    </div>                                                                                                        '+                     
                    '<a href="#" class="delete btn btn-flat btn-outline-danger mb-3"><span class="ti-trash"></span></a>                '+                     
                    '<hr>                                                                                                              '+                         
                    '</div>                                                                                                            '                     
                );
                x++;
                console.log(x);

            } else {
                alert('You Reached the limits')
            }
        });

        $(experience).on("click", ".delete", function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
            console.log(x);
        })

        $(btn_education).click(function(e) {
            e.preventDefault();
            if (y < max_fields) {

                $(education).append( 
                    '<div>                                                                                                             '+ 
                    '    <div class="row">                                                                                             '+                         
                    '        <div class="form-group col-md-6">                                                                         '+                             
                    '                <label for="example-text-input" class="col-form-label">Course Name</label>                        '+ 
                    '                <input class="form-control" type="text" name="education_course['+ y +']" id="education_course['+ y +']" required>                       '+                                 
                    '        </div>                                                                                                    '+             
                    '        <div class="form-group col-md-6">                                                                         '+
                    '                <label for="example-text-input" class="col-form-label">University Name</label>                    '+     
                    '                <input class="form-control" type="text" name="education_uni['+ y +']" id="education_uni['+ y +']" required>                          '+                     
                    '        </div>                                                                                                    '+                     
                    '    </div>                                                                                                        '+             
                    '    <div class="row">                                                                                             '+             
                    '        <div class="form-group col-md-6">                                                                         '+
                    '                <label for="example-text-input" class="col-form-label">Start Date</label>                         '+         
                    '                <input class="form-control" type="month" name="education_start['+ y +']" id="education_start['+ y +']" required>                       '+                                             
                    '        </div>                                                                                                    '+                 
                    '        <div class="form-group col-md-6">                                                                         '+
                    '                <label for="example-text-input" class="col-form-label">End Date</label>                           '+                 
                    '                <input class="form-control" type="month" name="education_end['+ y +']" id="education_end['+ y +']" required>                         '+                                         
                    '        </div>                                                                                                    '+                                     
                    '    </div>                                                                                                        '+                                                                                                           
                    '<a href="#" class="delete btn btn-flat btn-outline-danger mb-3"><span class="ti-trash"></span></a>                '+                     
                    '<hr>                                                                                                              '+                         
                    '</div>                                                                                                            '                     
                );

                y++;
                console.log(y);

            } else {
                alert('You Reached the limits')
            }
        });

        $(education).on("click", ".delete", function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            y--;
            console.log(y);
        })

        $(btn_certificate).click(function(e) {
            e.preventDefault();
            if (z < max_fields) {

                $(certificate).append( 
                    '<div>                                                                                                             '+ 
                    '    <div class="row">                                                                                             '+                         
                    '        <div class="form-group col-md-6">                                                                         '+                             
                    '                <label for="example-text-input" class="col-form-label">Achievement Title</label>                  '+ 
                    '                <input class="form-control" type="text" name="certificate_title['+ z +']" id="certificate_title['+ z +']" required>                      '+                                 
                    '        </div>                                                                                                    '+                
                    '        <div class="form-group col-md-6">                                                                         '+
                    '                <label for="example-text-input" class="col-form-label">Achieve Date</label>                   '+         
                    '                <input class="form-control" type="month" name="certificate_date['+ z +']" id="certificate_date['+ z +']" required>                      '+                                             
                    '        </div>                                                                                                    '+                   
                    '    </div>                                                                                                        '+                           
                    '    <div class="form-group">                                                                                      '+
                    '            <label for="example-text-input" class="col-form-label">Description</label>                            '+                             
                    '            <textarea class="form-control" name="certificate_desc['+ z +']" id="certificate_desc['+ z +']" rows="3" required></textarea>                '+                                     
                    '    </div>                                                                                                        '+                     
                    '<a href="#" class="delete btn btn-flat btn-outline-danger mb-3"><span class="ti-trash"></span></a>                '+                     
                    '<hr>                                                                                                              '+                         
                    '</div>                                                                                                            '                     
                );
                z++;
                console.log(z);

            } else {
                alert('You Reached the limits')
            }
        });

        $(certificate).on("click", ".delete", function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            z--;
            console.log(z);
        })
        
        $(btn_reference).click(function(e) {
            e.preventDefault();
            if (h < max_ref) {

                $(reference).append( 
                    '<h5 class="text-muted mt-10 d-block"><strong>Reference '+ h +':</strong></h5>            '+                            
                    '<div class="form-group ">                                                              '+     
                    '    <label for="example-text-input" class="col-form-label">Full Name</label>           '+                 
                    '    <input class="form-control" type="text" name="reference_name['+ a +']" id="reference_name['+ a +']" required>          '+                         
                    '</div>                                                                                 '+                                 
                    '<div class="row">                                                                      '+                                 
                    '    <div class="form-group col-md-6">                                                  '+                                     
                    '        <label for="example-text-input" class="col-form-label">Company Name</label>    '+                                             
                    '        <input class="form-control" type="text" name="reference_company['+ a +']" id="reference_company['+ a +']" required>   '+                             
                    '    </div>                                                                             '+                                     
                    '    <div class="form-group col-md-6">                                                  '+                                         
                    '        <label for="example-text-input" class="col-form-label">Position</label>        '+                                 
                    '        <input class="form-control" type="text" name="reference_position['+ a +']" id="reference_position['+ a +']" required>  '+                                     
                    '    </div>                                                                             '+                                     
                    '</div>                                                                                 '+                                     
                    '<div class="row">                                                                      '+                                             
                    '    <div class="form-group col-md-6">                                                  '+                                     
                    '        <label for="example-text-input" class="col-form-label">Email</label>           '+                         
                    '        <input class="form-control" type="email" name="reference_email['+ a +']" id="reference_email['+ a +']" required>    '+                     
                    '    </div>                                                                             '+                 
                    '    <div class="form-group col-md-6">                                                  '+                         
                    '        <label for="example-text-input" class="col-form-label">Phone Number</label>    '+                         
                    '        <input class="form-control" type="text" name="reference_phone['+ a +']" id="reference_phone['+ a +']" required>    '+                 
                    '    </div>                                                                             '+                    
                    '</div>                                                                                 '+                 
                    '<hr />                                                                                 '                 
                );
                h++;
                a++;
                console.log(a);

            } else {
                alert('You Reached the limits')
            }
        });

        $(reference).on("click", ".delete", function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            a--;
            console.log(a);
        })

    });

</script>

<script>

    var i = 0;
    var j = 0;

    $(document).ready(function() {
        @php
            if ($yesno == 'yes'){

                $countSkill = 0;
                $countLang = 0;

                if($skillArr[0] != null){
                    $countSkill = count($skillArr);
                }
                if($langArr[0] != null){
                    $countLang = count($langArr);
                }

                for ($y = 0; $y < $countSkill; $y++){
                    @endphp
                        // var val = $('#valskill').val();
                        var val = @php echo "'".$skillArr[$y]."'"; @endphp ;

                        if(val != ""){
                    
                        $('#areaskill').append(
                            '<div class="alert alert-warning alert-dismissible fade show col ml-2" role="alert">'+
                                '<input class="border-0 text-center" type="text" readonly name="skill['+ j +']" id="skill['+ j +']" value="'+val+'">'+
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                                '</button>'+
                            '</div>'
                        );
                        }

                        console.log(val);
                        j++;
                        console.log(j);

                        $('#valskill').val("");

                    @php
                }

                for ($x = 0; $x < $countLang; $x++){
                    @endphp
                        // var val = $('#valskill').val();
                        var val = @php echo "'".$langArr[$x]."'"; @endphp ;
        
                        if(val != ""){

                            $('#arealanguage').append(
                                '<div class="alert alert-warning alert-dismissible fade show col ml-2" role="alert">'+
                                    '<input class="border-0 text-center" readonly type="text" name="language['+ i +']" id="language['+ i +']" value="'+val+'">'+
                                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                    '<span aria-hidden="true">&times;</span>'+
                                    '</button>'+
                                '</div>'
                                
                            );
                        }

                        console.log(val);
                        i++;
                        console.log(i);

                        $('#vallanguage').val("");

                    @php
                }
            }
        @endphp
    
    });

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
                    '<input class="border-0 text-center" type="text" readonly name="skill['+ j +']" id="skill['+ j +']" value="'+val+'">'+
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                      '<span aria-hidden="true">&times;</span>'+
                    '</button>'+
                '</div>'
            );
                    
        }

        console.log(val);
        j++;
        console.log(j);

        $('#valskill').val("");
    
    }

    $('#areaskill').on("click", ".close", function(e) {
        j--;
        console.log(j);
    })
    
    function addlanguage(){
    
        var val = $('#vallanguage').val();
        
        if(val != ""){

            $('#arealanguage').append(
                '<div class="alert alert-warning alert-dismissible fade show col ml-2" role="alert">'+
                    '<input class="border-0 text-center" readonly type="text" name="language['+ i +']" id="language['+ i +']" value="'+val+'">'+
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                    '<span aria-hidden="true">&times;</span>'+
                    '</button>'+
                '</div>'
                
            );
        }

        console.log(val);
        i++;
        console.log(i);

        $('#vallanguage').val("");
    
    }

    $('#arealanguage').on("click", ".close", function(e) {
        i--;
        console.log(i);
    })

</script>

@endsection

