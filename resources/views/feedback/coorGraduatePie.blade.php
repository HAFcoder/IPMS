@extends('layouts.parentLecturer')

@section('head')
@endsection

@section('breadcrumbs')
    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Feedback and Evaluation</h4>
            <ul class="breadcrumbs pull-left">

                @if (Auth::guard('lecturer')->user()->role == 'coordinator')
                    <li><a href="{{ url('/coordinator') }}">Home</a></li>
                @else
                    <li><a href="{{ url('/lecturer') }}">Home</a></li>
                @endif
                <li><a>Graduate Survey</a></li>
                <li><span>Chart</span></li>
            </ul>
        </div>
    </div>
@endsection

<!-- access model class inside blade -->
@inject('programme', 'App\Models\Programme')

@section('content')
    <div class="main-content-inner">
        <!-- pie chart start -->
        <div class="row">

            <div class="col-lg-6 mt-5">
                <div class="card">
                    <p class="p-3">1. I am able to apply the basic principles of computing relevant to my program
                        of study.</p>
                    <div id="q1Pie"></div>
                </div>
            </div>

            <div class="col-lg-6 mt-5">
                <div class="card">
                    <p class="p-3">2. I am able to select relevant tools and techniques in completing computing
                        tasks.</p>
                    <div id="q2Pie"></div>
                </div>
            </div>

            <div class="col-lg-6 mt-5">
                <div class="card">
                    <p class="p-3">3. I can use the relevant skills using the appropriate computing tools and
                        techniques effectively.</p>
                    <div id="q3Pie"></div>
                </div>
            </div>

            <div class="col-lg-6 mt-5">
                <div class="card">
                    <p class="p-3">4. I am able to apply appropriate tools and techniques in completing computing
                        tasks.</p>
                    <div id="q4Pie"></div>
                </div>
            </div>

            <div class="col-lg-6 mt-5">
                <div class="card">
                    <p class="p-3">5. I am able to produce ethical computing solution to meet specified needs of
                        stakeholders.</p>
                    <div id="q5Pie"></div>
                </div>
            </div>

            <div class="col-lg-6 mt-5">
                <div class="card">
                    <p class="p-3">6. I am able to perform assigned tasks and manage work- related issues
                        conscientiously and ethically.</p>
                    <div id="q6Pie"></div>
                </div>
            </div>

            <div class="col-lg-6 mt-5">
                <div class="card">
                    <p class="p-3">7. I am able to recognize ethical, professional and legal responsibilities in
                        computing situations and make informed judgments.</p>
                    <div id="q7Pie"></div>
                </div>
            </div>

            <div class="col-lg-6 mt-5">
                <div class="card">
                    <p class="p-3">8. I am able to perform computing tasks professionally.</p>
                    <div id="q8Pie"></div>
                </div>
            </div>

            <div class="col-lg-6 mt-5">
                <div class="card">
                    <p class="p-3">9. I am able to work collaboratively as part of a team undertaking different
                        roles in a range of tasks.</p>
                    <div id="q9Pie"></div>
                </div>
            </div>

            <div class="col-lg-6 mt-5">
                <div class="card">
                    <p class="p-3">10. I am able to communicate effectively with a wide range of people in
                        various professional contexts.</p>
                    <div id="q10Pie"></div>
                </div>
            </div>

            <div class="col-lg-6 mt-5">
                <div class="card">
                    <p class="p-3">11. I am able to develop the computer-based systems using relevant and current
                        computing methods and tools.</p>
                    <div id="q11Pie"></div>
                </div>
            </div>

            <div class="col-lg-6 mt-5">
                <div class="card">
                    <p class="p-3">12. I am able to recognize the needs and ability to engage in continuing
                        professional development.</p>
                    <div id="q12Pie"></div>
                </div>
            </div>

            <div class="col-lg-6 mt-5">
                <div class="card">
                    <p class="p-3">13. I am able to continuously learn new skills and knowledge in computing
                        related field for lifelong learning.</p>
                    <div id="q13Pie"></div>
                </div>
            </div>

            <div class="col-lg-6 mt-5">
                <div class="card">
                    <p class="p-3">14. I am able to apply managerial skills in computing practice.</p>
                    <div id="q14Pie"></div>
                </div>
            </div>

            <div class="col-lg-6 mt-5">
                <div class="card">
                    <p class="p-3">15. I have the ability and capability to design and develop computer
                        applications with potential economic/commercial value.</p>
                    <div id="q15Pie"></div>
                </div>
            </div>

        </div>
    @endsection


    @section('scripts')
        <!-- start chart js -->
        <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js') }}"></script>
        <!-- start highcharts js -->
        <script src="{{ url('https://code.highcharts.com/highcharts.js') }}"></script>
        <!-- start zingchart js -->
        <script src="{{ url('https://cdn.zingchart.com/zingchart.min.js') }}"></script>
        <script>
            zingchart.MODULESDIR = "{{ url('https://cdn.zingchart.com/modules/') }}";
            ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d') }}"];
        </script>
        <!-- start amchart js -->
        <script src="{{ url('https://www.amcharts.com/lib/3/amcharts.js') }}"></script>
        <script src="{{ url('https://www.amcharts.com/lib/3/pie.js') }}"></script>
        <script src="{{ url('https://www.amcharts.com/lib/3/serial.js') }}"></script>
        <script src="{{ url('https://www.amcharts.com/lib/3/plugins/animate/animate.min.js') }}"></script>
        <script src="{{ url('https://www.amcharts.com/lib/3/plugins/export/export.min.js') }}"></script>
        <script src="{{ url('https://www.amcharts.com/lib/3/themes/light.js') }}"></script>
        <!-- all line chart activation -->
        <script src="{{ asset('assets/js/line-chart.js') }}"></script>
        <!-- all bar chart activation -->
        <script src="{{ asset('assets/js/bar-chart.js') }}"></script>
        <!-- all pie chart -->
        <script src="{{ asset('assets/js/pie-chart.js') }}"></script>

        <script>
            @php
            $markArr = [];
            $q1 = [];
            $q2 = [];
            $q3 = [];
            $q4 = [];
            $q5 = [];
            $q6 = [];
            $q7 = [];
            $q8 = [];
            $q9 = [];
            $q10 = [];
            $q11 = [];
            $q12 = [];
            $q13 = [];
            $q14 = [];
            $q15 = [];
            
            foreach ($graduateMarks as $data) {
                $marks = $data->marks;
                $markArr = explode(',', $marks);
            
                array_push($q1, $markArr[0]);
                array_push($q2, $markArr[1]);
                array_push($q3, $markArr[2]);
                array_push($q4, $markArr[3]);
                array_push($q5, $markArr[4]);
                array_push($q6, $markArr[5]);
                array_push($q7, $markArr[6]);
                array_push($q8, $markArr[7]);
                array_push($q9, $markArr[8]);
                array_push($q10, $markArr[9]);
                array_push($q11, $markArr[10]);
                array_push($q12, $markArr[11]);
                array_push($q13, $markArr[12]);
                array_push($q14, $markArr[13]);
                array_push($q15, $markArr[14]);
            }
            @endphp

            if ($('#q1Pie').length) {
                @php
                $q1_1 = 0;
                $q1_2 = 0;
                $q1_3 = 0;
                $q1_4 = 0;
                $q1_5 = 0;
                
                for ($j = 0; $j < count($q1); $j++) {
                    if ($q1[$j] == 1) {
                        $q1_1++;
                    } elseif ($q1[$j] == 2) {
                        $q1_2++;
                    } elseif ($q1[$j] == 3) {
                        $q1_3++;
                    } elseif ($q1[$j] == 4) {
                        $q1_4++;
                    } else {
                        $q1_5++;
                    }
                }
                
                echo "console.log('PHP: " . $q1_1 . "');";
                
                $q1_1 = ($q1_1 * count($q1)) / 100;
                $q1_2 = ($q1_2 * count($q1)) / 100;
                $q1_3 = ($q1_3 * count($q1)) / 100;
                $q1_4 = ($q1_4 * count($q1)) / 100;
                $q1_5 = ($q1_5 * count($q1)) / 100;
                
                echo "console.log('PHP: " . $q1_1 . "');";
                
                @endphp

                var pieColors = (function() {
                    var colors = [],
                        base = Highcharts.getOptions().colors[0],
                        i;

                    for (i = 0; i < 10; i += 1) {
                        // Start out with a darkened base color (negative brighten), and end
                        // up with a much brighter color
                        colors.push(Highcharts.Color(base).brighten((i - 3) / 7).get());
                    }
                    return colors;
                }());

                // Build the chart
                Highcharts.chart('q1Pie', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: ''
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            colors: pieColors,
                            dataLabels: {
                                style: {
                                    "color": "contrast",
                                    "fontSize": "11px",
                                    "fontWeight": "bold",
                                    "textOutline": ""
                                },
                                enabled: true,
                                format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
                                distance: -50,
                                filter: {
                                    property: 'percentage',
                                    operator: '>',
                                    value: 4
                                }
                            }
                        }
                    },
                    series: [{
                        name: 'Percentage',
                        data: [{
                                name: '1',
                                y: @php echo("" . $q1_1 . ""); @endphp
                            },
                            {
                                name: '2',
                                y: @php echo("" . $q1_2 . ""); @endphp
                            },
                            {
                                name: '3',
                                y: @php echo("" . $q1_3 . ""); @endphp
                            },
                            {
                                name: '4',
                                y: @php echo("" . $q1_4 . ""); @endphp
                            },
                            {
                                name: '5',
                                y: @php echo("" . $q1_5 . ""); @endphp
                            }
                        ]
                    }]
                });
            }

            if ($('#q2Pie').length) {
                @php
                $q2_1 = 0;
                $q2_2 = 0;
                $q2_3 = 0;
                $q2_4 = 0;
                $q2_5 = 0;
                
                for ($j = 0; $j < count($q2); $j++) {
                    if ($q2[$j] == 1) {
                        $q2_1++;
                    } elseif ($q2[$j] == 2) {
                        $q2_2++;
                    } elseif ($q2[$j] == 3) {
                        $q2_3++;
                    } elseif ($q2[$j] == 4) {
                        $q2_4++;
                    } else {
                        $q2_5++;
                    }
                }
                            
                $q2_1 = ($q2_1 * count($q2)) / 100;
                $q2_2 = ($q2_2 * count($q2)) / 100;
                $q2_3 = ($q2_3 * count($q2)) / 100;
                $q2_4 = ($q2_4 * count($q2)) / 100;
                $q2_5 = ($q2_5 * count($q2)) / 100;
                
                @endphp

                var pieColors = (function() {
                    var colors = [],
                        base = Highcharts.getOptions().colors[0],
                        i;

                    for (i = 0; i < 10; i += 1) {
                        // Start out with a darkened base color (negative brighten), and end
                        // up with a much brighter color
                        colors.push(Highcharts.Color(base).brighten((i - 3) / 7).get());
                    }
                    return colors;
                }());

                // Build the chart
                Highcharts.chart('q2Pie', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: ''
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            colors: pieColors,
                            dataLabels: {
                                style: {
                                    "color": "contrast",
                                    "fontSize": "11px",
                                    "fontWeight": "bold",
                                    "textOutline": ""
                                },
                                enabled: true,
                                format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
                                distance: -50,
                                filter: {
                                    property: 'percentage',
                                    operator: '>',
                                    value: 4
                                }
                            }
                        }
                    },
                    series: [{
                        name: 'Percentage',
                        data: [{
                                name: '1',
                                y: @php echo("" . $q2_1 . ""); @endphp
                            },
                            {
                                name: '2',
                                y: @php echo("" . $q2_2 . ""); @endphp
                            },
                            {
                                name: '3',
                                y: @php echo("" . $q2_3 . ""); @endphp
                            },
                            {
                                name: '4',
                                y: @php echo("" . $q2_4 . ""); @endphp
                            },
                            {
                                name: '5',
                                y: @php echo("" . $q2_5 . ""); @endphp
                            }
                        ]
                    }]
                });
            }

            if ($('#q3Pie').length) {
                @php
                $q3_1 = 0;
                $q3_2 = 0;
                $q3_3 = 0;
                $q3_4 = 0;
                $q3_5 = 0;
                
                for ($j = 0; $j < count($q3); $j++) {
                    if ($q3[$j] == 1) {
                        $q3_1++;
                    } elseif ($q3[$j] == 2) {
                        $q3_2++;
                    } elseif ($q3[$j] == 3) {
                        $q3_3++;
                    } elseif ($q3[$j] == 4) {
                        $q3_4++;
                    } else {
                        $q3_5++;
                    }
                }
                            
                $q3_1 = ($q3_1 * count($q3)) / 100;
                $q3_2 = ($q3_2 * count($q3)) / 100;
                $q3_3 = ($q3_3 * count($q3)) / 100;
                $q3_4 = ($q3_4 * count($q3)) / 100;
                $q3_5 = ($q3_5 * count($q3)) / 100;
                
                @endphp

                var pieColors = (function() {
                    var colors = [],
                        base = Highcharts.getOptions().colors[0],
                        i;

                    for (i = 0; i < 10; i += 1) {
                        // Start out with a darkened base color (negative brighten), and end
                        // up with a much brighter color
                        colors.push(Highcharts.Color(base).brighten((i - 3) / 7).get());
                    }
                    return colors;
                }());

                // Build the chart
                Highcharts.chart('q3Pie', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: ''
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            colors: pieColors,
                            dataLabels: {
                                style: {
                                    "color": "contrast",
                                    "fontSize": "11px",
                                    "fontWeight": "bold",
                                    "textOutline": ""
                                },
                                enabled: true,
                                format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
                                distance: -50,
                                filter: {
                                    property: 'percentage',
                                    operator: '>',
                                    value: 4
                                }
                            }
                        }
                    },
                    series: [{
                        name: 'Percentage',
                        data: [{
                                name: '1',
                                y: @php echo("" . $q3_1 . ""); @endphp
                            },
                            {
                                name: '2',
                                y: @php echo("" . $q3_2 . ""); @endphp
                            },
                            {
                                name: '3',
                                y: @php echo("" . $q3_3 . ""); @endphp
                            },
                            {
                                name: '4',
                                y: @php echo("" . $q3_4 . ""); @endphp
                            },
                            {
                                name: '5',
                                y: @php echo("" . $q3_5 . ""); @endphp
                            }
                        ]
                    }]
                });
            }

            if ($('#q4Pie').length) {
                @php
                $q4_1 = 0;
                $q4_2 = 0;
                $q4_3 = 0;
                $q4_4 = 0;
                $q4_5 = 0;
                
                for ($j = 0; $j < count($q4); $j++) {
                    if ($q4[$j] == 1) {
                        $q4_1++;
                    } elseif ($q4[$j] == 2) {
                        $q4_2++;
                    } elseif ($q4[$j] == 3) {
                        $q4_3++;
                    } elseif ($q4[$j] == 4) {
                        $q4_4++;
                    } else {
                        $q4_5++;
                    }
                }
                            
                $q4_1 = ($q4_1 * count($q4)) / 100;
                $q4_2 = ($q4_2 * count($q4)) / 100;
                $q4_3 = ($q4_3 * count($q4)) / 100;
                $q4_4 = ($q4_4 * count($q4)) / 100;
                $q4_5 = ($q4_5 * count($q4)) / 100;
                
                @endphp

                var pieColors = (function() {
                    var colors = [],
                        base = Highcharts.getOptions().colors[0],
                        i;

                    for (i = 0; i < 10; i += 1) {
                        // Start out with a darkened base color (negative brighten), and end
                        // up with a much brighter color
                        colors.push(Highcharts.Color(base).brighten((i - 3) / 7).get());
                    }
                    return colors;
                }());

                // Build the chart
                Highcharts.chart('q4Pie', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: ''
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            colors: pieColors,
                            dataLabels: {
                                style: {
                                    "color": "contrast",
                                    "fontSize": "11px",
                                    "fontWeight": "bold",
                                    "textOutline": ""
                                },
                                enabled: true,
                                format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
                                distance: -50,
                                filter: {
                                    property: 'percentage',
                                    operator: '>',
                                    value: 4
                                }
                            }
                        }
                    },
                    series: [{
                        name: 'Percentage',
                        data: [{
                                name: '1',
                                y: @php echo("" . $q4_1 . ""); @endphp
                            },
                            {
                                name: '2',
                                y: @php echo("" . $q4_2 . ""); @endphp
                            },
                            {
                                name: '3',
                                y: @php echo("" . $q4_3 . ""); @endphp
                            },
                            {
                                name: '4',
                                y: @php echo("" . $q4_4 . ""); @endphp
                            },
                            {
                                name: '5',
                                y: @php echo("" . $q4_5 . ""); @endphp
                            }
                        ]
                    }]
                });
            }

            if ($('#q5Pie').length) {
                @php
                $q5_1 = 0;
                $q5_2 = 0;
                $q5_3 = 0;
                $q5_4 = 0;
                $q5_5 = 0;
                
                for ($j = 0; $j < count($q5); $j++) {
                    if ($q5[$j] == 1) {
                        $q5_1++;
                    } elseif ($q5[$j] == 2) {
                        $q5_2++;
                    } elseif ($q5[$j] == 3) {
                        $q5_3++;
                    } elseif ($q5[$j] == 4) {
                        $q5_4++;
                    } else {
                        $q5_5++;
                    }
                }
                            
                $q5_1 = ($q5_1 * count($q5)) / 100;
                $q5_2 = ($q5_2 * count($q5)) / 100;
                $q5_3 = ($q5_3 * count($q5)) / 100;
                $q5_4 = ($q5_4 * count($q5)) / 100;
                $q5_5 = ($q5_5 * count($q5)) / 100;
                
                @endphp

                var pieColors = (function() {
                    var colors = [],
                        base = Highcharts.getOptions().colors[0],
                        i;

                    for (i = 0; i < 10; i += 1) {
                        // Start out with a darkened base color (negative brighten), and end
                        // up with a much brighter color
                        colors.push(Highcharts.Color(base).brighten((i - 3) / 7).get());
                    }
                    return colors;
                }());

                // Build the chart
                Highcharts.chart('q5Pie', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: ''
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            colors: pieColors,
                            dataLabels: {
                                style: {
                                    "color": "contrast",
                                    "fontSize": "11px",
                                    "fontWeight": "bold",
                                    "textOutline": ""
                                },
                                enabled: true,
                                format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
                                distance: -50,
                                filter: {
                                    property: 'percentage',
                                    operator: '>',
                                    value: 4
                                }
                            }
                        }
                    },
                    series: [{
                        name: 'Percentage',
                        data: [{
                                name: '1',
                                y: @php echo("" . $q5_1 . ""); @endphp
                            },
                            {
                                name: '2',
                                y: @php echo("" . $q5_2 . ""); @endphp
                            },
                            {
                                name: '3',
                                y: @php echo("" . $q5_3 . ""); @endphp
                            },
                            {
                                name: '4',
                                y: @php echo("" . $q5_4 . ""); @endphp
                            },
                            {
                                name: '5',
                                y: @php echo("" . $q5_5 . ""); @endphp
                            }
                        ]
                    }]
                });
            }

            if ($('#q6Pie').length) {
                @php
                $q6_1 = 0;
                $q6_2 = 0;
                $q6_3 = 0;
                $q6_4 = 0;
                $q6_5 = 0;
                
                for ($j = 0; $j < count($q6); $j++) {
                    if ($q6[$j] == 1) {
                        $q6_1++;
                    } elseif ($q6[$j] == 2) {
                        $q6_2++;
                    } elseif ($q6[$j] == 3) {
                        $q6_3++;
                    } elseif ($q6[$j] == 4) {
                        $q6_4++;
                    } else {
                        $q6_5++;
                    }
                }
                            
                $q6_1 = ($q6_1 * count($q6)) / 100;
                $q6_2 = ($q6_2 * count($q6)) / 100;
                $q6_3 = ($q6_3 * count($q6)) / 100;
                $q6_4 = ($q6_4 * count($q6)) / 100;
                $q6_5 = ($q6_5 * count($q6)) / 100;
                
                @endphp

                var pieColors = (function() {
                    var colors = [],
                        base = Highcharts.getOptions().colors[0],
                        i;

                    for (i = 0; i < 10; i += 1) {
                        // Start out with a darkened base color (negative brighten), and end
                        // up with a much brighter color
                        colors.push(Highcharts.Color(base).brighten((i - 3) / 7).get());
                    }
                    return colors;
                }());

                // Build the chart
                Highcharts.chart('q6Pie', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: ''
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            colors: pieColors,
                            dataLabels: {
                                style: {
                                    "color": "contrast",
                                    "fontSize": "11px",
                                    "fontWeight": "bold",
                                    "textOutline": ""
                                },
                                enabled: true,
                                format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
                                distance: -50,
                                filter: {
                                    property: 'percentage',
                                    operator: '>',
                                    value: 4
                                }
                            }
                        }
                    },
                    series: [{
                        name: 'Percentage',
                        data: [{
                                name: '1',
                                y: @php echo("" . $q6_1 . ""); @endphp
                            },
                            {
                                name: '2',
                                y: @php echo("" . $q6_2 . ""); @endphp
                            },
                            {
                                name: '3',
                                y: @php echo("" . $q6_3 . ""); @endphp
                            },
                            {
                                name: '4',
                                y: @php echo("" . $q6_4 . ""); @endphp
                            },
                            {
                                name: '5',
                                y: @php echo("" . $q6_5 . ""); @endphp
                            }
                        ]
                    }]
                });
            }

            if ($('#q7Pie').length) {
                @php
                $q7_1 = 0;
                $q7_2 = 0;
                $q7_3 = 0;
                $q7_4 = 0;
                $q7_5 = 0;
                
                for ($j = 0; $j < count($q7); $j++) {
                    if ($q7[$j] == 1) {
                        $q7_1++;
                    } elseif ($q7[$j] == 2) {
                        $q7_2++;
                    } elseif ($q7[$j] == 3) {
                        $q7_3++;
                    } elseif ($q7[$j] == 4) {
                        $q7_4++;
                    } else {
                        $q7_5++;
                    }
                }
                            
                $q7_1 = ($q7_1 * count($q7)) / 100;
                $q7_2 = ($q7_2 * count($q7)) / 100;
                $q7_3 = ($q7_3 * count($q7)) / 100;
                $q7_4 = ($q7_4 * count($q7)) / 100;
                $q7_5 = ($q7_5 * count($q7)) / 100;
                
                @endphp

                var pieColors = (function() {
                    var colors = [],
                        base = Highcharts.getOptions().colors[0],
                        i;

                    for (i = 0; i < 10; i += 1) {
                        // Start out with a darkened base color (negative brighten), and end
                        // up with a much brighter color
                        colors.push(Highcharts.Color(base).brighten((i - 3) / 7).get());
                    }
                    return colors;
                }());

                // Build the chart
                Highcharts.chart('q7Pie', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: ''
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            colors: pieColors,
                            dataLabels: {
                                style: {
                                    "color": "contrast",
                                    "fontSize": "11px",
                                    "fontWeight": "bold",
                                    "textOutline": ""
                                },
                                enabled: true,
                                format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
                                distance: -50,
                                filter: {
                                    property: 'percentage',
                                    operator: '>',
                                    value: 4
                                }
                            }
                        }
                    },
                    series: [{
                        name: 'Percentage',
                        data: [{
                                name: '1',
                                y: @php echo("" . $q7_1 . ""); @endphp
                            },
                            {
                                name: '2',
                                y: @php echo("" . $q7_2 . ""); @endphp
                            },
                            {
                                name: '3',
                                y: @php echo("" . $q7_3 . ""); @endphp
                            },
                            {
                                name: '4',
                                y: @php echo("" . $q7_4 . ""); @endphp
                            },
                            {
                                name: '5',
                                y: @php echo("" . $q7_5 . ""); @endphp
                            }
                        ]
                    }]
                });
            }

            if ($('#q8Pie').length) {
                @php
                $q8_1 = 0;
                $q8_2 = 0;
                $q8_3 = 0;
                $q8_4 = 0;
                $q8_5 = 0;
                
                for ($j = 0; $j < count($q8); $j++) {
                    if ($q8[$j] == 1) {
                        $q8_1++;
                    } elseif ($q8[$j] == 2) {
                        $q8_2++;
                    } elseif ($q8[$j] == 3) {
                        $q8_3++;
                    } elseif ($q8[$j] == 4) {
                        $q8_4++;
                    } else {
                        $q8_5++;
                    }
                }
                            
                $q8_1 = ($q8_1 * count($q8)) / 100;
                $q8_2 = ($q8_2 * count($q8)) / 100;
                $q8_3 = ($q8_3 * count($q8)) / 100;
                $q8_4 = ($q8_4 * count($q8)) / 100;
                $q8_5 = ($q8_5 * count($q8)) / 100;
                
                @endphp

                var pieColors = (function() {
                    var colors = [],
                        base = Highcharts.getOptions().colors[0],
                        i;

                    for (i = 0; i < 10; i += 1) {
                        // Start out with a darkened base color (negative brighten), and end
                        // up with a much brighter color
                        colors.push(Highcharts.Color(base).brighten((i - 3) / 7).get());
                    }
                    return colors;
                }());

                // Build the chart
                Highcharts.chart('q8Pie', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: ''
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            colors: pieColors,
                            dataLabels: {
                                style: {
                                    "color": "contrast",
                                    "fontSize": "11px",
                                    "fontWeight": "bold",
                                    "textOutline": ""
                                },
                                enabled: true,
                                format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
                                distance: -50,
                                filter: {
                                    property: 'percentage',
                                    operator: '>',
                                    value: 4
                                }
                            }
                        }
                    },
                    series: [{
                        name: 'Percentage',
                        data: [{
                                name: '1',
                                y: @php echo("" . $q8_1 . ""); @endphp
                            },
                            {
                                name: '2',
                                y: @php echo("" . $q8_2 . ""); @endphp
                            },
                            {
                                name: '3',
                                y: @php echo("" . $q8_3 . ""); @endphp
                            },
                            {
                                name: '4',
                                y: @php echo("" . $q8_4 . ""); @endphp
                            },
                            {
                                name: '5',
                                y: @php echo("" . $q8_5 . ""); @endphp
                            }
                        ]
                    }]
                });
            }

            if ($('#q9Pie').length) {
                @php
                $q9_1 = 0;
                $q9_2 = 0;
                $q9_3 = 0;
                $q9_4 = 0;
                $q9_5 = 0;
                
                for ($j = 0; $j < count($q9); $j++) {
                    if ($q9[$j] == 1) {
                        $q9_1++;
                    } elseif ($q9[$j] == 2) {
                        $q9_2++;
                    } elseif ($q9[$j] == 3) {
                        $q9_3++;
                    } elseif ($q9[$j] == 4) {
                        $q9_4++;
                    } else {
                        $q9_5++;
                    }
                }
                            
                $q9_1 = ($q9_1 * count($q9)) / 100;
                $q9_2 = ($q9_2 * count($q9)) / 100;
                $q9_3 = ($q9_3 * count($q9)) / 100;
                $q9_4 = ($q9_4 * count($q9)) / 100;
                $q9_5 = ($q9_5 * count($q9)) / 100;
                
                @endphp

                var pieColors = (function() {
                    var colors = [],
                        base = Highcharts.getOptions().colors[0],
                        i;

                    for (i = 0; i < 10; i += 1) {
                        // Start out with a darkened base color (negative brighten), and end
                        // up with a much brighter color
                        colors.push(Highcharts.Color(base).brighten((i - 3) / 7).get());
                    }
                    return colors;
                }());

                // Build the chart
                Highcharts.chart('q9Pie', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: ''
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            colors: pieColors,
                            dataLabels: {
                                style: {
                                    "color": "contrast",
                                    "fontSize": "11px",
                                    "fontWeight": "bold",
                                    "textOutline": ""
                                },
                                enabled: true,
                                format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
                                distance: -50,
                                filter: {
                                    property: 'percentage',
                                    operator: '>',
                                    value: 4
                                }
                            }
                        }
                    },
                    series: [{
                        name: 'Percentage',
                        data: [{
                                name: '1',
                                y: @php echo("" . $q9_1 . ""); @endphp
                            },
                            {
                                name: '2',
                                y: @php echo("" . $q9_2 . ""); @endphp
                            },
                            {
                                name: '3',
                                y: @php echo("" . $q9_3 . ""); @endphp
                            },
                            {
                                name: '4',
                                y: @php echo("" . $q9_4 . ""); @endphp
                            },
                            {
                                name: '5',
                                y: @php echo("" . $q9_5 . ""); @endphp
                            }
                        ]
                    }]
                });
            }

            if ($('#q10Pie').length) {
                @php
                $q10_1 = 0;
                $q10_2 = 0;
                $q10_3 = 0;
                $q10_4 = 0;
                $q10_5 = 0;
                
                for ($j = 0; $j < count($q10); $j++) {
                    if ($q10[$j] == 1) {
                        $q10_1++;
                    } elseif ($q10[$j] == 2) {
                        $q10_2++;
                    } elseif ($q10[$j] == 3) {
                        $q10_3++;
                    } elseif ($q10[$j] == 4) {
                        $q10_4++;
                    } else {
                        $q10_5++;
                    }
                }
                            
                $q10_1 = ($q10_1 * count($q10)) / 100;
                $q10_2 = ($q10_2 * count($q10)) / 100;
                $q10_3 = ($q10_3 * count($q10)) / 100;
                $q10_4 = ($q10_4 * count($q10)) / 100;
                $q10_5 = ($q10_5 * count($q10)) / 100;
                
                @endphp

                var pieColors = (function() {
                    var colors = [],
                        base = Highcharts.getOptions().colors[0],
                        i;

                    for (i = 0; i < 10; i += 1) {
                        // Start out with a darkened base color (negative brighten), and end
                        // up with a much brighter color
                        colors.push(Highcharts.Color(base).brighten((i - 3) / 7).get());
                    }
                    return colors;
                }());

                // Build the chart
                Highcharts.chart('q10Pie', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: ''
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            colors: pieColors,
                            dataLabels: {
                                style: {
                                    "color": "contrast",
                                    "fontSize": "11px",
                                    "fontWeight": "bold",
                                    "textOutline": ""
                                },
                                enabled: true,
                                format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
                                distance: -50,
                                filter: {
                                    property: 'percentage',
                                    operator: '>',
                                    value: 4
                                }
                            }
                        }
                    },
                    series: [{
                        name: 'Percentage',
                        data: [{
                                name: '1',
                                y: @php echo("" . $q10_1 . ""); @endphp
                            },
                            {
                                name: '2',
                                y: @php echo("" . $q10_2 . ""); @endphp
                            },
                            {
                                name: '3',
                                y: @php echo("" . $q10_3 . ""); @endphp
                            },
                            {
                                name: '4',
                                y: @php echo("" . $q10_4 . ""); @endphp
                            },
                            {
                                name: '5',
                                y: @php echo("" . $q10_5 . ""); @endphp
                            }
                        ]
                    }]
                });
            }

            if ($('#q11Pie').length) {
                @php
                $q11_1 = 0;
                $q11_2 = 0;
                $q11_3 = 0;
                $q11_4 = 0;
                $q11_5 = 0;
                
                for ($j = 0; $j < count($q11); $j++) {
                    if ($q11[$j] == 1) {
                        $q11_1++;
                    } elseif ($q11[$j] == 2) {
                        $q11_2++;
                    } elseif ($q11[$j] == 3) {
                        $q11_3++;
                    } elseif ($q11[$j] == 4) {
                        $q11_4++;
                    } else {
                        $q11_5++;
                    }
                }
                            
                $q11_1 = ($q11_1 * count($q11)) / 100;
                $q11_2 = ($q11_2 * count($q11)) / 100;
                $q11_3 = ($q11_3 * count($q11)) / 100;
                $q11_4 = ($q11_4 * count($q11)) / 100;
                $q11_5 = ($q11_5 * count($q11)) / 100;
                
                @endphp

                var pieColors = (function() {
                    var colors = [],
                        base = Highcharts.getOptions().colors[0],
                        i;

                    for (i = 0; i < 10; i += 1) {
                        // Start out with a darkened base color (negative brighten), and end
                        // up with a much brighter color
                        colors.push(Highcharts.Color(base).brighten((i - 3) / 7).get());
                    }
                    return colors;
                }());

                // Build the chart
                Highcharts.chart('q11Pie', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: ''
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            colors: pieColors,
                            dataLabels: {
                                style: {
                                    "color": "contrast",
                                    "fontSize": "11px",
                                    "fontWeight": "bold",
                                    "textOutline": ""
                                },
                                enabled: true,
                                format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
                                distance: -50,
                                filter: {
                                    property: 'percentage',
                                    operator: '>',
                                    value: 4
                                }
                            }
                        }
                    },
                    series: [{
                        name: 'Percentage',
                        data: [{
                                name: '1',
                                y: @php echo("" . $q11_1 . ""); @endphp
                            },
                            {
                                name: '2',
                                y: @php echo("" . $q11_2 . ""); @endphp
                            },
                            {
                                name: '3',
                                y: @php echo("" . $q11_3 . ""); @endphp
                            },
                            {
                                name: '4',
                                y: @php echo("" . $q11_4 . ""); @endphp
                            },
                            {
                                name: '5',
                                y: @php echo("" . $q11_5 . ""); @endphp
                            }
                        ]
                    }]
                });
            }

            if ($('#q12Pie').length) {
                @php
                $q12_1 = 0;
                $q12_2 = 0;
                $q12_3 = 0;
                $q12_4 = 0;
                $q12_5 = 0;
                
                for ($j = 0; $j < count($q12); $j++) {
                    if ($q12[$j] == 1) {
                        $q12_1++;
                    } elseif ($q12[$j] == 2) {
                        $q12_2++;
                    } elseif ($q12[$j] == 3) {
                        $q12_3++;
                    } elseif ($q12[$j] == 4) {
                        $q12_4++;
                    } else {
                        $q12_5++;
                    }
                }
                            
                $q12_1 = ($q12_1 * count($q12)) / 100;
                $q12_2 = ($q12_2 * count($q12)) / 100;
                $q12_3 = ($q12_3 * count($q12)) / 100;
                $q12_4 = ($q12_4 * count($q12)) / 100;
                $q12_5 = ($q12_5 * count($q12)) / 100;
                
                @endphp

                var pieColors = (function() {
                    var colors = [],
                        base = Highcharts.getOptions().colors[0],
                        i;

                    for (i = 0; i < 10; i += 1) {
                        // Start out with a darkened base color (negative brighten), and end
                        // up with a much brighter color
                        colors.push(Highcharts.Color(base).brighten((i - 3) / 7).get());
                    }
                    return colors;
                }());

                // Build the chart
                Highcharts.chart('q12Pie', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: ''
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            colors: pieColors,
                            dataLabels: {
                                style: {
                                    "color": "contrast",
                                    "fontSize": "11px",
                                    "fontWeight": "bold",
                                    "textOutline": ""
                                },
                                enabled: true,
                                format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
                                distance: -50,
                                filter: {
                                    property: 'percentage',
                                    operator: '>',
                                    value: 4
                                }
                            }
                        }
                    },
                    series: [{
                        name: 'Percentage',
                        data: [{
                                name: '1',
                                y: @php echo("" . $q12_1 . ""); @endphp
                            },
                            {
                                name: '2',
                                y: @php echo("" . $q12_2 . ""); @endphp
                            },
                            {
                                name: '3',
                                y: @php echo("" . $q12_3 . ""); @endphp
                            },
                            {
                                name: '4',
                                y: @php echo("" . $q12_4 . ""); @endphp
                            },
                            {
                                name: '5',
                                y: @php echo("" . $q12_5 . ""); @endphp
                            }
                        ]
                    }]
                });
            }

            if ($('#q13Pie').length) {
                @php
                $q13_1 = 0;
                $q13_2 = 0;
                $q13_3 = 0;
                $q13_4 = 0;
                $q13_5 = 0;
                
                for ($j = 0; $j < count($q13); $j++) {
                    if ($q13[$j] == 1) {
                        $q13_1++;
                    } elseif ($q13[$j] == 2) {
                        $q13_2++;
                    } elseif ($q13[$j] == 3) {
                        $q13_3++;
                    } elseif ($q13[$j] == 4) {
                        $q13_4++;
                    } else {
                        $q13_5++;
                    }
                }
                            
                $q13_1 = ($q13_1 * count($q13)) / 100;
                $q13_2 = ($q13_2 * count($q13)) / 100;
                $q13_3 = ($q13_3 * count($q13)) / 100;
                $q13_4 = ($q13_4 * count($q13)) / 100;
                $q13_5 = ($q13_5 * count($q13)) / 100;
                
                @endphp

                var pieColors = (function() {
                    var colors = [],
                        base = Highcharts.getOptions().colors[0],
                        i;

                    for (i = 0; i < 10; i += 1) {
                        // Start out with a darkened base color (negative brighten), and end
                        // up with a much brighter color
                        colors.push(Highcharts.Color(base).brighten((i - 3) / 7).get());
                    }
                    return colors;
                }());

                // Build the chart
                Highcharts.chart('q13Pie', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: ''
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            colors: pieColors,
                            dataLabels: {
                                style: {
                                    "color": "contrast",
                                    "fontSize": "11px",
                                    "fontWeight": "bold",
                                    "textOutline": ""
                                },
                                enabled: true,
                                format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
                                distance: -50,
                                filter: {
                                    property: 'percentage',
                                    operator: '>',
                                    value: 4
                                }
                            }
                        }
                    },
                    series: [{
                        name: 'Percentage',
                        data: [{
                                name: '1',
                                y: @php echo("" . $q13_1 . ""); @endphp
                            },
                            {
                                name: '2',
                                y: @php echo("" . $q13_2 . ""); @endphp
                            },
                            {
                                name: '3',
                                y: @php echo("" . $q13_3 . ""); @endphp
                            },
                            {
                                name: '4',
                                y: @php echo("" . $q13_4 . ""); @endphp
                            },
                            {
                                name: '5',
                                y: @php echo("" . $q13_5 . ""); @endphp
                            }
                        ]
                    }]
                });
            }

            if ($('#q14Pie').length) {
                @php
                $q14_1 = 0;
                $q14_2 = 0;
                $q14_3 = 0;
                $q14_4 = 0;
                $q14_5 = 0;
                
                for ($j = 0; $j < count($q14); $j++) {
                    if ($q14[$j] == 1) {
                        $q14_1++;
                    } elseif ($q14[$j] == 2) {
                        $q14_2++;
                    } elseif ($q14[$j] == 3) {
                        $q14_3++;
                    } elseif ($q14[$j] == 4) {
                        $q14_4++;
                    } else {
                        $q14_5++;
                    }
                }
                            
                $q14_1 = ($q14_1 * count($q14)) / 100;
                $q14_2 = ($q14_2 * count($q14)) / 100;
                $q14_3 = ($q14_3 * count($q14)) / 100;
                $q14_4 = ($q14_4 * count($q14)) / 100;
                $q14_5 = ($q14_5 * count($q14)) / 100;
                
                @endphp

                var pieColors = (function() {
                    var colors = [],
                        base = Highcharts.getOptions().colors[0],
                        i;

                    for (i = 0; i < 10; i += 1) {
                        // Start out with a darkened base color (negative brighten), and end
                        // up with a much brighter color
                        colors.push(Highcharts.Color(base).brighten((i - 3) / 7).get());
                    }
                    return colors;
                }());

                // Build the chart
                Highcharts.chart('q14Pie', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: ''
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            colors: pieColors,
                            dataLabels: {
                                style: {
                                    "color": "contrast",
                                    "fontSize": "11px",
                                    "fontWeight": "bold",
                                    "textOutline": ""
                                },
                                enabled: true,
                                format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
                                distance: -50,
                                filter: {
                                    property: 'percentage',
                                    operator: '>',
                                    value: 4
                                }
                            }
                        }
                    },
                    series: [{
                        name: 'Percentage',
                        data: [{
                                name: '1',
                                y: @php echo("" . $q14_1 . ""); @endphp
                            },
                            {
                                name: '2',
                                y: @php echo("" . $q14_2 . ""); @endphp
                            },
                            {
                                name: '3',
                                y: @php echo("" . $q14_3 . ""); @endphp
                            },
                            {
                                name: '4',
                                y: @php echo("" . $q14_4 . ""); @endphp
                            },
                            {
                                name: '5',
                                y: @php echo("" . $q14_5 . ""); @endphp
                            }
                        ]
                    }]
                });
            }

            if ($('#q15Pie').length) {
                @php
                $q15_1 = 0;
                $q15_2 = 0;
                $q15_3 = 0;
                $q15_4 = 0;
                $q15_5 = 0;
                
                for ($j = 0; $j < count($q15); $j++) {
                    if ($q15[$j] == 1) {
                        $q15_1++;
                    } elseif ($q15[$j] == 2) {
                        $q15_2++;
                    } elseif ($q15[$j] == 3) {
                        $q15_3++;
                    } elseif ($q15[$j] == 4) {
                        $q15_4++;
                    } else {
                        $q15_5++;
                    }
                }
                            
                $q15_1 = ($q15_1 * count($q15)) / 100;
                $q15_2 = ($q15_2 * count($q15)) / 100;
                $q15_3 = ($q15_3 * count($q15)) / 100;
                $q15_4 = ($q15_4 * count($q15)) / 100;
                $q15_5 = ($q15_5 * count($q15)) / 100;
                
                @endphp

                var pieColors = (function() {
                    var colors = [],
                        base = Highcharts.getOptions().colors[0],
                        i;

                    for (i = 0; i < 10; i += 1) {
                        // Start out with a darkened base color (negative brighten), and end
                        // up with a much brighter color
                        colors.push(Highcharts.Color(base).brighten((i - 3) / 7).get());
                    }
                    return colors;
                }());

                // Build the chart
                Highcharts.chart('q15Pie', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: ''
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            colors: pieColors,
                            dataLabels: {
                                style: {
                                    "color": "contrast",
                                    "fontSize": "11px",
                                    "fontWeight": "bold",
                                    "textOutline": ""
                                },
                                enabled: true,
                                format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
                                distance: -50,
                                filter: {
                                    property: 'percentage',
                                    operator: '>',
                                    value: 4
                                }
                            }
                        }
                    },
                    series: [{
                        name: 'Percentage',
                        data: [{
                                name: '1',
                                y: @php echo("" . $q15_1 . ""); @endphp
                            },
                            {
                                name: '2',
                                y: @php echo("" . $q15_2 . ""); @endphp
                            },
                            {
                                name: '3',
                                y: @php echo("" . $q15_3 . ""); @endphp
                            },
                            {
                                name: '4',
                                y: @php echo("" . $q15_4 . ""); @endphp
                            },
                            {
                                name: '5',
                                y: @php echo("" . $q15_5 . ""); @endphp
                            }
                        ]
                    }]
                });
            }
        </script>
    @endsection
