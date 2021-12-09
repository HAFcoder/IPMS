<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
    <style>
        * {
            -webkit-print-color-adjust: exact !important; /* Chrome, Safari, Edge */
            color-adjust: exact !important; /*Firefox*/
        }
    </style>
    <title>KUPTM Template Resume</title>
</head>
<body class="bg-light" id="content-resume">
    <div class="container p-5">
        <div class="row">
            <div class="col-md-12 text-center">
                <button class="btn btn-secondary d-print-none" onclick="Popup()">Download PDF</button>
            </div>
        </div>
        <div class="row">
            <div class="col-4 bg-dark text-white text-center py-4">
                <div class="header-left">
                    <img src="" alt="" class="img-thumbnail rounded-circle mb-2">
                    <h5 class="display-5">{{ $resume->name }}</h5>
                    <br>
                </div>

                <div>
                    <h5 class="text-uppercase bg-white text-dark py-2 rounded-pill">Contact</h5>
                    <ul class="list-unstyled text-white-35 ml-2 py-2 text-left">
                        <li class="list-item">
                            <i class="fas fa-mobile-alt mx-4"></i>
                            {{ $resume->phone }}
                        </li>
                        <li class="list-item">
                            <i class="fas fa-envelope-open-text mx-4"></i>
                            {{ $resume->email }}
                        </li>
                    </ul>
                </div>

                @if( isset($resume->skill) )

                    <div>
                        <h5 class="text-uppercase bg-white text-dark py-2 rounded-pill">Skills</h5>
                        <ul class="list text-white-35 ml-2 py-2 text-left text-capitalize">

                            @foreach ($resume->skill as $skill)
                                
                                <li class="list-item">{{ $skill }}</li>

                            @endforeach
                        </ul>
                    </div>

                @endif

                @if( isset($resume->language) )

                    <div>
                        <h5 class="text-uppercase bg-white text-dark py-2 rounded-pill">Language</h5>
                        <ul class="list text-white-35 ml-2 py-2 text-left text-capitalize">
                            @foreach ($resume->language as $language)
                                <li class="list-item">{{ $language }}</li>
                            @endforeach
                        </ul>
                    </div>

                @endif
                

            </div>
            <div class="col-8 bg-light text-dark py-4 px-5">
                <div class="header-right">
                    <h4 class="text-uppercase">Profile</h4>
                    <hr>
                    <p>
                        {{ $resume->description }}
                    </p>
                </div>
                <div>
                    @if(isset($resume->education_course))
                        <h4 class="text-uppercase">Education History</h4>
                        <hr>
                        <ul class="list">
                            @for ($y=0; $y < count($resume->education_course); $y++ )
                                <li class="list-item">
                                    <h5 class="display-6 text-uppercase">{{ $resume->education_course[$y] }}</h5>
                                    <h6 class="text-uppercase text-black-50">{{ $resume->education_uni[$y] }} / {{ \Carbon\Carbon::parse($resume->education_start[$y])->format('M Y') }} - {{ \Carbon\Carbon::parse($resume->education_end[$y])->format('M Y') }}</h6>
                                </li>
                            @endfor
                        </ul>

                    @endif

                    <hr>
                    
                    @if(isset($resume->experience_title))

                        <h4 class="text-uppercase">Work Experience</h4>
                        <hr>
                            
                            <ul class="list">
                                @for ($x=0; $x < count($resume->experience_title); $x++ )
                                    <li class="list-item">
                                        <h5 class="display-6 text-uppercase">{{ $resume->experience_title[$x] }} </h5>
                                        <h6 class="text-uppercase text-black-50">{{ $resume->experience_company[$x] }} / {{ \Carbon\Carbon::parse($resume->experience_start[$x])->format('M Y') }} - {{ \Carbon\Carbon::parse($resume->experience_end[$x])->format('M Y') }}</h6>
                                        <p>
                                            {{ $resume->experience_desc[$x] }}
                                        </p>
                                    </li>

                                @endfor
                            </ul>

                    @endif

                    <hr>
                    
                    @if(isset($resume->certificate_title))
                        
                        <h4 class="text-uppercase">Achievements</h4>
                        <hr>
                        <ul class="list">
                            @for ($z=0; $z < count($resume->certificate_title); $z++ )
                                <li class="list-item">
                                    <h5 class="display-6 text-uppercase">{{ $resume->certificate_title[$z] }} </h5>
                                    <h6 class="text-uppercase text-black-50">{{ \Carbon\Carbon::parse($resume->certificate_date[$z])->format('M Y')}} </h6>
                                    <p>
                                        {{ $resume->certificate_desc[$z] }}
                                    </p>
                                </li>
                            @endfor
                        </ul>

                    @endif

                </div>
            </div>
        </div>

    </div>

    <script>

        function Popup() {
            
            window.print();
        }



    </script>

    
</body>
</html>