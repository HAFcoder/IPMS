@extends('layouts.parentStudent')
{{-- register student session in studnet page --}}

@section('head')

@endsection

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Feedbacks & Survey</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/') }}">Home</a></li>
                {{-- <li><a >Session</a></li> --}}
                <li><span>Graduate Survey</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <div class="row ">

        <div class="col-10 mt-5 mx-auto">
            <div class="card">
                <div class="card-body">

                    <div class="text-center mb-4">
                        <h4>
                            GRADUATE QUESTIONNAIRE <br>
                            {{ $stud_info->programmes->name }} <br> {{ $stud_info->programmes->code }} <br>
                        </h4>
                    </div>

                    <p>PART A: STUDENT’S EVALUATION</p>
                    <p>INSTRUCTION: Please circle the appropriate scale based on the statement given.</p>

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
                                                    <td class="text-left">I am able to apply the basic principles of computing relevant to my program of study.</td>
                                                    <td><input type="radio" id="customRadio5" name="1" ></td>
                                                    <td><input type="radio" id="customRadio5" name="1" ></td>
                                                    <td><input type="radio" id="customRadio5" name="1" ></td>
                                                    <td><input type="radio" id="customRadio5" name="1" ></td>
                                                    <td><input type="radio" id="customRadio5" name="1" ></td>
                                                </tr>
                                                
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td class="text-left">I am able to select relevant tools and techniques in completing computing tasks.</td>
                                                    <td><input type="radio" id="customRadio5" name="2" ></td>
                                                    <td><input type="radio" id="customRadio5" name="2" ></td>
                                                    <td><input type="radio" id="customRadio5" name="2" ></td>
                                                    <td><input type="radio" id="customRadio5" name="2" ></td>
                                                    <td><input type="radio" id="customRadio5" name="2" ></td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td class="text-left">I can use the relevant skills using the appropriate computing tools and techniques effectively.</td>
                                                    <td><input type="radio" id="customRadio5" name="3" ></td>
                                                    <td><input type="radio" id="customRadio5" name="3" ></td>
                                                    <td><input type="radio" id="customRadio5" name="3" ></td>
                                                    <td><input type="radio" id="customRadio5" name="3" ></td>
                                                    <td><input type="radio" id="customRadio5" name="3" ></td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">4</th>
                                                    <td class="text-left">I am able to apply appropriate tools and techniques in completing computing tasks.</td>
                                                    <td><input type="radio" id="customRadio5" name="4" ></td>
                                                    <td><input type="radio" id="customRadio5" name="4" ></td>
                                                    <td><input type="radio" id="customRadio5" name="4" ></td>
                                                    <td><input type="radio" id="customRadio5" name="4" ></td>
                                                    <td><input type="radio" id="customRadio5" name="4" ></td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">5</th>
                                                    <td class="text-left">I am able to produce ethical computing solution to meet specified needs of stakeholders.</td>
                                                    <td><input type="radio" id="customRadio5" name="5" ></td>
                                                    <td><input type="radio" id="customRadio5" name="5" ></td>
                                                    <td><input type="radio" id="customRadio5" name="5" ></td>
                                                    <td><input type="radio" id="customRadio5" name="5" ></td>
                                                    <td><input type="radio" id="customRadio5" name="5" ></td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">6</th>
                                                    <td class="text-left">I am able to perform assigned tasks and manage work- related issues conscientiously and ethically.</td>
                                                    <td><input type="radio" id="customRadio5" name="6" ></td>
                                                    <td><input type="radio" id="customRadio5" name="6" ></td>
                                                    <td><input type="radio" id="customRadio5" name="6" ></td>
                                                    <td><input type="radio" id="customRadio5" name="6" ></td>
                                                    <td><input type="radio" id="customRadio5" name="6" ></td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">7</th>
                                                    <td class="text-left">I am able to recognize ethical, professional and legal responsibilities in computing situations and make informed judgments.</td>
                                                    <td><input type="radio" id="customRadio5" name="7" ></td>
                                                    <td><input type="radio" id="customRadio5" name="7" ></td>
                                                    <td><input type="radio" id="customRadio5" name="7" ></td>
                                                    <td><input type="radio" id="customRadio5" name="7" ></td>
                                                    <td><input type="radio" id="customRadio5" name="7" ></td>
                                                </tr>
                                                
                                                <tr>
                                                    <th scope="row">8</th>
                                                    <td class="text-left">I am able to perform computing tasks professionally.</td>
                                                    <td><input type="radio" id="customRadio5" name="8" ></td>
                                                    <td><input type="radio" id="customRadio5" name="8" ></td>
                                                    <td><input type="radio" id="customRadio5" name="8" ></td>
                                                    <td><input type="radio" id="customRadio5" name="8" ></td>
                                                    <td><input type="radio" id="customRadio5" name="8" ></td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">9</th>
                                                    <td class="text-left">I am able to work collaboratively as part of a team undertaking different roles in a range of tasks.</td>
                                                    <td><input type="radio" id="customRadio5" name="9" ></td>
                                                    <td><input type="radio" id="customRadio5" name="9" ></td>
                                                    <td><input type="radio" id="customRadio5" name="9" ></td>
                                                    <td><input type="radio" id="customRadio5" name="9" ></td>
                                                    <td><input type="radio" id="customRadio5" name="9" ></td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">10</th>
                                                    <td class="text-left">I am able to communicate effectively with a wide range of people in various professional contexts.</td>
                                                    <td><input type="radio" id="customRadio5" name="10" ></td>
                                                    <td><input type="radio" id="customRadio5" name="10" ></td>
                                                    <td><input type="radio" id="customRadio5" name="10" ></td>
                                                    <td><input type="radio" id="customRadio5" name="10" ></td>
                                                    <td><input type="radio" id="customRadio5" name="10" ></td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">11</th>
                                                    <td class="text-left">I am able to develop the computer-based systems using relevant and current computing methods and tools.</td>
                                                    <td><input type="radio" id="customRadio5" name="11" ></td>
                                                    <td><input type="radio" id="customRadio5" name="11" ></td>
                                                    <td><input type="radio" id="customRadio5" name="11" ></td>
                                                    <td><input type="radio" id="customRadio5" name="11" ></td>
                                                    <td><input type="radio" id="customRadio5" name="11" ></td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">12</th>
                                                    <td class="text-left">I am able to recognize the needs and ability to engage in continuing professional development.</td>
                                                    <td><input type="radio" id="customRadio5" name="12" ></td>
                                                    <td><input type="radio" id="customRadio5" name="12" ></td>
                                                    <td><input type="radio" id="customRadio5" name="12" ></td>
                                                    <td><input type="radio" id="customRadio5" name="12" ></td>
                                                    <td><input type="radio" id="customRadio5" name="12" ></td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">13</th>
                                                    <td class="text-left">I am able to continuously learn new skills and knowledge in computing related field for lifelong learning.</td>
                                                    <td><input type="radio" id="customRadio5" name="13" ></td>
                                                    <td><input type="radio" id="customRadio5" name="13" ></td>
                                                    <td><input type="radio" id="customRadio5" name="13" ></td>
                                                    <td><input type="radio" id="customRadio5" name="13" ></td>
                                                    <td><input type="radio" id="customRadio5" name="13" ></td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">14</th>
                                                    <td class="text-left">I am able to apply managerial skills in computing practice.</td>
                                                    <td><input type="radio" id="customRadio5" name="14" ></td>
                                                    <td><input type="radio" id="customRadio5" name="14" ></td>
                                                    <td><input type="radio" id="customRadio5" name="14" ></td>
                                                    <td><input type="radio" id="customRadio5" name="14" ></td>
                                                    <td><input type="radio" id="customRadio5" name="14" ></td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">15</th>
                                                    <td class="text-left">I have the ability and capability to design and develop computer applications with potential economic/commercial value.</td>
                                                    <td><input type="radio" id="customRadio5" name="15" ></td>
                                                    <td><input type="radio" id="customRadio5" name="15" ></td>
                                                    <td><input type="radio" id="customRadio5" name="15" ></td>
                                                    <td><input type="radio" id="customRadio5" name="15" ></td>
                                                    <td><input type="radio" id="customRadio5" name="15" ></td>
                                                </tr>

                                            </tbody>
                                            
                                        </table>

                                        <div class="form-group mt-5 "> 
                                            <p class="mb-2">PART C: ADDITIONAL COMMENT</p>
                                            {{-- <label for="example-text-input" class="col-form-label">Description</label>  --}}
                                            <textarea class="form-control" name="description" id="description" rows="3" required></textarea> 
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

@section('scripts')
    
@endsection

