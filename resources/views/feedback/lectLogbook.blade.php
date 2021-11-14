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
                                    <form action="#">
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
                                                <td><input type="radio" id="customRadio5" name="1" ></td>
                                                <td><input type="radio" id="customRadio5" name="1" ></td>
                                                <td><input type="radio" id="customRadio5" name="1" ></td>
                                                <td><input type="radio" id="customRadio5" name="1" ></td>
                                                <td><input type="radio" id="customRadio5" name="1" ></td>
                                            </tr>
                                            
                                            <tr>
                                                <th scope="row">2</th>
                                                <td class="text-left"><strong>Table of Content</strong></td>
                                                <td><input type="radio" id="customRadio5" name="2" ></td>
                                                <td><input type="radio" id="customRadio5" name="2" ></td>
                                                <td><input type="radio" id="customRadio5" name="2" ></td>
                                                <td><input type="radio" id="customRadio5" name="2" ></td>
                                                <td><input type="radio" id="customRadio5" name="2" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">3</th>
                                                <td class="text-left"><strong>Objectives</strong> <br>
                                                    • Objectives of the report
                                                </td>                                                
                                                <td><input type="radio" id="customRadio5" name="3" ></td>
                                                <td><input type="radio" id="customRadio5" name="3" ></td>
                                                <td><input type="radio" id="customRadio5" name="3" ></td>
                                                <td><input type="radio" id="customRadio5" name="3" ></td>
                                                <td><input type="radio" id="customRadio5" name="3" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row"></th>
                                                <td class="text-left">
                                                    • Objectives of the training
                                                </td>                                                
                                                <td><input type="radio" id="customRadio5" name="3" ></td>
                                                <td><input type="radio" id="customRadio5" name="3" ></td>
                                                <td><input type="radio" id="customRadio5" name="3" ></td>
                                                <td><input type="radio" id="customRadio5" name="3" ></td>
                                                <td><input type="radio" id="customRadio5" name="3" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">4</th>
                                                <td class="text-left"><strong>Company Profile</strong> <br>
                                                    • Company background <br>
                                                </td>                                                 
                                                <td><input type="radio" id="customRadio5" name="4" ></td>
                                                <td><input type="radio" id="customRadio5" name="4" ></td>
                                                <td><input type="radio" id="customRadio5" name="4" ></td>
                                                <td><input type="radio" id="customRadio5" name="4" ></td>
                                                <td><input type="radio" id="customRadio5" name="4" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row"></th>
                                                <td class="text-left">
                                                    • Organisation chart
                                                </td>                                                 
                                                <td><input type="radio" id="customRadio5" name="4" ></td>
                                                <td><input type="radio" id="customRadio5" name="4" ></td>
                                                <td><input type="radio" id="customRadio5" name="4" ></td>
                                                <td><input type="radio" id="customRadio5" name="4" ></td>
                                                <td><input type="radio" id="customRadio5" name="4" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row"></th>
                                                <td class="text-left">
                                                    • Details of industrial supervisor
                                                </td>                                                 
                                                <td><input type="radio" id="customRadio5" name="4" ></td>
                                                <td><input type="radio" id="customRadio5" name="4" ></td>
                                                <td><input type="radio" id="customRadio5" name="4" ></td>
                                                <td><input type="radio" id="customRadio5" name="4" ></td>
                                                <td><input type="radio" id="customRadio5" name="4" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">5</th>
                                                <td class="text-left"><strong>Details of Experience</strong> <br>
                                                    • Describe the duties and various tasks in detail (details of project completed, estimation, costing and etc.) 
                                                </td>                                                 
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row"></th>
                                                <td class="text-left">
                                                    • The problems encountered and the approach for solving problems <br>
                                                </td>                                                 
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row"></th>
                                                <td class="text-left">
                                                    • The professional and ethical issues, health and environmental issues that are encountered during the training <br>
                                                </td>                                                 
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">6</th>
                                                <td class="text-left"><strong>Discussion and Conclusion</strong> <br>
                                                    • Discussion and suggestion of the training 
                                                </td>                                                 
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row"></th>
                                                <td class="text-left">
                                                    • Conclusion of the training
                                                </td>                                                 
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">7</th>
                                                <td class="text-left"><strong>References</strong> <br>
                                                    • The list of references used in preparing the report
                                                </td>                                                 
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                            </tr>
                                            
                                            <tr>
                                                <th scope="row">8</th>
                                                <td class="text-left"><strong>Appendix</strong> <br>
                                                    • Any other relevant details to support the write up. For example, design details, copies of letters, project report, figures, tables, pictures and etc.
                                                </td>                                                 
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row"></th>
                                                <td class="text-left">
                                                    • Each appendix must have a title and being mentioned in the report.
                                                </td>                                                 
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">9</th>
                                                <td class="text-left"><strong>Preparation of Logbook</strong> <br>
                                                    • Able to maintain a logbook systematically
                                                </td>                                                 
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row"></th>
                                                <td class="text-left">
                                                    • The logbook has been signed completely (at least once a week)
                                                </td>                                                 
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">10</th>
                                                <td class="text-left"><strong>Content of Logbook</strong> <br>
                                                    • Describe the duties and tasks undertaken by the student
                                                </td>                                                 
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row"></th>
                                                <td class="text-left">
                                                    • The explanations must follow the schedule as recorded in log book
                                                </td>                                                 
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">11</th>
                                                <td class="text-left"><strong>Overall format</strong> <br></td>                                                 
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
                                                <td><input type="radio" id="customRadio5" name="5" ></td>
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
