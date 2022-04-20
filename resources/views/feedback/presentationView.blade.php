@extends('layouts.parentPublic')

@section('breadcrumbs')

@endsection

@section('content')

<!-- access model class inside blade -->
@inject('programme', 'App\Models\Programme')

<div class="row ">

                                        
    @php
    $markArr = array();
    if(!empty($internship->presentMarks)){
        $marks = $internship->presentMarks->marks;
        $markArr = explode(',' , $marks);
    }
    //print_r($markArr);
    @endphp

    <div class="col-10 mt-5 mx-auto">
        <div class="card">
            <div class="card-body">

                <div class="text-center mb-5 mt-4">
                    <a href="#"><img style="height: 80px" src="{{ asset('assets/images/icon/kuptm_logo.png') }}" alt="logo"></a>
                    <div class="text-center mb-5 mt-4">
                        <h4>PRESENTATION EVALUATION REPORT</h4>
                    </div>
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



                <p class="mt-4"><strong>Description of Marks Classification</strong></p>
                {{-- <img class="card-img-top img-fluid mx-auto" src="{{ asset('assets/images/media/table1.png') }}" alt="image"> --}}

                <div class="col-8 mt-3 mx-auto">
                    <div class="card">

                        <div class="card-body">

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="example-number-input" class="col-form-label">Knowledge of the subject</label>
                                    <h3>{{$markArr[0]}} / 40</h3>
                                </div>
                                
                                <div class="form-group col-6">
                                    <label for="example-number-input" class="col-form-label">Organisation, language and delivery</label>
                                    <h3>{{$markArr[1]}} / 20</h3>
                                </div>

                            </div>
                            
                            <div class="row">

                                <div class="form-group col-6">
                                    <label for="example-number-input" class="col-form-label">Critical/ Analytical / Creative skills</label>
                                    <h3>{{$markArr[2]}} / 20</h3>
                                </div>

                                <div class="form-group col-6">
                                    <label for="example-number-input" class="col-form-label">Question handling</label>
                                    <h3>{{$markArr[3]}} / 20</h3>
                                </div>

                            </div>

                            <div class="form-group "> 
                                <label for="example-text-input" class="col-form-label">Comments / Suggestions:</label> 
                                <textarea class="form-control" name="comment" id="comment" rows="3" readonly>{{ $presentMarks->comment }}</textarea> 
                            </div> 
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
