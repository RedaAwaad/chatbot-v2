@extends('backend.layouts.app')
@section('page_title')
{{ __('backend/users.update') }}
@endsection
@section('title')
{{ __('backend/users.update') }}
@endsection
@section('content')
@push('css')
<link href="{{ url('backend/') }}/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
@endpush
<div class="x_panel">

    <div class="x_content">

        <!-- start form for validation -->
        <form id="demo-form" method="POST" action="{{route('answers.update',$answer->id)}}">
        @csrf
        @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <label for="text">{{ __('backend/questions.text') }} * :</label>
                    <input type="text" id="text" value="{{ $answer->text }}" class="form-control  @error('text') is-invalid @enderror" name="text" />
                    @error('text')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    <br>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="text_ar">{{ __('backend/questions.text_arabic') }} * :</label>
                    <input type="text" id="text" value="{{ $answer->text_ar }}" class="form-control  @error('text_ar') is-invalid @enderror" name="text_ar" />
                    @error('text_ar')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    <br>
                    @enderror
                </div>
            </div>

            <br />
            <button class="btn btn-primary">{{ __('backend/answers.submit') }}</button>

        </form>
        <!-- end form for validations -->

    </div>
</div>
@push('js')
<script src="{{ url('backend/') }}/vendors/iCheck/icheck.min.js"></script>
@endpush
@endsection
