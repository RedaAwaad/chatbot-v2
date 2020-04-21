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
        <style>
            .chartdiv {
                width: 100%;
                height: 500px;
            }
            .charts{
                background-color: #2a3f54; color: #fff;
            }

        </style>
    @endpush
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title kt-font-primary">
                    {{__('chats.Report_for')}}  <small>{{$user->first_name}}</small>
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
    <div class="row">

        <div class="col-md-6">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title kt-font-primary">
                            {{__('chats.Report_for')}}  <small>Chats with Dates</small>
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
                            <div class="col-md-12 charts" >
                                <div class="chartdiv" id="chart1"></div>
                            </div>
                        </div>
                        <!--end:: Widgets/Quick Stats-->
                    </div>
                    <!--end: Datatable -->
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title kt-font-primary">
                            {{__('chats.Report_for')}}  <small>Users with Dates</small>
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

                            <div class="col-md-12 charts" >
                                <div class="chartdiv" id="chart2"></div>
                            </div>
                        </div>
                        <!--end:: Widgets/Quick Stats-->
                    </div>
                    <!--end: Datatable -->
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title kt-font-primary">
                            {{__('chats.Report_for')}}  <small>chats analysis</small>
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

                            <div class="col-md-12 charts" >
                                <div class="chartdiv" id="chart3"></div>
                            </div>
                        </div>
                        <!--end:: Widgets/Quick Stats-->
                    </div>
                    <!--end: Datatable -->
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title kt-font-primary">
                            {{__('chats.Report_for')}} <small>chats ُ Errors</small>
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

                            <div class="col-md-12 charts" >
                                <div class="chartdiv" id="chart4"></div>
                            </div>
                        </div>
                        <!--end:: Widgets/Quick Stats-->
                    </div>
                    <!--end: Datatable -->
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title kt-font-primary">
                            {{__('chats.Report_for')}}  <small>Top Questions Answers</small>
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

                            <div class="col-md-12 charts" >
                                <div class="chartdiv" id="chart5"></div>
                            </div>
                        </div>
                        <!--end:: Widgets/Quick Stats-->
                    </div>
                    <!--end: Datatable -->
                </div>
            </div>
        </div>
    </div>
