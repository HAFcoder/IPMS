@extends('layouts.parentPublic')

@section('breadcrumbs')

@endsection

@section('content')

<div class="row ">

    <div class="col-10 mt-5 mx-auto">
        <div class="card">
            <div class="card-body">

                <div class="text-center mb-5 mt-4">
                    <a href="#"><img style="height: 80px" src="{{ asset('assets/images/icon/kuptm_logo.png') }}" alt="logo"></a>
                    <h4>INDUSTRIAL SUPERVISOR EVALUATION REPORT</h4>
                </div>

                <div class="mb-5">
                    <p><strong>INSTRUCTION</strong></p>
                    <p>1.	This form is to be completed during the final week of industry training.</p>
                    <p>2.	The appointed staff that supervises the student at the organisation either in parts 
                        or completely, is eligible to evaluate the student using this form. Please print additional 
                        reports (if any) on the organisation’s letter head should they be necessary to accompany this form.</p>
                    <p>3.	One form is to be used for each student under supervision.</p>
                    <p>4.	The report is CONFIDENTIAL so it must be returned to the respective Academic Supervisor or via registered 
                        mail/ email/ facsimile to the Industry Collaboration and Placement (ICP) Department –address as provided 
                        on the last page of this form.</p>  
                    <p>5.	A copy of this report can be made available for the organisation.</p>   
                    <p>6.	This report contributes 40% of the total marks.</p>
                </div>

                <div class="mb-5">
                    <p><strong>STUDENT DETAILS</strong></p>
                    <p>Name:</p>
                    <p>Programme Code:</p>
                    <p>NRIC:</p>
                </div>

                <div class="mb-5">
                    <p><strong>INDUSTRY SUPERVISOR DETAILS</strong></p>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Name</span>
                        </div>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter your full name">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Position</span>
                        </div>
                        <input type="text" id="position" name="position" class="form-control" placeholder="Enter your position">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Phone</span>
                        </div>
                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter your phone number">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Email</span>
                        </div>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email">
                    </div>
                </div>

                {{-- <p><strong>Student’s Scope of Work (Job Specification)</strong></p> --}}
                <div class="form-group mt-5 "> 
                    <label for="example-text-input" class="col-form-label">Student’s Scope of Work (Job Specification)</label> 
                    <textarea class="form-control" name="jobScope" id="jobScope" rows="3" placeholder="Please fill in" required></textarea> 
                </div> 

                <p><strong>For each of the criteria, rate the student according to the scale shown:</strong></p>
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
                                    <form action="" method="post">
                                        @method('POST') 
                                        @csrf
                                        
                                    {{-- <input name="evaId" id="evaId" 
                                    @if ($yesno == 'yes')
                                        value="{{$finaleva->id}}"
                                    @else
                                        value="0"
                                    @endif
                                    style="display: none">
                                    <input name="internship_id" id="internship_id" value="{{$id}}" style="display:none"> --}}
                                    
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
                                                <td class="text-left"><strong>Knowledge and skills in the field</strong> <br>
                                                    i. Knowledge of subject area
                                                </td>
                                                <td><input value="1" type="radio" id="customRadio5" name="q1" ></td>
                                                <td><input value="2" type="radio" id="customRadio5" name="q1" ></td>
                                                <td><input value="3" type="radio" id="customRadio5" name="q1" ></td>
                                                <td><input value="4" type="radio" id="customRadio5" name="q1" ></td>
                                                <td><input value="5" type="radio" id="customRadio5" name="q1" ></td>
                                            </tr>
                                            
                                            <tr>
                                                <th scope="row"></th>
                                                <td class="text-left">ii. Ability in the relevant skills</td>
                                                <td><input value="1" type="radio" id="customRadio5" name="q2" ></td>
                                                <td><input value="2" type="radio" id="customRadio5" name="q2" ></td>
                                                <td><input value="3" type="radio" id="customRadio5" name="q2" ></td>
                                                <td><input value="4" type="radio" id="customRadio5" name="q2" ></td>
                                                <td><input value="5" type="radio" id="customRadio5" name="q2" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row"></th>
                                                <td class="text-left">iii. Ability in completing written reports</td>                                                
                                                <td><input value="1" type="radio" id="customRadio5" name="q3" ></td>
                                                <td><input value="2" type="radio" id="customRadio5" name="q3" ></td>
                                                <td><input value="3" type="radio" id="customRadio5" name="q3" ></td>
                                                <td><input value="4" type="radio" id="customRadio5" name="q3" ></td>
                                                <td><input value="5" type="radio" id="customRadio5" name="q3" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">2</th>
                                                <td class="text-left"><strong>Planning and organisation of work</strong> <br>
                                                    i. Time management
                                                </td>                                                
                                                <td><input value="1" type="radio" id="customRadio5" name="q4" ></td>
                                                <td><input value="2" type="radio" id="customRadio5" name="q4" ></td>
                                                <td><input value="3" type="radio" id="customRadio5" name="q4" ></td>
                                                <td><input value="4" type="radio" id="customRadio5" name="q4" ></td>
                                                <td><input value="5" type="radio" id="customRadio5" name="q4" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row"></th>
                                                <td class="text-left">ii. Problem solving skills</td>                                                 
                                                <td><input value="1" type="radio" id="customRadio5" name="q5" ></td>
                                                <td><input value="2" type="radio" id="customRadio5" name="q5" ></td>
                                                <td><input value="3" type="radio" id="customRadio5" name="q5" ></td>
                                                <td><input value="4" type="radio" id="customRadio5" name="q5" ></td>
                                                <td><input value="5" type="radio" id="customRadio5" name="q5" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row"></th>
                                                <td class="text-left">iii. Ability to apply theoretical knowledge to the practical tasks</td>
                                                <td><input value="1" type="radio" id="customRadio5" name="q6" ></td>
                                                <td><input value="2" type="radio" id="customRadio5" name="q6" ></td>
                                                <td><input value="3" type="radio" id="customRadio5" name="q6" ></td>
                                                <td><input value="4" type="radio" id="customRadio5" name="q6" ></td>
                                                <td><input value="5" type="radio" id="customRadio5" name="q6" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">3</th>
                                                <td class="text-left"><strong>Teamwork</strong> <br>
                                                    i. Ability to handle challenges
                                                </td>                                                 
                                                <td><input value="1" type="radio" id="customRadio5" name="q7" ></td>
                                                <td><input value="2" type="radio" id="customRadio5" name="q7" ></td>
                                                <td><input value="3" type="radio" id="customRadio5" name="q7" ></td>
                                                <td><input value="4" type="radio" id="customRadio5" name="q7" ></td>
                                                <td><input value="5" type="radio" id="customRadio5" name="q7" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row"></th>
                                                <td class="text-left">ii. Ability to adapt to different situation</td>                                                 
                                                <td><input value="1" type="radio" id="customRadio5" name="q8" ></td>
                                                <td><input value="2" type="radio" id="customRadio5" name="q8" ></td>
                                                <td><input value="3" type="radio" id="customRadio5" name="q8" ></td>
                                                <td><input value="4" type="radio" id="customRadio5" name="q8" ></td>
                                                <td><input value="5" type="radio" id="customRadio5" name="q8" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row"></th>
                                                <td class="text-left">iii. Commitment to task/work</td>                                                 
                                                <td><input value="1" type="radio" id="customRadio5" name="q9" ></td>
                                                <td><input value="2" type="radio" id="customRadio5" name="q9" ></td>
                                                <td><input value="3" type="radio" id="customRadio5" name="q9" ></td>
                                                <td><input value="4" type="radio" id="customRadio5" name="q9" ></td>
                                                <td><input value="5" type="radio" id="customRadio5" name="q9" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row"></th>
                                                <td class="text-left">iv. Ability to work effectively as an individual and as a member of a team</td>                                                 
                                                <td><input value="1" type="radio" id="customRadio5" name="q10" ></td>
                                                <td><input value="2" type="radio" id="customRadio5" name="q10" ></td>
                                                <td><input value="3" type="radio" id="customRadio5" name="q10" ></td>
                                                <td><input value="4" type="radio" id="customRadio5" name="q10" ></td>
                                                <td><input value="5" type="radio" id="customRadio5" name="q10" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">4</th>
                                                <td class="text-left"><strong>Communication</strong> <br>
                                                    i. Rapport-ability to develop good relationship with others
                                                </td>                                                 
                                                <td><input value="1" type="radio" id="customRadio5" name="q11" ></td>
                                                <td><input value="2" type="radio" id="customRadio5" name="q11" ></td>
                                                <td><input value="3" type="radio" id="customRadio5" name="q11" ></td>
                                                <td><input value="4" type="radio" id="customRadio5" name="q11" ></td>
                                                <td><input value="5" type="radio" id="customRadio5" name="q11" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row"></th>
                                                <td class="text-left">ii. Ability to communicate effectively</td>                                                 
                                                <td><input value="1" type="radio" id="customRadio5" name="q12" ></td>
                                                <td><input value="2" type="radio" id="customRadio5" name="q12" ></td>
                                                <td><input value="3" type="radio" id="customRadio5" name="q12" ></td>
                                                <td><input value="4" type="radio" id="customRadio5" name="q12" ></td>
                                                <td><input value="5" type="radio" id="customRadio5" name="q12" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row"></th>
                                                <td class="text-left">iii. Ability to construct coherent written communication</td>                                                 
                                                <td><input value="1" type="radio" id="customRadio5" name="q13" ></td>
                                                <td><input value="2" type="radio" id="customRadio5" name="q13" ></td>
                                                <td><input value="3" type="radio" id="customRadio5" name="q13" ></td>
                                                <td><input value="4" type="radio" id="customRadio5" name="q13" ></td>
                                                <td><input value="5" type="radio" id="customRadio5" name="q13" ></td>
                                            </tr>
                                            
                                            <tr>
                                                <th scope="row"></th>
                                                <td class="text-left">iv. Present effective verbal communication</td>                                                 
                                                <td><input value="1" type="radio" id="customRadio5" name="q14" ></td>
                                                <td><input value="2" type="radio" id="customRadio5" name="q14" ></td>
                                                <td><input value="3" type="radio" id="customRadio5" name="q14" ></td>
                                                <td><input value="4" type="radio" id="customRadio5" name="q14" ></td>
                                                <td><input value="5" type="radio" id="customRadio5" name="q14" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">5</th>
                                                <td class="text-left"><strong>Personality</strong> <br>
                                                    i. Pleasant character
                                                </td>                                                 
                                                <td><input value="1" type="radio" id="customRadio5" name="q15" ></td>
                                                <td><input value="2" type="radio" id="customRadio5" name="q15" ></td>
                                                <td><input value="3" type="radio" id="customRadio5" name="q15" ></td>
                                                <td><input value="4" type="radio" id="customRadio5" name="q15" ></td>
                                                <td><input value="5" type="radio" id="customRadio5" name="q15" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row"></th>
                                                <td class="text-left">
                                                    ii. Cooperative
                                                </td>                                                 
                                                <td><input value="1" type="radio" id="customRadio5" name="q16" ></td>
                                                <td><input value="2" type="radio" id="customRadio5" name="q16" ></td>
                                                <td><input value="3" type="radio" id="customRadio5" name="q16" ></td>
                                                <td><input value="4" type="radio" id="customRadio5" name="q16" ></td>
                                                <td><input value="5" type="radio" id="customRadio5" name="q16" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row"></th>
                                                <td class="text-left">
                                                    iii. Self-confident
                                                </td>                                                 
                                                <td><input value="1" type="radio" id="customRadio5" name="q17" ></td>
                                                <td><input value="2" type="radio" id="customRadio5" name="q17" ></td>
                                                <td><input value="3" type="radio" id="customRadio5" name="q17" ></td>
                                                <td><input value="4" type="radio" id="customRadio5" name="q17" ></td>
                                                <td><input value="5" type="radio" id="customRadio5" name="q17" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">6</th>
                                                <td class="text-left"><strong>Discipline</strong> <br>
                                                    i. Possess good self-discipline
                                                </td>                                                 
                                                <td><input value="1" type="radio" id="customRadio5" name="q18" ></td>
                                                <td><input value="2" type="radio" id="customRadio5" name="q18" ></td>
                                                <td><input value="3" type="radio" id="customRadio5" name="q18" ></td>
                                                <td><input value="4" type="radio" id="customRadio5" name="q18" ></td>
                                                <td><input value="5" type="radio" id="customRadio5" name="q18" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row"></th>
                                                <td class="text-left">ii. Compliance to rules</td>                                                 
                                                <td><input value="1" type="radio" id="customRadio5" name="q19" ></td>
                                                <td><input value="2" type="radio" id="customRadio5" name="q19" ></td>
                                                <td><input value="3" type="radio" id="customRadio5" name="q19" ></td>
                                                <td><input value="4" type="radio" id="customRadio5" name="q19" ></td>
                                                <td><input value="5" type="radio" id="customRadio5" name="q19" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row"></th>
                                                <td class="text-left">iii. Punctuality and attendance</td>                                                 
                                                <td><input value="1" type="radio" id="customRadio5" name="q20" ></td>
                                                <td><input value="2" type="radio" id="customRadio5" name="q20" ></td>
                                                <td><input value="3" type="radio" id="customRadio5" name="q20" ></td>
                                                <td><input value="4" type="radio" id="customRadio5" name="q20" ></td>
                                                <td><input value="5" type="radio" id="customRadio5" name="q20" ></td>
                                            </tr>

                                        </tbody>
                                        
                                    </table>

                                    <div class="form-group mt-5 "> 
                                        <label for="example-text-input" class="col-form-label">Comments</label> 
                                        <textarea class="form-control" name="comments" id="comments" rows="3" placeholder="Please fill in" required></textarea> 
                                    </div> 

                                    <div class="form-group mt-5 "> 
                                        <label for="example-text-input" class="col-form-label">Suggestions</label> 
                                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Please fill in" equired></textarea> 
                                    </div> 

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
