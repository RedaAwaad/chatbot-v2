$(document).ready(function () {
  //Change Language
  var lang = $("#lang").data('lang');
  $("#lang").on('click', function () {
    
    if(lang == 'en') {
      $('head').append('<link rel="stylesheet" type="text/css" href="css/style-rtl.css">');
      lang = 'ar';
    } else {
      $('link[href^="css/style-rtl"]').remove();
      lang = 'en';
    }
  });

  //Open Chatting Box
  $("#chatting-btn").on('click', function () {
    var screenWidth = $(window).width();
    if(screenWidth <= 600 ) {
      $(".robot-chatting-container").animate({width: '320px',height: '450px'});
    } else {
      $(".robot-chatting-container").animate({width: '380px',height: '480px'});
    }
  });

  //Close Chatting Box
  $("#close-chatting").on('click', function () {
    $(".robot-chatting-container").animate({width: '0',height: '0'});
  });
  //Reset The Chat Box
  $("#reset").on('click', function () {
    var resetValue = `<div class="received-chat mt-2 mb-1">
          <div class="robot-chat-img d-inline-block">
            <img src="images/chatbot-svg.svg" width="35" alt="robot chat">
          </div>
          <div class="received-msg d-inline-block p-2">
            <p class="m-0">Hi, I'm here to help you?</p>
          </div>
        </div>`;
    $("#chatBox").html(resetValue);
  });
  
  //Handle Chat box Typing For Demo
  function sendMessage (message) {
    if(message !== '') {
      var messageContainer = `<div class="sent-chat text-right mt-3 mb-1">
        <div class="sent-msg d-inline-block p-2">
          <p class="m-0">${message}</p>
        </div>
      </div>`;

      $("#chatBox").append(messageContainer);
      $("#messageInput").val('');
      $(".chatting-questions button").fadeOut(50);
      Typing();
      chatBoxScrollTop();
    }
  }
  //Append Message Typing to Chat box Before Chatbot Reply
  function Typing () {
    setTimeout(function () {
      var typingInterface = `<div class="received-chat my-2">
        <div class="robot-chat-img d-inline-block">
          <img src="images/chatbot-svg.svg" width="35" alt="robot chat">
        </div>
        <div class="received-msg d-inline-block p-2">
          <p class="bot-answer current-typing m-0">
          <i class="fas fa-circle typing-now now1"></i>
          <i class="fas fa-circle typing-now now2"></i>
          <i class="fas fa-circle typing-now now3"></i>
          </p>
        </div> </div>`;
      $("#chatBox").append(typingInterface);
      chatbotAnswer('This a demo answer!');
    }, 400);
  }

  //Answer Function
  function chatbotAnswer(answer) {
    setTimeout(function () {
      $(".bot-answer.current-typing").html(answer);
      $(".chatting-questions button").fadeIn(50);
      $(".bot-answer").removeClass('current-typing');
      chatBoxScrollTop();
    }, 700);
  }

  //Show The Last Chat Messages
  var chatBoxScroll = 400;
  function chatBoxScrollTop() {
    chatBoxScroll = $(".inbox-chatting").height() * 5;
    $(".chatting-content").animate({scrollTop: chatBoxScroll});
  }

  chatBoxScrollTop();

  //Hadle Send Message
  $("#sendMessage").on('submit', function (e) {
    e.preventDefault();
    sendMessage ($("#messageInput").val());
  });

  //Handle Chat Buttons
  $(".chatting-questions button").on('click', function () {
    var selectOption = $(this).data('select');
    sendMessage (selectOption);
  });

});