@extends('layouts.parentStudent')
{{-- register student session in studnet page --}}

@section('head')
    <link rel="stylesheet" href="{{ asset('assets/dw/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dw/bootstrap-4.1.1.min.css') }}" id="bootstrap-css">
    <script src="{{ asset('assets/dw/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/dw/cdnjs.jquery.min.js') }}"></script>

@endsection

@section('meta')
    <meta name="csrf-token" content="content">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Logbook</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a >Internship</a></li>
                <li><span>Logbook</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <div class="row">

        <div class="col-lg-12 mt-5 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Student's Logbook (By Week)</h4>
                    <div id="log" class="according accordion-s2 gradiant-bg">
                        <div class="form-group">
                            <button class="btn btn-info btn-md" onclick="addNewCard()"><i class="ti-plus"></i> Add New Week</button>
                            <input class="d-none" type="number" name="countcard" id="countcard" value="{{ count($internship->logbook) }}">
                        </div>  
                        @if(!empty($internship->logbook))

                            @php 
                                $i = 0; 
                             @endphp
                            @foreach($internship->logbook as $logbook)

                            @php $i++; 
                                $status = "";
                                if($logbook->validate == 'unvalidate'){
                                    $status = "Not Validate";
                                }else if($logbook->validate == "validate"){
                                    $status = "Validated";
                                }else if($logbook->validate == "pending"){
                                    $status = "Pending";
                                }
                            
                            @endphp
                            <div class="card">
                                <div class="card-header">
                                    <a class="collapsed card-link" data-toggle="collapse" href="#w{{$i}}">Week {{$i}} </a>
                                    <span class="badge badge-light"></span>
                                </div>
                                <div id="w{{$i}}" class="collapse" data-parent="#log">
                                    <div class="card-body">
                                        <div>
                                            <h3 class="text-center"><span class="badge badge-pill badge-light">Status: {{ $status }}</span></h3>
                                            <form method="post" action="{{ route('logbook.update',$internship->id) }}">
                                                @method('POST')
                                                @csrf 
                                                <input class="d-none" name="logbookid" id="logbookid" value="{{ $logbook->id }}">
                                                <div class="form-group col-lg-3 text-center mx-auto">
                                                    <label for="start_date">Select Date of the Week</label>
                                                    <input value="{{ date('d-m-Y', strtotime($logbook->start_date)) }}" class="form-control text-center date-start" name="start_date" type="text" id="start_date{{$i}}" placeholder="Example : 19-01-2021" required/>
                                                </div>

                                                <div class="form-group">
                                                    <label for="monday">Monday</label>
                                                    <textarea class="form-control" name="monday" id="monday" cols="20" rows="2" placeholder="Not more than 350 characters">{{ $logbook->monday }}</textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label for="tuesday">Tuesday</label>
                                                    <textarea class="form-control" name="tuesday" id="tuesday" cols="20" rows="2" placeholder="Not more than 350 characters">{{ $logbook->tuesday }}</textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label for="wednesday">Wednesday</label>
                                                    <textarea class="form-control" name="wednesday" id="wednesday" cols="20" rows="2" placeholder="Not more than 350 characters">{{ $logbook->wednesday }}</textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label for="thursday">Thursday</label>
                                                    <textarea class="form-control" name="thursday" id="thursday" cols="20" rows="2" placeholder="Not more than 350 characters">{{ $logbook->thursday }}</textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label for="friday">Friday</label>
                                                    <textarea class="form-control" name="friday" id="friday" cols="20" rows="2" placeholder="Not more than 350 characters">{{ $logbook->friday }}</textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label for="saturday">Saturday</label>
                                                    <textarea class="form-control" name="saturday" id="saturday" cols="20" rows="2" placeholder="Not more than 350 characters">{{ $logbook->saturday }}</textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label for="sunday">Sunday</label>
                                                    <textarea class="form-control" name="sunday" id="sunday" cols="20" rows="2" placeholder="Not more than 350 characters">{{ $logbook->sunday }}</textarea>
                                                </div>

                                                <div class="form-group-inline "@if($logbook->validate == 'validate') hidden @endif>
                                                    <input class="btn btn-primary btn-sm pull-right mb-3" type="submit" value="Save"/>
                                                    <a href="{{ route('logbook.email',['id'=>$logbook->id,'week'=>$i]) }}" class="btn btn-secondary btn-sm pull-right mb-3 mr-3">Request for Validation</a>
                                                </div>                                              
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif

                        <div id="new-card-area">

                        </div>

                        <div id="card-week" hidden>   
                            <div class="card">
                                <div class="card-header">
                                    <a class="collapsed card-link" data-toggle="collapse" href="#w1">Week 1</a>
                                    <span class="badge badge-light"></span>
                                </div>
                                <div id="w1" class="collapse" data-parent="#log">
                                    <div class="card-body">
                                        <div>
                                            <h3 class="text-center"><span class="badge badge-pill badge-light">Status: {{ $status }}</span></h3>
                                            <form method="post" action="{{ route('logbook.update',$internship->id) }}">
                                                @method('POST')
                                                @csrf 
                                                <input class="d-none" name="logbookid" id="logbookid" value="0">
                                                <div class="form-group col-lg-3 text-center mx-auto">
                                                    <label for="start_date">Select Date of the Week</label>
                                                    <input class="form-control text-center" name="start_date" type="text" id="start_date" placeholder="Example : 19-01-2021" required/>
                                                </div>

                                                <div class="form-group">
                                                    <label for="monday">Monday</label>
                                                    <textarea class="form-control" name="monday" id="monday" cols="20" rows="2" placeholder="Not more than 350 characters"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label for="tuesday">Tuesday</label>
                                                    <textarea class="form-control" name="tuesday" id="tuesday" cols="20" rows="2" placeholder="Not more than 350 characters"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label for="wednesday">Wednesday</label>
                                                    <textarea class="form-control" name="wednesday" id="wednesday" cols="20" rows="2" placeholder="Not more than 350 characters"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label for="thursday">Thursday</label>
                                                    <textarea class="form-control" name="thursday" id="thursday" cols="20" rows="2" placeholder="Not more than 350 characters"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label for="friday">Friday</label>
                                                    <textarea class="form-control" name="friday" id="friday" cols="20" rows="2" placeholder="Not more than 350 characters"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label for="saturday">Saturday</label>
                                                    <textarea class="form-control" name="saturday" id="saturday" cols="20" rows="2" placeholder="Not more than 350 characters"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label for="sunday">Sunday</label>
                                                    <textarea class="form-control" name="sunday" id="sunday" cols="20" rows="2" placeholder="Not more than 350 characters"></textarea>
                                                </div>

                                                <div class="form-group-inline ">
                                                    <input class="btn btn-primary btn-sm pull-right mb-3" type="submit" value="Save"/>
                                                </div>                                              
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('scripts')
    <script src="{{ asset('assets/dw/select2.min.js') }}"></script>
    <script src="{{ asset('assets/dw/jquery-3.3.1.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/dw/jquery-ui.css') }}">
    <script src="{{ asset('assets/dw/jquery-ui.min.js') }}"></script>

    <script> 

        function enableMonday(date){
            var day = date.getDay(); 
            return [day==1]
        };

        for (var i=0; i<14; i++){
            let week_text = i.toString()
            $(document).ready(function() {
                $('#start_date').datepicker({
                    beforeShowDay: enableMonday,
                    dateFormat: 'dd-mm-yy'
                });
            });

        }

        function triggerDate(){
            $('.date-start').each(function(){
                $(this).datepicker({
                    beforeShowDay: enableMonday,
                    dateFormat: 'dd-mm-yy'
                });
            });

        }

        function addNewCard(){
            count = parseInt($('#countcard').val()) + 1 ;
            $('#countcard').val(count);
            var card =  '<div class="card">' +
                        '    <div class="card-header">' +
                        '        <a class="collapsed card-link" data-toggle="collapse" href="#w'+count+'">Week '+count+'</a>' +
                        '        <span class="badge badge-light"></span>' +
                        '    </div>' +
                        '    <div id="w'+count+'" class="collapse" data-parent="#log">' +
                        '        <div class="card-body">' +
                        '            <div>' +
                        '                <h3 class="text-center"><span class="badge badge-pill badge-light">Status: Not Validate</span></h3>' +
                        '                <form method="post" action="{{ route('logbook.update',$internship->id) }}">' +
                        '                    @method("POST")' +
                        '                    @csrf ' +
                        '                    <input class="d-none" name="logbookid" id="logbookid" value="0">'+
                        '                    <div class="form-group col-lg-3 text-center mx-auto">' +
                        '                        <label for="start_date">Select Date of the Week</label>' +
                        '                        <input class="form-control text-center date-start" name="start_date" type="text" id="start_date'+count+'" placeholder="Example : 19-01-2021" required/>' +
                        '                    </div>' +
                        '                    <div class="form-group">'+
                        '                        <label for="monday">Monday</label>' +
                        '                        <textarea class="form-control" name="monday" id="monday" cols="20" rows="2" placeholder="Not more than 350 characters"></textarea>' +
                        '                    </div>' +
                        '                    <div class="form-group">' +
                        '                        <label for="tuesday">Tuesday</label>' +
                        '                        <textarea class="form-control" name="tuesday" id="tuesday" cols="20" rows="2" placeholder="Not more than 350 characters"></textarea>' +
                        '                    </div>' +
                        '                    <div class="form-group">' +
                        '                        <label for="wednesday">Wednesday</label>' +
                        '                        <textarea class="form-control" name="wednesday" id="wednesday" cols="20" rows="2" placeholder="Not more than 350 characters"></textarea>' +
                        '                    </div>' +
                        '                    <div class="form-group">' +
                        '                        <label for="thursday">Thursday</label>' +
                        '                        <textarea class="form-control" name="thursday" id="thursday" cols="20" rows="2" placeholder="Not more than 350 characters"></textarea>' +
                        '                    </div>' +
                        '                    <div class="form-group">' +
                        '                        <label for="friday">Friday</label>' +
                        '                        <textarea class="form-control" name="friday" id="friday" cols="20" rows="2" placeholder="Not more than 350 characters"></textarea>' +
                        '                    </div>' +
                        '                    <div class="form-group">' +
                        '                        <label for="saturday">Saturday</label>' +
                        '                        <textarea class="form-control" name="saturday" id="saturday" cols="20" rows="2" placeholder="Not more than 350 characters"></textarea>' +
                        '                    </div>' +
                        '                    <div class="form-group">' +
                        '                        <label for="sunday">Sunday</label>' +
                        '                        <textarea class="form-control" name="sunday" id="sunday" cols="20" rows="2" placeholder="Not more than 350 characters"></textarea>' +
                        '                    </div>' +
                        '                    <div class="form-group-inline ">' +
                        '                        <input class="btn btn-primary btn-sm pull-right mb-3" type="submit" value="Save"/>' +
                        '                    </div>                                              ' +
                        '                </form>'+
                        '            </div>' +
                        '        </div>' +
                        '    </div>' +
                        '</div>' ;
            $('#new-card-area').append(card);
            triggerDate();
        }
 

    </script>
    
@endsection