@push('js')
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/spiritedaway.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/dark.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
<script src="{{ url('/backend') }}/vendors/sweetalert/sweetalert.js"></script>
<script>
    $.ajax({
        type:'get',
        url:"{{route('resp_stat')}}",
        success:function(data) {
            chart1(data.chart1)
            chart2(data.chart2)
            chart3(data.chart3)
            chart4(data.chart4)
            chart5(data.chart5)
            chart6(data.chart6)
            chart7(data.chart7)
        }
    });
    function chart1(data){
        am4core.ready(function() {

            // Themes begin
            am4core.useTheme(am4themes_dark);
                // Themes end

            var chart = am4core.create("chart1", am4charts.XYChart);
            chart.rtl = "{{ Session::get('locale') == 'ar' ? true:false}}";
            chart.data = data;

            // Create axes
            var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
            dateAxis.renderer.minGridDistance = 60;

            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

            // Create series
            var series = chart.series.push(new am4charts.LineSeries());
            series.dataFields.valueY = "value";
            series.dataFields.dateX = "date";
            series.tooltipText = "{value}"

            series.tooltip.pointerOrientation = "vertical";

            chart.cursor = new am4charts.XYCursor();
            chart.cursor.snapToSeries = series;
            chart.cursor.xAxis = dateAxis;

            //chart.scrollbarY = new am4core.Scrollbar();
            chart.scrollbarX = new am4core.Scrollbar();

        });
    }// end am4core.ready()
    function chart2(data){
        am4core.ready(function() {

            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end



            // Create chart instance
            var chart = am4core.create("chart2", am4charts.XYChart);
            chart.rtl = "{{ Session::get('locale') == 'ar' ? true:false}}";
            // Add data
            chart.data = data;

            // Create axes
            var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
            dateAxis.renderer.grid.template.location = 0;
            dateAxis.renderer.minGridDistance = 50;

            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.logarithmic = true;
            valueAxis.renderer.minGridDistance = 20;

            // Create series
            var series = chart.series.push(new am4charts.LineSeries());
            series.dataFields.valueY = "price";
            series.dataFields.dateX = "date";
            series.tensionX = 0.8;
            series.strokeWidth = 3;

            var bullet = series.bullets.push(new am4charts.CircleBullet());
            bullet.circle.fill = am4core.color("#fff");
            bullet.circle.strokeWidth = 3;

            // Add cursor
            chart.cursor = new am4charts.XYCursor();
            chart.cursor.fullWidthLineX = true;
            chart.cursor.xAxis = dateAxis;
            chart.cursor.lineX.strokeWidth = 0;
            chart.cursor.lineX.fill = am4core.color("#000");
            chart.cursor.lineX.fillOpacity = 0.1;

            // Add scrollbar
            chart.scrollbarX = new am4core.Scrollbar();

            // Add a guide
            let range = valueAxis.axisRanges.create();
            range.value = 90.4;
            range.grid.stroke = am4core.color("#396478");
            range.grid.strokeWidth = 1;
            range.grid.strokeOpacity = 1;
            range.grid.strokeDasharray = "3,3";
            range.label.inside = true;
            range.label.text = "Average";
            range.label.fill = range.grid.stroke;
            range.label.verticalCenter = "bottom";

        }); // end am4core.ready()
    }// end am4core.ready()
    function chart3(data){
        am4core.ready(function() {

            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end

            // Create chart instance
            var chart = am4core.create("chart3", am4charts.PieChart);
            chart.rtl = "{{ Session::get('locale') == 'ar' ? true:false}}";
            // Add data
            chart.data = data;

            // Add and configure Series
            var pieSeries = chart.series.push(new am4charts.PieSeries());
            pieSeries.dataFields.value = "litres";
            pieSeries.dataFields.category = "country";
            pieSeries.innerRadius = am4core.percent(50);
            pieSeries.ticks.template.disabled = true;
            pieSeries.labels.template.disabled = true;

            var rgm = new am4core.RadialGradientModifier();
            rgm.brightnesses.push(-0.8, -0.8, -0.5, 0, - 0.5);
            pieSeries.slices.template.fillModifier = rgm;
            pieSeries.slices.template.strokeModifier = rgm;
            pieSeries.slices.template.strokeOpacity = 0.4;
            pieSeries.slices.template.strokeWidth = 0;

            chart.legend = new am4charts.Legend();
            chart.legend.position = "right";

        }); // end am4core.ready()
    }
    function chart4(data){
        am4core.ready(function() {

            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end

            var chart = am4core.create("chart4", am4charts.XYChart);
            chart.paddingRight = 20;
            chart.rtl = "{{ Session::get('locale') == 'ar' ? true:false}}";
            chart.data = data;

            var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
            dateAxis.renderer.grid.template.location = 0;
            dateAxis.renderer.axisFills.template.disabled = true;
            dateAxis.renderer.ticks.template.disabled = true;

            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.tooltip.disabled = true;
            valueAxis.renderer.minWidth = 35;
            valueAxis.renderer.axisFills.template.disabled = true;
            valueAxis.renderer.ticks.template.disabled = true;

            var series = chart.series.push(new am4charts.LineSeries());
            series.dataFields.dateX = "date";
            series.dataFields.valueY = "value";
            series.strokeWidth = 2;
            series.tooltipText = "value: {valueY}, day change: {valueY.previousChange}";

            // set stroke property field
            series.propertyFields.stroke = "color";

            chart.cursor = new am4charts.XYCursor();

            var scrollbarX = new am4core.Scrollbar();
            chart.scrollbarX = scrollbarX;

            dateAxis.start = 0.7;
            dateAxis.keepSelection = true;


        }); // end am4core.ready()
    }
    function chart5(data){
        am4core.ready(function() {

        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end

        var chart = am4core.create("chart5", am4charts.PieChart3D);
        chart.hiddenState.properties.opacity = 0; // this creates initial fade-in
        chart.rtl = "{{ Session::get('locale') == 'ar' ? true:false}}";
        chart.legend = new am4charts.Legend();

        chart.data = data;

        var series = chart.series.push(new am4charts.PieSeries3D());
        series.dataFields.value = "litres";
        series.dataFields.category = "country";

        }); // end am4core.ready()
    }
    function chart6(data){
        am4core.ready(function() {

        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end

        var chart = am4core.create("chart6", am4charts.XYChart);
        chart.hiddenState.properties.opacity = 0; // this creates initial fade-in
        chart.rtl = "{{ Session::get('locale') == 'ar' ? true:false}}";
        chart.data = data;

        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.dataFields.category = "country";
        categoryAxis.renderer.minGridDistance = 40;
        categoryAxis.fontSize = 11;
        categoryAxis.renderer.labels.template.dy = 5;



        var image = new am4core.Image();
        image.horizontalCenter = "middle";
        image.width = 20;
        image.height = 20;
        image.verticalCenter = "middle";
        image.adapter.add("href", (href, target)=>{
        let category = target.dataItem.category;
        if(category){
            return "https://www.amcharts.com/wp-content/uploads/flags/" + category.split(" ").join("-").toLowerCase() + ".svg";
        }
        return href;
        })
        categoryAxis.dataItems.template.bullet = image;



        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis.min = 0;
        valueAxis.renderer.minGridDistance = 30;
        valueAxis.renderer.baseGrid.disabled = true;


        var series = chart.series.push(new am4charts.ColumnSeries());
        series.dataFields.categoryX = "country";
        series.dataFields.valueY = "visits";
        series.columns.template.tooltipText = "{valueY.value}";
        series.columns.template.tooltipY = 0;
        series.columns.template.strokeOpacity = 0;

        // as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
        series.columns.template.adapter.add("fill", function(fill, target) {
        return chart.colors.getIndex(target.dataItem.index);
        });

        }); // end am4core.ready()
    }
    function chart7(data){
        am4core.ready(function() {

            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end

            // Create chart instance
            var chart = am4core.create("chart7", am4charts.XYChart3D);
            chart.rtl = "{{ Session::get('locale') == 'ar' ? true:false}}";
            // Add data
            chart.data = data;

            // Create axes
            let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "country";
            categoryAxis.renderer.labels.template.rotation = 270;
            categoryAxis.renderer.labels.template.hideOversized = false;
            categoryAxis.renderer.minGridDistance = 20;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.tooltip.label.rotation = 270;
            categoryAxis.tooltip.label.horizontalCenter = "right";
            categoryAxis.tooltip.label.verticalCenter = "middle";

            let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.title.text = "Cities";
            valueAxis.title.fontWeight = "bold";

            // Create series
            var series = chart.series.push(new am4charts.ColumnSeries3D());
            series.dataFields.valueY = "visits";
            series.dataFields.categoryX = "country";
            series.name = "Visits";
            series.tooltipText = "{categoryX}: [bold]{valueY}[/]";
            series.columns.template.fillOpacity = .8;

            var columnTemplate = series.columns.template;
            columnTemplate.strokeWidth = 2;
            columnTemplate.strokeOpacity = 1;
            columnTemplate.stroke = am4core.color("#FFFFFF");

            columnTemplate.adapter.add("fill", function(fill, target) {
            return chart.colors.getIndex(target.dataItem.index);
            })

            columnTemplate.adapter.add("stroke", function(stroke, target) {
            return chart.colors.getIndex(target.dataItem.index);
            })

            chart.cursor = new am4charts.XYCursor();
            chart.cursor.lineX.strokeOpacity = 0;
            chart.cursor.lineY.strokeOpacity = 0;

            }); // end am4core.ready()
    }
</script>
@endpush
@endsection
