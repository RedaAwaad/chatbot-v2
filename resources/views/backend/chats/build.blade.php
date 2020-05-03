@extends('backend.new_layout.app')
@section('content')
@push('css')
@if(Session::get('locale') == 'en')
<style>
    .edit-task {
        float: left;

    }

    .remove-answer {
        float: left;
    }
    .kt_select2_1{
        width: 100%;
    }
    kanban-board{
        width: auto !important;
    }
</style>
@endif
<style>
    .edit-task {
        cursor: pointer;

    }

    .remove-answer {
        cursor: pointer;
    }

    .un-dragapple-ele i.delete-icon-question {
        color: #fc0758;
    }

    .un-dragapple-ele i.add-newe-qu {
        color: #4b6a88;
    }

    .un-dragapple-ele i {
        cursor: pointer;
        transition: 0.2s ease-in-out;
    }

    .un-dragapple-ele i.edit-curr-question {
        color: #08976d;
    }

    textarea.summarnote_en + .note-editor {
        text-align: left !important;
        direction: ltr;
    }
    textarea.summarnote_ar + .note-editor {
        text-align: right !important;
        direction: rtl;
    }

</style>
<link href="{{ url('dist/') }}/assets/plugins/iCheck/skins/flat/green.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{url('/front/themes/munawla/')}}/css/rch.css">
<link
    href="{{ url('dist/') }}/assets/plugins/custom/kanban/kanban.bundle{{Session::get('locale') == 'en' ? '':'.rtl'}}.css"
    rel="stylesheet" type="text/css" />
