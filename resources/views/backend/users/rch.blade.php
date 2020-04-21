<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>RCH</title>
  <link rel="icon"
    href='https://www.rcjy.gov.sa/en-US/Jubail/MediaCenter/News/PublishingImages/%D8%A7%D9%84%D9%87%D9%8A%D8%A6%D8%A9%D8%A7%D9%84%D9%85%D9%84%D9%83%D9%8A%D8%A9.jpg'
    type='image/x-icon' />
  <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  {{--
  <link rel="stylesheet" href="{{url('new_box')}}/css/bootstrap.min.css"> --}}
  <link rel="stylesheet" href="https://unpkg.com/simplebar@latest/dist/simplebar.css" />
  <link rel="stylesheet" href="{{url('new_box')}}/css/chatbot.css">
  <link rel="stylesheet" type="text/css" href="{{url('new_box')}}/css/rate.css">
  <link rel="stylesheet" href="{{url('new_box')}}/css/chatbot_rtl.css">
  <link rel="stylesheet" href="{{url('new_box')}}/css/themes/theme.default.css">
  @if(Session::get('locale') == 'en')
  <link rel="stylesheet" type="text/css" href="{{url('/front/themes/munawla/')}}/css/rch.css">
  @else
  <link rel="stylesheet" type="text/css" href="{{url('/front/themes/munawla/')}}/css/rch.css">
  <link rel="stylesheet" type="text/css" href="{{url('/front/themes/alsaudia/')}}/css/style-rtl.css">
  @endif
</head>

<body>
  @include('backend.chats.box')
  <nav class="navbar py-4">
    <div class="container">
      <div class="brand-name">
        <a href="#"><img src="{{url('dist')}}/img2.png" width="344" alt="saudia"></a>

        <h5 style="text-align: center; color:#711620">
          برنامج الخدمات الصحية
        </h5>
        <br>
      </div>
      <div class="languages">
        <a href="{{ route('lang',Session::get('locale') == 'en' ? 'ar' : 'en') }}"
          class="d-inline-block text-decoration-none mx-2">
          {{ Session::get('locale') == 'en' ? 'عربي' : 'EN' }} <i class="fas fa-globe fa-lg"></i>
        </a>
      </div>
    </div>
  </nav>
  <main class="main-header">
    <!-- <div class="main-overlay"></div> -->
    <div class="container">

      <ul class="social-media list-unstyled m-0 p-0 d-flex ">
        <li>


          <a href="https://twitter.com/RCJYYanbumc" style="height: auto; font-size:14px; margin-right:3px"
            class="social-icon d-inline-block shadow mx-3" target="_blank">
            ينبع<i class="fab fa-twitter fa-lg"></i>
          </a>
        </li>
        <li>

          <a href="https://mobile.twitter.com/pr_rchsp?lang=ar" style="height: auto; font-size:14px;padding-right:2px"
            class="social-icon d-inline-block shadow mx-3" target="_blank">
            الجبيل<i class="fab fa-twitter fa-lg"></i>
          </a>
        </li>

      </ul>
      <div class="header-content">
        <div class="row">
          <div class="robot-img col-md-4 offset-md-1 text-center d-inline-block d-md-none">
            <br>
            <br>
            <img src="{{url('/dist')}}/lo.png" class="robot-vector" alt="">

          </div>
          <div class="col-md-7">
            <div class="hero-text">
              @if($chat->id == "37")
              <h1>
                {{__('chats.rch')}}
                <br>
                <br>

              </h1>
              <h4 style="text-align: center; color:#f79621">{{ Session::get('locale') == 'en' ? '' : ' تطمن..' }}</h4>
              @else
              <h1>

                Royal Commission Hospital
              </h1>
              @endif
              <!-- <p class="lead mt-4"></p> -->

            </div>
          </div>
          <div class="robot-img col-md-4 offset-md-1 text-center d-none d-md-inline-block">
            <img src="{{url('/dist')}}/lo.png" class="robot-vector" alt="">
          </div>
        </div>
        <!-- Chatting Box -->
        <div class="robot-chatting-container shadow">
          <span class="exit-chatting-box" id="close-chatting">
            <i class="fas fa-times"></i>
          </span>
          <i class="fas fa-undo-alt exit-chatting-box" id="reset"></i>
          <i class="fas fa-exclamation exit-chatting-box" id="report-chat" style="margin-right: 55px"></i>
          <div class="chatting-header d-flex align-items-center justify-content-between px-2 py-1">
            <div>
              <img src="{{url('/front/themes/munawla/')}}/images/chatbot-svg.svg" class="robot-icon" width="40"
                height="50" alt="chatbot">
              <i class="fas fa-circle"></i> online
            </div>

          </div>
          <div class="chatting-content">
            <div class="identity py-2 text-center text-dark">Welcome to RCH</div>
            <div class="intro-img">
              <img
                src="https://www.rcjy.gov.sa/en-US/Jubail/MediaCenter/News/PublishingImages/%D8%A7%D9%84%D9%87%D9%8A%D8%A6%D8%A9%D8%A7%D9%84%D9%85%D9%84%D9%83%D9%8A%D8%A9.jpg"
                width="100%" height="100%" alt="intro-img">
            </div>
            <div class="inbox-chatting px-2 mt-4" id="chatBox">
              <div class="received-chat mt-2">
                <div class="robot-chat-img d-inline-block">

                </div>

              </div>
            </div>
            <div class="chatting-questions mb-2 mt-n3 text-center">
            </div>
          </div>
          <div class="typing-text py-2 px-3 shadow">
            <form action="#" id="sendMessage">
              <input type="text" class="form-control d-inline-block" id="messageInput">
              <button type="submit" class="send-message-button"><img
                  src="{{url('/front/themes/munawla/')}}/images/send.png" class="send-message mx-2 mb-1" width="35"
                  alt="send message"></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="{{url('/front/themes/munawla/')}}/js/jquery-3.4.1.min.js"></script>
  <script>
    var user_id = "{{$chat->user->id}}"
    var chat_selected = "{{ $chat->id }}";
    var lang = "{{ Session::get('locale')}}";
    var image = "/front/themes/munawla/images/chatbot-svg.svg"
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>
  <script src="{{url('/front/themes/alsaudia/')}}/js/main.js"></script>
  <script>
    var url_assets = "{{url('new_box')}}";
    var url_dist = "{{url('dist')}}";
    var user_id = "{{$chat->user_id}}"
    var chat_selected = "{{ $chat->id }}";
    var chat_status = "{{ $chat->status }}";
    var lang = "{{ Session::get('locale')}}";
    var rateing = "";
    var ending = "";
  </script>
  {{-- <script src="{{url('new_box')}}/js/jquery-3.4.1.min.js"></script>
  <script src="{{url('new_box')}}/js/bootstrap.min.js"></script> --}}
  <script src="https://unpkg.com/simplebar@latest/dist/simplebar.min.js"></script>
  <script src="{{url('new_box')}}/js/chatbot.js"></script>
</body>

</html>
