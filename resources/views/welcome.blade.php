<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mujib | Home Page</title>
    @notifyCss
    <link rel="icon" href='{{url('/mujib')}}/images/logo.png' type='image/x-icon' />
    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{url('mujib')}}/css/all.min.css">
    <link rel="stylesheet" href="{{url('mujib')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('mujib')}}/css/slick.css">
    <link rel="stylesheet" href="{{url('mujib')}}/css/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="{{url('mujib')}}/css/animate.css">
    <link rel="stylesheet" type="text/css" href="{{url('mujib')}}/css/main.style.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/style.rtl.css"> -->
    <!-- Start Chatbot -->
    <link rel="stylesheet" href="https://unpkg.com/simplebar@latest/dist/simplebar.css"/>
    <link rel="stylesheet" href="{{url('mujib')}}/css/chatbot.css">
    <link rel="stylesheet" href="{{url('mujib')}}/css/themes/theme.default.css">
    <!-- <link rel="stylesheet" href="css/chatbot_rtl.css"> -->
    <noscript>
        <style>
            /* ** Reinstate scrolling for non-JS clients*/
            .simplebar-content-wrapper {overflow: auto;}
        </style>
    </noscript>
    <!-- End Chatbot -->
</head>
<body>
<!-- Start Navbar -->
<nav class="navbar navbar-light">
    <!-- <div class="container"> -->
    <a class="navbar-brand" href="#home">
        <!-- Brand -->
        <img src="{{url('/mujib')}}/images/logo.png" width="40" height="50" alt="logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navweb" aria-controls="navweb" aria-expanded="false" aria-label="Toggle navigation">
        <small class="menu-title">Menu</small>
        <span class="bar d-block mb-1 mt-1"></span>
        <span class="bar d-block mb-1"></span>
        <span class="bar d-block mb-1"></span>
    </button>

    <div class="collapse navbar-collapse" id="navweb">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link text-uppercase menu-opend" href="#home">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-uppercase menu-opend" href="#features">Features</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-uppercase menu-opend" href="#integration">Integration</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-uppercase menu-opend" href="#businessCase">Business Case</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-uppercase menu-opend" href="#faq">FAQ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-uppercase menu-opend" href="#ourPartners">Our Partners</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-uppercase menu-opend" href="#ourClients">Our Clients</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-uppercase menu-opend" href="#demo">Request a Demo</a>
            </li>
                <li >
                    @if(Auth::guest())
                    <span class="changeLanguage">
                        <a href="{{route('login')}}">login</a>
                    </span>
                    @else
                    <span class="changeLanguage">
                        <a href="{{route('admin')}}">Home</a>
                    </span>
                    @endif
                </li>

        </ul>
    </div>
    <!-- </div> -->
</nav>
<!-- End Navbar -->

<!-- Start Header -->
<header class="header" id="particles-js">
    <div class="container" id="home">
        <div class="header-cover"></div>
        <div class="content">
            <h1 class="wow fadeInUp">Build your custom <br>Al Chatbot in minutes</h1>
            <p class="wow fadeInUp"> No technical skills needed.</p>
            @if(Auth::guest())
                <a href="{{route('login')}}" class="btn btn-try wow fadeInUp"><span class="try">Try Now</span></a>
            @else
                <a href="{{route('admin')}}" class="btn btn-try wow fadeInUp"><span class="try">Home</span></a>
            @endif

        </div>
    </div>
</header>
<!-- End Header -->