@endpush
<!-- Progress bar -->

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="row hidden-item" style="display: none">
            <div id="kanban3"></div>
            <button class="btn btn-brand" id="addDefault">Add "Default" board</button>
            <button class="btn btn-danger" id="addToDo">Add element in "To Do" Board</button>
            <button class="btn btn-success" id="removeBoard">Remove "Done" Board</button>
        </div>
        <!-- Build page With kanban4 ID to generate all boards -->
        <div class="row">
            @include('backend.chats.box')
            <div class="col-lg-12">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z"
                                        fill="#000000" />
                                    <path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3" />
                                </g>
                                </svg></span> {{__('chats.create_scenario')}}
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">
                                <div class="kt-portlet__head-actions">
                                    <a href="javascript:;" class="btn btn-brand btn-elevate btn-icon-sm"
                                        data-toggle="modal" data-target="#kt_modal_add_question" data-placement="right">
                                        <i class="la la-plus"></i>
                                        {{__('chats.add_new_question')}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body build_page_content_row">
                        <div id="uploadStatus" class="text-center"></div>
                        <div id="kanban4"></div>
                        <div class="kanban-toolbar">
                            <div class="row"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Content -->
</div>

<!-- Add New Quetion Pop up -->
<div class="modal modal-stick-to-bottom fade" id="kt_modal_add_question" role="dialog" data-backdrop="false"
    aria-modal="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('chats.add_new_question')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <textarea id="kanban-add-board" class="summarnote_en" name="text" required></textarea>
                </div>
                <div>
                    <textarea id="kanban-add-board-ar" class="summarnote_ar" name="text_ar" required></textarea>
                </div>
                <div class="mt-4">
                    <select name="question_type" style="width: 100%" id="questionType" class="form-control kt_select2_1">
                        <option value="choices">{{__('chats.choicing')}}</option>
                    </select>
                </div>
                <div class="mt-3">
                    <label class="kt-checkbox">
                        <input type="checkbox" id="isEntryPoint">{{__('chats.is_entry')}}
                        <span></span>
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary setting_submit_btn" data-dismiss="modal">{{__('chats.cancel')}}</button>
                <button type="button" class="btn btn-brand setting_submit_btn" id="addBoard">{{__('chats.add')}}</button>
            </div>
        </div>
    </div>
</div>
<!-- Remove Current Qusetion -->
<div class="modal modal-stick-to-bottom fade" id="kt_modal_remove_question" role="dialog" data-backdrop="false"
    aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('chats.delete_confirm')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="question-content"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary setting_submit_btn" data-dismiss="modal">{{__('chats.cancel')}}</button>
                <button type="button" id="removeBoard2" class="btn btn-brand setting_submit_btn">{{__('chats.delete')}}</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Answer Model -->
<div class="modal modal-stick-to-bottom fade" id="kt_modal_remove_answer" role="dialog" data-backdrop="false"
    aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('chats.answer_delete_confirm')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="current-answer-content"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary setting_submit_btn" data-dismiss="modal">{{__('chats.cancel')}}</button>
                <button type="button" id="deleteAnswerBTN" class="btn btn-brand setting_submit_btn">{{__('chats.delete')}}</button>
            </div>
        </div>
    </div>
</div>
<!-- For New Message Questions && Answers Aside-->
<div id="kt_demo_panel" class="kt-demo-panel aside_container_content overflow">
    <div class="kt-demo-panel__head">
        <h3 class="kt-demo-panel__title">

        </h3>
        <a href="#" class="kt-demo-panel__close" id="kt_demo_panel_close"><i class="flaticon2-delete"></i></a>
    </div>
    <div class="kt-demo-panel__body aside_container h-auto">
        <!-- Message Body -->
        <div class="loading_data" id="loadingData">
            <div class="text-center">
                <div class="text-center mb-3">{{__('chats.loading_data')}}</div>
                <div class="kt-spinner kt-spinner--custom"></div>
            </div>
        </div>

        <div class="text-box-type" style="display: none;">
            <span class="lead">This input expects user's reply only!</span>
            <div class="h5 mt-4 mb-3">Type: Text</div>

            <span class="kt-switch kt-switch--danger kt-switch--sm">
                <label for="isEndPointText" class="mb-3">
                    <input type="checkbox" id="isEndPointText" class="mb-4">
                    <span></span>
                    <h5 class="d-inline-block pl-2 pt-1">{{__('chats.is_entry')}}</h5>
                </label>
            </span>
            <select id="next-text-question" style="width: 100%" class="next-text-question form-control mb-4 kt_select2_1">
                <option value="">{{__('chats.next_question')}}</option>
                @foreach($chat->questions as $question)
                <option value="{{ $question->id }}">{{ $question->text }}</option>
                @endforeach
            </select>
            <br />
            <button class="btn btn-primary" id="submitTextType">{{__('chats.submit')}}</button>
        </div>
        <div class="choice-box-type">
            <label class="mb-3">{{__('chats.add_new_answer')}}</label>
            <div class="mb-3">
                <textarea id="kanban-add-task" class="summarnote_en" name="kanban-add-task" required></textarea>
            </div>
            <div class="mb-4">
                <textarea id="kanban-add-task-ar" class="summarnote_ar" name="kanban-add-task-ar" required></textarea>
            </div>
            <div class="mb-3">
                <label>{{__('chats.next_question')}}</label>
                <select id="next-choice-question" class="form-control kt_select2_1" style="width: 100%" required>
                    <option value="">{{__('chats.next_question')}}</option>
                    @foreach($chat->questions as $question)
                        <option value="{{ $question->id }}">{{ $question->text }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group form-group-last mb-3 row">
                <label class="col-form-label col-lg-12 col-sm-12">{{__('chats.fqa')}}</label>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <input id="kt_tagify_1" name='tags' placeholder='type...' value='sample,' autofocus>
                    <div class="kt-margin-t-10"></div>
                </div>
            </div>
            <div class="d-flex justify-content-between mb-1">
                <label for="isEndPointChoice" class="kt-checkbox">
                    <input type="checkbox" id="isEndPointChoice">{{__('chats.is_end')}}
                    <span></span>
                </label>
                <label for="isICON" class="kt-checkbox">
                    <input type="checkbox" id="isICON">{{__('chats.as_icon')}}
                    <span></span>
                </label>
            </div>
            <div class="endPointTextChoice" style="display: none;">
                <input type="text" id="endPointText" class="form-control" placeholder="End Point Text" />
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-brand setting_submit_btn" id="addTask">{{__('chats.submit')}}</button>
            </div>
        </div>
        <!-- Add new Question | Board Sidebar Content -->
        <div class="add-new-question" style="display: none;">
        </div>
        <!-- Editor - Question Heding Sidebar Content -->
        <div class="inputs-editor" style="display: none;">
            <div class="form-group">
                <label>{{__('chats.edit_question')}}</label><br>
                <textarea id="Edit-kanban-add-board" class="summarnote_en" name="text" required></textarea>
                <br />
                <textarea id="Edit-kanban-add-board-ar" class="summarnote_ar" name="text" required></textarea>

                <br />
                <select name="Edit-question_type" id="Edit-question_type" style="width: 100%" class="form-control kt_select2_1">
                    <option value="choices">{{__('chats.choicing')}}</option>
                </select><br />
                <br />
                <label class="kt-checkbox">
                    <input type="checkbox" id="Edit-isEntryPoint">{{__('chats.is_entry')}}
                    <span></span>
                </label>
                <br />
            </div>
            <div class="text-center">
                <button class="btn setting_submit_btn btn-brand" id="editQHeadingBtn">Submit</button>
            </div>
        </div>

        <!-- Edit the User Reply Box  -->
        <div class="edit-task-box" style="display: none;">
            <label class="mb-4">{{__('chats.edit_answer')}}</label>
            <div class="mb-3">
                <textarea id="Edit-kanban-add-task" class="summarnote_en" required></textarea>
            </div>
            <div class="mb-4">
                <textarea id="Edit-kanban-add-task-ar" class="summarnote_ar" required></textarea>
            </div>
            <select id="Edit-next-choice-question" style="width: 100%" class="form-control kt_select2_1" required>
                <option value="">{{__('chats.next_question')}}</option>
                @foreach($chat->questions as $question)
                <option value="{{ $question->id }}">{{ $question->text }}</option>
                @endforeach
            </select>
            <div class="form-group form-group-last mt-3 row">
                <label class="col-form-label col-12">{{__('chats.fqa')}}</label>
                <div class="col-12">
                    <input id="kt_tagify_3" name='tags' class='tagify tagify--outside' placeholder='{{__(' chats.faq')}}'>
                    <div class="kt-margin-t-10"></div>
                </div>
            </div>
            <div class="d-flex justify-content-between mt-3">
                <label class="kt-checkbox">
                    <input type="checkbox" id="Edit-isEndPointChoice">{{__('chats.is_end')}}
                    <span></span>
                </label>
                <label class="kt-checkbox">
                    <input type="checkbox" id="Edit-isICON">{{__('chats.as_icon')}}
                    <span></span>
                </label>
            </div>
            <div class="endPointTextChoice mt-1" style="display: none;">
                <input type="text" id="Edit-endPointText" class="form-control" placeholder="End Point Text" />
            </div>
            <div class="text-center mt-4">
                <button class="btn btn-brand setting_submit_btn" id="doneEdit">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- Start Pop Up Icons -->
<div class="modal fade" id="kt_modal_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    style="padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('chats.add_icon')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group text-center">
                    <label class="kt-checkbox kt-checkbox--brand mx-3">
                        <input type="radio" name="icondata" value="flaticon2-notification" checked>
                        <span></span>
                        <i class="flaticon2-notification"></i>
                    </label>
                    <label class="kt-checkbox kt-checkbox--brand mx-3">
                        <input type="radio" name="icondata" value="flaticon2-settings">
                        <span></span>
                        <i class="flaticon2-settings"></i>
                    </label>
                    <label class="kt-checkbox kt-checkbox--brand mx-3">
                        <input type="radio" name="icondata" value="flaticon2-download">
                        <span></span>
                        <i class="flaticon2-download"></i>
                    </label>
                    <label class="kt-checkbox kt-checkbox--brand mx-3">
                        <input type="radio" name="icondata" value="flaticon2-box">
                        <span></span>
                        <i class="flaticon2-box"></i>
                    </label>
                    <label class="kt-checkbox kt-checkbox--brand mx-3">
                        <input type="radio" name="icondata" value="flaticon2-user">
                        <span></span>
                        <i class="flaticon2-user"></i>
                    </label>
                </div>
                <div class="form-group text-center">
                    <label class="kt-checkbox kt-checkbox--brand mx-3">
                        <input type="radio" name="icondata" value="flaticon2-list">
                        <span></span>
                        <i class="flaticon2-list"></i>
                    </label>
                    <label class="kt-checkbox kt-checkbox--brand mx-3">
                        <input type="radio" name="icondata" value="flaticon2-psd">
                        <span></span>
                        <i class="flaticon2-psd"></i>
                    </label>
                    <label class="kt-checkbox kt-checkbox--brand mx-3">
                        <input type="radio" name="icondata" value="flaticon2-delete">
                        <span></span>
                        <i class="flaticon2-delete"></i>
                    </label>
                    <label class="kt-checkbox kt-checkbox--brand mx-3">
                        <input type="radio" name="icondata" value="flaticon2-search">
                        <span></span>
                        <i class="flaticon2-search"></i>
                    </label>
                    <label class="kt-checkbox kt-checkbox--brand mx-3">
                        <input type="radio" name="icondata" value="flaticon2-line-chart">
                        <span></span>
                        <i class="flaticon2-line-chart"></i>
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('chats.cancel')}}</button>
                <button type="button" class="btn btn-success" data-dismiss="modal">{{__('chats.add')}}</button>
            </div>
        </div>
    </div>
