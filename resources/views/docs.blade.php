@extends('backend.new_layout.app')
@section('css')
    <style>
        pre{
            font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif;
            margin-bottom: 10px;
            overflow: auto;
            width: auto;
            padding: 5px;
            background-color: #fff;
            width: 650px!ie7;
            padding-bottom: 20px!ie7;
            max-height: 600px;
        }
        pre {
            white-space: pre-wrap;       /* Since CSS 2.1 */
            white-space: -moz-pre-wrap;  /* Mozilla, since 1999 */
            white-space: -pre-wrap;      /* Opera 4-6 */
            white-space: -o-pre-wrap;    /* Opera 7 */
            word-wrap: break-word;       /* Internet Explorer 5.5+ */
        }
    </style>
@endsection
@section('content')
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Documentation <small>for integration </small>
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_content">
                        <ul class="list-unstyled timeline">
                            <li>
                                <div class="block">
                                    <div class="tags">
                                        <a href="" class="tag">
                                            <span>css</span>
                                        </a>
                                    </div>
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a>Insert The css link inside head tag of page</a>
                                        </h2>
                                        <div class="byline">
                                        </div>
                                        <p class="excerpt">
                                            &lt;link rel="stylesheet" href="http://chatbotapp-project.azurewebsites.net/public/cdn/style.css"&gt;
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <div class="tags">
                                        <a href="" class="tag">
                                            <span>HTML </span>
                                        </a>
                                    </div>
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a>Insert This thml code inside body of page </a>
                                        </h2>
                                        <div class="byline">
                                        </div>
                                        <p class="excerpt">
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

                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <div class="tags">
                                        <a href="" class="tag">
                                            <span>JS</span>
                                        </a>
                                    </div>
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a>Insert this js code in the end of body of page But you have to embeedded the jQuery before it</a>
                                        </h2>
                                        <div class="byline">
                                        </div>
                                        <p class="excerpt">
                                        <pre class="prettyprint">
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
                            </pre>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
