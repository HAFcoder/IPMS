@extends('layouts.parentLecturer')

@section('head')
    
@endsection

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Logbook</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/coordinator/students') }}">View Students</a></li>
                <li><span>View Logbook</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

<div class="row">

    <div class="col-lg-12 mt-5 mx-auto">
        <div class="card">
            <div class="card-body">
                <h5 class="header-title">Muhammad Hamzah Bin Jamal's Logbook</h5>
                <div id="log" class="according accordion-s2 gradiant-bg">

                    @for ($i = 1; $i <= 14; $i++)
                        <div class="card">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" href="#w{{$i}}">Week {{$i}} </a>
                                <span class="badge badge-light"></span>
                            </div>
                            <div id="w{{$i}}" class="collapse" data-parent="#log">
                                <div class="card-body">
                                    {{-- if else database empty --}}
                                    <div>
                                        <h3 class="text-center"><span class="badge badge-pill badge-light">Status: Not Validate</span></h3>
                                        <form action="POST">
                                            @csrf 
                                            <div class="form-group col-lg-3 text-center mx-auto">
                                                <label for="date-{{ $i }}">Select Date</label>
                                                <input class="form-control text-center" type="text" id="date-week-{{$i}}" placeholder="Example : 19/2/2021" required/>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="date-{{ $i }}">Monday</label>
                                                <textarea class="form-control" id="text-{{ $i }}" maxlength="350" cols="20" rows="2" placeholder="Not more than 350 characters"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="date-{{ $i }}">Tuesday</label>
                                                <textarea class="form-control" id="text-{{ $i }}" maxlength="350" cols="20" rows="2" placeholder="Not more than 350 characters"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="date-{{ $i }}">Wednesday</label>
                                                <textarea class="form-control" id="text-{{ $i }}" maxlength="350" cols="20" rows="2" placeholder="Not more than 350 characters"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="date-{{ $i }}">Thursday</label>
                                                <textarea class="form-control" id="text-{{ $i }}" maxlength="350" cols="20" rows="2" placeholder="Not more than 350 characters"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="date-{{ $i }}">Friday</label>
                                                <textarea class="form-control" id="text-{{ $i }}" maxlength="350" cols="20" rows="2" placeholder="Not more than 350 characters"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="date-{{ $i }}">Saturday</label>
                                                <textarea class="form-control" id="text-{{ $i }}" maxlength="350" cols="20" rows="2" placeholder="Not more than 350 characters"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="date-{{ $i }}">Sunday</label>
                                                <textarea class="form-control" id="text-{{ $i }}" maxlength="350" cols="20" rows="2" placeholder="Not more than 350 characters"></textarea>
                                            </div>
                                            
                                            <div class="form-group-inline ">
                                                <input class="btn btn-primary btn-sm pull-right mb-3" type="submit" value="Save" id="submit-{{ $i }}" />
                                                <button class="btn btn-secondary btn-sm pull-right mb-3 mr-3">Request for Validation</button>
                                            </div>                                              
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@section('scripts')

<script src="{{ asset('assets/dw/select2.min.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.aspnetcdn.com/ajax/jquery.ui/1.10.4/themes/redmond/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script> 

    function enableMonday(date){
        var day = date.getDay(); 
        return [day==1]
    };

    for (var i=0; i<14; i++){
        let week_text = i.toString()
        $(document).ready(function() {
            $('#date-week-'+week_text).datepicker({
                beforeShowDay: enableMonday,
                dateFormat: 'dd/mm/yy'
            });
        });

    }


</script>

@endsection