<!-- Start Features -->
<section class="features" id="features">
    <div class="container">
        <div class="text-center">
            <h3 class="section-title">
                Features
                <span class="line line1"></span><span class="line line2"></span>
                <span class="line line3"></span><span class="line line4"></span>
                <span class="line line5"></span><span class="line line6"></span>
                <span class="line line7"></span><span class="line line8"></span>
            </h3>
        </div>
        <div class="row text-center">
            <div class="col-sm-6 col-md-4">
                <div class="feat pt-5">
                    <div class="img mb-2">
                        <img src="{{url('/mujib')}}/images/feat/bot.svg" width="114" alt="feat">
                    </div>
                    <h4>Always Available</h4>
                    <p>The system works to respond immediately to customers, whether
                        by answering inquiries or booking 24 hours with the endless
                        number of conversations.</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="feat pt-5">
                    <div class="img mb-2">
                        <img src="{{url('/mujib')}}/images/feat/integration.svg" width="112" alt="feat">
                    </div>
                    <h4>Integration with other platforms</h4>
                    <p>The system has the ability to work in all written and voice chat platforms in addition
                        to the android/ IOS applications and all social media channels</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="feat pt-5">
                    <div class="img mb-2">
                        <img src="{{url('/mujib')}}/images/feat/control.svg" width="118" alt="feat">
                    </div>
                    <h4>Dynamic Dashboard</h4>
                    <p>The system works via an easy dynamic dashboard to enter
                        questions, answers and any other scenario without any
                        previous technical experience.</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="feat pt-5">
                    <div class="img mb-2">
                        <img src="{{url('/mujib')}}/images/feat/multi_lang.svg" width="115" alt="feat">
                    </div>
                    <h4>Support Different Languages</h4>
                    <p>The system is available to work with all international languages and
                        different dialects directly with the user.</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="feat pt-5">
                    <div class="img mb-2">
                        <img src="{{url('/mujib')}}/images/feat/nlp.svg" width="114" alt="feat">
                    </div>
                    <h4>NLP</h4>
                    <p>The system supports artificial intelligence techniques to understand words, to
                        classify and analyze them, and to provide suitable responses.</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="feat pt-5">
                    <div class="img mb-2">
                        <img src="{{url('/mujib')}}/images/feat/stat.svg" width="113" alt="feat">
                    </div>
                    <h4>Statistics Reports</h4>
                    <p>The system contains a full statistics board to monitor and display all-important
                        customer data and general conversations of the system.</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="feat pt-5">
                    <div class="img mb-2">
                        <img src="{{url('/mujib')}}/images/feat/conversation_rating.svg" width="114" alt="feat">
                    </div>
                    <h4>Conversation Rating</h4>
                    <p>Rating the quality of the conversations to ensure customer satisfaction.</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="feat pt-5">
                    <div class="img mb-2">
                        <img src="{{url('/mujib')}}/images/feat/text_classification.svg" width="114" alt="feat">
                    </div>
                    <h4>Text Classification</h4>
                    <p>The system can classification questions and answers that were not previously
                        defined To train the model To know it later.</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="feat pt-5">
                    <div class="img mb-2">
                        <img src="{{url('/mujib')}}/images/feat/reporting_problems.svg" width="114" alt="feat">
                    </div>
                    <h4>Reporting problems</h4>
                    <p>Reporting problems during conversations from clients.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Features -->

<!-- Start Integration -->
<section class="integration" id="integration">
    <div class="container">
        <div class="text-center">
            <h3 class="section-title wow flipInX">
                Integration
                <span class="line line1"></span><span class="line line2"></span>
                <span class="line line3"></span><span class="line line4"></span>
                <span class="line line5"></span><span class="line line6"></span>
                <span class="line line7"></span><span class="line line8"></span>
            </h3>
        </div>
        <div class="row mt-5 mt-md-2">
            <div class="col-md-6 mb-5 mb-md-0">
                <div class="integration__text d-flex justify-content-center align-items-center">
                    <div class="nav-item">
                        <h2 class="display-4 main-text">Integrate Mujib</h2>
                        <h3 class="h1 sub-heading">with your favorite tools</h3>
                        <p>Our platform offers seamless integrations with your different tools and social media channels in one-click.</p>
                        <a href="#demo" class="btn btn-check-more nav-link">
                            <span class="text">Check More</span>
                            <span class="img"></span>
                            <img src="{{url('/mujib')}}/images/integration/btn-arrows.svg" width="30" alt="btn">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="integration__vector">
                    <img src="{{url('/mujib')}}/images/integration/integration.svg" width="100%" alt="integration">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Integration -->

