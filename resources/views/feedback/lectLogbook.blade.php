@extends('layouts.parentLecturer')

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Logbook & Report</h4>
            <ul class="breadcrumbs pull-left">

                @if(Auth::guard('lecturer')->user()->role == "coordinator")
                <li><a href="{{ url('/coordinator') }}">Home</a></li>
                @else
                <li><a href="{{ url('/lecturer') }}">Home</a></li>
                @endif
                <li><a >Feedback & Evaluation</a></li>
                <li><span>Logbook & Report</span></li>
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
                    <h4>FINAL REPORT & LOGBOOK EVALUATION FORM</h4>
                </div>

                <p><strong>INSTRUCTION</strong></p>
                <p>1.	This form is used to evaluate students’ performance in industry training via the final report and
                    logbook prepared by them. </p>
                    
                <p>2.	It is to be completed by the Academic Supervisor after the industry training is over.</p>
                <p>3.	One form is to be used for each student evaluated.</p>
                <p>4.	The complete form must be kept safely by the Faculty.</p>  
                <p>5.	This report contributes 40% of the total marks.</p>   

                <p class="mt-4"><strong>For each of the criteria, rate the student according to the scale shown:</strong></p>
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
                                    <form action="{{ route('lecturer.finalevaluation.update',$id) }}" method="post">
                                        @method('POST') 
                                        @csrf
                                        
                                    <input name="evaId" id="evaId" 
                                    @if ($yesno == 'yes')
                                        value="{{$finaleva->id}}"
                                    @else
                                        value="0"
                                    @endif
                                    style="display: none">
                                    <input name="internship_id" id="internship_id" value="{{$id}}" style="display:none">
                                    
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
                                                <td><input @if ($yesno == 'yes') @if ($markArr[0]==1) checked @endif @endif value="1" type="radio" id="customRadio5" name="q1" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[0]==2) checked @endif @endif value="2" type="radio" id="customRadio5" name="q1" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[0]==3) checked @endif @endif value="3" type="radio" id="customRadio5" name="q1" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[0]==4) checked @endif @endif value="4" type="radio" id="customRadio5" name="q1" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[0]==5) checked @endif @endif value="5" type="radio" id="customRadio5" name="q1" ></td>
                                            </tr>
                                            
                                            <tr>
                                                <th scope="row">2</th>
                                                <td class="text-left"><strong>Table of Content</strong></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[1]==1) checked @endif @endif value="1" type="radio" id="customRadio5" name="q2" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[1]==2) checked @endif @endif value="2" type="radio" id="customRadio5" name="q2" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[1]==3) checked @endif @endif value="3" type="radio" id="customRadio5" name="q2" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[1]==4) checked @endif @endif value="4" type="radio" id="customRadio5" name="q2" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[1]==5) checked @endif @endif value="5" type="radio" id="customRadio5" name="q2" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">3</th>
                                                <td class="text-left"><strong>Objectives</strong> <br>
                                                    • Objectives of the report
                                                </td>                                                
                                                <td><input @if ($yesno == 'yes') @if ($markArr[2]==1) checked @endif @endif value="1" type="radio" id="customRadio5" name="q3" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[2]==2) checked @endif @endif value="2" type="radio" id="customRadio5" name="q3" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[2]==3) checked @endif @endif value="3" type="radio" id="customRadio5" name="q3" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[2]==4) checked @endif @endif value="4" type="radio" id="customRadio5" name="q3" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[2]==5) checked @endif @endif value="5" type="radio" id="customRadio5" name="q3" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row"></th>
                                                <td class="text-left">
                                                    • Objectives of the training
                                                </td>                                                
                                                <td><input @if ($yesno == 'yes') @if ($markArr[3]==1) checked @endif @endif value="1" type="radio" id="customRadio5" name="q4" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[3]==2) checked @endif @endif value="2" type="radio" id="customRadio5" name="q4" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[3]==3) checked @endif @endif value="3" type="radio" id="customRadio5" name="q4" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[3]==4) checked @endif @endif value="4" type="radio" id="customRadio5" name="q4" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[3]==5) checked @endif @endif value="5" type="radio" id="customRadio5" name="q4" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">4</th>
                                                <td class="text-left"><strong>Company Profile</strong> <br>
                                                    • Company background <br>
                                                </td>                                                 
                                                <td><input @if ($yesno == 'yes') @if ($markArr[4]==1) checked @endif @endif value="1" type="radio" id="customRadio5" name="q5" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[4]==2) checked @endif @endif value="2" type="radio" id="customRadio5" name="q5" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[4]==3) checked @endif @endif value="3" type="radio" id="customRadio5" name="q5" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[4]==4) checked @endif @endif value="4" type="radio" id="customRadio5" name="q5" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[4]==5) checked @endif @endif value="5" type="radio" id="customRadio5" name="q5" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row"></th>
                                                <td class="text-left">
                                                    • Organisation chart
                                                </td>                                                 
                                                <td><input @if ($yesno == 'yes') @if ($markArr[5]==1) checked @endif @endif value="1" type="radio" id="customRadio5" name="q6" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[5]==2) checked @endif @endif value="2" type="radio" id="customRadio5" name="q6" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[5]==3) checked @endif @endif value="3" type="radio" id="customRadio5" name="q6" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[5]==4) checked @endif @endif value="4" type="radio" id="customRadio5" name="q6" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[5]==5) checked @endif @endif value="5" type="radio" id="customRadio5" name="q6" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row"></th>
                                                <td class="text-left">
                                                    • Details of industrial supervisor
                                                </td>                                                 
                                                <td><input @if ($yesno == 'yes') @if ($markArr[6]==1) checked @endif @endif value="1" type="radio" id="customRadio5" name="q7" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[6]==2) checked @endif @endif value="2" type="radio" id="customRadio5" name="q7" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[6]==3) checked @endif @endif value="3" type="radio" id="customRadio5" name="q7" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[6]==4) checked @endif @endif value="4" type="radio" id="customRadio5" name="q7" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[6]==5) checked @endif @endif value="5" type="radio" id="customRadio5" name="q7" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">5</th>
                                                <td class="text-left"><strong>Details of Experience</strong> <br>
                                                    • Describe the duties and various tasks in detail (details of project completed, estimation, costing and etc.) 
                                                </td>                                                 
                                                <td><input @if ($yesno == 'yes') @if ($markArr[7]==1) checked @endif @endif value="1" type="radio" id="customRadio5" name="q8" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[7]==2) checked @endif @endif value="2" type="radio" id="customRadio5" name="q8" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[7]==3) checked @endif @endif value="3" type="radio" id="customRadio5" name="q8" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[7]==4) checked @endif @endif value="4" type="radio" id="customRadio5" name="q8" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[7]==5) checked @endif @endif value="5" type="radio" id="customRadio5" name="q8" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row"></th>
                                                <td class="text-left">
                                                    • The problems encountered and the approach for solving problems <br>
                                                </td>                                                 
                                                <td><input @if ($yesno == 'yes') @if ($markArr[8]==1) checked @endif @endif value="1" type="radio" id="customRadio5" name="q9" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[8]==2) checked @endif @endif value="2" type="radio" id="customRadio5" name="q9" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[8]==3) checked @endif @endif value="3" type="radio" id="customRadio5" name="q9" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[8]==4) checked @endif @endif value="4" type="radio" id="customRadio5" name="q9" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[8]==5) checked @endif @endif value="5" type="radio" id="customRadio5" name="q9" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row"></th>
                                                <td class="text-left">
                                                    • The professional and ethical issues, health and environmental issues that are encountered during the training <br>
                                                </td>                                                 
                                                <td><input @if ($yesno == 'yes') @if ($markArr[9]==1) checked @endif @endif value="1" type="radio" id="customRadio5" name="q10" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[9]==2) checked @endif @endif value="2" type="radio" id="customRadio5" name="q10" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[9]==3) checked @endif @endif value="3" type="radio" id="customRadio5" name="q10" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[9]==4) checked @endif @endif value="4" type="radio" id="customRadio5" name="q10" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[9]==5) checked @endif @endif value="5" type="radio" id="customRadio5" name="q10" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">6</th>
                                                <td class="text-left"><strong>Discussion and Conclusion</strong> <br>
                                                    • Discussion and suggestion of the training 
                                                </td>                                                 
                                                <td><input @if ($yesno == 'yes') @if ($markArr[10]==1) checked @endif @endif value="1" type="radio" id="customRadio5" name="q11" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[10]==2) checked @endif @endif value="2" type="radio" id="customRadio5" name="q11" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[10]==3) checked @endif @endif value="3" type="radio" id="customRadio5" name="q11" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[10]==4) checked @endif @endif value="4" type="radio" id="customRadio5" name="q11" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[10]==5) checked @endif @endif value="5" type="radio" id="customRadio5" name="q11" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row"></th>
                                                <td class="text-left">
                                                    • Conclusion of the training
                                                </td>                                                 
                                                <td><input @if ($yesno == 'yes') @if ($markArr[11]==1) checked @endif @endif value="1" type="radio" id="customRadio5" name="q12" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[11]==2) checked @endif @endif value="2" type="radio" id="customRadio5" name="q12" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[11]==3) checked @endif @endif value="3" type="radio" id="customRadio5" name="q12" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[11]==4) checked @endif @endif value="4" type="radio" id="customRadio5" name="q12" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[11]==5) checked @endif @endif value="5" type="radio" id="customRadio5" name="q12" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">7</th>
                                                <td class="text-left"><strong>References</strong> <br>
                                                    • The list of references used in preparing the report
                                                </td>                                                 
                                                <td><input @if ($yesno == 'yes') @if ($markArr[12]==1) checked @endif @endif value="1" type="radio" id="customRadio5" name="q13" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[12]==2) checked @endif @endif value="2" type="radio" id="customRadio5" name="q13" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[12]==3) checked @endif @endif value="3" type="radio" id="customRadio5" name="q13" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[12]==4) checked @endif @endif value="4" type="radio" id="customRadio5" name="q13" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[12]==5) checked @endif @endif value="5" type="radio" id="customRadio5" name="q13" ></td>
                                            </tr>
                                            
                                            <tr>
                                                <th scope="row">8</th>
                                                <td class="text-left"><strong>Appendix</strong> <br>
                                                    • Any other relevant details to support the write up. For example, design details, copies of letters, project report, figures, tables, pictures and etc.
                                                </td>                                                 
                                                <td><input @if ($yesno == 'yes') @if ($markArr[13]==1) checked @endif @endif value="1" type="radio" id="customRadio5" name="q14" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[13]==2) checked @endif @endif value="2" type="radio" id="customRadio5" name="q14" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[13]==3) checked @endif @endif value="3" type="radio" id="customRadio5" name="q14" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[13]==4) checked @endif @endif value="4" type="radio" id="customRadio5" name="q14" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[13]==5) checked @endif @endif value="5" type="radio" id="customRadio5" name="q14" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row"></th>
                                                <td class="text-left">
                                                    • Each appendix must have a title and being mentioned in the report.
                                                </td>                                                 
                                                <td><input @if ($yesno == 'yes') @if ($markArr[14]==1) checked @endif @endif value="1" type="radio" id="customRadio5" name="q15" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[14]==2) checked @endif @endif value="2" type="radio" id="customRadio5" name="q15" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[14]==3) checked @endif @endif value="3" type="radio" id="customRadio5" name="q15" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[14]==4) checked @endif @endif value="4" type="radio" id="customRadio5" name="q15" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[14]==5) checked @endif @endif value="5" type="radio" id="customRadio5" name="q15" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">9</th>
                                                <td class="text-left"><strong>Preparation of Logbook</strong> <br>
                                                    • Able to maintain a logbook systematically
                                                </td>                                                 
                                                <td><input @if ($yesno == 'yes') @if ($markArr[15]==1) checked @endif @endif value="1" type="radio" id="customRadio5" name="q16" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[15]==2) checked @endif @endif value="2" type="radio" id="customRadio5" name="q16" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[15]==3) checked @endif @endif value="3" type="radio" id="customRadio5" name="q16" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[15]==4) checked @endif @endif value="4" type="radio" id="customRadio5" name="q16" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[15]==5) checked @endif @endif value="5" type="radio" id="customRadio5" name="q16" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row"></th>
                                                <td class="text-left">
                                                    • The logbook has been signed completely (at least once a week)
                                                </td>                                                 
                                                <td><input @if ($yesno == 'yes') @if ($markArr[16]==1) checked @endif @endif value="1" type="radio" id="customRadio5" name="q17" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[16]==2) checked @endif @endif value="2" type="radio" id="customRadio5" name="q17" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[16]==3) checked @endif @endif value="3" type="radio" id="customRadio5" name="q17" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[16]==4) checked @endif @endif value="4" type="radio" id="customRadio5" name="q17" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[16]==5) checked @endif @endif value="5" type="radio" id="customRadio5" name="q17" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">10</th>
                                                <td class="text-left"><strong>Content of Logbook</strong> <br>
                                                    • Describe the duties and tasks undertaken by the student
                                                </td>                                                 
                                                <td><input @if ($yesno == 'yes') @if ($markArr[17]==1) checked @endif @endif value="1" type="radio" id="customRadio5" name="q18" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[17]==2) checked @endif @endif value="2" type="radio" id="customRadio5" name="q18" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[17]==3) checked @endif @endif value="3" type="radio" id="customRadio5" name="q18" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[17]==4) checked @endif @endif value="4" type="radio" id="customRadio5" name="q18" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[17]==5) checked @endif @endif value="5" type="radio" id="customRadio5" name="q18" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row"></th>
                                                <td class="text-left">
                                                    • The explanations must follow the schedule as recorded in log book
                                                </td>                                                 
                                                <td><input @if ($yesno == 'yes') @if ($markArr[18]==1) checked @endif @endif value="1" type="radio" id="customRadio5" name="q19" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[18]==2) checked @endif @endif value="2" type="radio" id="customRadio5" name="q19" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[18]==3) checked @endif @endif value="3" type="radio" id="customRadio5" name="q19" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[18]==4) checked @endif @endif value="4" type="radio" id="customRadio5" name="q19" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[18]==5) checked @endif @endif value="5" type="radio" id="customRadio5" name="q19" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">11</th>
                                                <td class="text-left"><strong>Overall format</strong> <br></td>                                                 
                                                <td><input @if ($yesno == 'yes') @if ($markArr[19]==1) checked @endif @endif value="1" type="radio" id="customRadio5" name="q20" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[19]==2) checked @endif @endif value="2" type="radio" id="customRadio5" name="q20" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[19]==3) checked @endif @endif value="3" type="radio" id="customRadio5" name="q20" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[19]==4) checked @endif @endif value="4" type="radio" id="customRadio5" name="q20" ></td>
                                                <td><input @if ($yesno == 'yes') @if ($markArr[19]==5) checked @endif @endif value="5" type="radio" id="customRadio5" name="q20" ></td>
                                            </tr>

                                        </tbody>
                                        
                                    </table>

                                    {{-- <div class="form-group mt-5 "> 
                                        <p class="mb-2">PART C: ADDITIONAL COMMENT</p>
                                        <label for="example-text-input" class="col-form-label">Description</label> 
                                        <textarea class="form-control" name="description" id="description" rows="3" required></textarea> 
                                    </div>  --}}

                                    <button type="submit" class="btn btn-rounded btn-primary btn-lg btn-block mt-5">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
                </form>
            </div>
        </div>
    </div>

</div>

@endsection
