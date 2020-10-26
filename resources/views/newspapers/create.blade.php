@extends('layouts.master')
@section('main-content')

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title">Add Newspaper</div>

                    <form action="{{ route('newspapers.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-10">@include('newspapers.form')</div>
                    </form>


                </div>
            </div>
        </div>

    </div>

@endsection

@section('page-js')
    <script src="{{asset('assets/js/vendor/echarts.min.js')}}"></script>
    <script src="{{asset('assets/js/es5/echart.options.min.js')}}"></script>
    <script src="{{asset('assets/js/es5/dashboard.v1.script.js')}}"></script>
    <script src="{{asset('assets/js/vendor/pickadate/picker.js')}}"></script>
    <script src="{{asset('assets/js/vendor/pickadate/picker.date.js')}}"></script>

    <script>
        $(document).ready(function(){
            $('#picker3, #picker2').pickadate({
                format: 'dd/mm/yyyy'
            });
        });
    </script>


@endsection
