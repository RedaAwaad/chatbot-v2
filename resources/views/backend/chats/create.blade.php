<div id="kt_demo_panel" class="kt-demo-panel">
    <div class="kt-demo-panel__head">
        <!-- <span class="kt-portlet__head-icon">
            <i class="kt-font-brand flaticon-chat-1"></i>
        </span> -->
        <h3 class="kt-demo-panel__title">
            {{__('chats.create')}}
        </h3>
        <a href="#" class="kt-demo-panel__close" id="kt_demo_panel_close"><i class="flaticon2-delete"></i></a>
    </div>
    <div class="kt-demo-panel__body h-auto">
        <form method="POST" action="{{route('chats.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control"
                       id="chatbotName" name="name"
                       placeholder="{{__('chats.name')}}" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control"
                       id="chatbotSubhead" name="subhead"
                       placeholder="{{__('chats.subhead')}}" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control"
                       id="chatbotDisc" name="desc"
                       placeholder="{{__('chats.desc')}}" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control"
                       id="chatbotDisc" name="error_message"
                       placeholder="{{__('chats.error_message')}}" required>
            </div>
            <div class="form-group">
                <label>{{__('chats.image')}}</label>
                <input type="file" class="form-control" id="chatbotImage" name="image" required>
            </div>
            <div class="text-center">
                <img id="blah" src="#" class="mx-auto" alt="your image" style="max-width: 250px;" />
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-brand btn-elevate btn-icon-sm">
                    <i class="la la-plus"></i> {{__('chats.add')}}
                </button>
            </div>
            <div id="createChatbotError"></div>
        </form>
    </div>
</div>