<!-- Start Business Case -->
<section class="business-case" id="businessCase">
    <div class="container-fluid">
        <div class="text-center">
            <h3 class="section-title wow flipInX">
                Business Case
                <span class="line line1"></span><span class="line line2"></span>
                <span class="line line3"></span><span class="line line4"></span>
                <span class="line line5"></span><span class="line line6"></span>
                <span class="line line7"></span><span class="line line8"></span>
            </h3>
        </div>
        <div class="text-center py-4">
            <h5 class="bussiness-head">Popular Chatbot Templates in the all Different Industry</h5>
        </div>
        <div class="row mt-2">
            <div class="col-3 col-sm-6 col-lg-4 offset-lg-2 pt-4">
                <div class="business-content d-flex">
                    <div class="heading mx-1">
                        <span class="heading__text d-none d-sm-block">Industry <i class="fas fa-layer-group d-md-none"></i></span>
                    </div>
                    <ul class="categories list-unstyled m-0">
                        <li class="cat my-1 px-3 active" data-chat=".display__finance">
                                <span class="cat-icon icon1">
                                    <img src="{{url('/mujib')}}/images/bussiness_case/finance.svg" width="30" alt="Bussiness">
                                </span>
                            <span class="cat-title d-none d-sm-inline-block">Finance & Banking</span>
                        </li>
                        <li class="cat my-1 px-3" data-chat=".display__healthcare">
                                <span class="cat-icon icon2">
                                    <img src="{{url('/mujib')}}/images/bussiness_case/healthcare.svg" width="30" alt="Bussiness">
                                </span>
                            <span class="cat-title d-none d-sm-inline-block">Healthcare</span>
                        </li>
                        <li class="cat my-1 px-3" data-chat=".display__education">
                                <span class="cat-icon icon3">
                                    <img src="{{url('/mujib')}}/images/bussiness_case/education.svg" width="30" alt="Bussiness">
                                </span>
                            <span class="cat-title d-none d-sm-inline-block">Education</span>
                        </li>
                        <li class="cat my-1 px-3" data-chat=".display__legal">
                                <span class="cat-icon icon4">
                                    <img src="{{url('/mujib')}}/images/bussiness_case/legal.svg" width="30" alt="Bussiness">
                                </span>
                            <span class="cat-title d-none d-sm-inline-block">Legal</span>
                        </li>
                        <li class="cat my-1 px-3" data-chat=".display__travel">
                                <span class="cat-icon icon4">
                                    <img src="{{url('/mujib')}}/images/bussiness_case/travel.svg" width="30" alt="Bussiness">
                                </span>
                            <span class="cat-title d-none d-sm-inline-block">Travel</span>
                        </li>
                        <li class="cat my-1 px-3" data-chat=".display__hr">
                                <span class="cat-icon icon4">
                                    <img src="{{url('/mujib')}}/images/bussiness_case/hr.svg" width="30" alt="Bussiness">
                                </span>
                            <span class="cat-title d-none d-sm-inline-block">HR & Recruitment</span>
                        </li>
                        <li class="cat my-1 px-3" data-chat=".display__events">
                                <span class="cat-icon icon4">
                                    <img src="{{url('/mujib')}}/images/bussiness_case/events.svg" width="30" alt="Bussiness">
                                </span>
                            <span class="cat-title d-none d-sm-inline-block">Events</span>
                        </li>
                        <li class="cat my-1 px-3" data-chat=".display__government">
                                <span class="cat-icon icon4">
                                    <img src="{{url('/mujib')}}/images/bussiness_case/government.svg" width="30" alt="Bussiness">
                                </span>
                            <span class="cat-title d-none d-sm-inline-block">Government</span>
                        </li>
                        <li class="cat my-1 px-3" data-chat=".display__ecommerce">
                                <span class="cat-icon icon4">
                                    <img src="{{url('/mujib')}}/images/bussiness_case/ecomerce.svg" width="30" alt="Bussiness">
                                </span>
                            <span class="cat-title d-none d-sm-inline-block">Ecommerce</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="phone-part col-9 col-sm-6 col-lg-5">
                <div class="demo-display mx-auto" id="demoDisplay">
                    <div class="chat__screen display__finance current_chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/finance/chat_finance_1.svg" class="mb-3" width="320" alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/finance/chat_finance_2.svg" class="mb-3" width="320"  alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/finance/chat_finance_3.svg" class="mb-3" width="320"  alt="chat">
                    </div>
                    <div class="chat__screen display__healthcare">
                        <img src="{{url('/mujib')}}/images/bussiness_case/healthcare/chat_healthcare_1.svg" class="mb-3" width="320" alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/healthcare/chat_healthcare_2.svg" class="mb-3" width="320"  alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/healthcare/chat_healthcare_3.svg" class="mb-3" width="320"  alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/healthcare/chat_healthcare_4.svg" class="mb-3" width="320"  alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/healthcare/chat_healthcare_5.svg" class="mb-3" width="320"  alt="chat">
                    </div>
                    <div class="chat__screen display__education">
                        <img src="{{url('/mujib')}}/images/bussiness_case/education/chat_education_1.svg" class="mb-3" width="320" alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/education/chat_education_2.svg" class="mb-3" width="320"  alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/education/chat_education_3.svg" class="mb-3" width="320"  alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/education/chat_education_4.svg" class="mb-3" width="320"  alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/education/chat_education_5.svg" class="mb-3" width="320"  alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/education/chat_education_6.svg" class="mb-3" width="320"  alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/education/chat_education_7.svg" class="mb-3" width="320"  alt="chat">
                    </div>
                    <div class="chat__screen display__legal">
                        <img src="{{url('/mujib')}}/images/bussiness_case/legal/chat_legal_1.svg" class="mb-3" width="320" alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/legal/chat_legal_2.svg" class="mb-3" width="320"  alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/legal/chat_legal_3.svg" class="mb-3" width="320"  alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/legal/chat_legal_4.svg" class="mb-3" width="320"  alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/legal/chat_legal_5.svg" class="mb-3" width="320"  alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/legal/chat_legal_6.svg" class="mb-3" width="320"  alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/legal/chat_legal_7.svg" class="mb-3" width="320"  alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/legal/chat_legal_8.svg" class="mb-3" width="320"  alt="chat">
                    </div>
                    <div class="chat__screen display__travel">
                        <img src="{{url('/mujib')}}/images/bussiness_case/travel/chat_travel_1.svg" class="mb-3" width="320" alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/travel/chat_travel_2.svg" class="mb-3" width="320"  alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/travel/chat_travel_3.svg" class="mb-3" width="320"  alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/travel/chat_travel_4.svg" class="mb-3" width="320"  alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/travel/chat_travel_5.svg" class="mb-3" width="320"  alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/travel/chat_travel_6.svg" class="mb-3" width="320"  alt="chat">
                    </div>
                    <div class="chat__screen display__hr">
                        <img src="{{url('/mujib')}}/images/bussiness_case/hr/chat_hr_1.svg" class="mb-3" width="320" alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/hr/chat_hr_2.svg" class="mb-3" width="320"  alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/hr/chat_hr_3.svg" class="mb-3" width="320"  alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/hr/chat_hr_4.svg" class="mb-3" width="320"  alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/hr/chat_hr_5.svg" class="mb-3" width="320"  alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/hr/chat_hr_6.svg" class="mb-3" width="320"  alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/hr/chat_hr_7.svg" class="mb-3" width="320"  alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/hr/chat_hr_8.svg" class="mb-3" width="320"  alt="chat">
                    </div>
                    <div class="chat__screen display__events">
                        <img src="{{url('/mujib')}}/images/bussiness_case/events/chat_events_1.svg" class="mb-3" width="320" alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/events/chat_events_2.svg" class="mb-3" width="320"  alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/events/chat_events_3.svg" class="mb-3" width="320"  alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/events/chat_events_4.svg" class="mb-3" width="320"  alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/events/chat_events_5.svg" class="mb-3" width="320"  alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/events/chat_events_6.svg" class="mb-3" width="320"  alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/events/chat_events_7.svg" class="mb-3" width="320"  alt="chat">
                    </div>
                    <div class="chat__screen display__government">
                        <img src="{{url('/mujib')}}/images/bussiness_case/government/chat_government_1.svg" class="mb-3" width="320" alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/government/chat_government_2.svg" class="mb-3" width="320"  alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/government/chat_government_3.svg" class="mb-3" width="320"  alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/government/chat_government_4.svg" class="mb-3" width="320"  alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/government/chat_government_5.svg" class="mb-3" width="320"  alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/government/chat_government_6.svg" class="mb-3" width="320"  alt="chat">
                    </div>
                    <div class="chat__screen display__ecommerce">
                        <img src="{{url('/mujib')}}/images/bussiness_case/ecommerce/chat_ecommerce_1.svg" class="mb-3" width="320" alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/ecommerce/chat_ecommerce_2.svg" class="mb-3" width="320"  alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/ecommerce/chat_ecommerce_3.svg" class="mb-3" width="320"  alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/ecommerce/chat_ecommerce_4.svg" class="mb-3" width="320"  alt="chat">
                        <img src="{{url('/mujib')}}/images/bussiness_case/ecommerce/chat_ecommerce_5.svg" class="mb-3" width="320"  alt="chat">
                    </div>
                </div>
                <div class="img-overlay d-none d-md-block"></div>
            </div>
        </div>
    </div>
