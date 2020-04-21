@extends('backend.layouts.app')
@section('page_title')
{{ __('backend/questions.title') }}
@endsection
@section('title')
{{ __('backend/questions.title') }}
@endsection
@section('content')
@push('css')
<link href="{{ url('/backend') }}/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('/backend') }}/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('/backend') }}/vendors/sweetalert/sweetalert.css" rel="stylesheet">
@endpush
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
            <h2><i class="fa fa-questions"></i> {{ __('backend/questions.title') }}<small>{{ __('backend/questions.desc') }}</small></h2>
            <a href="{{ route('questions.create') }}" class="btn btn-primary "style="float: right"> New question</a>
            <div class="clearfix"></div>
            </div>
            <div class="x_content">
                {!! $dataTable->table(['class'=>'table table-striped table-bordered','id'=>'datatable'],true) !!}
            </div>
        </div>
    </div>
@push('js')
    <script src="{{ url('/backend') }}/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ url('/backend') }}/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="{{ url('/backend') }}/vendors/sweetalert/sweetalert.js"></script>
    <script>
        function delete_confirmation(id){
            swal.fire({
            title: 'Are you sure?',
            text: "You will be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                }
            })
        }
    </script>
    {!! $dataTable->scripts() !!}
@endpush
@endsection
