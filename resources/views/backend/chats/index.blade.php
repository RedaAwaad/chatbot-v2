@extends('backend.new_layout.app')
@section('page_title')
    {{ __('backend/users.title') }}
@endsection
@section('title')
    {{ __('backend/users.title') }}
@endsection
@section('content')
    @push('css')
        <link href="{{ url('/backend') }}/vendors/sweetalert/sweetalert.css" rel="stylesheet">
    @endpush
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon-chat-1"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    {{__('chats.chatbot')}}
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a href="javascript:;" class="btn btn-brand btn-elevate btn-icon-sm"
                           id="kt_demo_panel_toggle" data-toggle="kt-tooltip"
                           data-placement="right">
                            <i class="la la-plus"></i>
                            {{__('chats.add_new_chat')}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Chatbots Head -->

    <!--Begin::Section-->
    <div class="row" id="chatbotsContainer">
        @foreach($chats as $chat)
            <div class="col-md-6">

                <!--Begin::Portlet-->
                <!-- Start First Chatbot -->
                <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__head kt-portlet__head--noborder">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title"></h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <a href="#" class="btn btn-icon" data-toggle="dropdown">
                                <i class="flaticon-more-1 kt-font-brand"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <ul class="kt-nav">
                                    <li class="kt-nav__item">
                                        <a href="{{ route('admin.chats.edit',$chat->id) }}" class="kt-nav__link">
                                            <i class="kt-nav__link-icon flaticon2-edit"></i>
                                            <span class="kt-nav__link-text">{{__('chats.edit')}}</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">

                                        <a  href="#" class="kt-nav__link" onclick="delete_confirmation({{ $chat->id }})" title="">
                                            <i class="kt-nav__link-icon flaticon2-trash" style="color:#ff0000"></i> <span class="kt-nav__link-text">{{__('chats.delete')}}</span>
                                        </a>
                                        <form action="{{ route('chats.destroy',$chat->id) }}" method="POST" id="delete-form-{{ $chat->id }}" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="{{ route('chatbot.show',['slug'=>Auth::user()->slug(),'id'=>$chat->id]) }}" class="kt-nav__link" target="_blank">
                                            <i class="kt-nav__link-icon flaticon2-chat-1"></i>
                                            <span class="kt-nav__link-text">{{__('chats.show')}}</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="{{ route('admin.chats.history',$chat->id) }}" class="kt-nav__link">
                                            <i class="kt-nav__link-icon flaticon2-download"></i>
                                            <span class="kt-nav__link-text">{{__('chats.history')}}</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="{{ route('admin.chats.support',$chat->id) }}" class="kt-nav__link">
                                            <i class="kt-nav__link-icon flaticon-support"></i>
                                            <span class="kt-nav__link-text">{{__('chats.support')}}</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="{{ route('admin.chats.statistics',$chat->id) }}" class="kt-nav__link">
                                            <i class="kt-nav__link-icon flaticon2-graphic"></i>
                                            <span class="kt-nav__link-text">{{__('chats.statistic')}}</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="{{ route('docs',['slug'=>Auth::user()->slug(),'id'=>$chat->id]) }}" class="kt-nav__link">
                                            <i class="kt-nav__link-icon flaticon2-document"></i>
                                            <span class="kt-nav__link-text">{{__('chats.docs')}}</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="{{ route('activation',['id'=>$chat->id]) }}" class="kt-nav__link">
                                            <i class="kt-nav__link-icon {{($chat->status==1)? "flaticon2-arrow-down" : "flaticon2-arrow-up"}}"></i>
                                            <span class="kt-nav__link-text">{{ ($chat->status==1) ? __('chats.deactivate'):__('chats.active') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body">

                        <!--begin::Widget -->
                        <div class="kt-widget kt-widget--user-profile-2">
                            <div class="kt-widget__head">
                                <div class="kt-widget__media">
                                    <img class="kt-widget__img kt-hidden-" width="80px"
                                         src="{{url('/').$chat->image}}" alt="image">
                                    <div
                                        class="kt-widget__pic kt-widget__pic--success kt-font-success kt-font-boldest kt-hidden">
                                        ChS
                                    </div>
                                </div>
                                <div class="kt-widget__info">
                                    <Span class="kt-widget__username">{{$chat->name}}</Span>
                                    <span class="kt-widget__desc">{{__('chats.status')}} : {{ ($chat->status==0) ? __('chats.deactivate'):__('chats.activate') }} <br>{{$chat->subhead}}  </span>
                                </div>
                            </div>
                            <div class="kt-widget__body">
                                <div class="kt-widget__section">
                                    {{$chat->desc}}
                                </div>
                                <div class="kt-widget__item">
                                    <div class="kt-widget__contact">
                                        <span class="kt-widget__label">{{__('chats.created_at')}}:</span>
                                        <span class="kt-widget__data">{{$chat->created_at->diffForHumans()}}</span>
                                    </div>
                                    <div class="kt-widget__contact">
                                        <span class="kt-widget__label" style="{{Session::get('locale') == 'en' ? 'margin-left:22px':''}}">{{__('chats.updated_at')}}:</span>
                                        <span class="kt-widget__data">{{$chat->updated_at->diffForHumans()}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-widget__footer">
                                <a href="{{route('admin.chats.build',$chat->id)}}"
                                   class="btn btn-label-brand btn-lg">{{__('chats.edit')}}</a>
                                <!-- id="kt_app_chat_launch_btn" data-toggle="modal" data-target="#kt_chat_modal" -->
                            </div>
                        </div>

                        <!--end::Widget -->
                    </div>
                </div>
                <!-- End First Chatbot -->
                <!--End::Portlet-->
            </div>
        @endforeach
    </div>

    <!-- Used for Create New Chatbot -->
    @include('backend.chats.create')

    <!-- end::Demo Panel -->
    @push('js')

        <script src="{{ url('/backend') }}/vendors/sweetalert/sweetalert.js"></script>
        <script src="{{ url('/dist') }}/assets/js/main.js"></script>
        <script>
            function delete_confirmation(id) {
                swal.fire({
                    title: 'Are you sure?',
                    text: "You will be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        event.preventDefault();
                        document.getElementById('delete-form-' + id).submit();
                    }
                })
            }

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }

            $("#chatbotImage").change(function() {
                readURL(this);
            });
        </script>

    @endpush
@endsection
