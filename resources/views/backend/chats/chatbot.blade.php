<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="format-detection" content="telephone=no">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
    <title>{{ __('chat.chatbot') }}</title>

    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ url('front') }}/assets/style.css">
    @if(Session::get('locale') == 'ar')
    <link rel="stylesheet" type="text/css" href="{{ url('front') }}/assets/style.rtl.css">
    @endif
</head>
<body>

    <!-- Loading Animation-->
    <!--<div id="layout-loading">-->
    <!--    <div class="loader-effect"></div>-->
    <!--</div>-->
	<div class="tb-hero-large-circle" style="background-color: {!! $setting->big_circle!!}"></div>
	<div class="tb-hero-small-circle" style="background-color: {!! $setting->small_circle!!}"></div>
	<div class="tb-hreo-imgg">

        <img src="{{url('/').$setting->picture}}" class="animated">

    </div>
	<header>
		<div class="container">
			<div class="dflex">

			    <a   href="{{$setting->dashboard_url}}" target="_blank">
					<img src="{{url('/').$setting->logo}}" width="120px">
				</a>



				<a  href="{{ Session::get('locale') == 'en' ? '/public/chatbot/lang/ar' : '/public/chatbot/lang/en' }}" class="lang" title="عربي">
					<span>{{ Session::get('locale') == 'en' ? 'عربي' : 'EN' }}</span>
					<img src="{{ url('front') }}/assets/lang.png" width="24px">
				</a>
			</div>
		</div>
	</header>
	<div class="page">
		<div class="container">
			<div class="content">
				<div class="title">
					<h1 id="demo"></h1>
					<p>
					<a target="_blank" href="{{$setting->dashboard_url}}" class="link">{{$setting->website_name}}</a><span> {{$setting->text2}} <br>
					{{$setting->text3}}</span>

					</p>
				</div>

			</div>
			<div class="get-start">
				<!-- <button class="start-chat">Start chat</button> -->
				<button class="start-chat">
				    <div class="circle" style="background-color: {!! $setting->start_chat!!}">
				      <!-- <span class="icon arrow"></span> -->
				      <img src="{{ url('front') }}/assets/chat-icon.png">
				    </div>
				    <p class="button-text" >{{ __('chat.start') }}</p>
				  </button>
			</div>

		</div>
	</div>

	<div class="chatWrap ">
		<div class="content">
			<div class="header">
				<div >
					<h3>
						<img class="profile-icon" src="{{url('/').$setting->picture}}">
						<span>{{__('chat.welcome_bro')}}</span>
						<img src="{{ url('front') }}/assets/waving.png">
					</h3>
					<small class="status active"><i></i>{{__('chat.welcome_in')}}</small>
				</div>
				<div >
					&nbsp;<span class="reload" rel="111"> <img  src="http://download.seaicons.com/download/i86022/graphicloads/100-flat-2/graphicloads-100-flat-2-arrow-refresh-4.ico" style="width:20px"/></span>
					&nbsp;<span> <img class="close-chat" src="https://pngimage.net/wp-content/uploads/2018/05/close-icon-png-16x16-7.png" style="width:20px"/></span>
				</div>

			</div>
			<div class="cont">

				<div class="identity action-hide">
					{{__('chat.welcome_text')}}<img src="{{ url('front') }}/assets/smile.png" width="15px">
				</div>

				<div class="img action-hide">
					{{-- <img src="{{ url('front') }}/assets/img2.jpg"> --}}
				</div>


				<div class="chat">
					<div class="questions">
					</div>
					<!-- <div class="questions typing">
						<img class="chat-profile" src="assets/user1.png"><span>...</span>
					</div> -->
					<!-- <div class="chat-text"><span>answer</span></div> -->
				</div>

				<ul class="chat-questions">

				</ul>

			</div>

			<div class="typing-text">
				<input type="text" id="textInput" name="input" width="100%">
				<span id="send"><img src="{{ url('front') }}/assets/send.png"></span>
			</div>
		</div>
	</div>



	<footer class="footer" >
        <div class="container" style="padding-bottom: 0">
            <div class="top-footer">
                <div>
                    <a href="tel:+966531089888"> <i class="fa fa-phone"></i><span class="iq-fw-5">{{$setting->phone}}</span></a> |
	                      <a href="mailto:info@wakeb.tech?subject=&quot;Home msil&quot;">{{$setting->email}}</a>
	                      <br>
                </div>
                <div class=" footer-social">
                    <a target="_blank" href="{{$setting->fb}}" title="facebook">
                    	<img src="{{ url('front') }}/assets/fb.png">
                    </a>
                    <a target="_blank" href="{{$setting->tw}}" title="twitter">
                    	<img src="{{ url('front') }}/assets/tw.png">
                    </a>
                    <a target="_blank" href="{{$setting->ln}}" title="linkedin">
                    	<img src="{{ url('front') }}/assets/in.png">
                    </a>

                </div>
            </div>
        </div>

    </footer>

	<script type="text/javascript" src="{{ url('front') }}/assets/jquery-min.js"></script>
	<script src='https://cdn.rawgit.com/admsev/jquery-play-sound/master/jquery.playSound.js'></script>
    <script>
    var chat_id = "{{ $user->id }}";
    </script>
	<script type="text/javascript" src="{{ url('front') }}/assets/functions.js"></script>

	<script type="text/javascript">
		var i = 0;
		var txt = "{{ $setting->description }}";
		var lang = "{{ Session::get('locale')}}";
		var image = "{{url('/').$setting->picture}}";
		var speed = 70;

		function typeWriter() {
		  if (i < txt.length) {
		    document.getElementById("demo").innerHTML += txt.charAt(i);
		    i++;
		    setTimeout(typeWriter, speed);
		  }
		};

		$(window).on('load',function (argument) {
			typeWriter();
		})
	</script>
</body>
</html>
