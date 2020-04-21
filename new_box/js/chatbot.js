var cortona = [];
var entryQuestion = "";
if ($("#chatboxContainer").attr("lang") == "ar") {
    $(".chatbox__text").css("text-align", "right");
} else {
    $(".chatbox__text").css("text-align", "left");
}
$(".chatbox__open--box").hide();
$.ajax({
    type: "get",
    url: "entry_question",
    data: {
        id:"entry",
        lang: $("#chatboxContainer").attr("lang"),
        chat: chat_selected,
        status: chat_status
    },
    success: function (response) {
        entryQuestion = response;
        $(".chatbox__open--box").show();
    }
});
var otherlang = "";
if (chat_selected == "37") {
    otherlang = "Done";
}
$(document).ready(function() {
    if (localStorage.chatbotTheme) {
        var url = "link[href^='" + url_assets + "/css/themes/']";
        $(url).attr("href", localStorage.getItem("chatbotTheme"));

        $($("[data-theme='" + localStorage.getItem("chatbotTheme") + "']")[0])
            .siblings()
            .removeClass("active");
        $(
            $("[data-theme='" + localStorage.getItem("chatbotTheme") + "']")[0]
        ).addClass("active");
    }

    $(".chatbox-nav__link-text .color-schema").on("click", function() {
        $(this)
            .siblings()
            .removeClass("active");
        $(this).addClass("active");

        localStorage.setItem("chatbotTheme", $(this).attr("data-theme"));

        $(url).attr("href", localStorage.getItem("chatbotTheme"));
    });

    // Show Color Schema
    $("#colorSchemaContainer").on("click", function() {
        $(this).addClass("show");
    });

    // Hide Color Schema
    $("#chatboxDropdownToggle").on("click", function() {
        if ($("#chatboxDropdown").hasClass("dropdown--toggle")) {
            $("#colorSchemaContainer").removeClass("show");
        }
    });
    // Init Simple Scroll Plugin ==============
    new SimpleBar($("#chatbotScroll")[0]);
    var question_id = "entry";
    var question_text = "";
    var text = 0;
    // Adding Options == You Can Add More
    var options = [];
    function isHTML(str) {
        var a = document.createElement('div');
        a.innerHTML = str;

        for (var c = a.childNodes, i = c.length; i--; ) {
            if (c[i].nodeType == 1) return true;
        }

        return false;
    }

    function make_url_clicable(content) {
        if (!isHTML(content)){

            var exp_match = /(\b(https?|):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/gi;
            var element_content = content.replace(
                exp_match,
                "<a target='_blank' href='$1'>$1</a>"
            );
            var new_exp_match = /(^|[^\/])(www\.[\S]+(\b|$))/gim;
            var new_content = element_content.replace(
                new_exp_match,
                '$1<a target="_blank" href="http://$2">$2</a>'
            );
            return new_content;
        }
        return content;

    }

    function select_lang() {
        question_text = "Please select your language";
        if (chat_selected =="37"){
            options = [
                {
                    content: "اللغة العربية",
                    image: false,
                    clear: "",
                    endpoint_message: ""
                },
                {
                    content: "English",
                    image: false,
                    clear: "",
                    endpoint_message: ""
                },
                {
                    content: "Other languages",
                    image: false,
                    clear: "",
                    endpoint_message: ""
                }
            ];
        }else{
            options = [
                {
                    content: "اللغة العربية",
                    image: false,
                    clear: "",
                    endpoint_message: ""
                },
                {
                    content: "English",
                    image: false,
                    clear: "",
                    endpoint_message: ""
                },
            ];
        }

        addAnswer("Please select your language", options);
    }

    // if (chat_selected == "37") {
    //     $('textarea[id="msgFromUser"]').prop("disabled", true); // disable
    // }
    function selected_answer(question_id,answer_id) {
        $.ajax({
            type: "get",
            url: "select_next_question",
            data: {
                q_id:question_id,
                a_id:answer_id,
                lang: $("#chatboxContainer").attr("lang"),
                status: chat_status
            },
            success: function (response) {
                // console.log(response.question[0].id)
                question_id = response.question[0].id;
                question_text = make_url_clicable(
                    response.question[0].text
                );
                options = [];
                response.avilable_options.forEach(function(option) {
                    if (option.an_text != "") {
                        options.push({
                            content: make_url_clicable(option.an_text),
                            image: false,
                            clear:"",
                            id:option.id,
                            endpoint_message: option.endpoint_message
                        });
                    }
                });
                addQuestion();
            }
        });
    }
    function ajax(QID = "entry", ANSWERTEXT = "", Lang = "") {
        var text = ANSWERTEXT;
        if(QID == "entry"){
            question_id = entryQuestion.question[0].id;
            question_text = make_url_clicable(
                entryQuestion.question[0].text
            );
            options = [];
            entryQuestion.avilable_options.forEach(function(option) {
                if (option.an_text != "") {
                    options.push({
                        content: make_url_clicable(option.an_text),
                        image: false,
                        clear:"",
                        id:option.id,
                        endpoint_message: option.endpoint_message
                    });
                }
            });
            addQuestion();
        }else {
            $.ajax({
                type: "get",
                url: "response",
                data: {
                    id: QID,
                    answertext: text,
                    user_id: user_id,
                    lang: Lang == "" ? $("#chatboxContainer").attr("lang") : Lang,
                    chat: chat_selected,
                    status: chat_status
                },
                success: function(response) {
                    if ((response + "").length === 0) {
                        question_text = "هناك خطأ ما";
                        addQuestion();
                        cortona = [];
                        ajax();
                    } else if (response.meta.flag == "error") {
                        options = [];
                        addAnswer(response.meta.message, options);
                        cortona = [];
                        ajax();
                    } else if (response.meta.flag == "greating") {
                        options = [];
                        addAnswer(response.meta.message, options);
                        cortona = [];
                    } else {
                        if (response.meta.flag == "normal") {
                            // console.log(response.question[0].id)
                            question_id = response.question[0].id;
                            question_text = make_url_clicable(
                                response.question[0].text
                            );
                            options = [];
                            response.avilable_options.forEach(function(option) {
                                if (option.an_text != "") {
                                    options.push({
                                        content: make_url_clicable(option.an_text),
                                        image: false,
                                        clear:"",
                                        id:option.id,
                                        endpoint_message: option.endpoint_message
                                    });
                                }
                            });
                            addQuestion();
                        } else {
                            question_id = "268";
                            question_text = "هل تقصد احد هذه الأسئلة";
                            options = [];
                            in_array = [];
                            response.avilable_options.forEach(function(option) {
                                if (
                                    option.an_text != "" &&
                                    !in_array.includes(option.an_text)
                                ) {
                                    in_array.push(option.an_text);
                                    options.push({
                                        content: make_url_clicable(option.an_text),
                                        image: false,
                                        clear: "",
                                        id:option.id,
                                        endpoint_message: option.endpoint_message
                                    });
                                }
                            });
                            in_array = [];
                            addQuestion();
                        }
                    }
                }
            });
        }


        $.ajax({
            type: "get",
            url: "store_response",
            data: {
                id: QID,
                answertext: text,
                user_id: user_id,
                lang: Lang == "" ? $("#chatboxContainer").attr("lang") : Lang,
                chat: chat_selected,
                status: chat_status
            },
            success: function(response) {}
        });
    }

    //End Chat bot

    function endChat() {
        if ($("#chatboxContainer").attr("lang") == "ar") {
            ending = " الرجاء تقييم الخدمة";
            rateing = "تقييم";
        } else {
            ending = "Please rate the service";
            rateing = "Rate";
        }
        var finsh =
            `<div class="rating-container">
    <div id ="ending" class="chatbox__text">` +
            ending +
            `</div>
  <div class="feedback">
    <div class="rating">
      <input type="radio" name="rating" value="1" id="rating-5" class="rate">
      <label for="rating-5"></label>
      <input type="radio" name="rating" value="2" id="rating-4" class="rate">
      <label for="rating-4"></label>
      <input type="radio" name="rating" value="3" id="rating-3" class="rate">
      <label for="rating-3"></label>
      <input type="radio" name="rating" value="4" id="rating-2" class="rate">
      <label for="rating-2"></label>
      <input type="radio" name="rating" value="5" id="rating-1" class="rate">
      <label for="rating-1"></label>
    </div>
    <button class="rate_it" id="rateit" style="background:#f79621;color : #fff" >` +
            rateing +
            `</button>
    </div>`;
        $("#chatboxDropdown").removeClass("dropdown--toggle");
        setTimeout(function() {
            addAnswer(finsh, []);
        }, 200);
    }

    $("#endChat").on("click", function() {
        endChat();
    });

    // Change Language Function
    function changeLang() {
        if ($("#chatboxContainer").attr("lang") == "ar") {
            $(".chatbox__text").css("text-align", "right");
            end = "Please rate the service";
            rate = "Rate";
        } else {
            end = "الرجاء تقييم الخدمة";
            rate = "تقييم";
            $(".chatbox__text").css("text-align", "left");
            // document.getElementById("ending").innerHTML = end;
            // document.getElementById("rateit").innerHTML = rate;
            if(chat_selected =="37"){
                document.getElementById("started_text").innerHTML = "Start Now";
            }
        }
        // Check About The Current Language
        if ($("#chatboxContainer").attr("lang") === "en") {
            if (chat_selected =="37"){
                document.getElementById("started_text").innerHTML = "ابدأ الأن";
            }
            $("#chatboxContainer").attr("lang", "ar");
            $("head").append(
                '<link rel="stylesheet" href="' +
                    url_assets +
                    '/css/chatbot_rtl.css">'
            );
            $("#chatboxDropdown").toggleClass("dropdown--toggle");
        } else {
            if(chat_selected =="37"){
                document.getElementById("started_text").innerHTML = "Start Here";
            }
            $("#chatboxContainer").attr("lang", "en");
            $('link[href^="' + url_assets + '/css/chatbot_rtl"]').remove();
            $("#chatboxDropdown").toggleClass("dropdown--toggle");
        }

        var dataLanguage = "";
        $("[data-lang]").each(function() {
            dataLanguage = $(this).text();
            $(this).text($(this).attr("data-lang"));
            $(this).attr("data-lang", dataLanguage);
        });

        var dataPlaceholder = "";
        $("[data-placeholder]").each(function() {
            dataPlaceholder = $(this).attr("placeholder");
            $(this).attr("placeholder", $(this).attr("data-placeholder"));
            $(this).attr("data-placeholder", dataPlaceholder);
        });
    }

    // Handle Change Language
    $("#changeLanguage").on("click", function() {
        $("#chatboxContainer").removeClass("chatbox__open");
        // Loading Content Slide Down
        loadingContent();

        setTimeout(function() {
            // Fire Change Language Function
            changeLang();
        }, 200);
    });

    // Open Chatbox Container ===========
    var first_click = 0;
    $("#chatboxOpenBtn").on("click", function() {
        $("#chatboxContainer").addClass("chatbox__open");
        if (first_click == 0) {
            first_click = 1;
            if (user_id == "4") {
                cortona = [];
                select_lang();
            } else {
                cortona = [];
                ajax();
            }
        }

        // Loading Content Slide Up
        loadingContent();
    });

    // Close Chatbox Container ===========
    $("#closeChatboxContainer").on("click", function() {
        $("#chatboxContainer").removeClass("chatbox__open");
        // Loading Content Slide Down
        loadingContent();
    });

    // Toggle Chatbox Dropdown Menu ================
    $("#chatboxDropdownToggle").on("click", function() {
        $("#chatboxDropdown").toggleClass("dropdown--toggle");
    });

    // Define Elements ===============
    var messageContainer = $("#chatboxMessages"); // Messeging Container

    var textInput = $("#msgFromUser"); // Textarea Input Typing

    // Clear Chat ==================================
    var defaultChat = "";
    $("#clearChat").on("click", function() {
        otherlang = "";
        messageContainer.html(defaultChat);
        $("#chatboxDropdown").removeClass("dropdown--toggle");
        if (user_id == "4") {
            cortona = [];
            select_lang();
        } else {
            cortona = [];
            ajax();
        }
    });
    $(".clear").on("click", function() {
        messageContainer.html(defaultChat);
        $("#chatboxDropdown").removeClass("dropdown--toggle");
        if (user_id == "4") {
            cortona = [];
            select_lang();
        } else {
            cortona = [];
            ajax();
        }
    });

    // Open Report Image ===========================
    $("#reportChat").on("click", function() {
        $("#reportContainer").addClass("open-report");
        $("#chatboxDropdown").removeClass("dropdown--toggle");
        $("#reportContainer")
            .parent(".popup-container")
            .addClass("show");
    });

    // Handle Report Submit==============================
    $("#submitReportChat").on("submit", function(e) {
        e.preventDefault();
        var reporstMsg = $("#reportMessage")
            .val()
            .trim();
        var reportType = $("input[name=reportType]:checked").val();
        $('.submit-report-btn').attr("disabled", true);
        // Check Values
        if (reporstMsg && reportType) {
            // Handle Values Goes Here
            $.ajax({
                type: "get",
                url: "report",
                data: {
                    id: question_id,
                    user_id: user_id,
                    chat_id: chat_selected,
                    chat_message: reporstMsg,
                    chat_type: reportType
                },
                success: function(response) {
                    $("#reportStatus").html(
                        '<span class="text-white bg-success p-2">Your report has been sent.</span>'
                    );
                    $('.submit-report-btn').attr("disabled", false);
                }
            });

            setTimeout(function() {
                $("#reportStatus").html("");
            }, 200);
        } else {
            // If Empty Inputs Will Throw an Error
            $("#reportStatus").html(
                '<span class="text-white bg-danger p-2">Something went wrong!</span>'
            );

            setTimeout(function() {
                $("#reportStatus").html("");
            }, 1000);
        }
    });

    // Close Report Container
    $("#cancelReport").on("click", function() {
        $("#reportContainer").removeClass("open-report");
        $("#reportContainer")
            .parent(".popup-container")
            .removeClass("show");
    });

    // Handle Rgister Form Function ======================
    function registerUser(reply) {
        var today = new Date();
        var date =
            today.getFullYear() +
            "-" +
            (today.getMonth() + 1) +
            "-" +
            today.getDate();
        var time =
            today.getHours() +
            ":" +
            today.getMinutes() +
            ":" +
            today.getSeconds();

        var message =
            '<div class="chatbox__message wrap chatbox__message--appending chatbox__message--user">' +
            '<div class="chatbox__user"><span class="chatbox__datetime">' +
            time +
            "</span>" +
            '</div><div class="chatbox__text">' +
            make_url_clicable(reply) +
            '</div></div><div class="clear-fix"></div>';

        messageContainer.append(message);

        scrollToBottom();

        removeTags();

        $(this)
            .siblings(".chatbox__options--btn")
            .fadeOut();
        // $(this).fadeOut();

        setTimeout(function() {
            $(".chatbox__message").removeClass("chatbox__message--appending");
            document.getElementById("msgSentAudio").play();
        }, 400);

        setTimeout(function() {
            $("#registerContainer").addClass("open-register");
            $("#registerContainer")
                .parent(".popup-container")
                .addClass("show");
        }, 200);
    }

    // Handle Rgister Form Function
    $(document).on("click", ".register__option", function() {
        registerUser(
            $(this)
                .find(".btn-text")
                .text()
        );
    });

    // Close Register Form Container
    $("#cancelRegister").on("click", function() {
        $("#registerContainer").removeClass("open-register");
        $("#registerContainer")
            .parent(".popup-container")
            .removeClass("show");
    });

    // Loading The Content View
    function loadingContent() {
        setTimeout(function() {
            $("#chatboxLoading").slideToggle();
        }, 500);
    }

    // Scroll to The Bottom Function
    var boxHeight = 400;

    function scrollToBottom() {
        boxHeight += messageContainer.height() * 2;

        $(".chatbot-scroll, .simplebar-content-wrapper").animate(
            {
                scrollTop: boxHeight
            },
            200
        );
    }

    // Loading Message Function
    function typingMessage() {
        $(".chatbox__typing").css("display", "inline-block");
        setTimeout(function() {
            $(".chatbox__typing").remove();
            $(".typing-target").removeClass("typing-target");
            scrollToBottom();
            document.getElementById("msgAnswerAudio").play();
        }, 200);
    }

    // Handle Reload Button================
    $(document).on("click", "#reloadChat", function() {
        $("#chatboxDropdown").removeClass("dropdown--toggle");
        cortona = [];
        ajax();
    });

    /*
    Notes To Use Options Buttons:
    0- If You Don't Need to Insert Any Options, Just Return Options Array as an Empty Value
    1- Every Option Button has an Object of Content && Image Keys
    2- To None Image Preview, Shoud Make the Value as False
    3- To Insert Image, Shoud Make the value of the Image Name and Its Format
      and Contain the image in The right Path (current path is assets/images)
    */

    // Add Answer Function ======================
    function addAnswer(answerText, options) {
        var optionsButtons = "";
        // Looping Through Options Object
        options.forEach(function(option) {
            if (!option.image) {
                currentImg = "";
            } else {
                currentImg =
                    '<img src="' +
                    url_assets +
                    "/assets/images/" +
                    option.image +
                    '" width="30" alt="image"></img>';
            }

            optionsButtons +=
                '<button class="btn mx-1 chatbox__options--btn ' +
                option.clear +
                '" id="'+option.id+'" rel="' +
                option.endpoint_message +
                '"><span class="btn-text">' +
                capitalizeFirstLetter(option.content) +
                "</span>" +
                currentImg +
                "</button>";
        });

        // Define Answer
        var today = new Date();
        var date =
            today.getFullYear() +
            "-" +
            (today.getMonth() + 1) +
            "-" +
            today.getDate();
        var time =
            today.getHours() +
            ":" +
            today.getMinutes() +
            ":" +
            today.getSeconds();
        var img = "";
        if (user_id == "4") {
            img = url_dist + "/lo.png";
        } else {
            img = url_assets + "/assets/images/mujib_logo.svg";
        }

        var answerContent =
            '<div class="chatbox__message chatbox__message--appending1 chatbox__message--bot">' +
            '<div class="chatbox__user"><span class="chatbox__user--media"><img src="' +
            img +
            '" width="40" alt="Mujib"></span> ' +
            '<span class="chatbox__datetime typing-target">' +
            time +
            '</span><span class="chatbox__typing mx-2">' +
            ' <span></span> <span class="now2"></span> <span class="now3"></span> </span> </div>' +
            '<div class="chatbox__text typing-target">' +
            answerText +
            '</div><div class="chatbox__options typing-target">' +
            optionsButtons +
            '</div></div><div class="clear-fix"></div>';

        // Append Into Messages Container
        messageContainer.append(answerContent);

        setTimeout(function() {
            $(".chatbox__message").removeClass("chatbox__message--appending1");
            typingMessage();
        }, 1500);
    }

    $(document).on("click", ".rate_it", function() {
        setTimeout(function() {
            $(this)
                .closest(".chatbox__message")
                .remove();
            $(".rate_it").attr("disabled", true);
            $(':input[id="endChat"]').prop("disabled", true);
            if ($("#chatboxContainer").attr("lang") == "ar") {
                ending = "شكرا لتقييم الخدمة";
            } else {
                ending = "Thank you for rating the service";
            }
            document.getElementById("ending").innerHTML = ending;
            $(".rating").remove();
            $(".feedback").remove();
        }, 1000);
    });
    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }
    // Handle Click Options Buttons
    function coronaFun(corona) {
        var answer = "";
        if (chat_selected == "37") {
            if (corona.length > 7) {
                if (
                    corona[5] == "Yes" ||
                    corona[5] == "نعم" ||
                    corona[6] == "Yes" ||
                    corona[6] == "نعم"
                ) {
                    if ($("#chatboxContainer").attr("lang") == "ar") {
                        opt = [
                            {
                                content: "القائمة الرئيسية",
                                image: false,
                                clear: "clear",
                                endpoint_message: ""
                            }
                        ];
                        answer =
                            "لنطمئن على سلامتك، تفضل بزيارة قسم الطوارئ لإجراء اختبار فيروس كورونا.";
                    } else {
                        opt = [
                            {
                                content: "Back to home",
                                image: false,
                                clear: "clear",
                                endpoint_message: ""
                            }
                        ];
                        answer =
                            "To ensure your safety, please visit the Emergency Department to do the Coronavirus test";
                    }
                    addAnswer(answer, opt);
                } else if (
                    corona[0] == "Yes" ||
                    corona[0] == "نعم" ||
                    corona[1] == "Yes" ||
                    corona[1] == "نعم" ||
                    corona[2] == "Yes" ||
                    corona[2] == "نعم" ||
                    corona[3] == "Yes" ||
                    corona[3] == "نعم" ||
                    corona[4] == "Yes" ||
                    corona[4] == "نعم" ||
                    corona[7] == "Yes" ||
                    corona[7] == "نعم"
                ) {
                    if ($("#chatboxContainer").attr("lang") == "ar") {
                        opt = [
                            {
                                content: "القائمة الرئيسية",
                                image: false,
                                clear: "clear",
                                endpoint_message: ""
                            },
                            {
                                content: "التدابير الوقائية من فيروس كورونا",
                                image: false,
                                clear: "clear",
                                endpoint_message: ""
                            }
                        ];
                        answer =
                            "ننصحك باتباع التدابير الوقائية من فايروس كورونا وعزل نفسك تمامًا في المنزل لمدة 14 يومًا وعدم الخروج منه إلا للضرورة القصوى ومراقبة صحتك. فإذا ارتفعت درجة الحرارة أو زاد السعال أو ظهرت أعراض جديدة كضيق التنفس عندها يجب مراجعة قسم الطوارئ ،،";
                    } else {
                        opt = [
                            {
                                content: "Back to home",
                                image: false,
                                clear: "clear",
                                endpoint_message: ""
                            },
                            {
                                content: "Precaution of Coronavirus",
                                image: false,
                                clear: "clear",
                                endpoint_message: ""
                            }
                        ];
                        answer =
                            "We advise you to follow the 'Precaution of Coronavirus', stay home, and isolate yourself for at least 14 days. In case your fever became higher, or your cough got worst, or you started feeling shortness of breathing, please go to the Emergency Department";
                    }
                    addAnswer(answer, opt);
                } else {
                    if ($("#chatboxContainer").attr("lang") == "ar") {
                        opt = [
                            {
                                content: "القائمة الرئيسية",
                                image: false,
                                clear: "clear",
                                endpoint_message: ""
                            },
                            {
                                content: "التدابير الوقائية من فيروس كورونا",
                                image: false,
                                clear: "clear",
                                endpoint_message: ""
                            }
                        ];
                        answer =
                            "تطمن، لا يوجد لديك أي من أعراض كورونا، لكن لسلامتك ننصحك تلزم بيتك و تتبع التدابير الوقائيه من فايروس كورونا";
                    } else {
                        opt = [
                            {
                                content: "Back to home",
                                image: false,
                                clear: "clear",
                                endpoint_message: ""
                            },
                            {
                                content: "Precaution of Coronavirus",
                                image: false,
                                clear: "clear",
                                endpoint_message: ""
                            }
                        ];
                        answer =
                            "You don’t have any of the Coronavirus symptoms. You don’t have to worry, but we advise you to please stay home and follow the Precaution of Coronavirus";
                    }
                    addAnswer(answer, opt);
                }
            }
        } else {
            if (corona.length > 8) {
                if (corona[8] == "Yes" || corona[8] == "نعم") {
                    if (
                        corona[0] == "Yes" ||
                        corona[0] == "نعم" ||
                        corona[1] == "Yes" ||
                        corona[1] == "نعم" ||
                        corona[2] == "Yes" ||
                        corona[2] == "نعم" ||
                        corona[3] == "Yes" ||
                        corona[3] == "نعم" ||
                        corona[5] == "Yes" ||
                        corona[5] == "نعم" ||
                        corona[4] == "Yes" ||
                        corona[4] == "نعم"
                    ) {
                        answer =
                            "\n" +
                            "من فضلك تواصل في الحال مع الطبيب فأنت بحاجه لفحوصات إضافيه \n" +
                            "توصي منظمة الصحة العالمية بالحجر الصحي لمدة 14 يوم إذا كنت قد جالست أحد المرضي الذين تأكد لديهم عدوي كورونا ";
                        addAnswer(answer, []);
                    } else {
                        answer =
                            "لابد من مراجعة الطبيب قد تحتاج لحجر صحي لانك كنت علي اتصال بأحد مرضي كورونا سواء ظهر عليه أعراض أم لا\n" +
                            "وتحتاج لعمل فحص ";
                        addAnswer(answer, []);
                    }
                } else if (corona[6] == "Yes" || corona[6] == "نعم") {
                    if (
                        corona[0] == "Yes" ||
                        corona[0] == "نعم" ||
                        corona[1] == "Yes" ||
                        corona[1] == "نعم" ||
                        corona[2] == "Yes" ||
                        corona[2] == "نعم" ||
                        corona[3] == "Yes" ||
                        corona[3] == "نعم" ||
                        corona[5] == "Yes" ||
                        corona[5] == "نعم" ||
                        corona[4] == "Yes" ||
                        corona[4] == "نعم"
                    ) {
                        answer =
                            "\n" +
                            "من فضلك تواصل في الحال مع الطبيب فأنت بحاجه لفحوصات إضافيه \n" +
                            "توصي منظمة الصحة العالمية بالحجر الصحي لمدة 14 يوم إذا كنت قد جالست أحد المرضي الذين تأكد لديهم عدوي كورونا ";
                        addAnswer(answer, []);
                    } else {
                        answer =
                            "لديك فقط ارتفاع في درجات الحراره ليس عليك القلق يمكنك مراجعت الطبيب للأطمئنان";
                        addAnswer(answer, []);
                    }
                } else if (
                    corona[9] == "Yes" ||
                    corona[9] == "نعم" ||
                    corona[10] == "Yes" ||
                    corona[10] == "نعم"
                ) {
                    if (
                        corona[3] == "Yes" ||
                        corona[3] == "نعم" ||
                        corona[4] == "Yes" ||
                        corona[4] == "نعم"
                    ) {
                        answer =
                            "لديك فقط ارتفاع في درجات الحراره ليس عليك القلق يمكنك مراجعت الطبيب للأطمئنان";
                        addAnswer(answer, []);
                    } else {
                        answer = "لا داعي للقل ليس لديك اعرض لهذا المرض";
                        addAnswer(answer, []);
                    }
                } else {
                    answer = "لا داعي للقل ليس لديك اعرض لهذا المرض";
                    addAnswer(answer, []);
                }
            }
        }
        $.ajax({
            type: "get",
            url: "store_response",
            data: {
                id: typeof QID !== "undefined" ? QID : "548",
                answertext: answer,
                user_id: user_id,
                lang: lang == "" ? $("#chatboxContainer").attr("lang") : lang,
                chat: chat_selected,
                status: chat_status
            },
            success: function(response) {}
        });
    }

    $(document).on("click", ".chatbox__options--btn", function() {
        var today = new Date();
        var date =
            today.getFullYear() +
            "-" +
            (today.getMonth() + 1) +
            "-" +
            today.getDate();
        var time =
            today.getHours() +
            ":" +
            today.getMinutes() +
            ":" +
            today.getSeconds();

        var message =
            '<div class="chatbox__message wrap chatbox__message--appending chatbox__message--user">' +
            '<div class="chatbox__user"><span class="chatbox__datetime">' +
            time +
            "</span>" +
            '</div><div class="chatbox__text">' +
            make_url_clicable(
                $(this)
                    .find(".btn-text")
                    .text()
            ) +
            '</div></div><div class="clear-fix"></div>';
        messageContainer.append(message);
        scrollToBottom();
        removeTags();
        var end = $(this).attr("rel");
        if (end != "" && end != "null") {
            if ($("#chatboxContainer").attr("lang") == "ar") {
                ending = " الرجاء تقييم الخدمة";
                rateing = "تقييم";
            } else {
                ending = "Please rate the service";
                rateing = "Rate";
            }
            var finsh =
                `<div class="rating-container">
                    <div id ="ending" class="chatbox__text">` +
                ending +
                `</div>
                    <div class="feedback">
                        <div class="rating">
                        <input type="radio" name="rating" value="1" id="rating-5" class="rate">
                        <label for="rating-5"></label>
                        <input type="radio" name="rating" value="2" id="rating-4" class="rate">
                        <label for="rating-4"></label>
                        <input type="radio" name="rating" value="3" id="rating-3" class="rate">
                        <label for="rating-3"></label>
                        <input type="radio" name="rating" value="4" id="rating-2" class="rate">
                        <label for="rating-2"></label>
                        <input type="radio" name="rating" value="5" id="rating-1" class="rate">
                        <label for="rating-1"></label>
                        </div>
                        <button class="rate_it" id="rateit" style="background:#f79621;color : #fff" >` +
                rateing +
                `</button>
                        </div>`;
            var text = $(this)
                .find(".btn-text")
                .text();
            if (
                (chat_selected == "38" || chat_selected == "37") &&
                (text == "Yes" || text == "No" || text == "نعم" || text == "لا")
            ) {
                cortona.push([
                    $(this)
                        .find(".btn-text")
                        .text()
                ]);
                console.log(cortona);
                coronaFun(cortona);
                setTimeout(function() {
                    addAnswer(finsh, []);
                }, 200);
            } else {
                addAnswer(end, []);
                setTimeout(function() {
                    addAnswer(finsh, []);
                }, 200);
            }
        } else if (
            $(this)
                .find(".btn-text")
                .text() == "Select Languages" ||
            $(this)
                .find(".btn-text")
                .text() == "اختر اللغة"
        ) {
            select_lang();
        } else if (
            $(this)
                .find(".btn-text")
                .text() == "English"
        ) {
            otherlang = "done";
            if ($("#chatboxContainer").attr("lang") == "ar") {
                $("#chatboxContainer").removeClass("chatbox__open");
                // Loading Content Slide Down

                setTimeout(function() {
                    // Fire Change Language Function
                    changeLang();
                }, 800);
                $("#chatboxDropdown").toggleClass("dropdown--toggle");
                $("#chatboxContainer").addClass("chatbox__open");
            }

            cortona = [];
            ajax("entry", "", "en");
        } else if (
            $(this)
                .find(".btn-text")
                .text() == "اللغة العربية"
        ) {
            otherlang = "done";
            if ($("#chatboxContainer").attr("lang") == "en") {
                $("#chatboxContainer").removeClass("chatbox__open");
                // Loading Content Slide Down

                setTimeout(function() {
                    // Fire Change Language Function
                    changeLang();
                }, 800);
                $("#chatboxDropdown").toggleClass("dropdown--toggle");
                $("#chatboxContainer").addClass("chatbox__open");
            }
            cortona = [];
            ajax("entry", "", "ar");
        } else if (
            $(this)
                .find(".btn-text")
                .text() == "Other languages" && chat_selected=="37"
        ) {
            otherlang = "done";
            if ($("#chatboxContainer").attr("lang") == "ar") {
                opt = [
                    {
                        content: "اختر اللغة",
                        image: false,
                        clear: "clear",
                        endpoint_message: ""
                    }
                ];
            } else {
                opt = [
                    {
                        content: "Select Languages",
                        image: false,
                        clear: "clear",
                        endpoint_message: ""
                    }
                ];
            }
            answer =`
            *‏[ˈʊrdu:]* الأردو ‏ </br>
\t\t\t\t‏<a href='https://www.moh.gov.sa/awarenessplateform/VariousTopics/Documents/PreventCOVID19-Urdu.pdf' target='_blank'>PreventCOVID19-Urdu</a>
\t\t\t\t</br> </br>
\t\t\t\t*‏[भारत गणराज्य]* ‏ هندي </br>
\t\t\t\t‏<a href='https://www.moh.gov.sa/awarenessplateform/VariousTopics/Documents/PreventCOVID19-Hindi.pdf' taregt='_blabk'>PreventCOVID19-Hindi</a>
\t\t\t\t</br> </br>
\t\t\t\t‏ *[ বাংলাদেশ ]* البنغالية </br>
\t\t\t\t<a href='https://www.moh.gov.sa/awarenessplateform/VariousTopics/Documents/PreventCOVID19-Beng.pdf' target='_blank'>‏PreventCOVID19-Beng</a>
\t\t\t\t</br> </br>
\t\t\t\t*[pɪlɪˈpinɐs]* الفلبينية  </br>
\t\t\t\t‏<a href='https://www.moh.gov.sa/awarenessplateform/VariousTopics/Documents/PreventCOVID19-Tag.pdf' target='_blank'>PreventCOVID19-Tag</a>
\t\t\t\t</br></br>
\t\t\t\t*[Türkiye]* التركية  </br>
\t\t\t\t‏<a href="`+url_assets+`/covid/torki.pdf" target='_blank'>PreventCOVID19-Türkiye</a>
\t\t\t\t</br></br>
\t\t\t\t*[ Indonesia]* الاندونيسية  </br>
\t\t\t\t‏<a href="`+url_assets+`/covid/andonisia.pdf" target='_blank'>PreventCOVID19-Indonesia</a>
\t\t\t\t</br></br>
\t\t\t\t*[ русский]* الروسية  </br>
\t\t\t\t‏<a href="https://www.moh.gov.sa/awarenessplateform/VariousTopics/Documents/PreventCOVID19-Rus.pdf" target='_blank'>PreventCOVID19-русский</a>
\t\t\t\t</br></br>
\t\t\t\t*[Português]* البرتغالية  </br>
\t\t\t\t‏<a href="https://www.moh.gov.sa/awarenessplateform/VariousTopics/Documents/PreventCOVID19-Port.pdf" target='_blank'>PreventCOVID19-Português</a>
\t\t\t\t</br></br>
\t\t\t\t*[ Le français]* الفرنسية  </br>
\t\t\t\t‏<a href="https://www.moh.gov.sa/awarenessplateform/VariousTopics/Documents/PreventCOVID19-Fre.pdf" target='_blank'>PreventCOVID19-français</a>
            `;
            addAnswer(answer, opt);
        } else {
            otherlang = "done";
            var text = $(this)
                .find(".btn-text")
                .text();
            if (
                (chat_selected == "37" || chat_selected == "38") &&
                (text == "Yes" || text == "No" || text == "نعم" || text == "لا")
            ) {
                cortona.push([
                    $(this)
                        .find(".btn-text")
                        .text()
                ]);
            }
            selected_answer(question_id,this.id);
        }

        // Hide Buttons When Choosing One
        $(this)
            .siblings(".chatbox__options--btn")
            .fadeOut();
        $(this).fadeOut();

        setTimeout(function() {
            $(".chatbox__message").removeClass("chatbox__message--appending");
            document.getElementById("msgSentAudio").play();
        }, 400);
    });

    // Add Question Function ====================
    function addQuestion() {
        // Call add Answer Function
        addAnswer(question_text, options);

        textInput.val("").blur();
    }

    // Fire the Function
    $("#submitReplyBtn").on("click", function() {
        var reply = textInput
            .val()
            .trim()
            .replace(/\n/g, "<br>");
        if (reply) {
            var today = new Date();
            var date =
                today.getFullYear() +
                "-" +
                (today.getMonth() + 1) +
                "-" +
                today.getDate();
            var time =
                today.getHours() +
                ":" +
                today.getMinutes() +
                ":" +
                today.getSeconds();

            var message =
                '<div class="chatbox__message wrap chatbox__message--appending chatbox__message--user">' +
                '<div class="chatbox__user"><span class="chatbox__datetime">' +
                time +
                "</span>" +
                '</div><div class="chatbox__text">' +
                make_url_clicable(reply) +
                '</div></div><div class="clear-fix"></div>';
            messageContainer.append(message);
            scrollToBottom();
            removeTags();
            if (otherlang == "" && chat_selected =="37") {
                if ($("#chatboxContainer").attr("lang") == "ar") {
                    opt = [
                        {
                            content: "القائمة الرئيسية",
                            image: false,
                            clear: "clear",
                            endpoint_message: ""
                        }
                    ];
                } else {
                    opt = [
                        {
                            content: "Back to home",
                            image: false,
                            clear: "clear",
                            endpoint_message: ""
                        }
                    ];
                }
                otherlang = "done";
                answer =
                    "*‏[ˈʊrdu:]* الأردو ‏ </br> ‏<a href='https://www.moh.gov.sa/awarenessplateform/VariousTopics/Documents/PreventCOVID19-Urdu.pdf' target='_blank'>PreventCOVID19-Urdu</a> </br> </br> *‏[भारत गणराज्य]* ‏ هندي </br> ‏<a href='https://www.moh.gov.sa/awarenessplateform/VariousTopics/Documents/PreventCOVID19-Hindi.pdf' taregt='_blabk'>PreventCOVID19-Hindi</a> </br> </br> ‏ *[ বাংলাদেশ ]* البنغالية </br> <a href='‏https://www.moh.gov.sa/awarenessplateform/VariousTopics/Documents/PreventCOVID19-Beng.pdf' target='_blank'>‏PreventCOVID19-Beng</a></br> </br> *[pɪlɪˈpinɐs]* الفلبينية  </br> ‏<a href='https://www.moh.gov.sa/awarenessplateform/VariousTopics/Documents/PreventCOVID19-Tag.pdf' target='_blank'>PreventCOVID19-Tag</a>";

                addAnswer(answer, opt);
            } else {
                ajax(question_id, reply);
            }

            textInput.val("");

            setTimeout(function() {
                $(".chatbox__message").removeClass(
                    "chatbox__message--appending"
                );
                document.getElementById("msgSentAudio").play();
            }, 400);

            removeTags();
        }
    });

    // Handle Matched Tags When Typing==================================

    /* Just Pass all The Tags That You Want to Display into The TAGS Array */

    var tags = [];

    var outPut = $(".chatbot__output");
    var len = 1;

    textInput.on("keyup", function(e) {
        var search = textInput.val().toLowerCase();
        var matched = "";

        len = search.length;

        outPut.html("");
        // Check if the letters Intered Are More Than 2 Letters
        if (search.length > 2) {
            tags.forEach(function(tag) {
                matched = tag.slice(0, len);
                var checkMatch = matched.includes(search);
                // Check if The Input is Empty
                if (search.length === 0) {
                    checkMatch = false;
                }
                // Print Tags if True
                if (checkMatch) {
                    document.querySelector(".chatbot__output").innerHTML +=
                        '<span class="chatbox-tag">' + tag + "</span>";
                }
            });
        }
        // When Delete Letters Handle
        if (e.keyCode === 8 || e.keyCode === 46) {
            if (len === 0) {
                len = 1;
                outPut.html("");
            }
        }
    });

    // Handle Tags
    $(document).on("click", ".chatbox-tag", function() {
        var today = new Date();
        var date =
            today.getFullYear() +
            "-" +
            (today.getMonth() + 1) +
            "-" +
            today.getDate();
        var time =
            today.getHours() +
            ":" +
            today.getMinutes() +
            ":" +
            today.getSeconds();

        var message =
            '<div class="chatbox__message wrap chatbox__message--appending chatbox__message--user">' +
            '<div class="chatbox__user"><span class="chatbox__datetime">' +
            time +
            "</span>" +
            '</div><div class="chatbox__text">' +
            $(this).text() +
            '</div></div><div class="clear-fix"></div>';
        messageContainer.append(message);
        scrollToBottom();
        removeTags();
        ajax(question_id, $(this).text());
        setTimeout(function() {
            $(".chatbox__message").removeClass("chatbox__message--appending");
            document.getElementById("msgSentAudio").play();
        }, 400);

        removeTags();

        textInput.val("").blur();
    });

    // Remove Tags Function
    function removeTags() {
        $(".chatbot__output .chatbox-tag").remove();
    }

    // Toggle Between Enter Key as a New line And as a Submit Button =============
    var newLine = false;
    var reply = "";

    textInput.on("keydown", function(event) {
        reply = textInput
            .val()
            .trim()
            .replace(/\n/g, "<br>");

        if (event.which === 13 && !newLine) {
            event.preventDefault();

            if (reply) {
                //chck
                var today = new Date();
                var date =
                    today.getFullYear() +
                    "-" +
                    (today.getMonth() + 1) +
                    "-" +
                    today.getDate();
                var time =
                    today.getHours() +
                    ":" +
                    today.getMinutes() +
                    ":" +
                    today.getSeconds();

                var message =
                    '<div class="chatbox__message wrap chatbox__message--appending chatbox__message--user">' +
                    '<div class="chatbox__user"><span class="chatbox__datetime">' +
                    time +
                    "</span>" +
                    '</div><div class="chatbox__text">' +
                    make_url_clicable(reply) +
                    '</div></div><div class="clear-fix"></div>';
                messageContainer.append(message);
                scrollToBottom();
                removeTags();
                if (otherlang == "" && chat_selected =="37") {
                    if ($("#chatboxContainer").attr("lang") == "ar") {
                        opt = [
                            {
                                content: "اختر اللغة",
                                image: false,
                                clear: "clear",
                                endpoint_message: ""
                            }
                        ];
                    } else {
                        opt = [
                            {
                                content: "Select Languages",
                                image: false,
                                clear: "clear",
                                endpoint_message: ""
                            }
                        ];
                    }
                    otherlang = "done";
                    answer =`
            *‏[ˈʊrdu:]* الأردو ‏ </br>
\t\t\t\t‏<a href='https://www.moh.gov.sa/awarenessplateform/VariousTopics/Documents/PreventCOVID19-Urdu.pdf' target='_blank'>PreventCOVID19-Urdu</a>
\t\t\t\t</br> </br>
\t\t\t\t*‏[भारत गणराज्य]* ‏ هندي </br>
\t\t\t\t‏<a href='https://www.moh.gov.sa/awarenessplateform/VariousTopics/Documents/PreventCOVID19-Hindi.pdf' taregt='_blabk'>PreventCOVID19-Hindi</a>
\t\t\t\t</br> </br>
\t\t\t\t‏ *[ বাংলাদেশ ]* البنغالية </br>
\t\t\t\t<a href='https://www.moh.gov.sa/awarenessplateform/VariousTopics/Documents/PreventCOVID19-Beng.pdf' target='_blank'>‏PreventCOVID19-Beng</a>
\t\t\t\t</br> </br>
\t\t\t\t*[pɪlɪˈpinɐs]* الفلبينية  </br>
\t\t\t\t‏<a href='https://www.moh.gov.sa/awarenessplateform/VariousTopics/Documents/PreventCOVID19-Tag.pdf' target='_blank'>PreventCOVID19-Tag</a>
\t\t\t\t</br></br>
\t\t\t\t*[Türkiye]* التركية  </br>
\t\t\t\t‏<a href="`+url_assets+`/covid/torki.pdf" target='_blank'>PreventCOVID19-Türkiye</a>
                    \t\t\t\t</br></br>
                    \t\t\t\t*[ Indonesia]* الاندونيسية  </br>
                    \t\t\t\t‏<a href="`+url_assets+`/covid/andonisia.pdf" target='_blank'>PreventCOVID19-Indonesia</a>
                    \t\t\t\t</br></br>
                    \t\t\t\t*[ русский]* الروسية  </br>
                    \t\t\t\t‏<a href="https://www.moh.gov.sa/awarenessplateform/VariousTopics/Documents/PreventCOVID19-Rus.pdf" target='_blank'>PreventCOVID19-русский</a>
                    \t\t\t\t</br></br>
                    \t\t\t\t*[Português]* البرتغالية  </br>
                    \t\t\t\t‏<a href="https://www.moh.gov.sa/awarenessplateform/VariousTopics/Documents/PreventCOVID19-Port.pdf" target='_blank'>PreventCOVID19-Português</a>
                    \t\t\t\t</br></br>
                    \t\t\t\t*[ Le français]* الفرنسية  </br>
                    \t\t\t\t‏<a href="https://www.moh.gov.sa/awarenessplateform/VariousTopics/Documents/PreventCOVID19-Fre.pdf" target='_blank'>PreventCOVID19-français</a>
                                `;
                    addAnswer(answer, opt);
                } else {
                    ajax(question_id, reply);
                }

                textInput.val("").blur();

                setTimeout(function() {
                    $(".chatbox__message").removeClass(
                        "chatbox__message--appending"
                    );
                    document.getElementById("msgSentAudio").play();
                }, 400);
                // Reset
                reply = "";
            }
        }
    });

    // Show Emojis ==============================
    $("#emojiBtn").on("click", function() {
        $("#emojiContainer").addClass("show-emoji");
    });

    // Hide Emojis
    $("#cancelEmoji").on("click", function() {
        $("#emojiContainer").removeClass("show-emoji");
    });

    // Add the Selected Emoji to Input Value
    var msgValue = "";
    $("#emojisContent span").on("click", function() {
        // Save the Current Value of the input
        msgValue = textInput.val();
        // Add the New Value to The input
        textInput.val(msgValue + " " + $(this).attr("data-emoji") + " ");
        // Hide Emojis Container
        $("#emojiContainer").removeClass("show-emoji");
    });

    // Open Upload Image ===================================
    $("#uploadImgBtn").on("click", function() {
        $("#uploadImgContainer").addClass("open-upload");
        $("#uploadImgContainer")
            .parent(".popup-container")
            .addClass("show");
    });

    // Fire Preview Image Function
    $("#chatUploadInput").on("change", function(e) {
        readImages(e.target);
    });

    // Preview Image to Upload Function=====================
    var uploadedImage = "";
    var fileUploadingType = "";

    function readImages(input) {
        // File Type
        var filesType = [
            "image/png",
            "image/jpg",
            "image/svg",
            "image/svg+xml",
            "image/gif",
            "image/jpeg"
        ];

        if (!filesType.includes(input.files[0].type)) {
            fileUploadingType = "";
            $(".chatbox__uploading-error").html(
                '<span class="d-inline-block text-danger mt-5">Not Supported File Type!</span>'
            );
        } else {
            fileUploadingType = input.files[0].type;
            $(".chatbox__uploading-error").html("");
        }

        if (input.files && input.files[0] && fileUploadingType) {
            var reader = new FileReader();

            // On File Load
            reader.onload = function(e) {
                $("#uploadingPreview").attr("src", e.target.result);

                // Assign the Current Uploaded Image
                uploadedImage = e.target.result;

                // Change Uploading Image Name
                $("#imagUploadingTitle").html(input.files[0].name);
            };

            // Read The File
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Reply by Image Uploaded Function
    function replyByImage(image) {
        // Check for the Uploaded Image
        if (image && fileUploadingType) {
            var reply = `<div class="text-center">
                    <img src="${image}" class="img-fluid chatbox__image--uploaded" alt="image">
                  </div>`;
            var today = new Date();
            var date =
                today.getFullYear() +
                "-" +
                (today.getMonth() + 1) +
                "-" +
                today.getDate();
            var time =
                today.getHours() +
                ":" +
                today.getMinutes() +
                ":" +
                today.getSeconds();

            var message =
                '<div class="chatbox__message wrap chatbox__message--appending chatbox__message--user">' +
                '<div class="chatbox__user"><span class="chatbox__datetime">' +
                time +
                "</span>" +
                '</div><div class="chatbox__text">' +
                reply +
                '</div></div><div class="clear-fix"></div>';
            messageContainer.append(message);
            scrollToBottom();
            removeTags();
            // Call addQuestion Function to Append the Uploaded Image
            ajax(question_id, reply);

            // Scroll to the Last Message
            scrollToBottom();

            // Animate the Message
            setTimeout(function() {
                $(".chatbox__message").removeClass(
                    "chatbox__message--appending"
                );

                document.getElementById("msgSentAudio").play();

                // Rest Upload Image
                cancelUploadedImg();
            }, 500);
        }
    }

    // Cancel Upload Image Function
    function cancelUploadedImg() {
        // Close Upload Box
        $("#uploadImgContainer").removeClass("open-upload");

        $("#uploadImgContainer")
            .parent(".popup-container")
            .removeClass("show");

        // Reset the Default Preview Image
        $("#uploadingPreview").attr(
            "src",
            $("#uploadingPreview").attr("data-default")
        );

        // Reset Image Title
        $("#imagUploadingTitle").html(
            $("#imagUploadingTitle").attr("data-text")
        );

        // Reset Uploaded Image
        $("#chatUploadInput").val("");
    }

    // Fire Replay By Image Function
    $("#replyByImgBtn").on("click", function() {
        replyByImage(uploadedImage);
    });

    // Cancel Upload Image
    $("#cancelUploadImg").on("click", function() {
        cancelUploadedImg();
    });

    // Uploaded Image Show Full screen in Chatbox====================
    $(document).on("click", ".chatbox__image--uploaded", function() {
        $("#uploadImgShow").addClass("show-uploaded-img");
        $("#uploadImgShow")
            .parent(".popup-container")
            .addClass("show");
        $("#previewImage").attr("src", $(this).attr("src"));
    });

    // Close Show Image Container
    $("#cancelImgShow").on("click", function() {
        $("#uploadImgShow").removeClass("show-uploaded-img");
        $("#uploadImgShow")
            .parent(".popup-container")
            .removeClass("show");
    });

    // Handle New Line====================================
    $(".add-new-line").on("click", function() {
        $(this).toggleClass("new-line-available");

        textInput.focus();

        if ($(this).hasClass("new-line-available")) {
            newLine = true;
        } else {
            newLine = false;
        }
    });

    // Load Default Chat After Append the First Message================
    defaultChat = messageContainer.html();
});
