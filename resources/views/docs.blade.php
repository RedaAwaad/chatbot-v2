@extends('backend.new_layout.app')
@section('css')
    <style>

    </style>
@endsection
@section('content')
    <div class="kt-portlet kt-portlet--mobile docs__content">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Documentation <small>for integration </small>
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body ">
            <div class="x_panel">
                <div class="x_content">
                    <ul class="list-unstyled timeline">
                        <li>
                        <div class="h4">CSS</div>
                        <div class="block_content mt-3">
                            <h6 class="title mb-2">Insert this css link inside head tag of the page</h6>
                            <code>
                                &lt;link rel="stylesheet" href="http://chatbotapp-project.azurewebsites.net/public/cdn/style.css"&gt;
                            </code>
                        </div>
                        </li>
                        <li>
                            <div class="h4 mt-5">HTML</div>
                            <div class="block_content mt-2">
                                <h6 class="title mb-3">Insert this html code inside body tag </h6>
                                <code>
                                    &lt; div style="white-space: pre-wrap;"&gt;
                                    &lt;div class="chat_bot"&gt;&lt; /div&gt;
                                    &lt;div class="get-start"&gt;
                                    <!-- <button class="start-chat">Start chat</button> -->
                                    &lt; button class="start-chat"&gt;
                                    &lt; div class="circle"&gt;
                                    <!-- <span class="icon arrow"></span> -->
                                    &lt; img src="https://cdn2.iconfinder.com/data/icons/ios7-inspired-mac-icon-set/1024/messages_5122x.png" style="width: 25px"&gt;
                                    &lt; /div&gt;
                                    &lt; /button&gt;
                                    &lt; /div&gt;
                                    &lt; /div&gt;
                                </code>
                            </div>
                        </li>
                        <li>
                            <div class="h4 mt-5">JS </div>
                            <div class="block_content mt-2">
                                <h6 class="title mb-3">Insert this js code in the end of body tag 
                                    but it must be before jQuery script tag</h6>
                                <code>
                                    &lt;script&gt;
                                    var el = 0;
                                    var html = '&lt;div&gt;&lt;iframe src="http://chatbotapp-project.azurewebsites.net/public/chatbot/{{$user->slug()}}/{{$chat->id}}/chat_icon" style="border:0px #ffffff none;" name="myiFrame" scrolling="no" frameborder="1" marginheight="0px" marginwidth="0px" height="452px" width="300px" allowfullscreen&gt;&lt;/iframe&gt;&lt;/div&gt;';
                                    $('.get-start').on('click',function () {
                                        if(el == 0){
                                            $('.chat_bot').append(html);
                                            el =1;
                                        }else{
                                            $('.chat_bot').empty();
                                            el =0;
                                        }

                                    })
                                    &lt;/script&gt;
                                </code>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
