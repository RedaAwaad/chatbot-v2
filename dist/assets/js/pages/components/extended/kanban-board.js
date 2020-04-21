"use strict";



$('#kt_demo_panel').css('width','1200px !important');
$('#kt_demo_panel_close').on('click',function () {
    $('#kt_demo_panel').css('width','0px');
});

// Class definition

var KTKanbanBoardDemo = function() {

    // Private functions

    // Basic demo
    var demos = function() {
        var toDoButton = document.getElementById('addToDo');
        toDoButton.addEventListener('click', function() {
            kanban3.addElement(
                '_todo', {
                    'title': '<div class="kt-kanban__badge"><div class="kt-kanban__image kt-media kt-media--danger"><span>NW</span></div><div class="kt-kanban__content"><div class="kt-kanban__title">New Task</div><span class="kt-badge kt-badge--danger kt-badge--inline">To Do</span></div></div>'
                }
            );
        });

        var addBoardDefault = document.getElementById('addDefault');
        addBoardDefault.addEventListener('click', function() {
            kanban3.addBoards(
                [{
                    'id': '_default',
                    'title': 'New Board',
                    'class': 'brand-light',
                    'item': [{
                            'title': '<div class="kt-kanban__badge"><div class="kt-kanban__image kt-media kt-media--brand"><span>FT</span></div><div class="kt-kanban__content"><div class="kt-kanban__title">New Task 1</div><span class="kt-badge kt-badge--brand kt-badge--inline">New</span></div></div>',
                        },
                        {
                            'title': '<div class="kt-kanban__badge"><div class="kt-kanban__image kt-media kt-media--brand"><span>FT</span></div><div class="kt-kanban__content"><div class="kt-kanban__title">New Task 2</div><span class="kt-badge kt-badge--brand kt-badge--inline">New</span></div></div>',
                        }
                    ]
                }]
            )
        });

        var removeBoard = document.getElementById('removeBoard');
        removeBoard.addEventListener('click', function() {
            kanban3.removeBoard('_done');
        });
        // ********************************************************************
        var kanban4;
        $.ajax({
            type: "GET",
            url: url,
            processData:false,
            beforeSend: function(){
                $('#uploadStatus').html('<img src="http://mujib-chatbot.com/cdn/bot.gif" style=""/>');
            },
            success: function(data) {
                $('#uploadStatus').html('');
                kanban4 = new jKanban({
                    element: "#kanban4",
                    gutter: "0",
                    boards: data
                });

            }
        });

        function progress() {
            var content = {};

            content.message = 'New order has been placed';
            content.title = 'Notification Title';
            if ($('#kt_notify_icon').val() != '') {
                content.icon = 'icon ' + $('#kt_notify_icon').val();
            }
            if ($('#kt_notify_url').prop('checked')) {
                content.url = 'www.keenthemes.com';
                content.target = '_blank';
            }

            var notify = $.notify(content, {
                type: $('#kt_notify_state').val(),
                allow_dismiss: true,
                newest_on_top: true,
                mouse_over: true,
                showProgressbar: true,
                spacing: "10",
                timer: "1000",
                placement: {
                    from: "top",
                    align: "center"
                },
                offset: {
                    x: $('#kt_notify_offset_x').val(),
                    y: $('#kt_notify_offset_y').val()
                },
                delay: 800,
                z_index: 100069,
                animate: {
                    enter: 'animated bounce',
                    exit: 'animated bounce'
                }
            });

            if (true) {
                setTimeout(function() {
                    notify.update('message', '<strong>Saving</strong> Page Data.');
                    notify.update('type', 'primary');
                    notify.update('progress', 20);
                }, 500);

                setTimeout(function() {
                    notify.update('message', '<strong>Saving</strong> User Data.');
                    notify.update('type', 'warning');
                    notify.update('progress', 40);
                }, 1000);

                setTimeout(function() {
                    notify.update('message', '<strong>Checking</strong> for errors.');
                    notify.update('type', 'success');
                    notify.update('progress', 100);
                }, 4000);
            }

        }

        function validate() {
            var content = {};

            content.message = 'Please Complete your form data to can add your request';
            content.title = 'Validation Error';
            if ($('#kt_notify_icon').val() != '') {
                content.icon = 'icon ' + $('#kt_notify_icon').val();
            }
            if ($('#kt_notify_url').prop('checked')) {
                content.url = 'www.keenthemes.com';
                content.target = '_blank';
            }

            var notify = $.notify(content, {
                type: "danger",
                allow_dismiss: true,
                newest_on_top: true,
                mouse_over: true,
                showProgressbar: false,
                spacing: "10",
                timer: "1000",
                placement: {
                    from: "top",
                    align: "center"
                },
                offset: {
                    x: $('#kt_notify_offset_x').val(),
                    y: $('#kt_notify_offset_y').val()
                },
                delay: 800,
                z_index: 100069,
                animate: {
                    enter: 'animated bounce',
                    exit: 'animated bounce'
                }
            });

        }





        //Add New Question Check
        $("#addBoard").on("click", function() {
            var questionType = $("#questionType").val();

            var qType = $("#qType").val();

            var questionid = $("#questionid").val();

            var isEntryPoint = $("#isEntryPoint")[0].checked ? "1" : "0";

            var bordTitle = $("#kanban-add-board").val().replace(/^\s+|\s+$|,|;/gm, '');

            var bordTitleAr = $("#kanban-add-board-ar").val().replace(/^\s+|\s+$|,|;/gm, '');
            progress()
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: url_store_question,
                data: {
                    'chat_id': id,
                    'type_id': qType,
                    'next_question_id': questionid,
                    'text': bordTitle,
                    'text_ar': bordTitleAr,
                    'answer_type': questionType,
                    'is_entry_point': isEntryPoint
                },

                success: function(response) {

                    if (bordTitle) {
                        var bordId = "_" + response;
                        var boardColor = $("#kanban-add-board-color").val();
                        var option = '<option value="' + bordId + '">' + bordTitle + '</option>';


                        kanban4.addBoards(
                            [{
                                'id': bordId,
                                'title': bordTitle,
                                'class': boardColor
                            }]
                        );
                        $('#kanban-select-task').append(option);
                        $('#kanban-select-board').append(option);
                        $('#next-text-question').append(option);
                        $('#next-choice-question').append(option);
                        $('#next_question_id').append(option);
                        $('#questionid').append(option);
                        $("#isEntryPoint")[0].checked = false;
                        $('#Edit-next-choice-question').append(option);
                    }
                }
            });
            //Close Model
            $("button.close").click();

            //Reset Inputs Value
            $("#questionType").val('');
            $("#qType").val('');
            $("#questionid").empty().trigger('change');
            $('#kanban-add-board-ar').summernote('code', '');
            $('#kanban-add-board').summernote('code', '');
        });










        // Custom Settings For Question Content
        var questionName = '';

        $(document).on("click", ".add-newe-qu", function() {
            tagify.removeAllTags();
            $("body").addClass("kt-demo-panel--on");
            $("#kt_demo_panel").addClass("kt-demo-panel--on").after('<div class="kt-demo-panel-overlay"></div>')
                //Handle Sidebar Regarding Button and Question Type
            var questionType = $(this).attr("data-type");

            questionName = $(this).attr("data-id");

            if (questionType === "text") {
                $(".text-box-type").fadeIn();
            } else {
                $(".choice-box-type").fadeIn();
            }
        });

        function openSidebar() {
            $("body").addClass("kt-demo-panel--on");
            $("#kt_demo_panel").addClass("kt-demo-panel--on").after('<div class="kt-demo-panel-overlay"></div>');
        }

        var addTask = document.getElementById('addTask');
        addTask.addEventListener('click', function() {
            var tTitle = $("#kanban-add-task").val().replace(/^\s+|\s+$|,/gm, '');
            var kt_tagify_1 = $("#kt_tagify_1").val();

            var tTitleAr = $("#kanban-add-task-ar").val().replace(/^\s+|\s+$|,/gm, '');
            var nextQuestion = $("#next-choice-question").val().replace(/^\s+|\s+$|,/gm, '');
            if (tTitleAr == "" || tTitle == "" || nextQuestion == "") {
                validate()
            } else {
                var endPointText = $("#endPointText").val().replace(/^\s+|\s+$|,/gm, '');
                var isICON = $("#isICON")[0].checked ? "1" : "0";
                var isEndPointChoice = $("#isEndPointChoice")[0].checked ? "1" : "0";
                var cQues = questionName.split('').splice(1, questionName.length).join('');
                var answer_id;
                if (tTitle) {
                    progress()
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "post",
                        url: url_store_answers,
                        data: { 'fqa': kt_tagify_1, 'endpoint': isEndPointChoice, 'endpoint_message': endPointText, text: tTitle, 'text_ar': tTitleAr, 'next_question_id': nextQuestion, 'as_icon': isICON, 'question_id': cQues },

                        success: function(response) {
                            answer_id = response;
                            var target = questionName;
                            var title = '<span class="content">' + tTitle + '</span><i class="flaticon2-contract edit-task mx-2" data-label="' + cQues + '" data-id="' + answer_id + '"></i> <i class="flaticon-circle remove-answer mx-1" data-toggle="modal" data-target="#kt_modal_remove_answer" data-label="' + cQues + '" data-id="' + answer_id + '"></i>';
                            var taskColor = $('#kanban-add-task-color').val();
                            kanban4.addElement(
                                target, {
                                    'title': title,
                                    'class': taskColor
                                }
                            );
                            $("#kanban-add-task").val('');
                            $("#kanban-add-task-ar").val('');
                            $("#next-choice-question").val('').trigger('change');
                            $("body").removeClass("kt-demo-panel--on");
                            $("#kt_demo_panel").removeClass("kt-demo-panel--on");
                            $(".kt-demo-panel-overlay").remove();
                            $(".choice-box-type").fadeOut();
                            $("#isICON")[0].checked = false
                            tagify1.removeAllTags();
                        }

                    });

                }
            }

        });

        function hideSideBar() {
            $("body").removeClass("kt-demo-panel--on");
            $("#kt_demo_panel").removeClass("kt-demo-panel--on");
            $(".kt-demo-panel-overlay").remove();
            $(".text-box-type, .choice-box-type, .edit-task-box, .text-box-type-edit, .choice-box-type-edit, .inputs-editor, .add-new-question").fadeOut();
        }

        //Hndle Edit Task
        var eleTarget = '';
        var question_id = '';
        var answer_id = '';
        $(document).on("click", ".edit-task", function() {
            $(this).fadeOut()
            eleTarget = $(this).siblings(".content");

            question_id = $(this).attr("data-label");
            answer_id = $(this).attr("data-id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: url_edit_answers,
                data: { 'answer_id': answer_id, 'question_id': question_id },
                beforeSend: function(){
                    // $('#kanban4').hide();

                    $('#uploadStatus'+answer_id).html('<img src="http://mujib-chatbot.com/cdn/bot.gif" style="width: 70px"/>');
                },
                success: function(response) {
                    // $('#kanban4').show();

                    $('#uploadStatus'+answer_id).html('')
                    $(".edit-task").fadeIn()
                    tagify.removeAllTags()
                    tagify.addTags(response.items)
                    $('#Edit-kanban-add-task-ar').summernote('code', response.text_ar);
                    $('#Edit-kanban-add-task').summernote('code',response.text);
                    if (response.as_icon) {
                        $("#Edit-isICON")[0].checked = true
                    }
                    if (response.endpoint == "on") {
                        $("#Edit-isEndPointChoice")[0].checked = true
                        $(".endPointTextChoice").fadeIn();
                    } else {
                        $("#Edit-isEndPointChoice")[0].checked = false
                        $(".endPointTextChoice").fadeOut();
                    }
                    $("#Edit-next-choice-question").val(response.next_question).trigger('change');
                    $("#Edit-endPointText").val(response.endpoint_message);
                    var cQues = questionName.split('').splice(1, questionName.length).join('');
                    openSidebar();
                }
            });

            //Show Edit Box
            $(".edit-task-box").fadeIn();
            //Keep The Current Value Into The Input
            $("#editableTask").val(eleTarget.text());
        });
        $(".choice-box-type").fadeOut();
        $("#doneEdit").on("click", function() {
            eleTarget.html($("#Edit-kanban-add-task").val());
            var items = $("#kt_tagify_3").val();
            var text = $("#Edit-kanban-add-task").val();
            var text_ar = $("#Edit-kanban-add-task-ar").val();
            var next_question_id = $("#Edit-next-choice-question").val();

            var as_icon = $("#Edit-isICON")[0].checked ? "1" : "0";
            var endpoint = $("#Edit-isEndPointChoice")[0].checked ? "1" : "0";
            if(endpoint =="1"){
                var endpoint_message = $("#Edit-endPointText").val();
            }else{
                var endpoint_message = "";
            }
            if (text == "" || text_ar == "" || next_question_id == "") {
                validate()
            } else {
                if ($("#Edit-kanban-add-task").val()) {
                    progress()
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "post",
                        url: url_edit_answers,
                        data: { 'answer_id': answer_id, 'question_id': question_id, 'items': items, 'text': text, 'text_ar': text_ar, 'next_question_id': next_question_id, 'endpoint_message': endpoint_message, 'as_icon': as_icon, 'endpoint': endpoint },
                        success: function(response) {

                            hideSideBar();
                            tagify.removeAllTags()
                            $('#Edit-kanban-add-task-ar').summernote('code','');
                            $('#Edit-kanban-add-task').summernote('code','');
                            $("#Edit-next-choice-question").val("");
                            $("#Edit-endPointText").val("");
                            $("#Edit-isICON").val("");
                            $("#Edit-isEndPointChoice").val("");
                            var cQues = questionName.split('').splice(1, questionName.length).join('');
                        }
                    });
                    hideSideBar();
                }
            }

        });

        //Delete Answer
        var currAnswerParent;
        var question_id;
        var answer_id;
        $(document).on("click", ".remove-answer", function() {
            currAnswerParent = $(this).parent();
            question_id = $(this).attr("data-label");
            answer_id = $(this).attr("data-id");
            $(".current-answer-content").html($(this).siblings(".content").html());
        });

        //Confirm Delation
        $("#deleteAnswerBTN").on("click", function() {
            progress();
            $.ajax({
                type: "GET",
                url: url_delete_answers,
                data: { 'answer_id': answer_id, 'question_id': question_id },
                success: function(response) {}
            });

            currAnswerParent.remove();
            $("button.close").click();
        });
        //Delete Question
        var cQuestion;
        $(document).on("click", ".delete-icon-question", function() {

            var cQ = $(this).attr("data-id");

            cQuestion = cQ.split('').splice(1, cQ.length).join('');

            $(".question-content").html("Delete");
        });

        var removeBoard2 = document.getElementById('removeBoard2');
        removeBoard2.addEventListener('click', function() {
            // var target = $('#kanban-select-board').val();
            var target = "_" + cQuestion;
            kanban4.removeBoard(target);
            $('#kanban-select-task option[value="' + target + '"]').remove();
            $('#kanban-select-board option[value="' + target + '"]').remove();
            $('#next-choice-question option[value="' + target + '"]').remove();
            $('#next-text-question option[value="' + target + '"]').remove();
            $('#next_question_id option[value="' + target + '"]').remove();
            $('#questionid option[value="' + target + '"]').remove();
            $('#Edit-next-choice-question option[value="' + target + '"]').remove();
            progress();
            $.ajax({
                type: "GET",
                url: url_delete_question,
                data: { id: cQuestion },
                success: function(data) {}
            });
            //Close Model
            $("button.close").click();
        });
    }

    return {
        // public functions
        init: function() {
            demos();
        }
    };
}();

jQuery(document).ready(function() {
    KTKanbanBoardDemo.init();
});
