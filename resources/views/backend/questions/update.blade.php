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
        <form id="demo-form" method="POST" action="{{route('questions.update',$question->id)}}">
        @csrf
        @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <label for="text">{{ __('backend/questions.text') }} * :</label>
                    <input type="text" id="text" value="{{ $question->text }}" class="form-control  @error('text') is-invalid @enderror" name="text" />
                    @error('text')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    <br>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="text_ar">{{ __('backend/questions.text_arabic') }} * :</label>
                    <input type="text" id="text" value="{{ $question->text_ar }}" class="form-control  @error('text_ar') is-invalid @enderror" name="text_ar" />
                    @error('text_ar')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    <br>
                    @enderror
                </div>
            </div>


        <label for="num_answer">{{ __('backend/questions.num_answer') }} * :</label>
        <input type="text" id="num_answer" value="{{  $question->num_answer  }}"  class="form-control  @error('num_answer') is-invalid @enderror" name="num_answer"  />
        @error('num_answer')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            <br>
        @enderror

          <label for="answer_type">{{ __('backend/questions.answer_type') }} * :</label>
        <select name="answer_type" id="answer_type" class="form-control">
            <option value="choices">{{__('backend/questions.choices') }}</option>
            <option value="texting">{{ __('backend/questions.texting') }}</option>
        </select>
        @error('answer_type')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            <br>
        @enderror

        <label for="type_id">{{ __('backend/questions.type_id') }} * :</label>
        <select name="type_id" id="type_id" class="form-control" >
        @foreach ($answers_type as $answer_type )
            <option value="{{ $answer_type->id }}">{{$answer_type->text }}</option>
        @endforeach

        </select>
        @error('type_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            <br>
        @enderror

        <label for="next_question_id">{{ __('backend/questions.next_question_id') }} * :</label>
        <select name="next_question_id" id="next_question_id" class="form-control" >
        @foreach ($questions as $q )
            <option value="{{ $q->id }}">{{$q->text }}</option>
        @endforeach

        </select>
        @error('next_question_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            <br>
        @enderror

        <label>{{ __('backend/questions.is_entry_point') }} :</label>
        <p>
            true:
            <input type="radio" class="flat" name="is_entry_point" id="is_entry_pointM" value="1" checked=""  /> False:
            <input type="radio" class="flat" name="is_entry_point" id="is_entry_pointF" value="0" {{ $question->is_entry_point ? '':'selected' }} />
        </p>
            <br />
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
$("#answer_type").change(function(){
    if($(this).children("option:selected").val() == 'texting'){
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
