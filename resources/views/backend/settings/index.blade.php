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

    <div class="kt-portlet kt-portlet--responsive-mobile">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="flaticon-cogwheel kt-font-brand"></i>
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

                        <label for="website_name">{{ __('backend/settings.website_name') }} :</label>
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
                                <label for="fb">{{ __('backend/settings.facebook') }} :</label>
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
                                <label for="tw">{{ __('backend/settings.twitter') }} :</label>
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
                                <label for="ln">{{ __('backend/settings.linkedin') }} :</label>
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
                                <label for="text2">{{ __('backend/settings.text2') }} :</label>
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
                                <label for="text3">{{ __('backend/settings.text3') }} :</label>
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

                        <label for="dashboard_url">{{ __('backend/settings.dashboard_url') }} :</label>
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
                                <label for="email">{{ __('backend/settings.email') }} :</label>
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
                                <label for="phone">{{ __('backend/settings.pohone') }} :</label>
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
                        <label for="description">{{ __('backend/settings.description') }} :</label>
                        <textarea id="my-textarea" class="form-control  @error('description') is-invalid @enderror"
                                  name="description" rows="3">{{$setting->description}}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        <br>
                        @enderror
                        <br/>
                        <br/>
                        <br/>
                        <br/>

                        <button class="btn btn-primary">{{ __('backend/settings.submit') }}</button>

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
