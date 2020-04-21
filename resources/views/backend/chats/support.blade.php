@extends('backend.new_layout.app')
@section('page_title')
{{ __('backend/users.title') }}
@endsection
@section('title')
{{ __('backend/users.title') }}
@endsection
@section('content')
@push('css')
<link href="{{ url('/dist') }}/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
<link href="{{ url('/backend') }}/vendors/sweetalert/sweetalert.css" rel="stylesheet">
@endpush
<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title kt-font-primary">
                Report for  <small>{{$chat->name}}</small>
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-actions">
            </div>
        </div>
    </div>
    <div class="kt-portlet__body">
        <!--begin: Datatable -->
        <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
            <thead>
            <tr>
                <th>Question</th>
                <th>Error</th>
                <th>{{__('chat.type')}}</th>
                <th>{{__('chat.user_id')}}</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
               {{-- {{ dd($data)}} --}}
            @foreach($data as $re)
                <tr>
                    <td>{{$re->question['text']}}</td>
                    <td>{{$re->error_text}}</td>
                    <th>{{$re->type}}</th>
                    <th>192.124.658.15</th>
                    <td>{{$re->created_at}}</td>
                </tr>
            @endforeach

            <tbody>
            <tfoot>
            </tfoot>
        </table>

        <!--end: Datatable -->
    </div>
</div>
@push('js')
<!--begin::Page Vendors(used by this page) -->
<script src="{{ url('/dist') }}/assets/plugins/custom/datatables/datatables.bundle.js" type="text/javascript"></script>

<!--end::Page Vendors -->

<!--begin::Page Scripts(used by this page) -->
{{--<script src="{{ url('/dist') }}/assets/js/pages/crud/datatables/extensions/buttons.js" type="text/javascript"></script>--}}

<!--end::Page Scripts -->

<script src="{{ url('/backend') }}/vendors/sweetalert/sweetalert.js"></script>
<script>
    $(document).ready( function () {
        $('#kt_table_1').DataTable();
    } );
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
@endpush
@endsection