</div>

<!-- End Pop Up Icons -->
{{--{{dd($data)}}--}}
<!-- end::Demo Panel -->
@push('js')
<script src="{{ url('dist/') }}/assets/plugins/iCheck/icheck.min.js"></script>
<!--begin::Page Scripts(used by this page) -->
<script src="{{ url('dist/') }}/assets/plugins/custom/kanban/kanban.bundle.js" type="text/javascript"></script>
<script src="{{ url('dist/') }}/assets/js/pages/components/extended/kanban-board.js" type="text/javascript"></script>
<script src="{{ url('dist/') }}/assets/js/pages/crud/forms/widgets/select2.js" type="text/javascript"></script>
<!-- JQuery UI -->
<script>
    var url = "{{route('chats.questions',$chat->id)}}"
    var url_store_question = "{{route('chats.store_questions')}}"
    var url_delete_question = "{{route('chats.url_delete_question')}}"
    var url_store_answers = "{{route('chats.store_answers')}}"
    var url_delete_answers = "{{route('chats.delete_answers')}}"
    var url_edit_answers = "{{route('chats.url_edit_answers')}}"
    var edit_question = "{{route('chats.edit_question')}}"
    var id = "{{$chat->id}}"
</script>
<!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
<script src="{{ url('dist/') }}/assets/js/main.js"></script>
<script>
    var input = document.getElementById('kt_tagify_3');
    var input1 = document.getElementById('kt_tagify_1');

    // init Tagify script on the above inputs
    tagify = new Tagify(input);
    tagify1 = new Tagify(input1);

    // add a class to Tagify's input element
    tagify.DOM.input.classList.add('form-control');
    tagify1.DOM.input.classList.add('form-control');
    tagify.DOM.input.setAttribute('placeholder', 'enter tag...');
    tagify1.DOM.input.setAttribute('placeholder', 'enter tag...');

    // re-place Tagify's input element outside of the  element (tagify.DOM.scope), just before it
    tagify.DOM.scope.parentNode.insertBefore(tagify.DOM.input, tagify.DOM.scope);
    tagify1.DOM.scope.parentNode.insertBefore(tagify1.DOM.input, tagify1.DOM.scope);
