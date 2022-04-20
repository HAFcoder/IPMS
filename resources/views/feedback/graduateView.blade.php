@extends('layouts.parentPublic')

@section('breadcrumbs')

@endsection

@section('content')

<!-- access model class inside blade -->
@inject('programme', 'App\Models\Programme')

<div class="row ">

                                        
    @php
    $markArr = array();
    if(!empty($internship->graduateAnswer)){
        $marks = $internship->graduateAnswer->marks;
        $markArr = explode(',' , $marks);
    }
    //print_r($markArr);
    @endphp

    <div class="col-10 mt-5 mx-auto">
        <div class="card">
            <div class="card-body">

                <div class="text-center mb-5 mt-4">
                    <a href="#"><img style="height: 80px" src="{{ asset('assets/images/icon/kuptm_logo.png') }}" alt="logo"></a>
                    <h4>
                        GRADUATE QUESTIONNAIRE
                    </h4>
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
                                                <th scope="col">Scale</th>
                                                <th scope="col">1</th>
                                                <th scope="col">2</th>
                                                <th scope="col">3</th>
                                                <th scope="col">4</th>
                                                <th scope="col">5</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">Indicator</th>
                                                <td>Strongly disagree</td>
                                                <td>Disagree</td>
                                                <td>Neutral</td>
                                                <td>Agree</td>
                                                <td>Strongly agree</td>
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
                                                <td class="text-left">I am able to apply the basic principles of computing relevant to my program of study.</td>
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
                                                <td class="text-left">I am able to select relevant tools and techniques in completing computing tasks.</td>
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
                                                <td class="text-left">I can use the relevant skills using the appropriate computing tools and techniques effectively.</td>
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
                                                <td class="text-left">I am able to apply appropriate tools and techniques in completing computing tasks.</td>
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
                                                <td class="text-left">I am able to produce ethical computing solution to meet specified needs of stakeholders.</td>
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
                                                <td class="text-left">I am able to perform assigned tasks and manage work- related issues conscientiously and ethically.</td>
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
                                                <td class="text-left">I am able to recognize ethical, professional and legal responsibilities in computing situations and make informed judgments.</td>
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
                                                <td class="text-left">I am able to perform computing tasks professionally.</td>
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
                                                <th scope="row">9</th>
                                                <td class="text-left">I am able to work collaboratively as part of a team undertaking different roles in a range of tasks.</td>
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
                                                <td class="text-left">I am able to communicate effectively with a wide range of people in various professional contexts.</td>
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
                                                <td class="text-left">I am able to develop the computer-based systems using relevant and current computing methods and tools.</td>
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
                                                <td class="text-left">I am able to recognize the needs and ability to engage in continuing professional development.</td>
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
                                                <td class="text-left">I am able to continuously learn new skills and knowledge in computing related field for lifelong learning.</td>
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
                                                <td class="text-left">I am able to apply managerial skills in computing practice.</td>
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
                                                <td class="text-left">I have the ability and capability to design and develop computer applications with potential economic/commercial value.</td>
                                                <td><input @if($q15==1) checked @endif value="1" type="radio" id="customRadio5" name="q15" ></td>
                                                <td><input @if($q15==2) checked @endif value="2" type="radio" id="customRadio5" name="q15" ></td>
                                                <td><input @if($q15==3) checked @endif value="3" type="radio" id="customRadio5" name="q15" ></td>
                                                <td><input @if($q15==4) checked @endif value="4" type="radio" id="customRadio5" name="q15" ></td>
                                                <td><input @if($q15==5) checked @endif value="5" type="radio" id="customRadio5" name="q15" ></td>
                                            </tr>

                                        </tbody>
                                        
                                    </table>

                                    @php
                                        $comment = "";
                                        if(!empty($markArr)){
                                            $comment = $internship->graduateAnswer->comment;
                                        }
                                    @endphp

                                    <div class="form-group mt-5 "> 
                                        <label for="example-text-input" class="col-form-label">Comments</label> 
                                        <textarea class="form-control" name="comment" id="comments" rows="3" placeholder="Please fill in" required>{{$comment}}</textarea> 
                                    </div> 

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
