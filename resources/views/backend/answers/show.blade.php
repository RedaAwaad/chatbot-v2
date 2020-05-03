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
                <th>Text</th>
                <th>endpoint</th>
                <th>Type of Answer</th>
            </tr>
            </thead>
            <tbody>
            @foreach($question->answers as $answer)
                <tr>
                    <td>{{$answer->text}}</td>
                    <td>{{$answer->endpoint}}</td>
                    <td>{{$answer->next_question}}</td>
                    <td>
                    </td>
                </tr>
            @endforeach
           
            </tbody>
        </table>

    </div>
</div>
<h3>Answers</h3>
<div class="x_panel">
   
    <div class="x_content">

        <table class="table table-striped table-bordered" id="datatable">
            <thead>
            <tr>
                <th>Text</th>
                <th>Number of Answer</th>
                <th>Type of Answer</th>
                <th>Is Entry Point</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$question->text}}</td>
                <td>{{$question->num_answer}}</td>
                <td>{{$question->answer_type}}</td>
                <td>{{$question->is_entry_point}}</td>
            </tr>
            </tbody>
        </table>

    </div>
</div>
@push('js')
    <script src="{{ url('/backend') }}/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ url('/backend') }}/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="{{ url('/backend') }}/vendors/sweetalert/sweetalert.js"></script>
    <script>
        var textLang = '';

        if(document.querySelector('html').getAttribute('dir') === 'rtl') {
            textLang = {
                title: 'هل انت متأكد؟',
                text: '',
                buttonText: 'نعم، تأكيد الحذف'
            }
        } else {
            textLang = {
                title: 'Are you sure?',
                text: 'You will be able to revert this!',
                buttonText: 'Yes, delete it!'
            }
        }

        function delete_confirmation(id){
            swal.fire({
            title: textLang.title,
            text: textLang.text,
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3b536a',
            cancelButtonColor: '#d33',
            confirmButtonText: textLang.buttonText
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