</section>
<!-- End Business Case -->

<!-- Start FAQ -->
<section class="faq" id="faq">
    <div class="container-fluid">
        <div class="text-center">
            <h3 class="section-title wow flipInX">
                FAQ
                <span class="line line1"></span><span class="line line2"></span>
                <span class="line line3"></span><span class="line line4"></span>
                <span class="line line5"></span><span class="line line6"></span>
                <span class="line line7"></span><span class="line line8"></span>
            </h3>
        </div>
        <div class="row mt-5">
            <div class="col-md-6 mb-5 mb-md-0">
                <div class="imageShow">
                    <div class="currentImgShow text-center" id="imgShowOne">
                        <img src="{{url('/mujib')}}/images/faq/faq1.svg"  class="mt-md-5" style="width:90%" alt="faq">
                    </div>
                    <div id="imgShowTwo" class="text-center">
                        <img src="{{url('/mujib')}}/images/faq/faq2.svg" class="m-auto mt-md-5" style="width:80%" alt="faq">
                    </div>
                    <div id="imgShowThree" class="text-center">
                        <img src="{{url('/mujib')}}/images/faq/faq3.svg" class="mt-md-2 mx-auto" style="width:80%" alt="faq">
                    </div>
                    <div id="imgShowFour" class="text-center">
                        <img src="{{url('/mujib')}}/images/faq/faq4.svg" class="mt-md-5" style="width:90%" alt="faq">
                    </div>
                </div>

            </div>
            <div class="col-12 col-md-6">
                <div class="questions">
                    <ul class="list-unstyled accordion" id="accordion-question">
                        <li class="card mb-2" data-faq="#imgShowOne">
                            <div class="card-header wow fadeInUp collapse-style" data-wow-delay="0.2s" id="headingOne"  data-toggle="collapse" data-target="#question1" aria-expanded="true" aria-controls="collapseOne">
                                <span class="open-answer"><i class="fa fa-play rotate-play-btn"></i></span>
                                <h5 class="question-btn m-0 py-1">What is Mujib?</h5>
                            </div>
                            <div id="question1" class="collapse collapse-body show" aria-labelledby="headingOne" data-parent="#accordion-question">
                                <div class="card-body">
                                    <p>Mujib is a chatbot customer service system based on AI
                                        communication with customers independently and without
                                        the need for human intervention, its handle all kinds
                                        of tasks like scheduling a meeting or booking and
                                        request orders.</p>
                                </div>
                            </div>
                        </li>
                        <li class="card mb-2" data-faq="#imgShowTwo">
                            <div class="card-header wow fadeInUp" data-wow-delay="0.4s" id="headingTwo" data-toggle="collapse" data-target="#question2" aria-expanded="true" aria-controls="collapseTwo">
                                <span class="open-answer"><i class="fa fa-play"></i></span>
                                <h5 class="question-btn m-0 py-1">
                                    What is NLP?
                                </h5>
                            </div>
                            <div id="question2" class="collapse collapse-body" aria-labelledby="headingTwo" data-parent="#accordion-question">
                                <div class="card-body">
                                    <p>The system supports AI techniques and natural language
                                        processing to understand words and text, to classify and
                                        analyze them (names, places, dates, etc), and to provide
                                        suitable responses.</p>
                                </div>
                            </div>
                        </li>
                        <li class="card mb-2" data-faq="#imgShowThree">
                            <div class="card-header wow fadeInUp" data-wow-delay="0.7s" id="headingThree" data-toggle="collapse" data-target="#question3" aria-expanded="true" aria-controls="collapseThree">
                                <span class="open-answer"><i class="fa fa-play"></i></span>
                                <h5 class="question-btn m-0 py-1">Where Does Mujib Work?</h5>
                            </div>
                            <div id="question3" class="collapse collapse-body" aria-labelledby="headingThree" data-parent="#accordion-question">
                                <div class="card-body">
                                    <p>Our platform offers seamless integrations with different tools
                                        and social media channels In addition to Internal systems for
                                        companies.</p>
                                </div>
                            </div>
                        </li>
                        <li class="card" data-faq="#imgShowFour">
                            <div class="card-header wow fadeInUp" data-wow-delay="1s" id="headingFour" data-toggle="collapse" data-target="#question4" aria-expanded="true" aria-controls="collapseFour">
                                <span class="open-answer"><i class="fa fa-play"></i></span>
                                <h5 class="question-btn m-0 py-1">What is Sentiment Analysis?</h5>
                            </div>
                            <div id="question4" class="collapse collapse-body" aria-labelledby="headingThree" data-parent="#accordion-question">
                                <div class="card-body">
                                    <p>Use natural language processing and textual analysis to reveal
                                        positive, negative, or neutral feelings in the text.</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End FAQ -->

