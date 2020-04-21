@extends('backend.new_layout.app')
@section('page_title')
{{ __('backend/users.create') }}
@endsection
@section('title')
{{ __('backend/users.create') }}
@endsection
@section('content')
@push('css')
<link href="{{ url('backend/') }}/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
@endpush
<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title kt-font-primary">
                Action Buttons <small>button toolbar</small>
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
        </div>
    </div>
    <div class="kt-portlet__body">
        <form id="demo-form" method="POST" action="{{route('users.store')}}">
            @csrf
            <label for="first_name">{{ __('backend/users.first_name') }} * :</label>
            <input type="text" id="first_name" value="{{ old('first_name') }}" class="form-control  @error('first_name') is-invalid @enderror" name="first_name" />
            @error('first_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            <br>
            @enderror

            <label for="last_name">{{ __('backend/users.last_name') }} * :</label>
            <input type="text" id="last_name" value="{{ old('last_name') }}"  class="form-control  @error('last_name') is-invalid @enderror" name="last_name"  />
            @error('last_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            <br>
            @enderror

            <label for="email">{{ __('backend/users.email') }} * :</label>
            <input type="email" id="email" value="{{ old('email') }}"  class="form-control  @error('email') is-invalid @enderror" name="email" />
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            <br>
            @enderror

            <label for="password">{{ __('backend/users.password') }} * :</label>
            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password"  />
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            <br>
            @enderror
            <label for="password_confirmation">{{ __('backend/users.password_confirmation') }} * :</label>
            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation"  />

            <label for="age">{{ __('backend/users.age') }}  :</label>
            <input type="number" id="age" class="form-control" name="age"  />

            <label>{{ __('backend/users.gender') }} :</label>
            <p>
                M:
                <input type="radio" class="flat" name="gender" id="genderM" value="Male" checked=""  /> F:
                <input type="radio" class="flat" name="gender" id="genderF" value="Fmale" />
            </p>

            <label>{{ __('backend/users.admin') }}:</label>
            <p style="padding: 5px;">
                <input type="checkbox" name="is_admin" id="hobby1" value="1" data-parsley-mincheck="2" class="flat" /> {{ __('backend/users.admin') }}
                <br />
            <p>
                <br />
                <button class="btn btn-primary">{{ __('backend/users.submit') }}</button>

        </form>
    </div>
</div>

@push('js')
<script src="{{ url('backend/') }}/vendors/iCheck/icheck.min.js"></script>
@endpush
@endsection
