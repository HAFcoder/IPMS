@extends('layouts.parentStudent')

@section('head')
    
<script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>

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

    <div class="col-lg-11 mt-5 mx-auto">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">INDUSTRIAL TRAINING REPORT - {{ strtoupper(Auth::user()->student_info->f_name) }} {{ strtoupper(Auth::user()->student_info->l_name) }}</h4>
                
                {{-- ubah !!!!! --}}
                <form action="{{ route('attach.supervisee') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label class="h5">1.0 &emsp; Abstract</label>
                        <textarea name="abstract" id="abstract"></textarea>
                        <script>
                            ClassicEditor
                                .create( document.querySelector( '#abstract' ) )
                                .catch( error => {
                                    console.error( error );
                                } );
                        </script>
                    </div>

                    <div class="form-group">
                        <label class="h5">2.0 &emsp; Objectives</label>
                        <textarea name="objective" id="objective"></textarea>
                        <script>
                            ClassicEditor
                                .create( document.querySelector( '#objective' ) )
                                .catch( error => {
                                    console.error( error );
                                } );
                        </script>
                    </div>

                    <div class="form-group">
                        <label class="h5">3.0 &emsp; Company Profile</label>
                        <textarea name="comp_profile" id="comp_profile">
                            &lt;p&gt;3.1 Company background&lt;p&gt;	
                            &lt;p&gt;3.2 Organisation chart&lt;p&gt;
                            &lt;p&gt;3.3 Details of industrial supervisor&lt;/p&gt;
                        </textarea>
                        <script>
                            ClassicEditor
                                .create( document.querySelector( '#comp_profile' ) )
                                .catch( error => {
                                    console.error( error );
                                } );
                        </script>
                    </div>

                    <div class="form-group">
                        <label class="h5">4.0 &emsp; Details of Experience</label>
                        <textarea name="exp_details" id="exp_details"></textarea>
                        <script>
                            ClassicEditor
                                .create( document.querySelector( '#exp_details' ) )
                                .catch( error => {
                                    console.error( error );
                                } );
                        </script>
                    </div>

                    <div class="form-group">
                        <label class="h5">5.0 &emsp; Discussion and Conclusion</label>
                        <textarea name="conclusion" id="conclusion">
                            &lt;p&gt;5.1 Discussion&lt;p&gt;
                            &lt;p&gt;5.2 Conclusion&lt;p&gt;
                        </textarea>
                        <script>
                            ClassicEditor
                                .create( document.querySelector( '#conclusion' ) )
                                .catch( error => {
                                    console.error( error );
                                } );
                        </script>
                    </div>

                    <div class="form-group">
                        <label class="h5">6.0 &emsp; References</label>
                        <textarea name="reference" id="reference"></textarea>
                        <script>
                            ClassicEditor
                                .create( document.querySelector( '#reference' ) )
                                .catch( error => {
                                    console.error( error );
                                } );
                        </script>
                    </div>

                    <div class="form-group">
                        <label class="h5">Appendix</label>
                        <textarea name="appendix" id="appendix"></textarea>
                        <script>
                            ClassicEditor
                                .create( document.querySelector( '#appendix' ) )
                                .catch( error => {
                                    console.error( error );
                                } );
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

