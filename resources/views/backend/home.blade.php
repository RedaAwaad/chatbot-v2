@extends('backend.new_layout.app')
@section('content')
    <div class="kt-portlet dashobard-page-wraper">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"/>
                            <path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero"/>
                            <path d="M8.7295372,14.6839411 C8.35180695,15.0868534 7.71897114,15.1072675 7.31605887,14.7295372 C6.9131466,14.3518069 6.89273254,13.7189711 7.2704628,13.3160589 L11.0204628,9.31605887 C11.3857725,8.92639521 11.9928179,8.89260288 12.3991193,9.23931335 L15.358855,11.7649545 L19.2151172,6.88035571 C19.5573373,6.44687693 20.1861655,6.37289714 20.6196443,6.71511723 C21.0531231,7.05733733 21.1271029,7.68616551 20.7848828,8.11964429 L16.2848828,13.8196443 C15.9333973,14.2648593 15.2823707,14.3288915 14.8508807,13.9606866 L11.8268294,11.3801628 L8.7295372,14.6839411 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(14.000019, 10.749981) scale(1, -1) translate(-14.000019, -10.749981) "/>
                        </g>
                    </svg>
                    Reports
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-actions">
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <!--begin: Datatable -->
            <div class="col-xl-12">

                <!--begin:: Widgets/Quick Stats-->
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="kt-portlet kt-portlet--height-fluid-half kt-portlet--border-bottom-brand">
                            <div class="kt-portlet__body kt-portlet__body--fluid justify-content-center align-items-center">
                                <span class="kt-media kt-media--lg kt-media--info">
                                    <span>{{$answers_count}}</span>
                                </span>
                                <div class="kt-widget26 w-50 text-center">
                                    <div class="kt-widget26__content justify-content-center mx-2">
                                        <!-- <span class="kt-widget26__number"></span> -->
                                        <span class="kt-widget26__desc">{{__('chats.Total_Actions')}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="kt-portlet kt-portlet--height-fluid-half kt-portlet--border-bottom-brand">
                            <div class="kt-portlet__body kt-portlet__body--fluid justify-content-center align-items-center">
                                <span class="kt-media kt-media--lg kt-media--info">
                                    <span>{{$users}}</span>
                                </span>
                                <div class="kt-widget26 w-50 text-center">
                                    <div class="kt-widget26__content justify-content-center mx-2">
                                        <!-- <span class="kt-widget26__number">{{$users}}</span> -->
                                        <span class="kt-widget26__desc">{{__('chats.Total_Users')}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="kt-portlet kt-portlet--height-fluid-half kt-portlet--border-bottom-success">
                            <div class="kt-portlet__body kt-portlet__body--fluid justify-content-center align-items-center">
                                <span class="kt-media kt-media--lg kt-media--info">
                                    <span>{{$sessions}}</span>
                                </span>
                                <div class="kt-widget26 w-50 text-center">
                                    <div class="kt-widget26__content justify-content-center mx-2">
                                        <!-- <span class="kt-widget26__number">{{$sessions}}</span> -->
                                        <span class="kt-widget26__desc">{{__('chats.Total_Chats')}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-space-20"></div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="kt-portlet kt-portlet--height-fluid-half kt-portlet--border-bottom-success">
                            <div class="kt-portlet__body kt-portlet__body--fluid justify-content-center align-items-center">
                                <span class="kt-media kt-media--lg kt-media--info">
                                    <span>{{$report}}</span>
                                </span>
                                <div class="kt-widget26 mx-2 w-50 text-center">
                                    <div class="kt-widget26__content justify-content-center mx-2">
                                        <!-- <span class="kt-widget26__number">{{$report}}</span> -->
                                        <span class="kt-widget26__desc">{{__('chats.Total_Errors')}}</span>
                                    </div>
                                    <div class="kt-widget26__chart" style="height:100px; width: 230px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--end:: Widgets/Quick Stats-->
            </div>
            <!--end: Datatable -->
        </div>
    </div>
@endsection