<!-- Start Our Clients -->
<section class="our-partners" id="ourPartners">
    <div class="text-center">
        <h3 class="section-title wow flipInX">
            Our Partners
            <span class="line line1"></span><span class="line line2"></span>
            <span class="line line3"></span><span class="line line4"></span>
            <span class="line line5"></span><span class="line line6"></span>
            <span class="line line7"></span><span class="line line8"></span>
        </h3>
    </div>
    <div class="row mt-5">
        <div class="partners__slider">
            <div class="client__logo">
                <img src="{{url('/mujib')}}/images/partners/p1.svg" alt="partner">
            </div>
            <div class="client__logo">
                <img src="{{url('/mujib')}}/images/partners/p2.svg" alt="partner">
            </div>
            <div class="client__logo">
                <img src="{{url('/mujib')}}/images/partners/p3.svg" alt="partner">
            </div>
            <div class="client__logo">
                <img src="{{url('/mujib')}}/images/partners/p4.svg" alt="partner">
            </div>
            <div class="client__logo">
                <img src="{{url('/mujib')}}/images/partners/p7.svg" alt="partner">
            </div>
            <div class="client__logo">
                <img src="{{url('/mujib')}}/images/partners/p5.svg" alt="partner">
            </div>
            <div class="client__logo">
                <img src="{{url('/mujib')}}/images/partners/p6.png" style="width: 90px !important" alt="partner">
            </div>
        </div>
    </div>
