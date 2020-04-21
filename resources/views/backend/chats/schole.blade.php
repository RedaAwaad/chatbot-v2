<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>King Saud University</title>
    <link rel="icon" href='https://upload.wikimedia.org/wikipedia/commons/3/3e/KSU_Logo_COLORED_PNGP-24.png' type='image/x-icon' />
    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    @if(Session::get('locale') == 'en')
        <link rel="stylesheet" type="text/css" href="{{url('/front/themes/munawla/')}}/css/main.css">
    @else
        <link rel="stylesheet" type="text/css" href="{{url('/front/themes/munawla/')}}/css/main.css">
        <link rel="stylesheet" type="text/css" href="{{url('/front/themes/alsaudia/')}}/css/style-rtl.css">
    @endif
    <style>
        .main-header {
            position: relative;
            height: calc(100vh);
            background: url(https://upload.wikimedia.org/wikipedia/commons/0/0b/King_saud_university_entrance.jpg) no-repeat center;
            -webkit-background-size: cover;
            background-size: cover;
        }

    </style>
</head>
<body>
<nav class="navbar py-4">
    <div class="container">
        <div class="brand-name">
            <a href="#"><img src="https://fhras.net/wp-content/uploads/%D8%AC%D8%A7%D9%85%D8%B9%D8%A91.png" width="200" height="60" alt="saudia"></a>
        </div>
        <div class="languages">
            <a href="{{url('/front/themes/munawla/')}}/stat/stat2.html" class="d-block d-sm-inline-block mb-1 mb-sm-0 text-decoration-none mx-2">
                Statistics <i class="fas fa-chart-line fa-lg"></i>
            </a>
            <a href="{{ Session::get('locale') == 'en' ? '/public/chatbot/lang/ar' : '/public/chatbot/lang/en' }}" class="d-inline-block text-decoration-none mx-2">
                {{ Session::get('locale') == 'en' ? 'عربي' : 'EN' }} <i class="fas fa-globe fa-lg"></i>
            </a>
        </div>
    </div>
</nav>
<main class="main-header">
    <div class="main-overlay"></div>
    <div class="container">
        <ul class="social-media list-unstyled m-0 p-0 d-flex ">
            <li><a href="" class="social-icon d-inline-block shadow" target="_blank">
                    <i class="fab fa-facebook-square fa-lg"></i>
                </a>
            </li>
            <li>
                <a href="" class="social-icon d-inline-block shadow mx-3" target="_blank">
                    <i class="fab fa-twitter fa-lg"></i>
                </a>
            </li>
            <li>
                <a href="" class="social-icon d-inline-block shadow" target="_blank">
                    <i class="fab fa-instagram fa-lg"></i>
                </a>
            </li>
            <li >
                <a href="" class="social-icon d-inline-block shadow mx-3" target="_blank">
                    <!-- <i class="fab fa-linkedin-in fa-lg"></i> -->
                    <i class="fab fa-youtube fa-lg"></i>
                </a>
            </li>
        </ul>
        <div class="header-content">
            <div class="row">
                <div class="robot-img col-md-4 offset-md-1 text-center d-inline-block d-md-none">
                    <img src="{{url('/front/themes/munawla/')}}/images/chatbot-svg.svg" class="robot-vector" alt="SAUDIA, Book Flights, Hotels, Holidays Packages">
                </div>
                <div class="col-md-7">
                    <div class="hero-text">
                        <h1>KSU aims to disseminate and promote knowledge in Saudi Arabia, widening its base of scientific </h1>
                        <!-- <p class="lead mt-4"></p> -->
                        <div class="chat-box d-inline-block shadow">
                <span class="d-inline-block chat-btn" id="chatting-btn">
                  <img src="{{url('/front/themes/munawla/')}}/images/chat-icon.png" width="20" height="20" alt="SAUDIA, Book Flights, Hotels, Holidays Packages">
                </span>
                        </div>
                        <span class="h4 mx-3 chat-text d-inline-block">Get Started</span>
                    </div>
                </div>
                <div class="robot-img col-md-4 offset-md-1 text-center d-none d-md-inline-block">
                    <img src="{{url('/front/themes/munawla/')}}/images/chatbot-svg.svg" class="robot-vector" alt="SAUDIA, Book Flights, Hotels, Holidays Packages">
                </div>
            </div>
            <!-- Chatting Box -->
            <div class="robot-chatting-container shadow">
          <span class="exit-chatting-box" id="close-chatting">
            <i class="fas fa-times" ></i>
          </span>
                <i class="fas fa-undo-alt exit-chatting-box" id="reset"></i>
                <div class="chatting-header d-flex align-items-center justify-content-between px-2 py-1">
                    <div>
                        <img src="{{url('/front/themes/munawla/')}}/images/chatbot-svg.svg" class="robot-icon" width="40" height="50" alt="chatbot">
                        <i class="fas fa-circle"></i> online
                    </div>
                    <div class="h5 avail pt-3">Always available</div>

                </div>
                <div class="chatting-content">
                    <div class="identity py-2 text-center text-dark">Welcome to King Saud University</div>
                    <div class="intro-img">
                        <img src="https://yemeni-communities.com/wp-content/uploads/logo_9.png" width="100%" height="100%" alt="intro-img">
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
                        <button type="submit" class="send-message-button" ><img src="{{url('/front/themes/munawla/')}}/images/send.png" class="send-message mx-2 mb-1" width="35" alt="send message"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="{{url('/front/themes/munawla/')}}/js/jquery-3.4.1.min.js"></script>
<script>
    var user_id = "{{$user->id}}"
    var image = "/public/front/themes/munawla/images/chatbot-svg.svg"
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="{{url('/front/themes/alsaudia/')}}/js/main.js"></script>
</body>
</html>
