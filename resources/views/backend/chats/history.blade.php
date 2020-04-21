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
                History for  <small>{{isset($data[0]->name)? $data[0]->name : ""}}</small>
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-actions">
            </div>
        </div>
    </div>
    <div class="kt-portlet__body">
        <!--begin: Datatable -->
        <table class="table table-striped- table-bordered table-hover table-checkable">
            <thead>
            <tr>
                <th>Question</th>
                <th>Answer</th>
                <th>IP</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $key => $history)
                <tr>
                    <td>{{$history->text}}</td>
                    <td>{{$history->anser}}</td>
                    <td>{{$history->ip}}</td>
                    <td>{{$history->created_at}}</td>
                </tr>
            @endforeach
            {{$data->links()}}
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

<script src="{{ url('/backend') }}/vendors/sweetalert/sweetalert.js"></script>

@endpush
@endsection