</section>
<!-- End Our Clients -->

<!-- Start Our Clients -->
<section class="our-clients" id="ourClients">
    <div class="container">
        <div class="text-center">
            <h3 class="section-title wow flipInX">
                Our Clients
                <span class="line line1"></span><span class="line line2"></span>
                <span class="line line3"></span><span class="line line4"></span>
                <span class="line line5"></span><span class="line line6"></span>
                <span class="line line7"></span><span class="line line8"></span>
            </h3>
        </div>
        <div class="row mt-5">
            <div class="clients__slider">
                <div class="client__logo">
                    <img src="{{url('/mujib')}}/images/clients/c1.jpg" alt="client">
                </div>
                <div class="client__logo">
                    <img src="{{url('/mujib')}}/images/clients/c2.jpg" alt="client">
                </div>
                <div class="client__logo">
                    <img src="{{url('/mujib')}}/images/clients/c3.jpg" alt="client">
                </div>
                <div class="client__logo">
                    <img src="{{url('/mujib')}}/images/clients/c4.jpg" alt="client">
                </div>
                <div class="client__logo">
                    <img src="{{url('/mujib')}}/images/clients/c5.jpg" alt="client">
                </div>
                <div class="client__logo">
                    <img src="{{url('/mujib')}}/images/clients/c6.jpg" alt="client">
                </div>
                <div class="client__logo">
                    <img src="{{url('/mujib')}}/images/clients/c7.jpg" alt="client">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Our Clients -->

<!-- Start Demo -->
<section class="demo" id="demo">
    <div class="container">
        <div class="text-center">
            <h3 class="section-title wow flipInX">
                Request a Demo
                <span class="line line1"></span><span class="line line2"></span>
                <span class="line line3"></span><span class="line line4"></span>
                <span class="line line5"></span><span class="line line6"></span>
                <span class="line line7"></span><span class="line line8"></span>
            </h3>
        </div>
        <div class="row mt-5">
            <div class="col-md-10 offset-md-1 demo-form shadow p-4">
                <form action="{{route('sendMail')}}" method="GET">
                    <div class="row pt-3">
                        <div class="col form-group">
                            <input type="text" class="form-control" name="name" required>
                            <span class="form-bg"></span>
                            <label>Full Name</label>
                        </div>
                        <div class="col form-group">
                            <input type="email" class="form-control" name="email" required>
                            <span class="form-bg"></span>
                            <label>Bussiness Email</label>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <textarea cols="8" class="form-control" rows="10" name="message" required></textarea>
                        <span class="form-bg"></span>
                        <label>Notes</label>
                    </div>
                    <div class="text-center py-3">
                        <button type="submit" class="btn btn-demo-request">
                            <span>Submit</span><span class="line line1"></span>
                            <span class="line line2"></span><span class="line line3"></span>
                            <span class="line line4"></span><span class="line line5"></span>
                            <span class="line line6"></span><span class="line line7"></span>
                            <span class="line line8"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- End Demo -->
