@extends('backend.new_layout.app')
@section('page_title')
    {{ __('backend/settings.update') }}
@endsection
@section('title')
    {{ __('backend/settings.update') }}
@endsection
@section('content')
    @push('css')
        <link href="{{ url('backend/') }}/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    @endpush

    <div class="kt-portlet settings_page_wraper">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <!-- <i class="flaticon-cogwheel kt-font-brand"></i> -->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"/>
                            <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/>
                        </g>
                    </svg>
                </span>
                <h3 class="kt-portlet__head-title kt-font-brand">
                    {{__('chats.settings')}}
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
            </div>
        </div>
        <div class="kt-portlet__body">
            <div class="x_panel">

                <div class="x_content">

                    <!-- start form for validation -->
                    <form id="demo-form" method="POST" action="{{route('settings.update',$setting->id)}}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <label class="input__label" for="website_name">{{ __('backend/settings.website_name') }} :</label>
                        <input type="text" id="website_name" value="{{ $setting->website_name }}" class="form-control  @error('website_name') is-invalid @enderror" name="website_name"/>
                        @error('website_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            <br>
                        @enderror
                        <br/>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="input__label" for="fb">{{ __('backend/settings.facebook') }} :</label>
                                <input type="text" id="fb" value="{{ $setting->fb }}"
                                    class="form-control  @error('fb') is-invalid @enderror" name="fb"/>
                                @error('fb')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    <br>
                                @enderror
                                <br/>
                            </div>
                            <div class="col-md-4">
                                <label class="input__label" for="tw">{{ __('backend/settings.twitter') }} :</label>
                                <input type="text" id="website_name" value="{{ $setting->tw }}"
                                    class="form-control  @error('tw') is-invalid @enderror" name="tw"/>
                                @error('tw')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    <br>
                                @enderror
                                <br/>
                            </div>
                            <div class="col-md-4">
                                <label class="input__label" for="ln">{{ __('backend/settings.linkedin') }} :</label>
                                <input type="text" id="website_name" value="{{ $setting->ln }}"
                                    class="form-control  @error('ln') is-invalid @enderror" name="ln"/>
                                @error('ln')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <br>
                                @enderror
                                <br/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="input__label" for="text2">{{ __('backend/settings.text2') }} :</label>
                                <input type="text" id="fb" value="{{ $setting->text2 }}"
                                    class="form-control  @error('text2') is-invalid @enderror" name="text2"/>
                                @error('text2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <br>
                                @enderror
                                <br/>
                            </div>
                            <div class="col-md-6">
                                <label class="input__label" for="text3">{{ __('backend/settings.text3') }} :</label>
                                <input type="text" id="text3" value="{{ $setting->text3 }}"
                                    class="form-control  @error('text3') is-invalid @enderror" name="text3"/>
                                @error('text3')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <br>
                                @enderror
                                <br/>
                            </div>
                        </div>

                        <label class="input__label" for="dashboard_url">{{ __('backend/settings.dashboard_url') }} :</label>
                        <input type="text" id="dashboard_url" value="{{ $setting->dashboard_url }}"
                            class="form-control  @error('dashboard_url') is-invalid @enderror" name="dashboard_url"/>
                        @error('dashboard_url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        <br>
                        @enderror
                        <br/>

                        <div class="row">
                            <div class="col-md-6">
                                <label class="input__label" for="email">{{ __('backend/settings.email') }} :</label>
                                <input type="text" id="email" value="{{ $setting->email }}"
                                    class="form-control  @error('email') is-invalid @enderror" name="email"/>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <br>
                                @enderror
                                <br/>
                            </div>
                            <div class="col-md-6">
                                <label class="input__label" for="phone">{{ __('backend/settings.pohone') }} :</label>
                                <input type="text" id="phone" value="{{ $setting->phone }}"
                                    class="form-control  @error('phone') is-invalid @enderror" name="phone"/>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <br>
                                @enderror
                                <br/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="logo">{{ __('backend/settings.logo') }} :</label>
                                <br>
                                <img src="{{url('/').$setting->logo}}" width="90px">
                                <br>
                                <input type="file" id="logo" class=" @error('logo') is-invalid @enderror" name="logo"/>
                                <input type="text" id="oldlogo" value="{{$setting->logo}}" class="" name="oldlogo"
                                    hidden/>
                                @error('logo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <br>
                                @enderror
                                <br/>
                            </div>
                            <div class="col-md-4">
                                <label for="icon">{{ __('backend/settings.icon') }} :</label>
                                <br>
                                <img src="{{url('/').$setting->icon}}" width="90px">
                                <br>
                                <input type="file" id="icon" class=" @error('icon') is-invalid @enderror" name="icon"/>
                                <input type="text" id="oldicon" value="{{$setting->icon}}" class="" name="oldicon"
                                    hidden/>
                                @error('icon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <br>
                                @enderror
                                <br/>
                            </div>
                            <div class="col-md-4">
                                <label for="picture">{{ __('backend/settings.picture') }} :</label>
                                <br>
                                <img src="{{url('/').$setting->picture}}" width="90px">
                                <br>
                                <input type="file" id="picture" class=" @error('picture') is-invalid @enderror"
                                    name="picture"/>
                                <input type="text" id="oldpicture" value="{{$setting->picture}}" class=""
                                       name="oldpicture" hidden/>
                                @error('picture')
                                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                                <br>
                                @enderror
                                <br/>
                            </div>
                        </div>
                        <label class="input__label" for="description">{{ __('backend/settings.description') }} :</label>
                        <textarea id="my-textarea" class="form-control  @error('description') is-invalid @enderror"
                                name="description" rows="3">{{$setting->description}}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="text-center mt-5">
                            <button class="btn btn-label-brand setting_submit_btn">{{ __('backend/settings.submit') }}</button>
                        </div>

                    </form>
                    <!-- end form for validations -->
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script src="{{ url('backend/') }}/vendors/iCheck/icheck.min.js"></script>
        <script src="{{ url('backend/') }}/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    @endpush
@endsection
