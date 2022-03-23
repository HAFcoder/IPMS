@extends('layouts.parentStudent')

@section('head')
    
<link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />

@endsection

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Internship</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><span>Report</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

<div class="row">

    <div class="col-lg-12 mt-5 mx-auto">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">INDUSTRIAL TRAINING REPORT - {{ strtoupper(Auth::user()->student_info->f_name) }} {{ strtoupper(Auth::user()->student_info->l_name) }}</h4>
                
                {{-- ubah !!!!! --}}
                <form action="{{ route('attach.supervisee') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label class="h5">1.0 &emsp; Abstract</label>
                        <div id="abstract"></div>

                        <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script>  
                        <script> 
                            var editor = new FroalaEditor('#abstract');
                        </script>
                    </div>

                    <div class="form-group">
                        <label class="h5">2.0 &emsp; Objectives</label>
                        <div id="objective"></div>

                        <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script>  
                        <script> 
                            var editor = new FroalaEditor('#objective');
                        </script>
                    </div>

                    <div class="form-group">
                        <label class="h5">3.0 &emsp; Company Profile</label>
                        <div id="comp_profile"></div>

                        <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script>  
                        <script> 
                            var editor = new FroalaEditor('#comp_profile');
                        </script>
                    </div>

                    <div class="form-group">
                        <label class="h5">4.0 &emsp; Details of Experience</label>
                        <div id="exp_details"></div>

                        <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script>  
                        <script> 
                            var editor = new FroalaEditor('#exp_details');
                        </script>
                    </div>

                    <div class="form-group">
                        <label class="h5">5.0 &emsp; Discussion and Conclusion</label>
                        <div id="conclusion"></div>

                        <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script>  
                        <script> 
                            var editor = new FroalaEditor('#conclusion');
                        </script>
                    </div>

                    <div class="form-group">
                        <label class="h5">6.0 &emsp; References</label>
                        <div id="reference"></div>

                        <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script>  
                        <script> 
                            var editor = new FroalaEditor('#reference');
                        </script>
                    </div>

                    <div class="form-group">
                        <label class="h5">Appendix</label>
                        <div id="appendix"></div>

                        <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script>  
                        <script> 
                            var editor = new FroalaEditor('#appendix');
                        </script>
                    </div>

                    <button type="submit" class="btn btn-rounded btn-primary btn-lg btn-block" style="font-size : 20px;">Submit</button>
                </form>

            </div>
        </div>
    </div>
    
</div>

@endsection

@section('scripts')
    
@endsection

