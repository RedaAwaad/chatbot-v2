    <!-- Cairo Goagle Font Link, Font Awesome CDN, Bootstrap, Simplebar CDN and Chatbot.css -->
    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    {{--
    <link rel="stylesheet" href="{{url('new_box')}}/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://unpkg.com/simplebar@latest/dist/simplebar.css" />
    <link rel="stylesheet" href="{{url('new_box')}}/css/chatbot.css">
    <link rel="stylesheet" type="text/css" href="{{url('new_box')}}/css/rate.css">
    <link rel="stylesheet" href="{{url('new_box')}}/css/chatbot_rtl.css">
    <link rel="stylesheet"
          href="{{url('new_box')}}/css/themes/{{$user->id != '4' ? 'theme.default.css' : 'theme.orange.css'}}">
    <noscript>
        <style>
            /* ** Reinstate scrolling for non-JS clients*/
            .simplebar-content-wrapper {
                overflow: auto;
            }
        </style>
    </noscript>

<div class="chatbox__open--box">
    <span id="started_text">{{__('chat.start')}}</span>
    <img src="{{$user->id != '4' ? url('new_box').'/assets/images/mujib_logo.svg':url('dist').'/lo.png'}}"
         id="chatboxOpenBtn" width="50" alt="Mujib">
</div>
<!-- Chatbot Container -->
<div class="chatbox" lang="ar" id="chatboxContainer">
    <div class="container">
        <!-- ========================= Chatbox Head Container ========================== -->
        <div class="chatbox__head chatbox__head--style">
            <div class="chatbox__left">
                <div class="chatbox__label">
                    <span class="mujib-logo">
                        <img src="{{$user->id != '4' ? url('new_box').'/assets/images/mujib_logo.svg':url('dist').'/lo.png'}}"
                             width="40" alt="Mujib">
                    </span>
                    <span class="chatbox__title mx-2" data-lang="{{ $chat->user_id == " 4" ? '"Wateen"' :"Mujib"}}">"{{
                        $chat->user_id == "4" ? "وتين":"مجيب"}}"</span>
                    <span class="chatbox-badge"></span> <span data-lang="Active">نشط الآن</span>
                </div>
            </div>
            <div class="chatbox__right">
                <button type="button" id="endChat" title="انهاء المحادثة"
                        class="btn btn-clean closeChatbox btn-sm btn-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                         height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <path
                                d="M12,21 C7.581722,21 4,17.418278 4,13 C4,8.581722 7.581722,5 12,5 C16.418278,5 20,8.581722 20,13 C20,17.418278 16.418278,21 12,21 Z"
                                fill="#fff" style="fill:#fff" opacity="0.3" />
                            <path
                                d="M13,5.06189375 C12.6724058,5.02104333 12.3386603,5 12,5 C11.6613397,5 11.3275942,5.02104333 11,5.06189375 L11,4 L10,4 C9.44771525,4 9,3.55228475 9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 C15,3.55228475 14.5522847,4 14,4 L13,4 L13,5.06189375 Z"
                                style="fill:#fff" fill="#fff" />
                            <path
                                d="M16.7099142,6.53272645 L17.5355339,5.70710678 C17.9260582,5.31658249 18.5592232,5.31658249 18.9497475,5.70710678 C19.3402718,6.09763107 19.3402718,6.73079605 18.9497475,7.12132034 L18.1671361,7.90393167 C17.7407802,7.38854954 17.251061,6.92750259 16.7099142,6.53272645 Z"
                                style="fill:#fff" fill="#fff" />
                            <path
                                d="M11.9630156,7.5 L12.0369844,7.5 C12.2982526,7.5 12.5154733,7.70115317 12.5355117,7.96165175 L12.9585886,13.4616518 C12.9797677,13.7369807 12.7737386,13.9773481 12.4984096,13.9985272 C12.4856504,13.9995087 12.4728582,14 12.4600614,14 L11.5399386,14 C11.2637963,14 11.0399386,13.7761424 11.0399386,13.5 C11.0399386,13.4872031 11.0404299,13.4744109 11.0414114,13.4616518 L11.4644883,7.96165175 C11.4845267,7.70115317 11.7017474,7.5 11.9630156,7.5 Z"
                                style="fill:#fff" fill="#fff" />
                        </g>
                    </svg>
                </button>
                <div class="dropdown dropdown-inline">
                    <button type="button" id="chatboxDropdownToggle" class="btn btn-clean showDropdown btn-sm btn-icon"
                            aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                             height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path
                                    d="M5,5 L19,5 C19.5522847,5 20,5.44771525 20,6 C20,6.55228475 19.5522847,7 19,7 L5,7 C4.44771525,7 4,6.55228475 4,6 C4,5.44771525 4.44771525,5 5,5 Z M5,13 L19,13 C19.5522847,13 20,13.4477153 20,14 C20,14.5522847 19.5522847,15 19,15 L5,15 C4.44771525,15 4,14.5522847 4,14 C4,13.4477153 4.44771525,13 5,13 Z"
                                    fill="#ccc" opacity="0.3" />
                                <path
                                    d="M11,9 L19,9 C19.5522847,9 20,9.44771525 20,10 C20,10.5522847 19.5522847,11 19,11 L11,11 C10.4477153,11 10,10.5522847 10,10 C10,9.44771525 10.4477153,9 11,9 Z M11,17 L19,17 C19.5522847,17 20,17.4477153 20,18 C20,18.5522847 19.5522847,19 19,19 L11,19 C10.4477153,19 10,18.5522847 10,18 C10,17.4477153 10.4477153,17 11,17 Z"
                                    fill="#fff" />
                            </g>
                        </svg>
                    </button>
                    <div class="dropdown-menu" id="chatboxDropdown">
                        <ul class="chatbox-nav">
                            <li class="chatbox-nav__head">
                                <span data-lang="Messaging">المحادثة</span>
                                <i class="fas fa-info-circle"></i>
                            </li>
                            <li class="chatbox-nav__separator"></li>
                            <li class="chatbox-nav__item">
                                <div id="changeLanguage" class="chatbox-nav__link">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                                         class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M13,18.9450712 L13,20 L14,20 C15.1045695,20 16,20.8954305 16,22 L8,22 C8,20.8954305 8.8954305,20 10,20 L11,20 L11,18.9448245 C9.02872877,18.7261967 7.20827378,17.866394 5.79372555,16.5182701 L4.73856106,17.6741866 C4.36621808,18.0820826 3.73370941,18.110904 3.32581341,17.7385611 C2.9179174,17.3662181 2.88909597,16.7337094 3.26143894,16.3258134 L5.04940685,14.367122 C5.46150313,13.9156769 6.17860937,13.9363085 6.56406875,14.4106998 C7.88623094,16.037907 9.86320756,17 12,17 C15.8659932,17 19,13.8659932 19,10 C19,7.73468744 17.9175842,5.65198725 16.1214335,4.34123851 C15.6753081,4.01567657 15.5775721,3.39010038 15.903134,2.94397499 C16.228696,2.49784959 16.8542722,2.4001136 17.3003976,2.72567554 C19.6071362,4.40902808 21,7.08906798 21,10 C21,14.6325537 17.4999505,18.4476269 13,18.9450712 Z"
                                                fill="#15365a" fill-rule="nonzero" />
                                            <circle fill="#000000" opacity="0.3" cx="12" cy="10" r="6" />
                                        </g>
                                    </svg>
                                    <span class="chatbox-nav__link-text" data-lang="عربي" lang="ar">English</span>
                                </div>
                            </li>
                            <li class="chatbox-nav__item">
                                <div id="clearChat" class="chatbox-nav__link">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                                         class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M10.9630156,7.5 L11.0475062,7.5 C11.3043819,7.5 11.5194647,7.69464724 11.5450248,7.95024814 L12,12.5 L15.2480695,14.3560397 C15.403857,14.4450611 15.5,14.6107328 15.5,14.7901613 L15.5,15 C15.5,15.2109164 15.3290185,15.3818979 15.1181021,15.3818979 C15.0841582,15.3818979 15.0503659,15.3773725 15.0176181,15.3684413 L10.3986612,14.1087258 C10.1672824,14.0456225 10.0132986,13.8271186 10.0316926,13.5879956 L10.4644883,7.96165175 C10.4845267,7.70115317 10.7017474,7.5 10.9630156,7.5 Z"
                                                fill="#15365a" />
                                            <path
                                                d="M7.38979581,2.8349582 C8.65216735,2.29743306 10.0413491,2 11.5,2 C17.2989899,2 22,6.70101013 22,12.5 C22,18.2989899 17.2989899,23 11.5,23 C5.70101013,23 1,18.2989899 1,12.5 C1,11.5151324 1.13559454,10.5619345 1.38913364,9.65805651 L3.31481075,10.1982117 C3.10672013,10.940064 3,11.7119264 3,12.5 C3,17.1944204 6.80557963,21 11.5,21 C16.1944204,21 20,17.1944204 20,12.5 C20,7.80557963 16.1944204,4 11.5,4 C10.54876,4 9.62236069,4.15592757 8.74872191,4.45446326 L9.93948308,5.87355717 C10.0088058,5.95617272 10.0495583,6.05898805 10.05566,6.16666224 C10.0712834,6.4423623 9.86044965,6.67852665 9.5847496,6.69415008 L4.71777931,6.96995273 C4.66931162,6.97269931 4.62070229,6.96837279 4.57348157,6.95710938 C4.30487471,6.89303938 4.13906482,6.62335149 4.20313482,6.35474463 L5.33163823,1.62361064 C5.35654118,1.51920756 5.41437908,1.4255891 5.49660017,1.35659741 C5.7081375,1.17909652 6.0235153,1.2066885 6.2010162,1.41822583 L7.38979581,2.8349582 Z"
                                                fill="#000000" opacity="0.3" />
                                        </g>
                                    </svg>
                                    <span class="chatbox-nav__link-text" data-lang="Clear">إعادة البدء</span>
                                </div>
                            </li>

                            <li class="chatbox-nav__item">
                                <div id="reportChat" class="chatbox-nav__link">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                                         class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M8.29606274,4.13760526 L1.15599693,10.6152626 C0.849219196,10.8935795 0.826147139,11.3678924 1.10446404,11.6746702 C1.11907213,11.6907721 1.13437346,11.7062312 1.15032466,11.7210037 L8.29039047,18.333467 C8.59429669,18.6149166 9.06882135,18.596712 9.35027096,18.2928057 C9.47866909,18.1541628 9.55000007,17.9721616 9.55000007,17.7831961 L9.55000007,4.69307548 C9.55000007,4.27886191 9.21421363,3.94307548 8.80000007,3.94307548 C8.61368984,3.94307548 8.43404911,4.01242035 8.29606274,4.13760526 Z"
                                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                            <path
                                                d="M23.2951173,17.7910156 C23.2951173,16.9707031 23.4708985,13.7333984 20.9171876,11.1650391 C19.1984376,9.43652344 16.6261719,9.13671875 13.5500001,9 L13.5500001,4.69307548 C13.5500001,4.27886191 13.2142136,3.94307548 12.8000001,3.94307548 C12.6136898,3.94307548 12.4340491,4.01242035 12.2960627,4.13760526 L5.15599693,10.6152626 C4.8492192,10.8935795 4.82614714,11.3678924 5.10446404,11.6746702 C5.11907213,11.6907721 5.13437346,11.7062312 5.15032466,11.7210037 L12.2903905,18.333467 C12.5942967,18.6149166 13.0688214,18.596712 13.350271,18.2928057 C13.4786691,18.1541628 13.5500001,17.9721616 13.5500001,17.7831961 L13.5500001,13.5 C15.5031251,13.5537109 16.8943705,13.6779456 18.1583985,14.0800781 C19.9784273,14.6590944 21.3849749,16.3018455 22.3780412,19.0083314 L22.3780249,19.0083374 C22.4863904,19.3036749 22.7675498,19.5 23.0821406,19.5 L23.3000001,19.5 C23.3000001,19.0068359 23.2951173,18.2255859 23.2951173,17.7910156 Z"
                                                fill="#15365a" fill-rule="nonzero" />
                                        </g>
                                    </svg>
                                    <span class="chatbox-nav__link-text" data-lang="Report">تقرير</span>
                                </div>
                            </li>
                            <li class="chatbox-nav__item">
                                <div id="" class="chatbox-nav__link">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                                         class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M8.29606274,4.13760526 L1.15599693,10.6152626 C0.849219196,10.8935795 0.826147139,11.3678924 1.10446404,11.6746702 C1.11907213,11.6907721 1.13437346,11.7062312 1.15032466,11.7210037 L8.29039047,18.333467 C8.59429669,18.6149166 9.06882135,18.596712 9.35027096,18.2928057 C9.47866909,18.1541628 9.55000007,17.9721616 9.55000007,17.7831961 L9.55000007,4.69307548 C9.55000007,4.27886191 9.21421363,3.94307548 8.80000007,3.94307548 C8.61368984,3.94307548 8.43404911,4.01242035 8.29606274,4.13760526 Z"
                                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                            <path
                                                d="M23.2951173,17.7910156 C23.2951173,16.9707031 23.4708985,13.7333984 20.9171876,11.1650391 C19.1984376,9.43652344 16.6261719,9.13671875 13.5500001,9 L13.5500001,4.69307548 C13.5500001,4.27886191 13.2142136,3.94307548 12.8000001,3.94307548 C12.6136898,3.94307548 12.4340491,4.01242035 12.2960627,4.13760526 L5.15599693,10.6152626 C4.8492192,10.8935795 4.82614714,11.3678924 5.10446404,11.6746702 C5.11907213,11.6907721 5.13437346,11.7062312 5.15032466,11.7210037 L12.2903905,18.333467 C12.5942967,18.6149166 13.0688214,18.596712 13.350271,18.2928057 C13.4786691,18.1541628 13.5500001,17.9721616 13.5500001,17.7831961 L13.5500001,13.5 C15.5031251,13.5537109 16.8943705,13.6779456 18.1583985,14.0800781 C19.9784273,14.6590944 21.3849749,16.3018455 22.3780412,19.0083314 L22.3780249,19.0083374 C22.4863904,19.3036749 22.7675498,19.5 23.0821406,19.5 L23.3000001,19.5 C23.3000001,19.0068359 23.2951173,18.2255859 23.2951173,17.7910156 Z"
                                                fill="#15365a" fill-rule="nonzero" />
                                        </g>
                                    </svg>
                                    <span class="chatbox-nav__link-text">
                                        <a href="tel:0143937700" style="color: gray"
                                           data-lang="Customer Services (Yanbu)"> خدمة المستفيدين (ينبع)</a></span>
                                </div>
                            </li>
                            <li class="chatbox-nav__item">
                                <div id="" class="chatbox-nav__link">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                                         class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M8.29606274,4.13760526 L1.15599693,10.6152626 C0.849219196,10.8935795 0.826147139,11.3678924 1.10446404,11.6746702 C1.11907213,11.6907721 1.13437346,11.7062312 1.15032466,11.7210037 L8.29039047,18.333467 C8.59429669,18.6149166 9.06882135,18.596712 9.35027096,18.2928057 C9.47866909,18.1541628 9.55000007,17.9721616 9.55000007,17.7831961 L9.55000007,4.69307548 C9.55000007,4.27886191 9.21421363,3.94307548 8.80000007,3.94307548 C8.61368984,3.94307548 8.43404911,4.01242035 8.29606274,4.13760526 Z"
                                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                            <path
                                                d="M23.2951173,17.7910156 C23.2951173,16.9707031 23.4708985,13.7333984 20.9171876,11.1650391 C19.1984376,9.43652344 16.6261719,9.13671875 13.5500001,9 L13.5500001,4.69307548 C13.5500001,4.27886191 13.2142136,3.94307548 12.8000001,3.94307548 C12.6136898,3.94307548 12.4340491,4.01242035 12.2960627,4.13760526 L5.15599693,10.6152626 C4.8492192,10.8935795 4.82614714,11.3678924 5.10446404,11.6746702 C5.11907213,11.6907721 5.13437346,11.7062312 5.15032466,11.7210037 L12.2903905,18.333467 C12.5942967,18.6149166 13.0688214,18.596712 13.350271,18.2928057 C13.4786691,18.1541628 13.5500001,17.9721616 13.5500001,17.7831961 L13.5500001,13.5 C15.5031251,13.5537109 16.8943705,13.6779456 18.1583985,14.0800781 C19.9784273,14.6590944 21.3849749,16.3018455 22.3780412,19.0083314 L22.3780249,19.0083374 C22.4863904,19.3036749 22.7675498,19.5 23.0821406,19.5 L23.3000001,19.5 C23.3000001,19.0068359 23.2951173,18.2255859 23.2951173,17.7910156 Z"
                                                fill="#15365a" fill-rule="nonzero" />
                                        </g>
                                    </svg>
                                    <span class="chatbox-nav__link-text">
                                        <a href="tel:0133464000" style="color: gray"
                                           data-lang="Customer Services (Jubail)"> خدمة المستفيدين
                                            (الجبيل)</a></span>
                                </div>
                            </li>
                            <li class="chatbox-nav__separator"></li>
                            <li class="chatbox-nav__item">
                                <div class="chatbox-nav__link color-schema-container" id="colorSchemaContainer">
                                    <div class="shown-link d-inline-block">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                                        fill="#000000" fill-rule="nonzero"
                                                        transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000) " />
                                                    <path
                                                        d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                                        fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                        </span>
                                        <span class="chatbox-nav__link-text" data-lang="Change Colors">تغيير الألوان
                                        </span>
                                    </div>
                                    <span class="hidden-link chatbox-nav__link-text text-center">
                                        <span class="color-schema default active"
                                              data-theme="{{url('new_box')}}/css/themes/theme.default.css"></span>
                                        <span class="color-schema second"
                                              data-theme="{{url('new_box')}}/css/themes/theme.dark.css"></span>
                                        <span class="color-schema third"
                                              data-theme="{{url('new_box')}}/css/themes/theme.red.css"></span>
                                        <span class="color-schema fourth"
                                              data-theme="{{url('new_box')}}/css/themes/theme.green.css"></span>
                                        <span class="color-schema fifth"
                                              data-theme="{{url('new_box')}}/css/themes/theme.orange.css"></span>
                                    </span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <button type="button" id="closeChatboxContainer" class="btn btn-clean closeChatbox btn-sm btn-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                         height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                               fill="#fff">
                                <rect x="0" y="7" width="16" height="2" rx="1" style=" fill: #fff !important;" />
                                <rect opacity="0.3"
                                      transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000) "
                                      x="0" y="7" width="16" height="2" rx="1" />
                            </g>
                        </g>
                    </svg>
                </button>
            </div>
        </div>
        <div class="chatbox__body">
            <div class="chatbox__loading--content" id="chatboxLoading">
                <div class="img">
                    @if($user->id !="4")
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 2834.6 5669.3"
                             style="enable-background:new 0 0 2834.6 5669.3;" xml:space="preserve">
                        <style type="text/css">
                            .st0 {
                                fill: #23517A;
                            }

                            .st1 {
                                fill: #143559;
                            }

                            .st2 {
                                fill: #FFFFFF;
                            }

                            .st3 {
                                fill: none;
                                stroke: #FFFFFF;
                                stroke-width: 0.5;
                                stroke-miterlimit: 10;
                            }
                        </style>
                            <path id="Rectangle_1555" class="st0"
                                  d="M689.3,1958.1h1612.4c172.8,0,312.9,140.1,312.9,312.9l0,0
                        c0,172.8-140.1,312.9-312.9,312.9H689.3c-172.8,0-312.9-140.1-312.9-312.9l0,0C376.3,2098.2,516.4,1958.1,689.3,1958.1z" />
                            <path id="Rectangle_1556" class="st0" d="M1476,1231.6h39c4.1,0,7.4,3.3,7.4,7.4V1459c0,4.1-3.3,7.4-7.4,7.4h-39
                        c-4.1,0-7.4-3.3-7.4-7.4V1239C1468.6,1235,1471.9,1231.6,1476,1231.6z" />
                            <path id="Path_24127" class="st1" d="M2353.8,2271c0-474-384.3-858.3-858.3-858.3c-474.1,0-858.4,384.3-858.4,858.3
                        c0,474.1,384.3,858.4,858.4,858.4c45.8,0,91.6-3.7,136.9-11l129.7,80.4l220.1,136.5l8.1-258.8l3.3-106.6
                        C2219.7,2809,2354,2548.5,2353.8,2271z" />
                            <path id="Rectangle_1557" class="st2" d="M1075.8,1989.6h839.4c155.4,0,281.4,126,281.4,281.4l0,0c0,155.4-126,281.4-281.4,281.4
                        h-839.4c-155.4,0-281.4-126-281.4-281.4l0,0C794.4,2115.6,920.3,1989.6,1075.8,1989.6z" />
                            <path id="Path_24128" class="st1" d="M1876.4,2205c70.3,0,127.3,57,127.3,127.3h70.7c0-109.4-88.7-198-198-198
                        c-109.4,0-198,88.7-198,198h70.7C1749.1,2262,1806.1,2205,1876.4,2205z" />
                            <path id="Path_24129" class="st1" d="M1107.9,2205c70.3,0,127.3,57,127.3,127.3h70.7c0-109.4-88.7-198-198-198
                        c-109.4,0-198,88.7-198,198h70.7C980.6,2262,1037.6,2205,1107.9,2205z" />
                            <ellipse id="Ellipse_648" class="st1" cx="1495.5" cy="1164.2" rx="123.4" ry="123.4" />
                            <path id="Path_24130" class="st2" d="M533.7,2481.3c-45.1-60.8-69.4-134.5-69.3-210.2c-0.1-75.6,24.2-149.3,69.2-210.1
                        c-21.7,67.9-32.8,138.8-32.7,210.1C500.8,2342.4,511.9,2413.3,533.7,2481.3z" />
                            <path id="Path_24131" class="st2" d="M2458.2,2481.3c45.1-60.8,69.4-134.5,69.3-210.2c0.1-75.6-24.1-149.3-69.2-210.1
                        c21.7,67.9,32.8,138.8,32.7,210.1C2491.1,2342.4,2480,2413.3,2458.2,2481.3z" />
                            <g id="Group_6159" transform="translate(77.192 93.715)">
                                <path id="Path_24132" class="st3" d="M1498.2,2876.5c7.6,0,15.2,0,22.5-0.1c209-2,367.9-31.6,487.1-75.5
                            c162.2-60,251.3-146.7,293.5-226.6c86.1-163.1,28.2-290.7-25.2-366" />
                                <path id="Path_24133" class="st2" d="M1429.4,2832.7c-50.5,0-91.5,19.2-91.5,42.8c0,23.7,41,42.8,91.5,42.8s91.5-19.2,91.5-42.8
                            C1520.9,2851.8,1479.8,2832.7,1429.4,2832.7z" />
                            </g>
                            <g>
                                <path class="st1"
                                      d="M836.4,4008.7c0-97.9,0-191.6,0-285.2c-2-0.8-4-1.6-6-2.4c-3.9,8.6-8.6,16.8-11.5,25.7
                            c-23.2,71.2-45.6,142.8-69.2,213.9c-13,39.2-35.9,53.7-81.6,54.6c-44.7,0.9-71.2-13.8-83.9-51.3c-24.1-70.9-46.2-142.6-69.3-213.9
                            c-3.2-9.8-7.3-19.2-11-28.8c-1.9,0.3-3.9,0.7-5.8,1c0,94.1,0,188.2,0,284.3c-47.8,0-94.2,0-142.2,0c-0.4-8.5-1.1-15.9-1.1-23.3
                            c-0.1-113.7-0.1-227.5,0-341.2c0.1-51.7,27.9-81.6,79.6-85.2c16.6-1.1,33.3-1.3,50-0.5c44.5,2.1,76.6,23,91.5,65.7
                            c23.8,68.7,46.2,137.8,69.5,206.6c4.7,14,11.1,27.4,16.7,41.1c2.3,0.2,4.6,0.3,6.9,0.5c4.5-8.8,10.1-17.3,13.3-26.6
                            c22.9-67.4,45.8-134.7,67.6-202.5c19.6-61,48.3-84.4,112.2-85.5c20.2-0.4,41.3,0.8,60.6,6.1c40.9,11.4,55.6,32.1,56.1,74.3
                            c0.6,48.5,0.2,97.1,0.2,145.6c0,68.2-0.4,136.5,0.3,204.7c0.2,16.4-4.3,23-21.7,22.5C917.5,4008,877.5,4008.7,836.4,4008.7z" />
                                <path class="st1" d="M2470.2,3781.4c60.1,16.2,78,38.2,77.9,95.1c0,23.9-1.4,48.8-7.8,71.6c-9,32.2-33.3,51.9-66.4,58.3
                            c-15.5,3-31.6,4.4-47.4,4.5c-81.9,0.4-163.8,0.3-245.6,0.2c-54.4-0.1-77.5-22.9-77.7-77.6c-0.3-98.6-0.3-197.1,0-295.7
                            c0.1-52.4,24.3-76.1,76.8-76.2c76.6-0.1,153.1,0,229.7,0c98.7,0,138.3,36.9,126.9,153.5C2533,3750.4,2508.2,3770.4,2470.2,3781.4z
                            M2247.5,3831.9c0,18-1.7,34.7,0.8,50.8c1,6.9,10.4,17.5,16.3,17.8c38.4,1.4,76.9,1.7,115.3-0.5c19.1-1.1,25.1-18.2,25.2-35
                            c0.1-16.6-7.9-31.7-25.3-32.5C2336.3,3830.7,2292.8,3831.9,2247.5,3831.9z M2249,3732.9c3.4,0.7,5.6,1.5,7.7,1.5
                            c34.8,0.1,69.7,0.4,104.5,0c25.1-0.3,34.4-9.3,34.6-31.7c0.2-21-10.5-31.2-35.2-32c-20.4-0.6-40.9-0.2-61.3-0.2
                            c-54.2,0-56.2,2.3-52.1,56.6C2247.3,3728.6,2248.1,3730,2249,3732.9z" />
                                <path class="st1" d="M1046.6,3562.6c46.9,0,92.1,0,139.8,0c0.4,8.3,1.2,16.3,1.2,24.3c0.1,70.5,0.1,141,0.1,211.6
                            c0,6.8-0.1,13.7,0.1,20.5c2,71.6,66.4,107.1,129.1,70.9c23.9-13.8,29.8-37,29.9-62.3c0.2-79.6,0.1-159.2,0.2-238.9
                            c0-8.1,0-16.3,0-25.7c48.4,0,94.3,0,141.7,0c0.6,6,1.7,11.8,1.7,17.6c0.1,85.7,0.7,171.4-0.2,257.1
                            c-1.1,110.7-63.5,175.6-174.7,177.8c-51.1,1-103.3-0.7-153.3-10.2c-65.6-12.5-112.3-66.4-114.7-133.1
                            C1043.8,3769.9,1046.6,3667.5,1046.6,3562.6z" />
                                <path class="st1" d="M1514.1,4008.9c0-34.4,0-68.9,0-106.4c21.6,0,41.8,0.2,62,0c73.8-0.7,102.3-28.9,102.5-102
                            c0.3-70.5,0.1-141.1,0.1-211.6c0-8.2,0-16.4,0-25.9c48.6,0,95.2,0,141.3,0c1.1,2.3,2.3,3.6,2.3,4.9c-0.5,99.3,2.3,198.8-2.6,297.9
                            c-4.2,85.3-49.4,132.5-134.5,141.9C1629.4,4013.9,1572.2,4008.9,1514.1,4008.9z" />
                                <path class="st1" d="M2032.9,4009.9c-47.1,0-92.9,0-140.2,0c0-149.4,0-297.6,0-447.1c47.3,0,93.1,0,140.2,0
                            C2032.9,3712.2,2032.9,3860.5,2032.9,4009.9z" />
                            </g>
                    </svg>
                    @else
                        <img src="{{$user->id != '4' ? url('new_box').'/assets/images/mujib_logo.svg':url('dist').'/lo.png'}}"
                             id="chatboxOpenBtn" width="200" alt="Mujib">
                    @endif
                </div>
            </div>
            <!-- ========================= Chatbox Body Container ========================== -->
            <div class="chatbot-scroll" data-simpleba id="chatbotScroll">
                <div class="chatbox__messages kt-chat__messages--solid" id="chatboxMessages">
                    <div class="clear-fix"></div>
                </div>
            </div>
        </div>
        <!-- ========================= Chatbox Footer Container ========================== -->
        <div class="chatbox__foot">
            <div class="chatbot__output"></div>
            <div class="chatbox__input">
                <div class="chatbox__editor">
                    <textarea id="msgFromUser" data-placeholder="Type here..." placeholder="أكتب هنا..."></textarea>
                </div>
                <div class="chatbox__toolbar">
                    <div class="chatbox__tools">
                        <!-- <i class="fas fa-images media--icon" id="uploadImgBtn"></i>
                        <i class="fas fa-smile media--icon" id="emojiBtn"></i>
                        <div class="add-new-line" title="active new line">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M8.5,8 L8.5,18 C8.5,18.5522847 8.05228475,19 7.5,19 L6.5,19 C5.94771525,19 5.5,18.5522847 5.5,18 L5.5,8 L2,8 C1.44771525,8 1,7.55228475 1,7 L1,6 C1,5.44771525 1.44771525,5 2,5 L12,5 C12.5522847,5 13,5.44771525 13,6 L13,7 C13,7.55228475 12.5522847,8 12,8 L8.5,8 Z"
                                        fill="#000000" opacity="0.3" />
                                    <path
                                        d="M20,16.5857864 L21.2928932,15.2928932 C21.6834175,14.9023689 22.3165825,14.9023689 22.7071068,15.2928932 C23.0976311,15.6834175 23.0976311,16.3165825 22.7071068,16.7071068 L19.7071068,19.7071068 C19.3165825,20.0976311 18.6834175,20.0976311 18.2928932,19.7071068 L15.2928932,16.7071068 C14.9023689,16.3165825 14.9023689,15.6834175 15.2928932,15.2928932 C15.6834175,14.9023689 16.3165825,14.9023689 16.7071068,15.2928932 L18,16.5857864 L18,7.41421356 L16.7071068,8.70710678 C16.3165825,9.09763107 15.6834175,9.09763107 15.2928932,8.70710678 C14.9023689,8.31658249 14.9023689,7.68341751 15.2928932,7.29289322 L18.2928932,4.29289322 C18.6834175,3.90236893 19.3165825,3.90236893 19.7071068,4.29289322 L22.7071068,7.29289322 C23.0976311,7.68341751 23.0976311,8.31658249 22.7071068,8.70710678 C22.3165825,9.09763107 21.6834175,9.09763107 21.2928932,8.70710678 L20,7.41421356 L20,16.5857864 Z"
                                        fill="#15365a" />
                                </g>
                            </svg>
                        </div> -->
                    </div>
                    <div class="chatbox__actions">
                        <button type="button" id="submitReplyBtn" class="btn btn-brand btn-font-sm chatbox__reply">
                            <svg id="sendingButtonSvg" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                 viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M4.88230018,17.2353996 L13.2844582,0.431083506 C13.4820496,0.0359007077 13.9625881,-0.12427877 14.3577709,0.0733126292 C14.5125928,0.15072359 14.6381308,0.276261584 14.7155418,0.431083506 L23.1176998,17.2353996 C23.3152912,17.6305824 23.1551117,18.1111209 22.7599289,18.3087123 C22.5664522,18.4054506 22.3420471,18.4197165 22.1378777,18.3482572 L14,15.5 L5.86212227,18.3482572 C5.44509941,18.4942152 4.98871325,18.2744737 4.84275525,17.8574509 C4.77129597,17.6532815 4.78556182,17.4288764 4.88230018,17.2353996 Z"
                                        fill="#000000" fill-rule="nonzero"
                                        transform="translate(14.000087, 9.191034) rotate(-315.000000) translate(-14.000087, -9.191034) " />
                                </g>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <!-- ========================= Emoji Container ========================== -->
            <div class="emoji__container" id="emojiContainer">
                <button type="button" id="cancelEmoji" class="btn btn-clean btn-sm btn-icon btn-upload-close"
                        aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-times"></i>
                </button>
                <div class="emojis">
                    <div class="emojis-content" id="emojisContent">
                        <span data-emoji="&#128540;">&#128540;</span>
                        <span data-emoji="&#128512;">&#128512;</span>
                        <span data-emoji="&#128513;">&#128513;</span>
                        <span data-emoji="&#128514;">&#128514;</span>
                        <span data-emoji="&#128517;">&#128517;</span>
                        <span data-emoji="&#128519;">&#128519;</span>
                        <span data-emoji="&#128518;">&#128518;</span>
                        <span data-emoji="&#128520;">&#128520;</span>
                        <span data-emoji="&#128521;">&#128521;</span>
                        <span data-emoji="&#128522;">&#128522;</span>
                        <span data-emoji="&#128521;">&#128521;</span>
                        <span data-emoji="&#128522;">&#128522;</span>
                        <span data-emoji="&#128523;">&#128523;</span>
                        <span data-emoji="&#128525;">&#128525;</span>
                        <span data-emoji="&#128526;">&#128526;</span>
                        <span data-emoji="&#128527;">&#128527;</span>
                        <span data-emoji="&#128528;">&#128528;</span>
                        <span data-emoji="&#128529;">&#128529;</span>
                        <span data-emoji="&#128530;">&#128530;</span>
                        <span data-emoji="&#128533;">&#128533;</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- ========================= Register Form Container ========================== -->
        <div class="popup-container">
            <div class="chatbox__register--container p-3" id="registerContainer">
                <button type="button" id="cancelRegister" class="btn btn-clean btn-sm btn-icon btn-register-close"
                        aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-times"></i>
                </button>
                <div class="chatbox__register--body p-3 pt-5">
                    <form>
                        <div class="chatbox__editor pt-5 mt-4">
                            <div class="form-group">
                                <input type="text" required class="form-control" data-placeholder="الاسم بالكامل"
                                       placeholder="Fullname">
                            </div>
                            <div class="form-group">
                                <input type="email" required class="form-control" data-placeholder="الإيميل"
                                       placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="text" required class="form-control" data-placeholder="رقم الجوال"
                                       placeholder="Phone Number">
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn w-75 submit-register-btn"
                                        data-lang="تسجيل">Register</button>
                            </div>
                        </div>
                    </form>
                    <div class="text-center mt-5" id="registerStatus"></div>
                </div>
            </div>
            <!-- ========================= Report Container ========================== -->
            <div class="chatbox__report--container p-3" id="reportContainer">
                <button type="button" id="cancelReport" class="btn btn-clean btn-sm btn-icon btn-report-close"
                        aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-times"></i>
                </button>
                <div class="chatbox__report--body p-3 pt-5">
                    <form id="submitReportChat">
                        <div class="chatbox__editor pt-4 mt-5">
                            <textarea id="reportMessage" data-placeholder="Type report here..."
                                      placeholder="أكتب التقرير هنا..."></textarea>
                            <div class="choices-btns">
                                <label class="report-choices">
                                    <input type="radio" value="error" checked name="reportType" id="errorValue"> <span
                                        data-lang="Erorr">خطأ</span>
                                    <span class="custom-radio"></span>
                                </label>
                                <label class="report-choices">
                                    <input type="radio" value="unknown" name="reportType" id="unknownValue"> <span
                                        data-lang="Unknown">غير معروف</span>
                                    <span class="custom-radio"></span>
                                </label>
                            </div>
                            <div class="text-center mt-5">
                                <button type="submit" class="btn w-75 submit-report-btn" data-lang="Send Report">إرسال
                                    التقرير</button>
                            </div>
                        </div>
                    </form>
                    <div class="text-center mt-5" id="reportStatus"></div>
                </div>
            </div>
            <!-- ========================= Upload image Container ========================== -->
            <div class="chatbox__upload-image--container p-3" id="uploadImgContainer">
                <button type="button" id="cancelUploadImg" class="btn btn-clean btn-sm btn-icon btn-upload-close"
                        aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-times"></i>
                </button>
                <div class="chatbox__upload-image--body pt-5">
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" accept="image/png, .gif, .jpg, .jpeg, .svg" class="custom-file-input"
                                   id="chatUploadInput">
                            <label class="custom-file-label" id="imagUploadingTitle" for="chatUploadInput"
                                   data-text="Click here to choose" data-lang="أضغط هنا لاختيار صورة">Click here to
                                choose</label>
                        </div>
                    </div>
                    <div class="image-uploading-preview text-center">
                        <img src="{{url('new_box')}}/assets/images/preview-img.svg" class="img-fluid"
                             style="max-height: 250px;" id="uploadingPreview"
                             data-default="/assets/images/preview-img.svg" alt="uploading preview">
                    </div>
                    <div class="text-center mt-3">
                        <button class="btn btn-brand  btn-font-sm w-75 chatbox__reply" id="replyByImgBtn"
                                data-lang="إرسال">Send</button>
                    </div>
                    <div class="chatbox__uploading-error text-center"></div>
                </div>
            </div>
            <!-- ========================= Upload image Show Before Upload Container ========================== -->
            <div class="chatbox__upload-image--container image-show p-3" id="uploadImgShow">
                <button type="button" id="cancelImgShow" class="btn btn-clean btn-sm btn-icon btn-upload-close"
                        aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-times"></i>
                </button>
                <div class="chatbox__upload-image--body pt-5">
                    <div class="image-uploading-preview text-center">
                        <img src="{{url('new_box')}}/assets/images/preview-img.svg" id="previewImage" class="img-fluid"
                             style="max-height: 250px;" id="uploadingPreview"
                             data-default="/assets/images/preview-img.svg" alt="uploading preview">
                    </div>
                </div>
            </div>
        </div>
        <!-- ========================= Audioes ========================== -->
        <div class="audio">
            <audio id="msgSentAudio">
                <!-- <source src="horse.ogg" type="audio/ogg"> -->
                <source src="{{url('new_box')}}/assets/tones/new_chat.mp3" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
            <audio id="msgAnswerAudio">
                <!-- <source src="horse.ogg" type="audio/ogg"> -->
                <source src="{{url('new_box')}}/assets/tones/received_live_chat.mp3" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
        </div>
    </div>
</div>

    <script>
        var url_assets = "{{url('new_box')}}";
        var url_dist = "{{url('dist')}}";
        var user_id = "{{$chat->user_id}}"
        var chat_selected = "{{ $chat->id }}";
        var chat_status = "{{ $chat->status }}";
        var lang = "{{ Session::get('locale')}}";
        var finsh = `<div class="rating-container">
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
    </div>`;
    </script>
    {{-- <script src="{{url('new_box')}}/js/jquery-3.4.1.min.js"></script>
    <script src="{{url('new_box')}}/js/bootstrap.min.js"></script> --}}
    <script src="https://unpkg.com/simplebar@latest/dist/simplebar.min.js"></script>
    <script src="{{url('new_box')}}/js/chatbot.js"></script>

