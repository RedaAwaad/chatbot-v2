@extends('backend.new_layout.app')
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
                الشات بوت
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
                <div class="kt-portlet__head-actions">

                </div>
            </div>
        </div>
    </div>
</div>
<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title kt-font-primary">
                Edit for  <small>{{$chat->name}}</small>
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-actions">
            </div>
        </div>
    </div>
    <div class="kt-portlet__body">
        <form id="demo-form" method="POST" action="{{route('chats.update',$chat->id)}}"
            enctype="multipart/form-data">
          @csrf
          @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <label for="text2">{{__('chats.title_ar')}}:</label>
                    <input type="text" id="fb" value="{{$chat->name}}" class="form-control  " name="name">
                    <br>
                </div>
                <div class="col-md-6">
                    <label for="text3">{{__('chats.subhead')}} :</label>
                    <input type="text" id="text3" value="{{$chat->subhead}}" class="form-control  " name="subhead">
                    <br>
                </div>

                <div class="col-md-6">
                    <label for="text3">{{__('chats.desc')}} :</label>
                    <textarea class="form-control  " name="desc">{{$chat->desc}}</textarea>
                    <br>
                </div>
                <div class="col-md-6">
                    <label for="text3">{{__('chats.error_message')}} :</label>
                    <textarea class="form-control  " name="error_message">{{isset($error->message)? $error->message :"نأسف لم نتلقي اي اجابة صحيحة"}}</textarea>
                    <br>
                </div>
                <div class="col-md-6">
                    <label for="logo">{{ __('backend/settings.icon') }} :</label>
                    <br>
                    <img id="blah" src="{{url('/').$chat->image}}" width="190px">
                    <br>
                    <input type="file" id="logo" class=" @error('logo') is-invalid @enderror" name="image"/>
                    <input type="text" id="oldlogo" value="{{$chat->image}}" class="" name="oldlogo"
                        hidden/>
                    <br>
                    @error('logo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    <br>
                    @enderror
                    <br/>
                </div>
                <br>
            </div>
            <button class="btn btn-primary">{{ __('backend/settings.submit') }}</button>
        </form>
    </div>
</div>
@push('js')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#logo").change(function() {
            readURL(this);
        });
    </script>
@endpush
@endsection
