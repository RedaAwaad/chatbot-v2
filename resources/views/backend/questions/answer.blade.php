@extends('backend.layouts.app')
@section('page_title')
{{ __('backend/questions.create') }}
@endsection
@section('title')
{{ __('backend/questions.create') }}
@endsection
@section('content')
@push('css')
<link href="{{ url('backend/') }}/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
@endpush
<div class="x_panel">
   
    <div class="x_content">

        <!-- start form for validation -->
        <form id="demo-form" method="POST" action="{{route('questions.answer.store')}}">
        @csrf

        <label for="answer_id">{{ __('backend/questions.answers') }} * :</label>
        <select name="answer_id" id="answers" class="form-control">
            @foreach ($answers as $answer)
            <option value="{{ $answer->id }}">{{ $answer->text }}</option>
            @endforeach
        </select>
         <input type="hidden" id="customer" name="question_id" value="{{ $id }}">
        @error('answer_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            <br>
        @enderror

        <label for="question_id">{{ __('backend/questions.next_question') }} * :</label>
        <select name="next_question_id" id="question" class="form-control">
            @foreach ($questions as $question)
            <option value="{{ $question->id }}">{{ $question->text }}</option>
            @endforeach
        </select>
        @error('question_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            <br>
        @enderror
        <label>{{ __('backend/questions.endpoint') }} :</label>
        <p>
            true:
            <input type="radio" class="flat" name="endpoint" class="endpoint" value="1" checked=""  /> False:
            <input type="radio" class="flat" name="endpoint" class="endpoint" value="0" />
        </p>

        <div id="message">
            <label for="endpoint_message">{{ __('backend/questions.endpoint_message') }} * :</label>
            <input type="text" name="endpoint_message" class="form-control">
            @error('endpoint_message')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                <br>
            @enderror
        </div>
        

        <label>{{ __('backend/questions.as_icon') }} :</label>
        <p>
            true:
            <input type="radio" class="flat" name="as_icon" id="as_icon" value="1" checked=""  /> False:
            <input type="radio" class="flat" name="as_icon" id="as_icon" value="0" />
        </p>
            <button class="btn btn-primary">{{ __('backend/questions.submit') }}</button>

        </form>
        <!-- end form for validations -->

    </div>
</div>
@push('js')
<script src="{{ url('backend/') }}/vendors/iCheck/icheck.min.js"></script>
<script>
$('#type_id').hide();
$('#next_question_id').hide();
$("#endpoint").change(function(){
    if($(this).val() == 1){
        $('#type_id').show();
        $('#next_question_id').show();
    }else{
        $('#type_id').hide();
        $('#next_question_id').hide();
    }
});
</script>
@endpush
@endsection