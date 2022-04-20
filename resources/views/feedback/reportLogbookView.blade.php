@extends('layouts.parentPublic')

@section('breadcrumbs')

@endsection

@section('content')

<!-- access model class inside blade -->
@inject('programme', 'App\Models\Programme')

<div class="row ">

                                        
    @php
    $markArr = array();
    if(!empty($internship->finalEvaluation)){
        $marks = $internship->finalEvaluation->marks;
        $markArr = explode(',' , $marks);
    }
    //print_r($markArr);
    @endphp

    <div class="col-10 mt-5 mx-auto">
        <div class="card">
            <div class="card-body">

                <div class="text-center mb-5 mt-4">
                    <a href="#"><img style="height: 80px" src="{{ asset('assets/images/icon/kuptm_logo.png') }}" alt="logo"></a>
                    <h4>FINAL REPORT & LOGBOOK EVALUATION FORM</h4>
                </div>

                <div class="mb-5">
                    <p><strong>STUDENT DETAILS</strong></p>
                    <p><b>Name:</b> {{ $internship->studentInfo->f_name }} {{ $internship->studentInfo->l_name }}</p>

                    @php
                        $prog = $programme->find($internship->studentInfo->programme_id)->first();
                    @endphp
                    
                    <p><b>Programme Code:</b> {{ $prog->code }} - {{ $prog->name }}</p>
                    <p><b>NRIC:</b> {{ $internship->studentInfo->no_ic }}</p>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center">
                                        <thead class="text-uppercase">
                                            <tr>
                                                <th scope="col">1</th>
                                                <th scope="col">2</th>
                                                <th scope="col">3</th>
                                                <th scope="col">4</th>
                                                <th scope="col">5</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Need Improvement (Fail to meet minimum requirement)</td>
                                                <td>Below Average (Requires significant development to improve performance)</td>
                                                <td>Average (Requires some development to fulfil expectations) </td>
                                                <td>Good (Balanced and consistent performance)</td>
                                                <td>Excellent (Notable achievement beyond normal expectations)</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 ">
                    <div class="card">
                        <div class="card-body">
                            <div class="single-table">
                                <div class="table-responsive">
                                    
                                    <table class="table table-hover text-center">
                                        
                                        <thead class="text-uppercase bg-light">
                                            <tr>
                                                <th scope="col">No</th>
                                                <th class="text-left" scope="col">Items</th>
                                                <th scope="col">1</th>
                                                <th scope="col">2</th>
                                                <th scope="col">3</th>
                                                <th scope="col">4</th>
                                                <th scope="col">5</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td class="text-left"><strong>Abstract</strong> <br>
                                                    • Summary of the training, experience gained and acknowledgement
                                                </td>
                                                @php
                                                    $q1 = 0;
                                                    if(!empty($markArr)){
                                                        $q1 = $markArr[0];
                                                    }
                                                @endphp
                                                <td><input @if($q1==1) checked @endif value="1" type="radio" id="customRadio5" name="q1" ></td>
                                                <td><input @if($q1==2) checked @endif value="2" type="radio" id="customRadio5" name="q1" ></td>
                                                <td><input @if($q1==3) checked @endif value="3" type="radio" id="customRadio5" name="q1" ></td>
                                                <td><input @if($q1==4) checked @endif value="4" type="radio" id="customRadio5" name="q1" ></td>
                                                <td><input @if($q1==5) checked @endif value="5" type="radio" id="customRadio5" name="q1" ></td>
                                            </tr>
                                            
                                            <tr>
                                                @php
                                                    $q2 = 0;
                                                    if(!empty($markArr)){
                                                        $q2 = $markArr[1];
                                                    }
                                                @endphp
                                                <th scope="row">2</th>
                                                <td class="text-left"><strong>Table of Content</strong></td>
                                                <td><input @if($q2==1) checked @endif value="1" type="radio" id="customRadio5" name="q2" ></td>
                                                <td><input @if($q2==2) checked @endif value="2" type="radio" id="customRadio5" name="q2" ></td>
                                                <td><input @if($q2==3) checked @endif value="3" type="radio" id="customRadio5" name="q2" ></td>
                                                <td><input @if($q2==4) checked @endif value="4" type="radio" id="customRadio5" name="q2" ></td>
                                                <td><input @if($q2==5) checked @endif value="5" type="radio" id="customRadio5" name="q2" ></td>
                                            </tr>

                                            <tr>
                                                @php
                                                    $q3 = 0;
                                                    if(!empty($markArr)){
                                                        $q3 = $markArr[2];
                                                    }
                                                @endphp
                                                <th scope="row">3</th>
                                                <td class="text-left"><strong>Objectives</strong> <br>
                                                    • Objectives of the report
                                                </td>                                                
                                                <td><input @if($q3==1) checked @endif value="1" type="radio" id="customRadio5" name="q3" ></td>
                                                <td><input @if($q3==2) checked @endif value="2" type="radio" id="customRadio5" name="q3" ></td>
                                                <td><input @if($q3==3) checked @endif value="3" type="radio" id="customRadio5" name="q3" ></td>
                                                <td><input @if($q3==4) checked @endif value="4" type="radio" id="customRadio5" name="q3" ></td>
                                                <td><input @if($q3==5) checked @endif value="5" type="radio" id="customRadio5" name="q3" ></td>
                                            </tr>

                                            <tr>
                                                @php
                                                    $q4 = 0;
                                                    if(!empty($markArr)){
                                                        $q4 = $markArr[3];
                                                    }
                                                @endphp
                                                <th scope="row"></th>
                                                <td class="text-left">
                                                    • Objectives of the training
                                                </td>                                                
                                                <td><input @if($q4==1) checked @endif value="1" type="radio" id="customRadio5" name="q4" ></td>
                                                <td><input @if($q4==2) checked @endif value="2" type="radio" id="customRadio5" name="q4" ></td>
                                                <td><input @if($q4==3) checked @endif value="3" type="radio" id="customRadio5" name="q4" ></td>
                                                <td><input @if($q4==4) checked @endif value="4" type="radio" id="customRadio5" name="q4" ></td>
                                                <td><input @if($q4==5) checked @endif value="5" type="radio" id="customRadio5" name="q4" ></td>
                                            </tr>

                                            <tr>
                                                @php
                                                    $q5 = 0;
                                                    if(!empty($markArr)){
                                                        $q5 = $markArr[4];
                                                    }
                                                @endphp
                                                <th scope="row">4</th>
                                                <td class="text-left"><strong>Company Profile</strong> <br>
                                                    • Company background <br>
                                                </td>                                                 
                                                <td><input @if($q5==1) checked @endif value="1" type="radio" id="customRadio5" name="q5" ></td>
                                                <td><input @if($q5==2) checked @endif value="2" type="radio" id="customRadio5" name="q5" ></td>
                                                <td><input @if($q5==3) checked @endif value="3" type="radio" id="customRadio5" name="q5" ></td>
                                                <td><input @if($q5==4) checked @endif value="4" type="radio" id="customRadio5" name="q5" ></td>
                                                <td><input @if($q5==5) checked @endif value="5" type="radio" id="customRadio5" name="q5" ></td>
                                            </tr>

                                            <tr>
                                                @php
                                                    $q6 = 0;
                                                    if(!empty($markArr)){
                                                        $q6 = $markArr[5];
                                                    }
                                                @endphp
                                                <th scope="row"></th>
                                                <td class="text-left">
                                                    • Organisation chart
                                                </td>                                                 
                                                <td><input @if($q6==1) checked @endif value="1" type="radio" id="customRadio5" name="q6" ></td>
                                                <td><input @if($q6==2) checked @endif value="2" type="radio" id="customRadio5" name="q6" ></td>
                                                <td><input @if($q6==3) checked @endif value="3" type="radio" id="customRadio5" name="q6" ></td>
                                                <td><input @if($q6==4) checked @endif value="4" type="radio" id="customRadio5" name="q6" ></td>
                                                <td><input @if($q6==5) checked @endif value="5" type="radio" id="customRadio5" name="q6" ></td>
                                            </tr>

                                            <tr>
                                                @php
                                                    $q7 = 0;
                                                    if(!empty($markArr)){
                                                        $q7 = $markArr[6];
                                                    }
                                                @endphp
                                                <th scope="row"></th>
                                                <td class="text-left">
                                                    • Details of industrial supervisor
                                                </td>                                                 
                                                <td><input @if($q7==1) checked @endif value="1" type="radio" id="customRadio5" name="q7" ></td>
                                                <td><input @if($q7==2) checked @endif value="2" type="radio" id="customRadio5" name="q7" ></td>
                                                <td><input @if($q7==3) checked @endif value="3" type="radio" id="customRadio5" name="q7" ></td>
                                                <td><input @if($q7==4) checked @endif value="4" type="radio" id="customRadio5" name="q7" ></td>
                                                <td><input @if($q7==5) checked @endif value="5" type="radio" id="customRadio5" name="q7" ></td>
                                            </tr>

                                            <tr>
                                                @php
                                                    $q8 = 0;
                                                    if(!empty($markArr)){
                                                        $q8 = $markArr[7];
                                                    }
                                                @endphp
                                                <th scope="row">5</th>
                                                <td class="text-left"><strong>Details of Experience</strong> <br>
                                                    • Describe the duties and various tasks in detail (details of project completed, estimation, costing and etc.) 
                                                </td>                                                 
                                                <td><input @if($q8==1) checked @endif value="1" type="radio" id="customRadio5" name="q8" ></td>
                                                <td><input @if($q8==2) checked @endif value="2" type="radio" id="customRadio5" name="q8" ></td>
                                                <td><input @if($q8==3) checked @endif value="3" type="radio" id="customRadio5" name="q8" ></td>
                                                <td><input @if($q8==4) checked @endif value="4" type="radio" id="customRadio5" name="q8" ></td>
                                                <td><input @if($q8==5) checked @endif value="5" type="radio" id="customRadio5" name="q8" ></td>
                                            </tr>

                                            <tr>
                                                @php
                                                    $q9 = 0;
                                                    if(!empty($markArr)){
                                                        $q9 = $markArr[8];
                                                    }
                                                @endphp
                                                <th scope="row"></th>
                                                <td class="text-left">
                                                    • The problems encountered and the approach for solving problems <br>
                                                </td>                                                 
                                                <td><input @if($q9==1) checked @endif value="1" type="radio" id="customRadio5" name="q9" ></td>
                                                <td><input @if($q9==2) checked @endif value="2" type="radio" id="customRadio5" name="q9" ></td>
                                                <td><input @if($q9==3) checked @endif value="3" type="radio" id="customRadio5" name="q9" ></td>
                                                <td><input @if($q9==4) checked @endif value="4" type="radio" id="customRadio5" name="q9" ></td>
                                                <td><input @if($q9==5) checked @endif value="5" type="radio" id="customRadio5" name="q9" ></td>
                                            </tr>

                                            <tr>
                                                @php
                                                    $q10 = 0;
                                                    if(!empty($markArr)){
                                                        $q10 = $markArr[9];
                                                    }
                                                @endphp
                                                <th scope="row"></th>
                                                <td class="text-left">
                                                    • The professional and ethical issues, health and environmental issues that are encountered during the training <br>
                                                </td>                                                 
                                                <td><input @if($q10==1) checked @endif value="1" type="radio" id="customRadio5" name="q10" ></td>
                                                <td><input @if($q10==2) checked @endif value="2" type="radio" id="customRadio5" name="q10" ></td>
                                                <td><input @if($q10==3) checked @endif value="3" type="radio" id="customRadio5" name="q10" ></td>
                                                <td><input @if($q10==4) checked @endif value="4" type="radio" id="customRadio5" name="q10" ></td>
                                                <td><input @if($q10==5) checked @endif value="5" type="radio" id="customRadio5" name="q10" ></td>
                                            </tr>

                                            <tr>
                                                @php
                                                    $q11 = 0;
                                                    if(!empty($markArr)){
                                                        $q11 = $markArr[10];
                                                    }
                                                @endphp
                                                <th scope="row">6</th>
                                                <td class="text-left"><strong>Discussion and Conclusion</strong> <br>
                                                    • Discussion and suggestion of the training 
                                                </td>                                                 
                                                <td><input @if($q11==1) checked @endif value="1" type="radio" id="customRadio5" name="q11" ></td>
                                                <td><input @if($q11==2) checked @endif value="2" type="radio" id="customRadio5" name="q11" ></td>
                                                <td><input @if($q11==3) checked @endif value="3" type="radio" id="customRadio5" name="q11" ></td>
                                                <td><input @if($q11==4) checked @endif value="4" type="radio" id="customRadio5" name="q11" ></td>
                                                <td><input @if($q11==5) checked @endif value="5" type="radio" id="customRadio5" name="q11" ></td>
                                            </tr>

                                            <tr>
                                                @php
                                                    $q12 = 0;
                                                    if(!empty($markArr)){
                                                        $q12 = $markArr[11];
                                                    }
                                                @endphp
                                                <th scope="row"></th>
                                                <td class="text-left">
                                                    • Conclusion of the training
                                                </td>                                                 
                                                <td><input @if($q12==1) checked @endif value="1" type="radio" id="customRadio5" name="q12" ></td>
                                                <td><input @if($q12==2) checked @endif value="2" type="radio" id="customRadio5" name="q12" ></td>
                                                <td><input @if($q12==3) checked @endif value="3" type="radio" id="customRadio5" name="q12" ></td>
                                                <td><input @if($q12==4) checked @endif value="4" type="radio" id="customRadio5" name="q12" ></td>
                                                <td><input @if($q12==5) checked @endif value="5" type="radio" id="customRadio5" name="q12" ></td>
                                            </tr>

                                            <tr>
                                                @php
                                                    $q13 = 0;
                                                    if(!empty($markArr)){
                                                        $q13 = $markArr[12];
                                                    }
                                                @endphp
                                                <th scope="row">7</th>
                                                <td class="text-left"><strong>References</strong> <br>
                                                    • The list of references used in preparing the report
                                                </td>                                                 
                                                <td><input @if($q13==1) checked @endif value="1" type="radio" id="customRadio5" name="q13" ></td>
                                                <td><input @if($q13==2) checked @endif value="2" type="radio" id="customRadio5" name="q13" ></td>
                                                <td><input @if($q13==3) checked @endif value="3" type="radio" id="customRadio5" name="q13" ></td>
                                                <td><input @if($q13==4) checked @endif value="4" type="radio" id="customRadio5" name="q13" ></td>
                                                <td><input @if($q13==5) checked @endif value="5" type="radio" id="customRadio5" name="q13" ></td>
                                            </tr>
                                            
                                            <tr>
                                                @php
                                                    $q14 = 0;
                                                    if(!empty($markArr)){
                                                        $q14 = $markArr[13];
                                                    }
                                                @endphp
                                                <th scope="row">8</th>
                                                <td class="text-left"><strong>Appendix</strong> <br>
                                                    • Any other relevant details to support the write up. For example, design details, copies of letters, project report, figures, tables, pictures and etc.
                                                </td>                                                 
                                                <td><input @if($q14==1) checked @endif value="1" type="radio" id="customRadio5" name="q14" ></td>
                                                <td><input @if($q14==2) checked @endif value="2" type="radio" id="customRadio5" name="q14" ></td>
                                                <td><input @if($q14==3) checked @endif value="3" type="radio" id="customRadio5" name="q14" ></td>
                                                <td><input @if($q14==4) checked @endif value="4" type="radio" id="customRadio5" name="q14" ></td>
                                                <td><input @if($q14==5) checked @endif value="5" type="radio" id="customRadio5" name="q14" ></td>
                                            </tr>

                                            <tr>
                                                @php
                                                    $q15 = 0;
                                                    if(!empty($markArr)){
                                                        $q15 = $markArr[14];
                                                    }
                                                @endphp
                                                <th scope="row"></th>
                                                <td class="text-left">
                                                    • Each appendix must have a title and being mentioned in the report.
                                                </td>                                                 
                                                <td><input @if($q15==1) checked @endif value="1" type="radio" id="customRadio5" name="q15" ></td>
                                                <td><input @if($q15==2) checked @endif value="2" type="radio" id="customRadio5" name="q15" ></td>
                                                <td><input @if($q15==3) checked @endif value="3" type="radio" id="customRadio5" name="q15" ></td>
                                                <td><input @if($q15==4) checked @endif value="4" type="radio" id="customRadio5" name="q15" ></td>
                                                <td><input @if($q15==5) checked @endif value="5" type="radio" id="customRadio5" name="q15" ></td>
                                            </tr>

                                            <tr>
                                                @php
                                                    $q16 = 0;
                                                    if(!empty($markArr)){
                                                        $q16 = $markArr[15];
                                                    }
                                                @endphp
                                                <th scope="row">9</th>
                                                <td class="text-left"><strong>Preparation of Logbook</strong> <br>
                                                    • Able to maintain a logbook systematically
                                                </td>                                                
                                                <td><input @if($q16==1) checked @endif value="1" type="radio" id="customRadio5" name="q16" ></td>
                                                <td><input @if($q16==2) checked @endif value="2" type="radio" id="customRadio5" name="q16" ></td>
                                                <td><input @if($q16==3) checked @endif value="3" type="radio" id="customRadio5" name="q16" ></td>
                                                <td><input @if($q16==4) checked @endif value="4" type="radio" id="customRadio5" name="q16" ></td>
                                                <td><input @if($q16==5) checked @endif value="5" type="radio" id="customRadio5" name="q16" ></td>
                                            </tr>

                                            <tr>
                                                @php
                                                    $q17 = 0;
                                                    if(!empty($markArr)){
                                                        $q17 = $markArr[16];
                                                    }
                                                @endphp
                                                <th scope="row"></th>
                                                <td class="text-left">
                                                    • The logbook has been signed completely (at least once a week)
                                                </td>                                                
                                                <td><input @if($q17==1) checked @endif value="1" type="radio" id="customRadio5" name="q17" ></td>
                                                <td><input @if($q17==2) checked @endif value="2" type="radio" id="customRadio5" name="q17" ></td>
                                                <td><input @if($q17==3) checked @endif value="3" type="radio" id="customRadio5" name="q17" ></td>
                                                <td><input @if($q17==4) checked @endif value="4" type="radio" id="customRadio5" name="q17" ></td>
                                                <td><input @if($q17==5) checked @endif value="5" type="radio" id="customRadio5" name="q17" ></td>
                                            </tr>

                                            <tr>
                                                @php
                                                    $q18 = 0;
                                                    if(!empty($markArr)){
                                                        $q18 = $markArr[17];
                                                    }
                                                @endphp
                                                <th scope="row">10</th>
                                                <td class="text-left"><strong>Content of Logbook</strong> <br>
                                                    • Describe the duties and tasks undertaken by the student
                                                </td>                                              
                                                <td><input @if($q18==1) checked @endif value="1" type="radio" id="customRadio5" name="q18" ></td>
                                                <td><input @if($q18==2) checked @endif value="2" type="radio" id="customRadio5" name="q18" ></td>
                                                <td><input @if($q18==3) checked @endif value="3" type="radio" id="customRadio5" name="q18" ></td>
                                                <td><input @if($q18==4) checked @endif value="4" type="radio" id="customRadio5" name="q18" ></td>
                                                <td><input @if($q18==5) checked @endif value="5" type="radio" id="customRadio5" name="q18" ></td>
                                            </tr>

                                            <tr>
                                                @php
                                                    $q19 = 0;
                                                    if(!empty($markArr)){
                                                        $q19 = $markArr[18];
                                                    }
                                                @endphp
                                                <th scope="row"></th>
                                                <td class="text-left">
                                                    • The explanations must follow the schedule as recorded in log book
                                                </td>                                              
                                                <td><input @if($q19==1) checked @endif value="1" type="radio" id="customRadio5" name="q19" ></td>
                                                <td><input @if($q19==2) checked @endif value="2" type="radio" id="customRadio5" name="q19" ></td>
                                                <td><input @if($q19==3) checked @endif value="3" type="radio" id="customRadio5" name="q19" ></td>
                                                <td><input @if($q19==4) checked @endif value="4" type="radio" id="customRadio5" name="q19" ></td>
                                                <td><input @if($q19==5) checked @endif value="5" type="radio" id="customRadio5" name="q19" ></td>
                                            </tr>

                                            <tr>
                                                @php
                                                    $q20 = 0;
                                                    if(!empty($markArr)){
                                                        $q20 = $markArr[19];
                                                    }
                                                @endphp
                                                <th scope="row">11</th>
                                                <td class="text-left"><strong>Overall format</strong> <br></td>                                                                                                                                              
                                                <td><input @if($q20==1) checked @endif value="1" type="radio" id="customRadio5" name="q20" ></td>
                                                <td><input @if($q20==2) checked @endif value="2" type="radio" id="customRadio5" name="q20" ></td>
                                                <td><input @if($q20==3) checked @endif value="3" type="radio" id="customRadio5" name="q20" ></td>
                                                <td><input @if($q20==4) checked @endif value="4" type="radio" id="customRadio5" name="q20" ></td>
                                                <td><input @if($q20==5) checked @endif value="5" type="radio" id="customRadio5" name="q20" ></td>
                                            </tr>

                                        </tbody>
                                        
                                    </table>

                                    {{-- @php
                                        $comment = "";
                                        if(!empty($markArr)){
                                            $comment = $internship->graduateAnswer->comment;
                                        }
                                    @endphp

                                    <div class="form-group mt-5 "> 
                                        <label for="example-text-input" class="col-form-label">Comments</label> 
                                        <textarea class="form-control" name="comment" id="comments" rows="3" placeholder="Please fill in" readonly>{{$comment}}</textarea> 
                                    </div>  --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
            </div>
        </div>
    </div>

</div>

@endsection
