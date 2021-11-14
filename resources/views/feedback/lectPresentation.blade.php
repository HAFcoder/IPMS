@extends('layouts.parentLecturer')

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Presentation</h4>
            <ul class="breadcrumbs pull-left">

                @if(Auth::guard('lecturer')->user()->role == "coordinator")
                <li><a href="{{ url('/coordinator') }}">Home</a></li>
                @else
                <li><a href="{{ url('/lecturer') }}">Home</a></li>
                @endif
                <li><a >Feedback & Evaluation</a></li>
                <li><span>Presentation</span></li>
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
                    <h4>PRESENTATION EVALUATION REPORT</h4>
                </div>

                <p><strong>INSTRUCTION</strong></p>
                <p>1.	This form is to be completed by Academic Supervisor.</p>
                <p>2.	Each presentation should last 10 to 15 minutes (inclusive of Question & Answer session).</p>
                <p>3.	Refer to Table 1 and Table 2 for marks distribution and marking criteria.</p>
                <p>4.	This report contributes 20% of the total marks.</p>  

                <p class="mt-4"><strong>Description of Marks Classification</strong></p>
                <img class="card-img-top img-fluid mx-auto" src="{{ asset('assets/images/media/table1.png') }}" alt="image">

                <div class="col-8 mt-3 mx-auto">
                    <div class="card">

                        <form action="" method="post">

                            <div class="card-body">

                                <h4 class="mb-2">Please fill in the forms</h4>

                                <div class="row">

                                    <div class="form-group col-6">
                                        <label for="example-number-input" class="col-form-label">Knowledge of the subject</label>
                                        <input class="form-control" type="number" max="40" id="example-number-input">
                                    </div>
                                    
                                    <div class="form-group col-6">
                                        <label for="example-number-input" class="col-form-label">Organisation, language and delivery</label>
                                        <input class="form-control" type="number" max="20" id="example-number-input">
                                    </div>

                                </div>
                                
                                <div class="row">

                                    <div class="form-group col-6">
                                        <label for="example-number-input" class="col-form-label">Critical/ Analytical / Creative skills</label>
                                        <input class="form-control" type="number" max="20" id="example-number-input">
                                    </div>
    
                                    <div class="form-group col-6">
                                        <label for="example-number-input" class="col-form-label">Question handling</label>
                                        <input class="form-control" type="number" max="20" id="example-number-input">
                                    </div>

                                </div>

                                <div class="form-group "> 
                                    <label for="example-text-input" class="col-form-label">Comments / Suggestions:</label> 
                                    <textarea class="form-control" name="description" id="description" rows="3" required></textarea> 
                                </div> 

                                <button type="submit" class="btn btn-rounded btn-primary btn-lg btn-block mt-5">Submit</button>
                                
                            </div>

                        </form>
                        
                    </div>
                </div>
                    
                </form>
            </div>
        </div>
    </div>

</div>

@endsection
