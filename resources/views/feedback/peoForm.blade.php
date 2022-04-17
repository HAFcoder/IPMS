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
                        <label class="col-form-label">Name of the Head of Organisation (or appointed representative)</label>
                        <input class="form-control" type="text" name="name" placeholder="Enter name." required>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Position of the Head of Organisation (or appointed representative)</label>
                        <input class="form-control" type="text" name="position" placeholder="Enter position." required>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Phone of the Head of Organisation (or appointed representative)</label>
                        <input class="form-control" type="text" name="phone" placeholder="Enter phone number." required>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Email of the Head of Organisation (or appointed representative)</label>
                        <input class="form-control" type="email" name="email" placeholder="Enter email." required>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Company name</label>
                        <input class="form-control" type="text" name="compName" placeholder="Enter company name." required>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Company phone number</label>
                        <input class="form-control" type="text" name="compPhone" placeholder="Enter company phone number." required>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Company email</label>
                        <input class="form-control" type="email" name="compEmail" placeholder="Enter company email." required>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Nature of business</label>
                        <input class="form-control" type="text" name="nature" placeholder="Enter company nature of business." required>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Size of workforce</label>
                        <input class="form-control" type="text" name="size" placeholder="Enter company size of workforce." required>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Names of Department/Section/Unit that KUPTM student is attached for industry training</label>
                        <input class="form-control" type="text" name="dept" placeholder="Enter department name." required>
                    </div>


                </div>

                <p><strong>PART B: STUDENT’S PERFORMANCE EVALUATION </strong></p>
                <p>For each of the criteria, please rate the appropriate scale based on the statement given:</p>
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
                                                <th scope="row">1</th>
                                                <td class="text-left">The student demonstrates the ability  to apply the basic principles of computing relevant to my organization.</td>
                                                <td><input value="1" type="radio" id="customRadio5" name="q1" ></td>
                                                <td><input value="2" type="radio" id="customRadio5" name="q1" ></td>
                                                <td><input value="3" type="radio" id="customRadio5" name="q1" ></td>
                                                <td><input value="4" type="radio" id="customRadio5" name="q1" ></td>
                                                <td><input value="5" type="radio" id="customRadio5" name="q1" ></td>
                                            </tr>
                                            
                                            <tr>
                                                <th scope="row">2</th>
                                                <td class="text-left">The student demonstrates the ability to select relevant tools and techniques in completing computing tasks.</td>
                                                <td><input value="1" type="radio" id="customRadio5" name="q2" ></td>
                                                <td><input value="2" type="radio" id="customRadio5" name="q2" ></td>
                                                <td><input value="3" type="radio" id="customRadio5" name="q2" ></td>
                                                <td><input value="4" type="radio" id="customRadio5" name="q2" ></td>
                                                <td><input value="5" type="radio" id="customRadio5" name="q2" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">3</th>
                                                <td class="text-left">The student demonstrates the ability to use the relevant skills using the appropriate computing tools and techniques effectively.</td>                                                
                                                <td><input value="1" type="radio" id="customRadio5" name="q3" ></td>
                                                <td><input value="2" type="radio" id="customRadio5" name="q3" ></td>
                                                <td><input value="3" type="radio" id="customRadio5" name="q3" ></td>
                                                <td><input value="4" type="radio" id="customRadio5" name="q3" ></td>
                                                <td><input value="5" type="radio" id="customRadio5" name="q3" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">4</th>
                                                <td class="text-left">The student demonstrates the ability to apply appropriate tools and techniques in completing computing tasks.</td>                                                
                                                <td><input value="1" type="radio" id="customRadio5" name="q4" ></td>
                                                <td><input value="2" type="radio" id="customRadio5" name="q4" ></td>
                                                <td><input value="3" type="radio" id="customRadio5" name="q4" ></td>
                                                <td><input value="4" type="radio" id="customRadio5" name="q4" ></td>
                                                <td><input value="5" type="radio" id="customRadio5" name="q4" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">5</th>
                                                <td class="text-left">The student demonstrates the ability to produce  ethical computing solution to meet specified needs of stakeholders.</td>                                                 
                                                <td><input value="1" type="radio" id="customRadio5" name="q5" ></td>
                                                <td><input value="2" type="radio" id="customRadio5" name="q5" ></td>
                                                <td><input value="3" type="radio" id="customRadio5" name="q5" ></td>
                                                <td><input value="4" type="radio" id="customRadio5" name="q5" ></td>
                                                <td><input value="5" type="radio" id="customRadio5" name="q5" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">6</th>
                                                <td class="text-left">The student demonstrates the ability to perform assigned tasks and manage work-related issues conscientiously and ethically.</td>
                                                <td><input value="1" type="radio" id="customRadio5" name="q6" ></td>
                                                <td><input value="2" type="radio" id="customRadio5" name="q6" ></td>
                                                <td><input value="3" type="radio" id="customRadio5" name="q6" ></td>
                                                <td><input value="4" type="radio" id="customRadio5" name="q6" ></td>
                                                <td><input value="5" type="radio" id="customRadio5" name="q6" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">7</th>
                                                <td class="text-left">The student demonstrates the ability to recognize ethical, professional and legal responsibilities in computing situations and make informed judgments.</td>                                                 
                                                <td><input value="1" type="radio" id="customRadio5" name="q7" ></td>
                                                <td><input value="2" type="radio" id="customRadio5" name="q7" ></td>
                                                <td><input value="3" type="radio" id="customRadio5" name="q7" ></td>
                                                <td><input value="4" type="radio" id="customRadio5" name="q7" ></td>
                                                <td><input value="5" type="radio" id="customRadio5" name="q7" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">8</th>
                                                <td class="text-left">The student demonstrates the ability to perform computing tasks professionally.</td>                                                 
                                                <td><input value="1" type="radio" id="customRadio5" name="q8" ></td>
                                                <td><input value="2" type="radio" id="customRadio5" name="q8" ></td>
                                                <td><input value="3" type="radio" id="customRadio5" name="q8" ></td>
                                                <td><input value="4" type="radio" id="customRadio5" name="q8" ></td>
                                                <td><input value="5" type="radio" id="customRadio5" name="q8" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">9</th>
                                                <td class="text-left">The student demonstrates the ability to work collaboratively as part of a team undertaking different roles in a range of tasks.</td>                                                 
                                                <td><input value="1" type="radio" id="customRadio5" name="q9" ></td>
                                                <td><input value="2" type="radio" id="customRadio5" name="q9" ></td>
                                                <td><input value="3" type="radio" id="customRadio5" name="q9" ></td>
                                                <td><input value="4" type="radio" id="customRadio5" name="q9" ></td>
                                                <td><input value="5" type="radio" id="customRadio5" name="q9" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">10</th>
                                                <td class="text-left">The  tudent demonstrates the ability to communicate effectively with a wide range of people in various professional contexts.</td>                                                 
                                                <td><input value="1" type="radio" id="customRadio5" name="q10" ></td>
                                                <td><input value="2" type="radio" id="customRadio5" name="q10" ></td>
                                                <td><input value="3" type="radio" id="customRadio5" name="q10" ></td>
                                                <td><input value="4" type="radio" id="customRadio5" name="q10" ></td>
                                                <td><input value="5" type="radio" id="customRadio5" name="q10" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">11</th>
                                                <td class="text-left">The student demonstrates the ability to develop the computer-based systems sing relevant and current computing methods and tools.</td>                                                 
                                                <td><input value="1" type="radio" id="customRadio5" name="q11" ></td>
                                                <td><input value="2" type="radio" id="customRadio5" name="q11" ></td>
                                                <td><input value="3" type="radio" id="customRadio5" name="q11" ></td>
                                                <td><input value="4" type="radio" id="customRadio5" name="q11" ></td>
                                                <td><input value="5" type="radio" id="customRadio5" name="q11" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">12</th>
                                                <td class="text-left">The student demonstrates the ability to recognize the needs and ability to engage in continuing professional development.</td>                                                 
                                                <td><input value="1" type="radio" id="customRadio5" name="q12" ></td>
                                                <td><input value="2" type="radio" id="customRadio5" name="q12" ></td>
                                                <td><input value="3" type="radio" id="customRadio5" name="q12" ></td>
                                                <td><input value="4" type="radio" id="customRadio5" name="q12" ></td>
                                                <td><input value="5" type="radio" id="customRadio5" name="q12" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">13</th>
                                                <td class="text-left">The student demonstrates the ability to continuously learn new skills and knowledge in computing related field for lifelong learning.</td>                                                 
                                                <td><input value="1" type="radio" id="customRadio5" name="q13" ></td>
                                                <td><input value="2" type="radio" id="customRadio5" name="q13" ></td>
                                                <td><input value="3" type="radio" id="customRadio5" name="q13" ></td>
                                                <td><input value="4" type="radio" id="customRadio5" name="q13" ></td>
                                                <td><input value="5" type="radio" id="customRadio5" name="q13" ></td>
                                            </tr>
                                            
                                            <tr>
                                                <th scope="row">14</th>
                                                <td class="text-left">The student demonstrates the ability to apply managerial skills in computing practice.</td>                                                 
                                                <td><input value="1" type="radio" id="customRadio5" name="q14" ></td>
                                                <td><input value="2" type="radio" id="customRadio5" name="q14" ></td>
                                                <td><input value="3" type="radio" id="customRadio5" name="q14" ></td>
                                                <td><input value="4" type="radio" id="customRadio5" name="q14" ></td>
                                                <td><input value="5" type="radio" id="customRadio5" name="q14" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">15</th>
                                                <td class="text-left">The student demonstrates the ability and capability to design and develop computer applications with potential economic/commercial value.</td>                                                 
                                                <td><input value="1" type="radio" id="customRadio5" name="q15" ></td>
                                                <td><input value="2" type="radio" id="customRadio5" name="q15" ></td>
                                                <td><input value="3" type="radio" id="customRadio5" name="q15" ></td>
                                                <td><input value="4" type="radio" id="customRadio5" name="q15" ></td>
                                                <td><input value="5" type="radio" id="customRadio5" name="q15" ></td>
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
                                                <th scope="row">1</th>
                                                <td class="text-left">KUPTM student’s attributes match my organisation’s requirement.</td>                                                 
                                                <td><input value="yes" type="radio" id="customRadio5" name="q16" ></td>
                                                <td><input value="no" type="radio" id="customRadio5" name="q16" ></td>
                                            </tr>
                                            
                                            <tr>
                                                <th scope="row">2</th>
                                                <td class="text-left">I am willing to employ KUPTM’s graduates in my organisation.</td>                                                 
                                                <td><input value="yes" type="radio" id="customRadio5" name="q17" ></td>
                                                <td><input value="no" type="radio" id="customRadio5" name="q17" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">3</th>
                                                <td class="text-left">I am willing to  accept KUPTM’s students(s) to undergo practical training in my organisation in the future.</td>                                                 
                                                <td><input value="yes" type="radio" id="customRadio5" name="q18" ></td>
                                                <td><input value="no" type="radio" id="customRadio5" name="q18" ></td>
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
                        <div class="card-body">
                            <div class="form-group"> 
                                <textarea class="form-control" name="evaluate" id="evaluate" rows="3" placeholder="Please fill in" required></textarea> 
                            </div> 
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-rounded btn-primary btn-lg btn-block mt-5">Submit</button>
                    
            </div>
        </div>
    </div>

</div>

@endsection