<!-- Start Footer -->
<footer class="footer">
    <div class="circ">
        <img src="{{url('/mujib')}}/images/circ_right.png" alt="assets" width="100" class="circ-right">
        <img src="{{url('/mujib')}}/images/circ_left.png" alt="assets" width="100" class="circ-left">
        <img src="{{url('/mujib')}}/images/circle.svg" alt="assets" width="120" class="circ-right circ-right-2">
        <img src="{{url('/mujib')}}/images/circle.svg" alt="assets" width="120" class="circ-left circ-left-2">
    </div>
    <div class="container">
        <div class="footer-content pt-3">
            <div class="row">
                <div class="col-md-4 footer-logo">
                    <a href="index.html">
                        <div class="background"></div>
                        <img src="{{url('/mujib')}}/images/logo_bottom.png" class="mx-2" width="90" alt="logo">
                    </a>
                    <p class="mt-3">I'm a chatbot programmed by the Mujib team,
                        I can answer your customers' common queries receive every day.</p>
                </div>
                <div class="col-md-4 pt-2">
                    <!-- <h5 class="pl-md-5">Mujib Links</h5> -->
                    <div class="d-flex justify-content-center">
                        <ul class="list-unstyled m-0">
                            <li class="nav-item">
                                <a class="nav-link text-uppercase" href="#home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase" href="#features">Features</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase" href="#integration">Integration</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase" href="#businessCase">Business Case</a>
                            </li>
                        </ul>
                        <ul class="list-unstyled m-0">
                            <li class="nav-item">
                                <a class="nav-link text-uppercase" href="#faq">FAQ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase" href="#ourPartners">Our Partners</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase" href="#ourClients">Our Clients</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase" href="#demo">Request a Demo</a>
                            </li>
                        </ul>
                    </div>
                    <!-- <div class="d-flex justify-content-center pt-5">
                        <a href="#" class="btn btn-footer-register">Register</a>
                    </div> -->
                </div>
                <div class="col-md-4 pt-2 pl-md-5">
                    <!-- <h5 class="pl-md-5">Contact Us</h5> -->
                    <ul class="contact-us list-unstyled pl-md-5">
                        <li>13321 King Abdel Alaziz,</li>
                        <li>Riyadh, Saudi Arabia.</li>
                        <li><a href="tel:+966531089888">+966531089888</a></li>
                        <li><a href="mailto:info@wakeb.tech">info@wakeb.tech</a></li>
                    </ul>
                    <ul class="list-unstyled pt-2 pl-md-5">
                        <li class="d-inline-block mx-1">
                            <a href="https://www.facebook.com/MujibBot" target="_blank" class="btn-social">
                                <img src="{{url('/mujib')}}/images/social/facebook.png" alt="facebook">
                            </a>
                        </li>
                        <li class="d-inline-block mx-1">
                            <a href="#" class="btn-social">
                                <img src="{{url('/mujib')}}/images/social/twitter.png" alt="twitter">
                            </a>
                        </li>
                        <li class="d-inline-block mx-1">
                            <a href="#" class="btn-social">
                                <img src="{{url('/mujib')}}/images/social/instagram.png" alt="instagram">
                            </a>
                        </li>
                        <li class="d-inline-block mx-1">
                            <a href="#" class="btn-social">
                                <img src="{{url('/mujib')}}/images/social/youtube.png" alt="youtube">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- <hr> -->
        <div class="copyright text-center">
            <div class="pb-3">All Rights Reserved &copy; Mujib <span id="fullYear"></span></div>
        </div>
    </div>
