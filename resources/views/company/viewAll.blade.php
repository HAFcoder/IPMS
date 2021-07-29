@extends('layouts.parentLecturer')

{{-- view all registered company --}}

@section('head')
    
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

@endsection

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Session</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/admin') }}">Home</a></li>
                <li><span>View All Company</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <div class="row">

        <!-- table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">List of Company</h4>
                        
                    @if (session()->has('delete'))
                    <div class="form-group">
                        <div class="alert alert-success">
                            <ul>
                                <li>{{ session()->get('delete') }}</li>
                            </ul>
                        </div>
                    </div>
                    @endif
                    <div class="data-tables datatable-primary">
                        <table id="dataTableSession" class="text-center display ">
                            <thead class="text-capitalize">
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Registered Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if($company->isEmpty())
                                <tr>
                                    <td colspan="10" class="bg-dark text-white">Sorry, there is no company data yet.</td>
                                </tr>
                                @endif

                                @foreach($company as $comp)
                                <tr>
                                    <td>
                                        <a href="#" class="btn btn-warning d-print-none">View</a>
                                        <a href="{{ route('company.edit',$comp->id) }}" class="btn btn-primary">Edit</a>

                                        <form class="col" action="{{ route('company.destroy',$comp->id) }}" method="post">
                                            @method('DELETE') 
                                            @csrf
                                            <button class="btn btn-danger"  onclick="return confirm('Are you sure you want to delete this company?')" type="submit">Delete</button>
                                        </form>
                                        
                                    </td>
                                    <td>{{ $comp->name }}</td>
                                    <td>{{ $comp->address }} , <br> {{ $comp->city }} , {{ $comp->postal_code }} , {{ $comp->state }}</td>
                                    <td>{{ date('d/m/Y', strtotime($comp->created_at)) }}</td>
                                    <td>{{ ucfirst(trans($comp->status)) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- table end -->

    </div>
    
@endsection

@section('scripts')

<script>
    $(document).ready(function() {
        $('#dataTableSession').DataTable( {
            language : {
                sLengthMenu: "Show _MENU_"
            },
            dom: 'lBfrtip',
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    
    } );

</script>

    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

@endsection