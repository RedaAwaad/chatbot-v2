@extends('backend.layouts.app')
@section('page_title')
{{ __('backend/questions.show') }}
@endsection
@section('title')
{{ __('backend/questions.show') }}
@endsection
@section('content')
@push('css')
<link href="{{ url('/backend') }}/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('/backend') }}/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('/backend') }}/vendors/sweetalert/sweetalert.css" rel="stylesheet">
@endpush
<div class="x_panel">
   
    <div class="x_content">

        <table class="table table-striped table-bordered" id="">
            <thead>
            <tr>
                <th>text</th>
                <th>num answer</th>
                <th>entry point</th>
                <th>answer type</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$question->text}}</td>
                    <td>{{$question->num_answer}}</td>
                    <td>{{$question->is_entry_point}}</td>
                    <td>{{$question->answer_type}}</td>
                </tr>
           
            </tbody>
        </table>

    </div>
</div>
<h3>Answers</h3>
<div class="x_panel">
   
    <div class="x_content">
    <a class="btn btn-primary pull-right" href="{{ route('question.answers',$question->id) }}">Add Answer</a>
        <table class="table table-striped table-bordered" id="datatable">
            <thead>
            <tr>
                <th>Text</th>
                <th>End Point</th>
                <th>Next Question</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($question->answers() as $answer)
                <tr>
                    <td>{{ \App\Models\Answer::find($answer->answer_id)->text}}</td>
                    <td>{{$answer->endpoint}}</td>
                    <td>{{  \App\Models\Question::find($answer->next_question_id)->text}}</td>
                    <td><a href="{{ route('question_answer.destroy',$answer->id) }}"><i class="fa fa-trash"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

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
@endpush
@endsection
