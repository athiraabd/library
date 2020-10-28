@extends('layouts.master')
@section('main-content')
<div class="breadcrumb">
    <h1>Library Management System</h1>
</div>

<div class="separator-breadcrumb border-top"></div>

<div class="row">
    <!-- ICON BG -->
    <div class="col-lg-4 col-md-12 col-sm-12">
        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
            <div class="card-body text-center">
                <i class="i-Book"></i>
                <div class="content">
                    <p class="mt-2 mb-0 text-left text-wrap" style="width: 80px">Total Books</p>
                    <p class="text-primary text-24 text-left line-height-1 mb-2">{{ $countBooks }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-12 col-sm-12">
        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
            <div class="card-body text-center">
                <i class="i-Open-Book"></i>
                <div class="content">
                    <p class="text-muted mt-2 mb-0 text-left" style="width: 100px">Total Magazines</p>
                    <p class="text-primary text-24 text-left line-height-1 mb-2">{{ $countMagazines }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-12 col-sm-12">
        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
            <div class="card-body text-center">
                <i class="i-Newspaper"></i>
                <div class="content">
                    <p class="mt-2 mb-0 text-left text-wrap" style="width: 120px">Total Newspapers</p>
                    <p class="text-primary text-24 text-left line-height-1 mb-2">{{ $countNewspapers }}</p>
                </div>
            </div>
        </div>
    </div>


</div>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-title"> </div>
                <canvas class="my-4" id="myChart" height="100px"></canvas>
                <br/>

            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-12">


    </div>


</div>


@endsection

@section('page-js')
<script src="{{asset('assets/js/vendor/echarts.min.js')}}"></script>
<script src="{{asset('assets/js/es5/echart.options.min.js')}}"></script>
<script src="{{asset('assets/js/es5/dashboard.v1.script.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
<script src="https://www.chartjs.org/samples/latest/utils.js"></script>

    <script>
        function getData(url){
            return $.getJSON(url, function(data){
                return data;
            });
        }

        getData("{{ route('issued.yearly') }}").then(function(data) {

            var config = {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mac', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Total Books Issued',
                        backgroundColor: window.chartColors.purple,
                        borderColor: window.chartColors.purple,
                        data: data,
                        fill: false,
                    }]
                },
                options: {
                    responsive: true,
                    title: {
                        display: true,
                        text: ' '
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Month'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Total'
                            },
                            ticks: {
                                suggestedMin: 0,
                                suggestedMax: 10
                            }
                        }]
                    }
                }
            };

            var ctx = document.getElementById("myChart").getContext('2d');
            window.myLine = new Chart(ctx, config);
        });
    </script>


@endsection
