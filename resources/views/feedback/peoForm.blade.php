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
                    <h4>EMPLOYER / INDUSTRY QUESTIONNAIRE</h4>
                </div>

                <p><strong>PART A: COMPANY PROFILE</strong></p>
                <div class="mb-5 col-8">
                    
                    <div class="form-group">
                        <label class="col-form-label">Name of the Appointed Representative</label>
                        <input disabled class="form-control" type="text" name="name" placeholder="Enter name." required value="{{ $internship->supervisor->name }}">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Position of the Appointed Representative</label>
                        <input disabled class="form-control" type="text" name="position" placeholder="Enter position." required value="{{ $internship->supervisor->position }}">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Phone of the Appointed Representative)</label>
                        <input disabled class="form-control" type="text" name="phone" placeholder="Enter phone number." required value="{{ $internship->supervisor->contact }}">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Email of the Appointed Representative)</label>
                        <input disabled class="form-control" type="email" name="email" placeholder="Enter email." required value="{{ $internship->supervisor->email }}">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Company name</label>
                        <input disabled class="form-control" type="text" name="compName" placeholder="Enter company name." required value="{{ $internship->company->name }}">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Company phone number</label>
                        <input disabled class="form-control" type="text" name="compPhone" placeholder="Enter company phone number." required value="{{ $internship->company->phoneNumber }}">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Company email</label>
                        <input disabled class="form-control" type="email" name="compEmail" placeholder="Enter company email." required value="{{ $internship->supervisor->email }}">
                    </div>

                    {{-- <div class="form-group">
                        <label class="col-form-label">Nature of business</label>
                        <input class="form-control" type="text" name="nature" placeholder="Enter company nature of business." required>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Size of workforce</label>
                        <input class="form-control" type="text" name="size" placeholder="Enter company size of workforce." required>
                    </div> --}}

                    <div class="form-group">
                        <label class="col-form-label">Names of Department/Section/Unit that KUPTM student is attached for industry training</label>
                        <input disabled class="form-control" type="text" name="dept" placeholder="Enter department name." required value="{{ $internship->job_scope }}">
                    </div>


                </div>

                <p><strong>PART B: STUDENT’S PERFORMANCE EVALUATION </strong></p>
                <p>For each of the criteria, please rate the appropriate scale based on the statement given:</p>
                <form action="{{ route('company.peoAnswer',$internship->id) }}" method="POST">
                    @method('POST') 
                    @csrf
                    
                    @php
                    $markArr = array();
                    if(!empty($internship->empIndustrySurvey)){
                        $marks = $internship->empIndustrySurvey->marks;
                        $markArr = explode(',' , $marks);
                    }
                    //print_r($markArr);
                    @endphp

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-bordered text-center" style="  table-layout: fixed; width: 100%;  ">
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
                                                    <td>Strongly Disagree</td>
                                                    <td>Disagree</td>
                                                    <td>Neutral</td>
                                                    <td>Agree</td>
                                                    <td>Strongly Agree</td>
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
                                                    @php
                                                        $q1 = 0;
                                                        if(!empty($markArr)){
                                                            $q1 = $markArr[0];
                                                        }
                                                    @endphp
                                                    <th scope="row">1</th>
                                                    <td class="text-left">The student demonstrates the ability  to apply the basic principles of computing relevant to my organization.</td>
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
                                                    <td class="text-left">The student demonstrates the ability to select relevant tools and techniques in completing computing tasks.</td>
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
                                                    <td class="text-left">The student demonstrates the ability to use the relevant skills using the appropriate computing tools and techniques effectively.</td>                                                
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
                                                    <th scope="row">4</th>
                                                    <td class="text-left">The student demonstrates the ability to apply appropriate tools and techniques in completing computing tasks.</td>                                                
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
                                                    <th scope="row">5</th>
                                                    <td class="text-left">The student demonstrates the ability to produce  ethical computing solution to meet specified needs of stakeholders.</td>                                                 
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
                                                    <th scope="row">6</th>
                                                    <td class="text-left">The student demonstrates the ability to perform assigned tasks and manage work-related issues conscientiously and ethically.</td>
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
                                                    <th scope="row">7</th>
                                                    <td class="text-left">The student demonstrates the ability to recognize ethical, professional and legal responsibilities in computing situations and make informed judgments.</td>                                                 
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
                                                    <th scope="row">8</th>
                                                    <td class="text-left">The student demonstrates the ability to perform computing tasks professionally.</td>                                                 
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
                                                            $q9 = $markArr[9];
                                                        }
                                                    @endphp
                                                    <th scope="row">9</th>
                                                    <td class="text-left">The student demonstrates the ability to work collaboratively as part of a team undertaking different roles in a range of tasks.</td>                                                 
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
                                                    <th scope="row">10</th>
                                                    <td class="text-left">The  tudent demonstrates the ability to communicate effectively with a wide range of people in various professional contexts.</td>                                                 
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
                                                    <th scope="row">11</th>
                                                    <td class="text-left">The student demonstrates the ability to develop the computer-based systems sing relevant and current computing methods and tools.</td>                                                 
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
                                                    <th scope="row">12</th>
                                                    <td class="text-left">The student demonstrates the ability to recognize the needs and ability to engage in continuing professional development.</td>                                                 
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
                                                    <th scope="row">13</th>
                                                    <td class="text-left">The student demonstrates the ability to continuously learn new skills and knowledge in computing related field for lifelong learning.</td>                                                 
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
                                                    <th scope="row">14</th>
                                                    <td class="text-left">The student demonstrates the ability to apply managerial skills in computing practice.</td>                                                 
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
                                                    <th scope="row">15</th>
                                                    <td class="text-left">The student demonstrates the ability and capability to design and develop computer applications with potential economic/commercial value.</td>                                                 
                                                    <td><input @if($q15==1) checked @endif value="1" type="radio" id="customRadio5" name="q15" ></td>
                                                    <td><input @if($q15==2) checked @endif value="2" type="radio" id="customRadio5" name="q15" ></td>
                                                    <td><input @if($q15==3) checked @endif value="3" type="radio" id="customRadio5" name="q15" ></td>
                                                    <td><input @if($q15==4) checked @endif value="4" type="radio" id="customRadio5" name="q15" ></td>
                                                    <td><input @if($q15==5) checked @endif value="5" type="radio" id="customRadio5" name="q15" ></td>
                                                </tr>

                                            </tbody>

                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p><strong>PART C: EMPLOYER/SUPERVISOR’S COMMENT</strong></p>
                    <p>For each of the criteria, please seelct the appropriate answer based on the statement given:</p>

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
                                                    <th scope="col">Yes</th>
                                                    <th scope="col">No</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    @php
                                                        $q16 = 0;
                                                        if(!empty($markArr)){
                                                            $q16 = $markArr[15];
                                                        }
                                                    @endphp
                                                    <th scope="row">1</th>
                                                    <td class="text-left">KUPTM student’s attributes match my organisation’s requirement.</td>                                                 
                                                    <td><input @if($q16=='yes') checked @endif value="yes" type="radio" id="customRadio5" name="q16" ></td>
                                                    <td><input @if($q16=='no') checked @endif  value="no" type="radio" id="customRadio5" name="q16" ></td>
                                                </tr>

                                                <tr>
                                                    @php
                                                        $q17 = 0;
                                                        if(!empty($markArr)){
                                                            $q17 = $markArr[16];
                                                        }
                                                    @endphp
                                                    <th scope="row">2</th>
                                                    <td class="text-left">I am willing to employ KUPTM’s graduates in my organisation.</td>                                                 
                                                    <td><input @if($q17=='yes') checked @endif value="yes" type="radio" id="customRadio5" name="q17" ></td>
                                                    <td><input @if($q17=='no') checked @endif  value="no" type="radio" id="customRadio5" name="q17" ></td>
                                                </tr>

                                                <tr>
                                                    @php
                                                        $q18 = 0;
                                                        if(!empty($markArr)){
                                                            $q18 = $markArr[17];
                                                        }
                                                    @endphp
                                                    <th scope="row">3</th>
                                                    <td class="text-left">I am willing to  accept KUPTM’s students(s) to undergo practical training in my organisation in the future.</td>                                                 
                                                    <td><input @if($q18=='yes') checked @endif  value="yes" type="radio" id="customRadio5" name="q18" ></td>
                                                    <td><input @if($q18=='no') checked @endif   value="no" type="radio" id="customRadio5" name="q18" ></td>
                                                </tr>

                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p><strong>PART D: OVERALL COMMENT</strong></p>
                    <p>Please evaluate the overall performance of this student while undergoing practical training at your organization. </p>
                    <div class="col-lg-12 ">
                        <div class="card">
                            @php
                                $comment = "";
                                if(!empty($markArr)){
                                    $comment = $internship->empIndustrySurvey->comment;
                                }
                            @endphp

                            <div class="card-body">
                                <div class="form-group"> 
                                    <textarea class="form-control" name="comment" id="comment" rows="3" placeholder="Please fill in" required>{{$comment}}</textarea> 
                                </div> 
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-rounded btn-primary btn-lg btn-block mt-5">Submit</button>
                </form> 
            </div>
        </div>
    </div>

</div>

@endsection