</footer>
<!-- End Footer -->
@include('notify::messages')
@notifyJs
<script src="{{url('/mujib')}}/js/jquery-3.4.1.min.js"></script>
<script src="{{url('/mujib')}}/js/bootstrap.min.js"></script>
<script src="{{url('/mujib')}}/js/slick.min.js"></script>
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script>
    // Particles JS Config
    if(window.innerWidth <= 500) {
        particlesJS("particles-js", {
            "particles": {
                "number": {"value": 150,"density": {"enable": false, "value_area": 400}},
                "color": {"value": "#143559"}, "shape": {"type": "circle",
                    "stroke": {"width": 0, "color": "#000"}, "polygon": {"nb_sides": 5},
                    "image": {"src": "img/github.svg", "width": 100, "height": 100}},
                "opacity": {"value": 0.5, "random": false,
                    "anim": {"enable": true, "speed": 1, "opacity_min": 0.1, "sync": false}},
                "size": {"value": 3, "random": true, "anim": {"enable": false, "speed": 60, "size_min": 0.1, "sync": false}},
                "line_linked": {"enable": false, "distance": 150, "color": "#143559", "opacity": 0.4, "width": 1},
                "move": {"enable": true, "speed": 2, "direction": "none", "random": false,
                    "straight": false, "out_mode": "out", "bounce": false,
                    "attract": { "enable": false, "rotateX": 400, "rotateY": 1200}}},
            "interactivity": {"detect_on": "canvas",
                "events": {"onhover": {"enable": true, "mode": "grab"}, "onclick": {"enable": true, "mode": "repulse"}, "resize": true},
                "modes": {"grab": {"distance": 140, "line_linked": {"opacity": 1}},
                    "bubble": {"distance": 400, "size": 40, "duration": 2, "opacity": 8,"speed": 3},
                    "repulse": {"distance": 200, "duration": 0.4},
                    "push": {"particles_nb": 4}, "remove": {"particles_nb": 2}
                }},"retina_detect": false});

    } else {
        particlesJS("particles-js", {
            "particles": {
                "number": {"value": 200,"density": {"enable": false, "value_area": 400}},
                "color": {"value": "#143559"}, "shape": {"type": "circle",
                    "stroke": {"width": 0, "color": "#000"}, "polygon": {"nb_sides": 5},
                    "image": {"src": "img/github.svg", "width": 100, "height": 100}},
                "opacity": {"value": 0.5, "random": false,
                    "anim": {"enable": true, "speed": 1, "opacity_min": 0.1, "sync": false}},
                "size": {"value": 3, "random": true, "anim": {"enable": false, "speed": 60, "size_min": 0.1, "sync": false}},
                "line_linked": {"enable": false, "distance": 150, "color": "#143559", "opacity": 0.4, "width": 1},
                "move": {"enable": true, "speed": 4, "direction": "none", "random": false,
                    "straight": false, "out_mode": "out", "bounce": false,
                    "attract": { "enable": false, "rotateX": 400, "rotateY": 1200}}},
            "interactivity": {"detect_on": "canvas",
                "events": {"onhover": {"enable": true, "mode": "grab"}, "onclick": {"enable": true, "mode": "repulse"}, "resize": true},
                "modes": {"grab": {"distance": 140, "line_linked": {"opacity": 1}},
                    "bubble": {"distance": 400, "size": 40, "duration": 2, "opacity": 8,"speed": 3},
                    "repulse": {"distance": 200, "duration": 0.4},
                    "push": {"particles_nb": 4}, "remove": {"particles_nb": 2}
                }},"retina_detect": false});
    }
    /* ---- stats.js config ---- */
    var count_particles, stats, update;
    stats = new Stats();
    stats.setMode(0);
    stats.domElement.style.position = 'absolute';
    stats.domElement.style.left = '0px';
    stats.domElement.style.top = '0px';
    stats.domElement.style.display = 'none';
    document.body.appendChild(stats.domElement);
    count_particles = document.querySelector('.js-count-particles');
    update = function() {
        stats.begin();
        stats.end();
        if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
            count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
        }
        requestAnimationFrame(update);
    };
    requestAnimationFrame(update);
</script>
<script src="{{url('/mujib')}}/js/wow.js"></script>
<script>new WOW().init();</script>
<script src="https://unpkg.com/simplebar@latest/dist/simplebar.min.js"></script>
<script>new SimpleBar($('body')[0]);</script>
<script src="{{url('/mujib')}}/js/chatbot.js"></script>
<script src="{{url('/mujib')}}/js/slick.init.js"></script>
<script src="{{url('/mujib')}}/js/main.js"></script>
<script src="{{url('/mujib')}}/js/index.js"></script>
</body>
</html>
