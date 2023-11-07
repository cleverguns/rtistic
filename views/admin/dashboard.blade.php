@extends('components.app')
@section('content')

    <div class="row">
        <div class="col-sm-12 col-md8 col-lg-8">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="mb-1">Total Products</p>
                                    <h1 class="mb-3">50</h1>

                                </div>
                                <div class="">
                                    <i class="ri-shopping-bag-3-fill text-danger fa-4x"></i>
                                </div>
                            </div>
                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="mb-1">Total Products</p>
                                    <h1 class="mb-3">50</h1>

                                </div>
                                <div class="">
                                    <i class="ri-shopping-bag-3-fill text-danger fa-4x"></i>
                                </div>
                            </div>
                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="mb-1">Total Products</p>
                                    <h1 class="mb-3">50</h1>

                                </div>
                                <div class="">
                                    <i class="ri-shopping-bag-3-fill text-danger fa-4x"></i>
                                </div>
                            </div>
                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="mb-1">Total Products</p>
                                    <h1 class="mb-3">50</h1>

                                </div>
                                <div class="">
                                    <i class="ri-shopping-bag-3-fill text-danger fa-4x"></i>
                                </div>
                            </div>
                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Monthly Sales</h4>

                            <div id="spline_area" class="apex-charts" dir="ltr"></div>
                        </div>
                    </div><!--end card-->
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Top 5 Products Sold ({{ date('F - Y') }})</h4>

                            <div id="bar_chart" class="apex-charts" dir="ltr"></div>
                        </div>
                    </div><!--end card-->
                </div>
            </div>

        </div>
        <div class="col-sm-12 col-md-4 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="mb-1">Profit of the Day</p>
                            <h1 class="mb-3 display-3">50</h1>

                        </div>
                        <div class="">
                            <i class="ri-shopping-bag-3-fill text-danger fa-4x"></i>
                        </div>
                    </div>
                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="mb-1">Total Orders Today</p>
                            <h1 class="mb-3 display-3">50</h1>
                        </div>
                        <div class="">
                            <a href="javascript:void(0)" class="text-danger">
                                See All
                            </a>
                        </div>
                    </div>


                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div>
    </div>

@endsection
@once
    @push('scripts')

        <script>
            var options, chart, bar_chart;

            $("#spline_area").length && (options = {
                chart: {
                    height: 350,
                    type: "area"
                },
                dataLabels: {enabled: !1},
                stroke: {curve: "smooth", width: 3},
                series: [
                    {
                        name: "High Sales",
                        data: [34, 40, 28, 52, 42, 109, 100, 343, 33, 13, , 56, 55]
                    },
                    {
                        name: "Low Sales",
                        data: [32, 60, 34, 46, 34, 52, 41, 88, 122, 88, 45, 11]
                    }
                ],
                colors: ["#47f503", "#c40f0f"],
                xaxis: {
                    type: "month",
                    categories: [
                        "Jan",
                        "Feb",
                        "Mar",
                        "Apr",
                        "May",
                        "Jun",
                        "Jul",
                        "Aug",
                        "Sep",
                        "Oct",
                        "Nov",
                        "Dec"
                    ]
                },
                grid: {borderColor: "#f1f1f1"},
                tooltip: {x: {format: "dd/MM/yy HH:mm"}}
            }, (chart = new ApexCharts(document.querySelector("#spline_area"), options)).render());

            bar_chart = new ApexCharts(document.querySelector("#column_chart_datalabel"), options).render();

            $("#bar_chart").length && (options = {
                chart: {
                    height: 350,
                    type: "bar",
                    toolbar: {show: !1}
                },
                plotOptions: {bar: {horizontal: !0}},
                dataLabels: {enabled: !1},
                series: [{data: [380, 55, 124, 342, 232]}],
                colors: ["#c40f0f"],
                grid: {borderColor: "#f1f1f1"},
                xaxis: {
                    categories: [
                        "Gear 5",
                        "Naruto Shippuden",
                        "God of War",
                        "The Last of Us",
                        "Uncharted 4",
                    ]
                }
            }, (chart = new ApexCharts(document.querySelector("#bar_chart"), options)).render());
        </script>

    @endpush
@endonce
