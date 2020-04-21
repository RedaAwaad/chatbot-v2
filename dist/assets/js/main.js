$(document).ready(function() {

    // Handle Create New Chatbot
    function createChatbot() {
        var chatbotsContainer = $('#chatbotsContainer'),
            chatbotName = $("#chatbotName").val(),
            chatbotSubhead = $("#chatbotSubhead").val(),
            chatbotDisc = $("#chatbotDisc").val(),
            chatbotBody = `<div class="col-md-6">
    <div class="kt-portlet kt-portlet--height-fluid">
      <div class="kt-portlet__head kt-portlet__head--noborder">
        <div class="kt-portlet__head-label">
          <h3 class="kt-portlet__head-title">
          </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
          <a href="#" class="btn btn-icon" data-toggle="dropdown">
            <i class="flaticon-more-1 kt-font-brand"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <ul class="kt-nav">
              <li class="kt-nav__item">
                <a href="#" class="kt-nav__link">
                  <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                  <span class="kt-nav__link-text">Reports</span>
                </a>
              </li>
              <li class="kt-nav__item">
                <a href="#" class="kt-nav__link">
                  <i class="kt-nav__link-icon flaticon2-send"></i>
                  <span class="kt-nav__link-text">Messages</span>
                </a>
              </li>
              <li class="kt-nav__item">
                <a href="#" class="kt-nav__link">
                  <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                  <span class="kt-nav__link-text">Charts</span>
                </a>
              </li>
              <li class="kt-nav__item">
                <a href="#" class="kt-nav__link">
                  <i class="kt-nav__link-icon flaticon2-avatar"></i>
                  <span class="kt-nav__link-text">Members</span>
                </a>
              </li>
              <li class="kt-nav__item">
                <a href="#" class="kt-nav__link">
                  <i class="kt-nav__link-icon flaticon2-settings"></i>
                  <span class="kt-nav__link-text">Settings</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="kt-portlet__body">
        <div class="kt-widget kt-widget--user-profile-2">
          <div class="kt-widget__head">
            <div class="kt-widget__media">
              <img class="kt-widget__img kt-hidden- mt-n3" width="80px" src="/assets/media/chatbot2.png" alt="image">
              <div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest  kt-hidden">
                MP
              </div>
            </div>
            <div class="kt-widget__info">
              <Span class="kt-widget__username"> ${chatbotName} </Span>
              <span class="kt-widget__desc"> ${chatbotSubhead} </span>
            </div>
          </div>
          <div class="kt-widget__body">
            <div class="kt-widget__section"> ${chatbotDisc} </div>
            <div class="kt-widget__item">
              <div class="kt-widget__contact">
                <span class="kt-widget__label">Creation Date:</span>
                <span class="kt-widget__data"> ${fullDate()} </span>
              </div>
              <div class="kt-widget__contact">
                <span class="kt-widget__label">Last Update:</span>
                <span class="kt-widget__data">Today</span>
              </div>
              <div class="kt-widget__contact mt-3">
                <label class="kt-checkbox custom-check kt-checkbox--brand">
                  <img src="/assets/media/icons8-facebook-messenger.svg" class="d-block ml-3" width="35" alt="facebook messenger">
                  <p>Messenger</p>
                  <input type="checkbox" value="messenger">
                  <span></span>
                </label>
                <label class="kt-checkbox custom-check kt-checkbox--brand">
                  <img src="/assets/media/icons8-whatsapp.svg" class="d-block ml-n3" width="35" alt="whatsapp">
                  <p class="whats">Whats</p>
                  <input type="checkbox" value="whatsapp">
                  <span></span>
                </label>
                <label class="kt-checkbox custom-check kt-checkbox--brand pl-5">
                  <!-- <img src="/assets/media/icons8-sms.png" width="35" alt="sms"> -->
                  <i class="flaticon2-sms ml-n4"></i>
                  <p>SMS</p>
                  <input type="checkbox" value="sms">
                  <span></span>
                </label>
                <label class="kt-checkbox custom-check kt-checkbox--brand pl-5">
                  <!-- <img src="/assets/media/icons8-email.png" width="35" alt="email"> -->
                  <i class="flaticon2-new-email ml-n2"></i>
                  <input type="checkbox" value="email">
                  <p>E-Mail</p>
                  <span></span>
                </label>
                <label class="kt-checkbox custom-check kt-checkbox--brand">
                  <img src="/assets/media/icons8-telegram-app.svg" class="d-block ml-2" width="35" alt="telegram">
                  <input type="checkbox" value="telegram">
                  <p>Telegram</p>
                  <span></span>
                </label>
                <label class="kt-checkbox custom-check kt-checkbox--brand">
                  <img src="/assets/media/icons8-slack.svg" class="d-block ml-n4" width="35" alt="slack">
                  <input type="checkbox" value="slack">
                  <p>Slack</p>
                  <span></span>
                </label>
              </div>
            </div>
          </div>
          <div class="kt-widget__footer">
            <a href="components/extended/kanban-board.html" class="btn btn-label-brand btn-lg" >Edit</a>
          </div>
        </div>
      </div>
    </div>
    </div>`;

        //Date Formate
        function fullDate() {
            var date = new Date(),
                day = date.getDate(),
                month = date.getMonth() + 1,
                year = date.getFullYear(),
                hours = date.getHours(),
                minutes = date.getMinutes(),
                seconds = date.getSeconds();
            var fullTime = day + '-' + month + '-' + year + ' & ' + hours + ':' + minutes + ':' + seconds;
            return fullTime;
        }

        //Validate Inputs
        if (chatbotName && chatbotSubhead && chatbotDisc) {
            chatbotsContainer.append(chatbotBody);
            $("#chatbotName").val('');
            $("#chatbotSubhead").val('');
            $("#chatbotDisc").val('');
            $("#createChatbotError").html('<div class="alert alert-success mt-4" >A new Chatbot added Successfully!</div>');
            setTimeout(function() {
                $("#createChatbotError").html('');
            }, 2000);
        } else {
            console.log("Error in Creating a new Chatbot!");
            $("#createChatbotError").html('<div class="alert alert-danger mt-4" >You have to fill out all fields!</div>');
            setTimeout(function() {
                $("#createChatbotError").html('');
            }, 2000);
        }
    }

    // Append to Chatbots Container
    $("#chatbotFormCreate").on("submit", function(e) {
        e.preventDefault();
        store_ajax(this)
        createChatbot();
    });

    //Handel Add New Question Input
    $("#kt_demo_panel_toggle").on("click", function() {
        $(".add-new-question").fadeIn();
    });
    $("#qType").hide();
    $("#questionid").hide();
    $("#questionType").on("change", function() {
        if ($("#questionType").val() == "texting") {
            $("#qType").show();
            $("#questionid").show();
        } else {
            $("#qType").hide();
            $("#questionid").hide();
        }
    })

    //Show Sidebar to Write New Question
    var questionName;

    $(document).on("click", ".add-newe-qu", function() {
        //Hndle Sidebar Regarding Button and Question Type
        questionName = $(this).attr("data-id");
    });

    //When Submit Text Data
    var endPoint = false;

    $("#submitTextType").on("click", function(event) {
        event.preventDefault();
        endPoint = $("#isEndPointText");

        if (endPoint) {
            $("[data-id=" + questionName + "]").find(".is-end-point").html('<i class="fas fa-stop-circle fa-lg mt-5"></i> End Point!');
            hideSideBar();
        } else {
            $("[data-id=" + questionName + "]").find(".is-end-point").html('');
            hideSideBar();
        }
    });

    var isChecked = '';
    $("#isEndPointText").on("click", function() {
        isChecked = $(this)[0].checked;
        if (isChecked) {
            $("#next-text-question").fadeOut();
        } else {
            $("#next-text-question").fadeIn();
        }
    });

    var isCheckedChoice = '';
    $("#isEndPointChoice").on("change", function() {
        isCheckedChoice = $(this)[0].checked;
        if (isCheckedChoice) {
            $(".endPointTextChoice").fadeIn();
        } else {
            $(".endPointTextChoice").fadeOut();
        }
    });
    var isCheckedChoice = '';
    $("#Edit-isEndPointChoice").on("change", function() {
        isCheckedChoice = $(this)[0].checked;
        if (isCheckedChoice) {
            $(".endPointTextChoice").fadeIn();
        } else {
            $(".endPointTextChoice").fadeOut();
        }
    });

    //Open Sidebar Content
    function openSidebar() {
        $("body").addClass("kt-demo-panel--on");
        $("#kt_demo_panel").addClass("kt-demo-panel--on").after('<div class="kt-demo-panel-overlay"></div>');
    }

    //Handle Edit Button to Edit Elements
    $(document).on("click", ".edit-curr-question", function() {
        $(".choice-box-type").fadeOut();
        questionName = $(this).attr("data-id");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({

            type: "post",

            url: edit_question,

            data: { id: questionName.split("").splice(1, questionName.length).join("") },
            success: function(response) {
                openSidebar();
                $('#Edit-kanban-add-board-ar').summernote('code', response.text_ar);
                $('#Edit-kanban-add-board').summernote('code',response.text);
                $("#Edit-question_type").val(response.answer_type);
                $("#Edit-type_id").val(response.type_id);
                //$("#Edit-isEntryPoint").val(response.next_question_id);
                if (response.is_entry_point) {
                    $("#Edit-isEntryPoint")[0].checked = true;
                } else {
                    $("#Edit-isEntryPoint")[0].checked = false;
                }

            }

        });

        //Open Editor Sidebar
        $(".inputs-editor").fadeIn();
        //Set The Current Heading Value To the Input
        $("#Edit-kanban-add-board").val(questionName.split("").splice(1, questionName.length).join(""));
    });

    //Change Heading Title When Writing The new Text
    $("#Edit-kanban-add-board").on("keyup", function() {
        $("[data-id=" + '"' + questionName + '"' + "]").find(".kanban-title-board").html($(this).val());

    });
    //Set Values When Submit The Editor Form
    $("#editQHeadingBtn").on("click", function() {
        $("[data-id=" + '"' + questionName + '"' + "]").find(".kanban-title-board").html($("#editQHeading").val());

        var text = $("#Edit-kanban-add-board").val();
        var text_ar = $("#Edit-kanban-add-board-ar").val();
        var answer_type = $("#Edit-question_type").val();
        var next_question_id = $('#Edit-next_question_id').val();
        var type_id = $("#Edit-type_id").val();
        var is_entry_point = $("#Edit-isEntryPoint")[0].checked ? 1 : 0;
        var type_id = $("#Edit-type_id").val();
        var id = questionName.split("").splice(1, questionName.length).join("")
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({

            type: "post",

            url: edit_question,

            data: { id: id, text: text, next_question_id: next_question_id, text_ar: text_ar, answer_type: answer_type, is_entry_point: is_entry_point, type_id: type_id },
            success: function(response) {
                $("#Edit-kanban-add-board").val("");
                $("#Edit-kanban-add-board-ar").val("");
                $("#Edit-isEntryPoint")[0].checked = false;
            }

        });
        //Edit Select Options for Remove board
        $("#kanban-select-board option").each(function() {
            if ($(this).val() === questionName) {
                $(this).val("_" + $("#editQHeading").val()).html($("#editQHeading").val());
            }
        });

        //Edit Select Options for Add new Choice Type
        $("#next-choice-question option").each(function() {
            if ($(this).val() === questionName) {
                $(this).val("_" + $("#editQHeading").val()).html($("#editQHeading").val());
            }
        });

        //Edit Select Options for Add new Choice Type
        $("#next-text-question option").each(function() {
            if ($(this).val() === questionName) {
                $(this).val("_" + $("#editQHeading").val()).html($("#editQHeading").val());
            }
        });

        //Edit Select Options for Add new Task
        $("#kanban-add-task option").each(function() {
            if ($(this).val() === questionName) {
                $(this).val("_" + $("#editQHeading").val()).html($("#editQHeading").val());
            }
        });

        //Reset
        hideSideBar();
    });

    //Hide Sidebr and Reset Function
    function hideSideBar() {
        $("body").removeClass("kt-demo-panel--on");
        $("#kt_demo_panel").removeClass("kt-demo-panel--on");
        $(".kt-demo-panel-overlay").remove();
        $(".text-box-type, .choice-box-type, .edit-task-box, .text-box-type-edit, .choice-box-type-edit, .inputs-editor, .add-new-question").fadeOut();
    }

    //Hide Sidebar
    $("#kt_demo_panel_close").on("click", function() {
        hideSideBar();
        $(".edit-task").fadeIn()
    });
    //Submit Edit Text To the current Question



});