</script>
<script>
    $('#kanban-add-board').summernote({
        placeholder: "{{__('chats.title_en')}}",
        tabsize: 2,
        height: 100
    });
    $('#kanban-add-board-ar').summernote({
        placeholder: "{{__('chats.title_ar')}}",
        tabsize: 2,
        height: 100
    });
    $('#Edit-kanban-add-board').summernote({
        placeholder: "{{__('chats.title_en')}}",
        tabsize: 2,
        height: 100
    });
    $('#Edit-kanban-add-board-ar').summernote({
        placeholder: "{{__('chats.title_ar')}}",
        tabsize: 2,
        height: 100
    });
    $('#kanban-add-task').summernote({
        placeholder: "{{__('chats.title_en')}}",
        tabsize: 2,
        height: 102,
        direction: 'ltr !important',
        textAlign:'left !important'
    });
    $('#kanban-add-task-ar').summernote({
        placeholder: "{{__('chats.title_ar')}}",
        tabsize: 2,
        height: 100
    });
    $('#Edit-kanban-add-task').summernote({
        placeholder: "{{__('chats.title_en')}}",
        tabsize: 2,
        height: 100
    });
    $('#Edit-kanban-add-task-ar').summernote({
        placeholder: "{{__('chats.title_ar')}}",
        tabsize: 2,
        height: 100
    });
</script>
@endpush
@endsection
