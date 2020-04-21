@extends('backend.layouts.app')
@section('page_title')
{{ __('backend/users.show') }}
@endsection
@section('title')
{{ __('backend/users.show') }}
@endsection
@section('content')
@push('css')
<link href="{{ url('backend/') }}/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
@endpush
<div class="x_panel">
   
    <div class="x_content">

        <table class="table table-striped">
            <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$user->first_name}}</td>
                <td>{{$user->last_name}}</td>
                <td>{{$user->email}}</td>
            </tr>
            </tbody>
        </table>

    </div>
</div>
@push('js')
<script src="{{ url('backend/') }}/vendors/iCheck/icheck.min.js"></script>
@endpush
@endsection
