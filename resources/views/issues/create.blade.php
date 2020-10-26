@extends('layouts.master')
@section('main-content')

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title">Add Issued Book</div>

                    <form action="{{ route('issues.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-10">@include('issues.form')</div>
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

            var yesterday = new Date((new Date()).valueOf()-1000*60*60*24);

            $('#picker3').pickadate({
                format: 'dd/mm/yyyy',
                disable: [
                    { from: [0,0,0], to: yesterday }
                ],
                onStart: function ()
                {
                    var date = new Date();
                    this.set('select', [date.getFullYear(), date.getMonth(), date.getDate()])
                },
                min: true
            });
        });
    </script>


@endsection
