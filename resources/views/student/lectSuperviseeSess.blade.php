@extends('layouts.parentLecturer')

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Supervisee</h4>
            <ul class="breadcrumbs pull-left">

                @if(Auth::guard('lecturer')->user()->role == "coordinator")
                <li><a href="{{ url('/coordinator') }}">Home</a></li>
                @else
                <li><a href="{{ url('/lecturer') }}">Home</a></li>
                @endif
                {{-- <li><a >Feedback & Evaluation</a></li> --}}
                <li><span>Supervisee</span></li>
            </ul>
        </div>
    </div>

@endsection

 <!-- access model class inside blade -->
 @inject('programme', 'App\Models\Programme')

@section('content')

    <div class="row">

        <div class="col-12 mt-5 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">List of Session</h4>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead class="text-uppercase bg-primary">
                                    <tr class="text-white">
                                        <th scope="col">Code</th>
                                        <th scope="col">Duration</th>
                                        <th scope="col">Programme</th>
                                        <th scope="col">Total Supervisee</th>
                                        <th scope="col">view supervisees List</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- <tr>
                                        <th scope="row">SS509556</th>
                                        <td>04/08/2021 - 10/12/2021</td>
                                        <td>Diploma in Teaching of English As a Second Language <br>
                                            Diploma In Corporate Communication <br>
                                            Bachelor of Accountancy (Hons)</td>
                                        <td><a href="{{ url('/lecturer/supervisee/list') }}"><i class="ti-eye"></i></a></td>
                                    </tr> --}}

                                    @foreach ($datas->unique('session_id') as $data)
                                    <tr>
                                        <th scope="row">{{ $data->session->session_code }}</th>
                                        <td>{{ date('d/m/Y', strtotime($data->start_date)) }} - {{ date('d/m/Y', strtotime($data->end_date)) }}</td>
                                        <td>
                                            
                                        @foreach($data->sessionProgramme as $sp)
                                        
                                            @php

                                            $prg = DB::table('programmes')
                                                    ->select('name','code')
                                                    ->where('id', '=', $sp->programme_id)
                                                    ->first();

                                            echo $prg->name . '<br>';

                                            @endphp

                                        @endforeach

                                        </td>
                                        <td>
                                            {{
                                                $data->where('lecturer_id',$data->lecturer_id)
                                                    ->where('session_id',$data->session_id)
                                                    ->count()
                                            }}
                                        </td>
                                        <td><a href="{{ url('/lecturer/supervisee/'. $data->session_id .'/list') }}"><i class="ti-eye"></i></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
