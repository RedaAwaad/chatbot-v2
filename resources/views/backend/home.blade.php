@extends('backend.new_layout.app')
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title kt-font-primary">
                    Report
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
                            <div class="kt-portlet__body kt-portlet__body--fluid">
                                <div class="kt-widget26">
                                    <div class="kt-widget26__content">
                                        <span class="kt-widget26__number">{{$answers_count}}</span>
                                        <span class="kt-widget26__desc">{{__('chats.Total_Actions')}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="kt-portlet kt-portlet--height-fluid-half kt-portlet--border-bottom-brand">
                            <div class="kt-portlet__body kt-portlet__body--fluid">
                                <div class="kt-widget26">
                                    <div class="kt-widget26__content">
                                        <span class="kt-widget26__number">{{$users}}</span>
                                        <span class="kt-widget26__desc">{{__('chats.Total_Users')}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="kt-portlet kt-portlet--height-fluid-half kt-portlet--border-bottom-success">
                            <div class="kt-portlet__body kt-portlet__body--fluid">
                                <div class="kt-widget26">
                                    <div class="kt-widget26__content">
                                        <span class="kt-widget26__number">{{$sessions}}</span>
                                        <span class="kt-widget26__desc">{{__('chats.Total_Chats')}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-space-20"></div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="kt-portlet kt-portlet--height-fluid-half kt-portlet--border-bottom-success">
                            <div class="kt-portlet__body kt-portlet__body--fluid">
                                <div class="kt-widget26">
                                    <div class="kt-widget26__content">
                                        <span class="kt-widget26__number">{{$report}}</span>
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
